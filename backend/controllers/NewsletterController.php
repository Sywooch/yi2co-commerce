<?php

namespace backend\controllers;

use Yii;
use common\models\Newsletter;
use common\models\Customer;
use common\models\Product;
use backend\models\NewsletterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsletterController implements the CRUD actions for Newsletter model.
 */
class NewsletterController extends Controller
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

    public function actionSendNewsletter($id, $product_id)
    {
        /* @var $user User */
        $customer = Customer::findAll([
            'status' => Customer::STATUS_ACTIVE,
            'newsletter' => 10,
        ]);

        $product = Product::findOne([
            'product_id' => $product_id,
        ]);

        $newsletter = Newsletter::findOne([
            'newsletter_id' => $id,
        ]);

        /*foreach($customer as $customer){
            Yii::$app
                ->mailer
                ->compose(
                    ['html' => 'newsletterTemplate-html', 'text' => 'newsletterTemplate-text'],
                    ['customer' => $customer, 'product' => $product, 'newsletter' => $newsletter, 'imageFileName'=>Yii::getAlias('@imageurl')."/".$product->product_image]
                )
                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                ->setTo($customer->email)
                ->setSubject('Product information of ' . $product->product_name)
                ->send();
        }*/

        $messages = [];
        foreach($customer as $customer){
            $messages[] = Yii::$app
                ->mailer
                ->compose(
                    ['html' => 'newsletterTemplate-html', 'text' => 'newsletterTemplate-text'],
                    ['customer' => $customer, 'product' => $product, 'newsletter' => $newsletter, 'imageFileName'=>Yii::getAlias('@webroot')."/".Yii::getAlias('@attachmenturl')."/".$product->product_image]
                )
                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                ->setTo($customer->email)
                ->setSubject('Product information of ' . $product->product_name);
        }
        Yii::$app->mailer->sendMultiple($messages);

        return $this->redirect(['index']);
    }

    /**
     * Lists all Newsletter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsletterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Newsletter model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Newsletter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Newsletter();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->newsletter_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Newsletter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->newsletter_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Newsletter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Newsletter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Newsletter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Newsletter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
