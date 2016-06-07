<?php
namespace backend\controllers;

use Yii;
use common\models\User;
use yii\filters\AccessControl;
use common\components\AccessRule;
use yii\web\Controller;
use backend\models\BackendLoginForm;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'request-password-reset', 'reset-password'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        //'roles' => ['@'],
                        'roles' => [
                            USER::ROLE_OWNER,
                            USER::ROLE_ADMIN,
                        ],
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


    /**
     * @inheritdoc
     */
/*    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
    }*/

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex(){
        $db = Yii::$app->db;
        $_xseries = $db->createCommand("SELECT DISTINCT MONTHNAME(STR_TO_DATE(MONTH(order.order_date), '%m')) as xseries FROM `order` ORDER BY MONTH(order.order_date) ASC")->queryAll();
        $_xseries_data = array();
        $data_series =array();
        $_data = array ();
        $_data_series = array ();
       
        foreach ($_xseries as $xs)
        {
            $_xseries_data[] = $xs["xseries"];
        }
       
            $months = $db->createCommand("SELECT DISTINCT SUM(order.order_sum) as order_nominal, MONTHNAME(STR_TO_DATE(MONTH(order.order_date), '%m')) as `month` FROM `order` GROUP BY MONTH(order.order_date)")->queryAll();
                                   
            foreach ($months as $m)
            {
                $_data_series[] = (int)$m["order_nominal"];
            }
            array_push($_data,array(
                'data'=>$_data_series,
            ));
            unset($_data_series);

        return $this->render('index',[
                'chart_x_axis' => $_xseries_data,
                'chart_x_series' => $_data,
            ]);
    }

    /*public function actionIndex()
    {
        return $this->render('index');
    }*/

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new BackendLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRequestPasswordReset()
    {
        $this->layout = 'main-login';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        $this->layout = 'main-login';
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
