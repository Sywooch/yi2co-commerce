<?php
namespace frontend\controllers;

use Yii;

use common\models\Customer;
use common\models\DeliveryAddress;
use common\models\Product;
use common\models\Order;
use common\models\OrderList;
use common\models\BankTransfer;
use common\models\PaymentConf;
use common\models\Cart;
use yii\db\Expression;
use yii\web\Controller;
/*use yii\filters\VerbFilter;
use yii\filters\AccessControl;*/

class CheckoutController extends Controller
{
	public $layout = 'storenew';

	public function actionIndex()
	{
		if(!isset(Yii::$app->user->id)){
			return $this->redirect(['site/login/']);
		}
		$modelAddress = DeliveryAddress::find()->where(['customer_id' => Yii::$app->user->id])->all();
		$modelAddAddress = new DeliveryAddress();
		$modelCustomer = Customer::findOne(Yii::$app->user->id);
		$x = Cart::find()->where(['cart_code' => Yii::$app->session['cart_code']])->andWhere(['not', ['coupon_discount'=>NULL]])->one();
		if(count($x)>0){$coupondiscount = $x->coupon_discount;} else {$coupondiscount = NULL;};
		$modelOrder = new Order();

		$sql = "SELECT product.product_image, product.product_price, product.product_name, cart.* FROM cart,product WHERE product.product_id=cart.product_id AND cart.cart_code='" . Yii::$app->session['cart_code'] . "'";
		$db = Yii::$app->db;
		$command = $db -> createCommand($sql);
		$results = $command->queryAll();
		return $this->render('index', [
			'modelCustomer' => $modelCustomer,
			'modelAddress' => $modelAddress,
			'modelAddAddress' => $modelAddAddress,
			'modelOrder' => $modelOrder,
			'coupondiscount' => $coupondiscount,
			'data' => $results,
			'sum' => NULL,
			'save' => NULL,
		]);
	}

	public function actionAddAddress($id)
	{
		$modelAddress = DeliveryAddress::find()->where(['customer_id' => Yii::$app->user->id])->all();
		$modelCustomer = Customer::findOne($id);
		$modelAddAddress = new DeliveryAddress();

		if (Yii::$app->request->post()) {
			$modelAddAddress->load(Yii::$app->request->post());
			$findCity = \common\models\City::find()->where(['city_id'=>$_POST['DeliveryAddress']['city_id']])->one();
			$modelAddAddress->customer_id = $id;
			$modelAddAddress->delivery_address_address = $_POST['DeliveryAddress']['delivery_address_address'] . " - " . $findCity->city_name;
			$modelAddAddress->save();
			return $this->redirect(['index']);
		}
		else {
			return $this->render('index', [
				'modelCustomer' => $modelCustomer,
				'modelAddress' => $modelAddress,
				'modelAddAddress' => $modelAddAddress,
			]);
		}
	}

