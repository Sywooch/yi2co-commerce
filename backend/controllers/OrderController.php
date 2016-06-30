<?php

namespace backend\controllers;

use Yii;
use common\models\Customer;
use common\models\Order;
use common\models\PaymentConf;
use backend\models\OrderSearch;
use common\models\OrderList;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionVerifyPayment($ordercode)
    {
        $model = $this->findModel($ordercode);
        $modelCustomer = Customer::find()->where(['customer_id'=>$model->customer_id])->one();

        $sql = "SELECT product.product_image, product.product_price, product.product_name, order_list.* FROM order_list,product WHERE product.product_id=order_list.product_id AND order_list.order_code='" . $ordercode . "'";
        $db = Yii::$app->db;
        $command = $db -> createCommand($sql);
        $results = $command->queryAll();

        $i=1; $point=0; foreach($results as $data) {
            $modelProduct = \common\models\Product::find()->where(['product_id'=>$data['product_id']])->one();
            $point = $point+ ($modelProduct->product_reward_point * $data['quantity']);
        $i++;
        }
        $model->payment_status = 20;
        $model->order_status = 10;
        $model->approved_by = Yii::$app->user->id;
        $model->save();
        $modelCustomer->customer_reward_point += $point;
        $modelCustomer->save();

        return $this->redirect(['index']);
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        date_default_timezone_set('Asia/Jakarta');
        $current_date = strtotime("now");
        $countOrder = Order::find()->where(['order_status'=>'0'])->all();
        foreach($countOrder as $data){
            if((strtotime($data->order_date)+10800) <= $current_date){
                $data->delete();
            }
        }

        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
        $modelPaymentconf = PaymentConf::find()->where(['order_code'=>$id])->one();
        return $this->render('view', [
            'modelOrder' => $modelOrder,
            'modelOrderlist' => $modelOrderlist,
            'modelPaymentconf' => $modelPaymentconf,
            'coupondiscount' => $coupondiscount,
            'order_code' => $id,
            'data' => $results,
            'sum' => NULL,
            'save' => NULL,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param string $id
     * @return mixed
     */
    /*public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->order_code]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /*public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $sql = "SELECT product.product_image, product.product_price, product.product_name, order_list.* FROM order_list,product WHERE product.product_id=order_list.product_id AND cart.cart_code='" . Yii::$app->session['cart_code'] . "'";
        $db = Yii::$app->db;
        $command = $db -> createCommand($sql);
        $results = $command->queryAll();

        if($model->load(Yii::$app->request->post())) {
            if($model->save()) {
                if($model->load(Yii::$app->request->post(['order']['payment_status']))==20) {

                }
                return $this->redirect(['view', 'id' => $model->order_code]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->order_code]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
