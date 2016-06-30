<?php

namespace backend\controllers;

use Yii;
use common\models\SupportTicket;
use common\models\SupportTicketMessage;
use backend\models\SupportticketSearch;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SupportticketController implements the CRUD actions for SupportTicket model.
 */
class SupportticketController extends Controller
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

    /**
     * Lists all SupportTicket models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SupportticketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $listmessage = SupportTicketMessage::find()
            ->where(['support_ticket_id' => $id])
            ->orderBy(['date_submit' => SORT_ASC])
            ->all();
        $addmessage = new SupportTicketMessage();
        $notif = $this->findModel($id);
        $notif->notification = 10;
        $notif->save();

        if (Yii::$app->request->post()) {
            $addmessage->load(Yii::$app->request->post());
            $addmessage->support_ticket_id = $id;
            $addmessage->admin_id = Yii::$app->user->id;
            $addmessage->date_submit = new Expression('NOW()');
            $addmessage->save();
            return $this->refresh();
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'listmessage' => $listmessage,
            'addmessage' => $addmessage,
        ]);
    }

    /**
     * Displays a single SupportTicket model.
     * @param integer $id
     * @return mixed
     */
    /*public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new SupportTicket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SupportTicket();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->support_ticket_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SupportTicket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->support_ticket_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SupportTicket model.
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
     * Finds the SupportTicket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SupportTicket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SupportTicket::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
