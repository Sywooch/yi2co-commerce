<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DeliveryaddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delivery Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-address-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Delivery Address', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'customer_id',
                'label' => 'Customer Username',
                'value' => function ($data){
                    return $data->customer->username;
                },
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'city_id',
                'label' => 'City',
                'value' => function ($data){
                    return $data->city->city_name;
                },
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'delivery_address_name',
                'label' => 'Delivery Name',
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'delivery_address_address',
                'label' => 'Delivery Address',
            ],
            // 'delivery_address_address:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
