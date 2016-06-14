<?php
namespace frontend\controllers;

use Yii;
use common\models\Cart;
use common\models\ProductOptions;
use common\models\Coupon;
use common\models\CouponList;
use common\components\YiishopController;

Class CartController extends YiishopController {
	public $layout = 'storenew';

	public function actionIndex() {
        date_default_timezone_set('Asia/Jakarta');
        $current_date = strtotime("now");
        $countCoupon = Coupon::find()->where(['coupon_status'=>'10'])->all();
        $countCouponlist = CouponList::find()->where(['coupon_list_status' => '0'])->all();
        foreach($countCoupon as $data){
            if($data->coupon_date_end <= $current_date){
                $data->coupon_status=0;
                $data->save();
            }
        }
        foreach($countCouponlist as $data){
            $modelCoupon = Coupon::find()->where(['coupon_id'=>$data->coupon_id])->one();
            if($modelCoupon->coupon_date_end <= $current_date){
                $data->coupon_list_status = 20;
                $data->save();
            }
        }
        
        $cart = Cart::find()->where(['cart_code' => Yii::$app->session['cart_code']])->all();
        $discount = Cart::find()->where(['cart_code' => Yii::$app->session['cart_code']])->andWhere(['not', ['coupon_discount'=>NULL]])->one();
		$sql = "SELECT product.product_image, product.product_price, product.product_name, cart.* FROM cart,product WHERE product.product_id=cart.product_id AND cart.cart_code='" . Yii::$app->session['cart_code'] . "'";
		/*$sql = "SELECT * FROM product";*/
		$db = Yii::$app->db;
		$command = $db -> createCommand($sql);
		$results = $command->queryAll();
		return $this->render('index', ['data' => $results, 'sum' => NULL, 'discount' => $discount, 'cart' => $cart]);
	}

	public function actionChange() {
        $count = count(Cart::find()->where(['cart_code' => Yii::$app->session['cart_code']])->all());
		for ($i = 1; $i <= $count; $i++) {

			$model = Cart::findOne($_POST['id' . $i]);
            if (isset($_POST['coupon_code'])) {
                $discount = CouponList::find()
                    ->where(['coupon_code'=>$_POST['coupon_code'], 'customer_id'=>Yii::$app->user->id, 'coupon_list_status'=>0])
                    // ->andWhere(['not', 'coupon_list_status'=>0])
                    ->one();
                if (count($discount) > 0) {
                    $model->coupon_code = $_POST['coupon_code'];
                    $model->coupon_discount = $discount->coupon->coupon_discount;
                    $model->coupon_id = $discount->coupon->coupon_id;
                }
            }
			// $model = Cart::find()->where(['id' => $_POST['id' . $i]])->one();
			$model->qty = $_POST['qty' . $i];
			$model->save();
            $y = \common\models\Deal::findOne($model->deal_id);
            if($model->deal_category_id == 3){
                if($model->checkQuantityThreeshold($model->qty, $model->deal_quantity_threeshold)){
                    $model->deal_discount = $y->discount_value;
                    $model->save();
                } else {
                    $model->deal_discount = NULL;
                    $model->save();
                }
            }
		}
		return $this->redirect(['index']);
	}

	public function actionRemove($id) {
		if (Cart::deleteAll(['id'=>$id])) {
			return $this->redirect(['index']);
		} else {
			throw new \yii\web\HttpException(400, 'Invalid request ID. Please do not repeat this request again.');
		}
	}

	public function actionCart()
    {
        return $this->render('cart-view');
    }

    public function actionUpsellAddToCart($id, $options)
    {
        $x = \common\models\Product::findOne($id);
        if(count($x) > 0) {$deal_id = $x->deal_deal_id;} else {$deal_id=NULL;}
        $y = \common\models\Deal::findOne($deal_id);
        $z = \common\models\ProductOptions::findOne($options);

        if(count($y) > 0 && $y->deal_category_id == 3) {
            $cart = Cart::find()->where(['product_id' => $id, 'cart_code' => Yii::$app->session['cart_code']])->one();
            if(count($cart) > 0){
                if(Cart::checkQuantityThreeshold($cart->qty, $cart->deal_quantity_threeshold)){
                    $deal_discount = $y->discount_value;
                    $deal_category_id = $y->deal_category_id;
                    $deal_quantity = $y->get_quantity - $y->quantity_threeshold;
                    $deal_quantity_threeshold = $y->quantity_threeshold;
                } else {
                    $deal_discount = NULL;
                    $deal_category_id = $y->deal_category_id;
                    $deal_quantity = $y->get_quantity - $y->quantity_threeshold;
                    $deal_quantity_threeshold = $y->quantity_threeshold;
                }
            } else {
                $deal_discount = NULL;
                $deal_category_id = $y->deal_category_id;
                $deal_quantity = $y->get_quantity - $y->quantity_threeshold;
                $deal_quantity_threeshold = $y->quantity_threeshold;
            }
        }
        else if(count($y) > 0) {
            $deal_discount = $y->discount_value;
            $deal_category_id = $y->deal_category_id;
            $deal_quantity = $y->get_quantity - $y->quantity_threeshold;
            $deal_quantity_threeshold = $y->quantity_threeshold;
        } else {
            $deal_category_id=NULL;
            $deal_discount=NULL;
            $deal_quantity=NULL;
            $deal_quantity_threeshold=NULL;
        }

        $model = new Cart();

        $model->product_id = $id;
        $model->qty = 1;
        $model->cart_code = Yii::$app->session['cart_code'];
        $model->deal_id = $deal_id;
        $model->deal_category_id = $deal_category_id;
        $model->deal_discount = $deal_discount;
        $model->deal_quantity = $deal_quantity;
        $model->deal_quantity_threeshold = $deal_quantity_threeshold;
        $model->product_options_id = $z->product_options_id;
        $model->product_options_name = $z->product_options_name;
        $model->product_options_price = $z->product_options_price;
        if ($model->save()) {
            $this->redirect(['/cart']);
        } else {
            throw new \yii\web\HttpException(404, 'The requested is invalid.');
        }
    }

    public function actionAddToCart($id)
    {
        $x = \common\models\Product::findOne($id);
        if(count($x) > 0) {$deal_id = $x->deal_deal_id;} else {$deal_id=NULL;}
        $y = \common\models\Deal::findOne($deal_id);
        $opt = \common\models\ProductOptions::find()
            ->where(['product_id' => $id])
            ->orderBy(['product_options_tier'=>SORT_ASC])
            ->limit(1)
            ->one();

        if(count($y) > 0 && $y->deal_category_id == 3) {
            $cart = Cart::find()->where(['product_id' => $id, 'cart_code' => Yii::$app->session['cart_code']])->one();
            if(count($cart) > 0){
                if(Cart::checkQuantityThreeshold($cart->qty, $cart->deal_quantity_threeshold)){
                    $deal_discount = $y->discount_value;
                    $deal_category_id = $y->deal_category_id;
                    $deal_quantity = $y->get_quantity - $y->quantity_threeshold;
                    $deal_quantity_threeshold = $y->quantity_threeshold;
                } else {
                    $deal_discount = NULL;
                    $deal_category_id = $y->deal_category_id;
                    $deal_quantity = $y->get_quantity - $y->quantity_threeshold;
                    $deal_quantity_threeshold = $y->quantity_threeshold;
                }
            } else {
                $deal_discount = NULL;
                $deal_category_id = $y->deal_category_id;
                $deal_quantity = $y->get_quantity - $y->quantity_threeshold;
                $deal_quantity_threeshold = $y->quantity_threeshold;
            }
        }
        else if(count($y) > 0) {
            $deal_discount = $y->discount_value;
            $deal_category_id = $y->deal_category_id;
            $deal_quantity = $y->get_quantity - $y->quantity_threeshold;
            $deal_quantity_threeshold = $y->quantity_threeshold;
        } else {
            $deal_category_id=NULL;
            $deal_discount=NULL;
            $deal_quantity=NULL;
            $deal_quantity_threeshold=NULL;
        }

        $model = new Cart();

        $model->product_id = $id;
        $model->qty = 1;
        $model->cart_code = Yii::$app->session['cart_code'];
        $model->deal_id = $deal_id;
        $model->deal_category_id = $deal_category_id;
        $model->deal_discount = $deal_discount;
        $model->deal_quantity = $deal_quantity;
        $model->deal_quantity_threeshold = $deal_quantity_threeshold;
        $model->product_options_id = $opt->product_options_id;
        if ($this->addQuantity($id, Yii::$app->session['cart_code'], 1)) {
            $this->redirect(['/cart']);
        } elseif ($model->save()) {
            $this->redirect(['/cart']);
        } else {
            throw new \yii\web\HttpException(404, 'The requested is invalid.');
        }
    }

    private function addQuantity($product_id, $cart_code='', $qty='') {
        $x = \common\models\Product::findOne($product_id);
        if(count($x) > 0) {$deal_id = $x->deal_deal_id;} else {$deal_id=NULL;}
        $y = \common\models\Deal::findOne($deal_id);

        $modelCart = Cart::find()
            ->where(['product_id' => $product_id, 'cart_code' => $cart_code])
            //->andWhere(['product_options_id' => NULL])
            ->one();

        if (count($modelCart) > 0) {
            $modelCart->qty += $qty;
            $modelCart->save();

            if(count($y) > 0 && $y->deal_category_id == 3) {
                if(Cart::checkQuantityThreeshold($modelCart->qty, $modelCart->deal_quantity_threeshold)){
                    $modelCart->deal_discount = $y->discount_value;
                    $modelCart->save();
                }
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function actionMultipleAddToCart($id, $quantity, $options)
    {
        $x = \common\models\Product::findOne($id);
        if(count($x) > 0) {$deal_id = $x->deal_deal_id;} else {$deal_id=NULL;}
        $y = \common\models\Deal::findOne($deal_id);
        
        $model = new Cart();
            if (isset ($_POST['MultipleAddToCartForm']['product_options_id'])){
                $modelOptions = Cart::find()
                    ->where(['not', ['product_options_id' => $_POST['MultipleAddToCartForm']['product_options_id']]])
                    ->andWhere(['cart_code' => Yii::$app->session['cart_code']])
                    ->all();
                $options = $_POST['MultipleAddToCartForm']['product_options_id'];
                $model->product_options_id = $options;
                $modelPrice = ProductOptions::find()->where(['product_options_id'=>$options])->one();
                $model->product_options_price = $modelPrice->product_options_price;
                $model->product_options_name = $modelPrice->product_options_name;
                
                if (count($modelOptions) > 0) {
                    $quantity = $_POST['MultipleAddToCartForm']['quantity'];
                    $model->product_id = $id;
                    $model->qty = $quantity;
                    $model->cart_code = Yii::$app->session['cart_code'];
                    $options = $_POST['MultipleAddToCartForm']['product_options_id'];
                    $model->product_options_id = $options;
                }
            }
            $quantity = $_POST['MultipleAddToCartForm']['quantity'];
            $model->product_id = $id;
            $model->qty = $quantity;
            $model->cart_code = Yii::$app->session['cart_code'];

            if(count($y) > 0) {
                $deal_discount = $y->discount_value;
                $deal_category_id = $y->deal_category_id;
                $deal_quantity = $y->get_quantity - $y->quantity_threeshold;
                $deal_quantity_threeshold = $y->quantity_threeshold;
            } else {
                $deal_category_id=NULL;
                $deal_discount=NULL;
                $deal_quantity=NULL;
                $deal_quantity_threeshold=NULL;
            }

            $model->deal_id = $deal_id;
            $model->deal_category_id = $deal_category_id;
            $model->deal_discount = $deal_discount;
            $model->deal_quantity = $deal_quantity;
            $model->deal_quantity_threeshold = $deal_quantity_threeshold;

            if(isset($_POST['MultipleAddToCartForm']['product_options_id']) && $this->addMultipleQuantityWithOptions($id, Yii::$app->session['cart_code'], $quantity, $_POST['MultipleAddToCartForm']['product_options_id'])){
                $this->redirect(['/cart']);
            } elseif ($this->addMultipleQuantity($id, Yii::$app->session['cart_code'], $quantity)) {
                $this->redirect(['/cart']);
            } elseif ($model->save()) {
                $this->redirect(['/cart']);
            } else {
                throw new \yii\web\HttpException(404, 'The requested is invalid.');
            }
        
    }

    /*
        Ketika produk sejenis ditemukan di cart maka yang diupdate hanyalah qtynya saja
    */
    private function addMultipleQuantity($product_id, $cart_code='', $qty='') {
        $x = \common\models\Product::findOne($product_id);
        if(count($x) > 0) {$deal_id = $x->deal_deal_id;} else {$deal_id=NULL;}
        $y = \common\models\Deal::findOne($deal_id);

        $modelCart = Cart::find()
            ->where(['product_id' => $product_id, 'cart_code' => $cart_code])
            ->andWhere(['product_options_id' => NULL])
            ->one();
        if (!isset ($_POST['MultipleAddToCartForm']['product_options_id']) && count($modelCart) > 0) {
            $modelCart->qty += $qty;
            $modelCart->save();

            if(count($y) > 0 && $y->deal_category_id == 3) {
                if(Cart::checkQuantityThreeshold($modelCart->qty, $modelCart->deal_quantity_threeshold)){
                    $modelCart->deal_discount = $y->discount_value;
                    $modelCart->save();
                }
            }

            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
        Ketika produk sejenis dengan opsi yang sama pula maka yang diupdate hanyalah qtynya saja
    */
    private function addMultipleQuantityWithOptions($product_id, $cart_code='', $qty='', $options='') {
        $x = \common\models\Product::findOne($product_id);
        if(count($x) > 0) {$deal_id = $x->deal_deal_id;} else {$deal_id=NULL;}
        $y = \common\models\Deal::findOne($deal_id);

        $modelCart = Cart::find()
            ->where(['product_id' => $product_id, 'cart_code' => $cart_code, 'product_options_id' => $options])
            ->one();
        if (count($modelCart) > 0) {
            $modelCart->qty += $qty;
            $modelCart->save();

            if(count($y) > 0 && $y->deal_category_id == 3) {
                if(Cart::checkQuantityThreeshold($modelCart->qty, $modelCart->deal_quantity_threeshold)){
                    $modelCart->deal_discount = $y->discount_value;
                    $modelCart->save();
                }
            }
            
            return TRUE;
        } else {
            return FALSE;
        }
    }
}