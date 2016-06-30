<?php

namespace backend\controllers;

use Yii;
use common\models\Product;
use common\models\ProductOptions;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use yii\filters\AccessControl;
use common\components\AccessRule;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    const URL_THUMB = 'uploads/products/thumbnails/';
    const URL = 'uploads/products/';

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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $modelOptions = new ProductOptions();

        if ($model->load(Yii::$app->request->post())) {
            $modelDeal = \common\models\Deal::find()->where(['deal_id'=>$_POST['Product']['deal_deal_id']])->one();
            $model->product_image = UploadedFile::getInstance($model, 'product_image');
            if(count($modelDeal)>0){$model->deal_category_id = $modelDeal->deal_category_id;}
            if ($model->save()){
                $modelOptions->product_id = $model->product_id;
                $modelOptions->product_options_name = 'default';
                $modelOptions->product_options_description = 'default';
                $modelOptions->product_options_price = 0;
                $modelOptions->product_options_tier = 0;
                $modelOptions->save();
                $model->product_image->saveAs(self::URL . $model->product_image->baseName . '.' . $model->product_image->extension);
                Image::getImagine()->open(self::URL . $model->product_image)->thumbnail(new Box(195, 243))->save(self::URL_THUMB . $model->product_image, ['quality' => 90]);
                return $this->redirect(['view', 'id' => $model->product_id]);    
            }
        } 
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelCache = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $modelDeal = \common\models\Deal::find()->where(['deal_id'=>$_POST['Product']['deal_deal_id']])->one();
            $model->product_image = UploadedFile::getInstance($model, 'product_image');
            if(count($modelDeal)>0){
                $model->deal_category_id = $modelDeal->deal_category_id;
            }
            if(count($modelDeal)==0){
                $model->deal_category_id = null;
            }
            if ($model->save() && $model->product_image != null && $model->product_image != $modelCache->product_image){
                /*$model->product_image = UploadedFile::getInstance($model, 'product_image');*/
                $model->product_image->saveAs(self::URL . $model->product_image->baseName . '.' . $model->product_image->extension);
                Image::getImagine()->open(self::URL . $model->product_image)->thumbnail(new Box(195, 243))->save(self::URL_THUMB . $model->product_image, ['quality' => 90]);
                /*$model->save();*/
                return $this->redirect(['view', 'id' => $model->product_id]);    
            } else {
                $model->product_image = $modelCache->product_image;
                $model->save();
                return $this->redirect(['view', 'id' => $model->product_id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelCache' => $modelCache,
            ]);
        }
    }


    /*public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $modelDeal = \common\models\Deal::find()->where(['deal_id'=>$_POST['Product']['deal_deal_id']])->one();
            $model->product_image = UploadedFile::getInstance($model, 'product_image');
            $model->deal_category_id = $modelDeal->deal_category_id;
            if ($model->save()){
                $model->product_image->saveAs(self::URL . $model->product_image->baseName . '.' . $model->product_image->extension);
                Image::getImagine()->open(self::URL . $model->product_image)->thumbnail(new Box(195, 243))->save(self::URL_THUMB . $model->product_image, ['quality' => 90]);
                return $this->redirect(['view', 'id' => $model->product_id]);    
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
   /* public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->product_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
