<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'customer_id',
                'label' => 'Customer',
                'value' => function ($data){
                    return $data->customer->username;
                },
            ],
            'order_code',
            'order_date:datetime',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'payment_status',
                'value' => function ($data){return Html::encode($data->formatPaymentStatus());},
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'order_status',
                'value' => function ($data){return Html::encode($data->formatOrderStatus());},
            ],
            //'coupon_id',
            // 'delivery_address_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
