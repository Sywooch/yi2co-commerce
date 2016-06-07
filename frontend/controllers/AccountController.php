<?php
namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\models\Coupon;
use common\models\CouponList;
use frontend\models\CouponListSearch;
use common\models\CustomerEdit;
use common\models\Customer;
use frontend\models\ChangePasswordForm;
use frontend\models\ChangeInfoForm;

class AccountController extends Controller
{
	public $layout = 'storenew';

	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'changepassword', 'changeinfo'],
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

	/*public function actionRedeemCoupon($id, $cust)
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
			return $this->redirect(['coupon']);
		} else {
			return $this->redirect(['redeem']);
		}
	}*/

	/*public function actionRedeem()
	{
		$modelCust = Customer::find()
			->where(['customer_id' => Yii::$app->user->id])
			->one();
		$model = Coupon::find()
			->where(['coupon_status' => Coupon::STATUS_ACTIVE])
			->all();
		return $this->render('redeem', [
			'model' => $model,
			'modelCust' => $modelCust,
		]);
	}*/

	/*public function actionCoupon()
	{
		$model = CouponList::find()
			->where(['customer_id' => Yii::$app->user->id])
			->all();
		return $this->render('coupon', [
			'model' => $model,
		]);
	}*/

	/*public function actionCoupon()
	{
		$searchModel = new CouponListSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		return $this->render('coupon', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider,]);
	}*/

	public function actionIndex()
	{
		$model = Customer::findOne(\Yii::$app->user->getId());
		if (!\Yii::$app->user->isGuest) {
			return $this->render('index', [
				'model' => $model,
			]);
		} else {
			return Yii::$app->runAction('site/login');
		}
	}

	public function actionChangepassword()
	{
		$model = new ChangePasswordForm;
		$modeluser = Customer::find()->where([
			'username' => Yii::$app->user->identity->username
		])->one();

		if($model->load(Yii::$app->request->post()) && $model->validate()) {
			try {
				$modeluser->password = $_POST['ChangePasswordForm']['newPassword'];
				if($modeluser->save()) {
					Yii::$app->getSession()->setFlash(
						'success', 'Password Changed'
					);
					return $this->redirect(['index']);
				} else {
					Yii::$app->getSession()->setFlash(
						'error', 'Password not changed'
					);
					return $this->redirect(['index']);
				}
			} catch(Exception $e) {
				Yii::$app->getSession()->setFlash(
					'error', "{$e->getMessage()}"
				);
				return $this->render('changepassword', [
					'model' => $model
				]);
			}
		} else {
		return $this->render('changepassword', [
					'model' => $model,
				]);
		}
	}

/*	public function actionChangeinfo()
	{
		$model = new ChangeInfoForm;
		$modeluser = Customer::find()->where([
			'username' => Yii::$app->user->identity->username
		])->one();

		if($model->load(Yii::$app->request->post()) && $model->validate()) {
			$modeluser->customer_name = $_POST['ChangeInfoForm']['customer_name'];
			$modeluser->customer_dob = $_POST['ChangeInfoForm']['customer_dob'];
			$modeluser->customer_gender = $_POST['ChangeInfoForm']['customer_gender'];
			$modeluser->customer_telephone = $_POST['ChangeInfoForm']['customer_telephone'];
			$modeluser->customer_address = $_POST['ChangeInfoForm']['customer_address'];

			if($modeluser->save()) {
				Yii::$app->getSession()->setFlash(
						'success', 'Account Info Changed'
					);
					return $this->redirect(['index']);
				} else {
					Yii::$app->getSession()->setFlash(
						'error', 'Account Info not changed'
					);
					return $this->redirect(['index']);
				}
		} else {
				return $this->render('changeinfo', ['model' => $modeluser]);
			}
	}*/

	public function actionChangeinfo() {
		$model = CustomerEdit::findOne(Yii::$app->user->id);

		if ($model->load(Yii::$app->request->post()) && $model->save()){
			Yii::$app->getSession()->setFlash(
				'success', 'Account Info Changed'
			);
			return $this->redirect(['changeinfo']);
		} else {
			Yii::$app->getSession()->setFlash(
				'error', 'Account Info not changed'
			);
			return $this->render('changeinfo', ['model' => $model]);
		}
	}
}