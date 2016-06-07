<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SupportticketmessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Support Ticket Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-ticket-message-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Support Ticket Message', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'support_ticket_message_id',
            'support_ticket_id',
            'customer_id',
            'admin_id',
            'message:ntext',
            // 'date_submit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