	public function actionPlaceOrder()
	{
		$modelCustomer = Customer::find()->where(['customer_id'=>Yii::$app->user->id])->one();
		$modelOrder = new Order();
		$modelOrderlist = new OrderList();
		$a = Cart::find()->where(['cart_code'=>Yii::$app->session['cart_code']])->andWhere(['not', ['coupon_code'=>NULL]])->one();
		if (count($a)>0) {$coupon_code = $a->coupon_code;} else {$coupon_code=NULL;}

		$sql = "SELECT product.product_image, product.product_price, product.product_name, cart.* FROM cart,product WHERE product.product_id=cart.product_id AND cart.cart_code='" . Yii::$app->session['cart_code'] . "'";
		$db = Yii::$app->db;
		$command = $db -> createCommand($sql);
		$results = $command->queryAll();

		if (Yii::$app->request->post()) {
			$modelOrder->load(Yii::$app->request->post());
			$modelOrder->order_date = new Expression('NOW()');
			$modelOrder->customer_id = Yii::$app->user->id;
			$modelOrder->order_code = Yii::$app->security->generateRandomString(4);
			$modelOrder->coupon_code = $coupon_code;
			$modelOrder->save();
			if($modelOrder->coupon_code!==null){
				$modelCouponlist = \common\models\CouponList::find()->where(['coupon_code'=>$modelOrder->coupon_code])->one();
				$modelCouponlist->coupon_list_status = 10;
				$modelCouponlist->save();
			}
			$i=1; $point=0; foreach($results as $data) {
				$modelOrder->order_sum = $modelOrder->order_sum + (($data['product_price'] + $data['product_options_price'] - ($data['product_price']*($data['deal_discount']/100))) * $data['qty']);
				$modelProduct = \common\models\Product::find()->where(['product_id'=>$data['product_id']])->one();
				$point = $point+ ($modelProduct->product_reward_point * $data['qty']);
		        Yii::$app->runAction('checkout/save-order-list' , [
		            'id' => $data['product_id'],
		            'quantity' => $data['qty'],
		            'subtotal' => $data['product_price'] * $data['qty'],
		            'options' => $data['product_options_id'],
		            'optionsname' => $data['product_options_name'],
		            'optionsprice' => $data['product_options_price'],
		            'deal' => $data['deal_id'],
		            'dealcategory' => $data['deal_category_id'],
		            'dealdiscount' => $data['deal_discount'],
		            'dealquantity' => $data['deal_quantity'],
		            'dealquantitythreeshold' => $data['deal_quantity_threeshold'],
		        ]);
		    $i++;
		    }
		    $modelCustomer->customer_reward_point += $point;
		    //$modelCustomer->save();
		    $modelOrder->save();
		    \common\models\Cart::deleteAll(['cart_code'=>Yii::$app->session['cart_code']]);
			return($this->redirect(['/myorder/confirm-payment', 'ordercode'=>$modelOrder->order_code]));
		}
		else {
			return $this->render('index', [
				'modelOrder' => $modelOrder,
			]);
		}
	}

	public function actionSaveOrderList($id, $quantity, $subtotal, $options, $optionsname, $optionsprice, $deal, $dealcategory, $dealdiscount, $dealquantity, $dealquantitythreeshold) {
        $model = new OrderList();
        $model->order_code = $this->getOrderCode();
        $model->product_id = $id;
        $model->product_options_id = $options;
        $model->product_options_name = $optionsname;
        $model->product_options_price = $optionsprice;

        $model->quantity = $quantity;
        $model->subtotal = $subtotal;
        
        $model->deal_id = $deal;
        $model->deal_category_id = $dealcategory;
        $model->deal_discount = $dealdiscount;
        $model->deal_quantity = $dealquantity;
        $model->deal_quantity_threeshold = $dealquantitythreeshold;

        
        $model->save();
    }

    

	public function getOrderCode() {
		$modelOrder = Order::find()
			->where(['customer_id' => Yii::$app->user->id])
			->orderBy(['order_date'=>SORT_DESC])
			->limit(1)
			->one();
		$ordercode = $modelOrder->order_code;
		return $ordercode;
	}

	public function actionConfirmPayment(){
		$modelBank = new BankTransfer();
		$modelPayment = new PaymentConf();
		$modelOrder = Order::find()
			->where(['customer_id' => Yii::$app->user->id])
			->orderBy(['order_date'=>SORT_DESC])
			->limit(1)
			->one();
		if (Yii::$app->request->post()) {
			$modelPayment->load(Yii::$app->request->post());
			$modelPayment->order_code = $this->getOrderCode();
			$modelPayment->save();
			$modelOrder->payment_status = 10;
			$modelOrder->save();
			return $this->redirect(['site/index']);
		}
		return $this->render('confirm-payment', [
			'modelBank' => $modelBank,
			'modelPayment' => $modelPayment,
			'modelOrder' => $modelOrder,
		]);
	}

}