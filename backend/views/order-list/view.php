<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OrderList */

$this->title = $model->order_list_id;
$this->params['breadcrumbs'][] = ['label' => 'Order Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->order_list_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->order_list_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'order_list_id',
            'order_code',
            'product_id',
            'product_options_id',
            'product_options_name',
            'product_options_price',
            'quantity',
            'subtotal',
            'deal_id',
            'deal_category_id',
            'deal_discount',
            'deal_quantity',
            'deal_quantity_threeshold',
            'coupon_id',
            'coupon_code',
            'coupon_discount',
        ],
    ]) ?>

</div>
