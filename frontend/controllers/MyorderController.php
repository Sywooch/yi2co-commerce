<?php
namespace frontend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\Order;
use common\models\OrderList;
use common\models\PaymentConf;
use frontend\models\OrderSearch;

class MyorderController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'confirm-payment', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

	public $layout = 'storenew';

	public function actionIndex()
	{
		$searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider,]);
	}

	public function actionView($id)
    {
    	$x = OrderList::find()->where(['order_code' => $id])->andWhere(['not', ['coupon_discount'=>NULL]])->one();
		if(count($x)>0){$coupondiscount = $x->coupon_discount;} else {$coupondiscount = NULL;};
    	$sql = "SELECT product.product_image, product.product_price, product.product_name, order_list.* FROM order_list,product WHERE product.product_id=order_list.product_id AND order_list.order_code='" . $id . "'";
		$db = Yii::$app->db;
		$command = $db -> createCommand($sql);
		$results = $command->queryAll();

    	$modelOrder = Order::findOne($id);
    	$modelOrderlist = OrderList::find()->where(['order_code'=>$id])->all();
        return $this->render('view', [
            'modelOrder' => $modelOrder,
            'modelOrderlist' => $modelOrderlist,
            'coupondiscount' => $coupondiscount,
            'order_code' => $id,
            'data' => $results,
            'sum' => NULL,
            'save' => NULL,
        ]);
    }

    public function actionConfirmPayment($ordercode)
    {
        $x = OrderList::find()->where(['order_code' => $ordercode])->andWhere(['not', ['coupon_discount'=>NULL]])->one();
        if(count($x)>0){$coupondiscount = $x->coupon_discount;} else {$coupondiscount = NULL;};
        $sql = "SELECT product.product_image, product.product_price, product.product_name, order_list.* FROM order_list,product WHERE product.product_id=order_list.product_id AND order_list.order_code='" . $ordercode . "'";
        $db = Yii::$app->db;
        $command = $db -> createCommand($sql);
        $results = $command->queryAll();

        $modelPayment = new PaymentConf();
        $modelOrder = Order::find()
            ->where(['order_code' => $ordercode])
            ->one();
        $modelOrderlist = OrderList::find()->where(['order_code'=>$ordercode])->all();

        if(Yii::$app->request->post()) {
            $modelPayment->load(Yii::$app->request->post());
            $modelPayment->order_code = $ordercode;
            $modelPayment->save();
            $modelOrder->payment_status = $modelOrder::PAYMENT_STATUS_NOT_VERIFIED;
            $modelOrder->save();
            return $this->redirect(['index']);
        }
        return $this->render('confirm-payment', [
            'modelPayment' => $modelPayment,
            'modelOrder' => $modelOrder,
            'modelOrderlist' => $modelOrderlist,
            'coupondiscount' => $coupondiscount,
            'order_code' => $ordercode,
            'data' => $results,
            'sum' => NULL,
            'save' => NULL,
            'shipping' => $modelOrder->deliveryAddress->city->shipping_cost,
        ]);
    }

    public function actionDelete($id)
    {
        if($this->findModel($id)->payment_status == 0) {
            $this->findModel($id)->delete();
        }

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

};