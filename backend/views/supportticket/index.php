<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SupportticketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Support Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-ticket-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Support Ticket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'support_ticket_category_id',
                'label' => 'Support Ticket Category',
                'value' => function ($data){
                    return $data->supportTicketCategory->support_ticket_category_name;
                },
            ],
            'issue',
            'date_submit:datetime',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'customer_id',
                'label' => 'Customer Name',
                'value' => function ($data){
                    return $data->customer->customer_name;
                },
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'support_ticket_status',
                'value' => function ($data){return Html::encode($data->formatSupportstatus());},
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
