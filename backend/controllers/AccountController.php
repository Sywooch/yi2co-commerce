<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
//use common\models\CustomerEdit;
use common\models\User;
use backend\models\ChangePasswordForm;
//use frontend\models\ChangeInfoForm;

class AccountController extends Controller
{

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

	public function actionIndex()
	{
		$model = User::findOne(\Yii::$app->user->getId());
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
		$modeluser = User::find()->where([
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

	/*public function actionChangeinfo() {
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
	}*/
}