<?php
namespace frontend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\Customer;
use common\models\Coupon;
use common\models\CouponList;
use frontend\models\CouponlistSearch;

class MycouponController extends Controller
{
	public $layout = 'storenew';

	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'redeem', 'redeem-coupon'],
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

	public function actionIndex()
	{
		$searchModel = new CouponlistSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		/*date_default_timezone_set('Asia/Jakarta');
		$current_date = strtotime(date('Y-m-d'));
		// $countCoupon = Coupon::findAll(['<=', 'strtotime(coupon_date_end)', $current_date]);
		$countCoupon = Coupon::find()->where(['coupon_status'=>'10'])->all();

		foreach($countCoupon as $data){
			$end_date = strtotime($data->coupon_date_end);
			$modelCoupon = Coupon::find()->where(['<=', $end_date, $current_date])->one();

			if(count($modelCoupon)>0){
				$data->coupon_status = 0;
				$data->save();
			}
		}*/

		date_default_timezone_set('Asia/Jakarta');
		$current_date = strtotime("now");
		$countCouponlist = CouponList::find()->where(['coupon_list_status' => '0'])->all();

		foreach($countCouponlist as $data){
			$modelCoupon = Coupon::find()->where(['coupon_id'=>$data->coupon_id])->one();
			if(strtotime($modelCoupon->coupon_date_end) <= $current_date){
				$data->coupon_list_status = 20;
				$data->save();
			}
		}
		
		return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider,]);
	}

	public function actionRedeem()
	{
		$modelCust = Customer::find()
			->where(['customer_id' => Yii::$app->user->id])
			->one();
		$model = Coupon::find()
			->where(['coupon_status' => Coupon::STATUS_ACTIVE])
			->all();

		date_default_timezone_set('Asia/Jakarta');
		$current_date = strtotime("now");
		$countCoupon = Coupon::find()->where(['coupon_status'=>'10'])->all();
		foreach($countCoupon as $data){
			if(strtotime($data->coupon_date_end) <= $current_date){
				$data->coupon_status=0;
				$data->save();
			}
		}
		return $this->render('redeem', [
			'model' => $model,
			'modelCust' => $modelCust,
		]);
	}

	public function actionRedeemCoupon($id, $cust)
	{
		$modelCustomer = Customer::find()
			->where(['customer_id' => Yii::$app->user->id])
			->one();
		$modelCoupon = Coupon::find()
			->where(['coupon_id' => $id])
			->one();
		$model = new CouponList();
		$model->coupon_id = $id;
		$model->customer_id = $cust;
		$model->coupon_code = Yii::$app->security->generateRandomString(4);
		if($modelCustomer->customer_reward_point>=$modelCoupon->redeem_point && $modelCoupon->coupon_status == Coupon::STATUS_ACTIVE && $modelCoupon->coupon_used<$modelCoupon->coupon_total){
			$model->save();
			$modelCoupon->coupon_used = $modelCoupon->coupon_used + 1;
			$modelCoupon->save();
			$modelCustomer->customer_reward_point = $modelCustomer->customer_reward_point - $modelCoupon->redeem_point;
			$modelCustomer->save();
			return $this->redirect(['index']);
		} else {
			return $this->redirect(['redeem']);
		}
	}
};