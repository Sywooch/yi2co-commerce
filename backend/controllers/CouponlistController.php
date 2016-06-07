<?php

namespace backend\controllers;

use Yii;
use common\models\CouponList;
use backend\models\CouponlistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use yii\filters\AccessControl;
use common\components\AccessRule;

/**
 * CouponlistController implements the CRUD actions for CouponList model.
 */
class CouponlistController extends Controller
{
    public function behaviors()
    {
        return [
            'access' =>[
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
/*                'only' => ['index', 'create', 'update', 'delete'],*/
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
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
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all CouponList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CouponlistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CouponList model.
     * @param integer $coupon_id
     * @param integer $customer_id
     * @return mixed
     */
    public function actionView($coupon_id, $customer_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($coupon_id, $customer_id),
        ]);
    }

    /**
     * Creates a new CouponList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CouponList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'coupon_id' => $model->coupon_id, 'customer_id' => $model->customer_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CouponList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $coupon_id
     * @param integer $customer_id
     * @return mixed
     */
    public function actionUpdate($coupon_id, $customer_id)
    {
        $model = $this->findModel($coupon_id, $customer_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'coupon_id' => $model->coupon_id, 'customer_id' => $model->customer_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CouponList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $coupon_id
     * @param integer $customer_id
     * @return mixed
     */
    public function actionDelete($coupon_id, $customer_id)
    {
        $this->findModel($coupon_id, $customer_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CouponList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $coupon_id
     * @param integer $customer_id
     * @return CouponList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($coupon_id, $customer_id)
    {
        if (($model = CouponList::findOne(['coupon_id' => $coupon_id, 'customer_id' => $customer_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
