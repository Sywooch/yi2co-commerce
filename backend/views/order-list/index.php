<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'order_list_id',
            'order_code',
            'product_id',
            'product_options_id',
            'product_options_name',
            // 'product_options_price',
            // 'quantity',
            // 'subtotal',
            // 'deal_id',
            // 'deal_category_id',
            // 'deal_discount',
            // 'deal_quantity',
            // 'deal_quantity_threeshold',
            // 'coupon_id',
            // 'coupon_code',
            // 'coupon_discount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
