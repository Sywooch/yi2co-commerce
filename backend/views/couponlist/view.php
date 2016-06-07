<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CouponList */

$this->title = $model->coupon->coupon_name;
$this->params['breadcrumbs'][] = ['label' => 'Coupon Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coupon-list-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'coupon_id' => $model->coupon_id, 'customer_id' => $model->customer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'coupon_id' => $model->coupon_id, 'customer_id' => $model->customer_id], [
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
            [
                'attribute' => 'coupon_id',
                'label' => 'Coupon Name',
                'value' => $model->coupon->coupon_name,
            ],
            [
                'attribute' => 'customer_id',
                'label' => 'Customer Name',
                'value' => $model->customer->customer_name,
            ],
            'coupon_code',
            [
                'label' => 'Status',
                'value' => $model->formatCouponliststatus(),
            ],
        ],
    ]) ?>

</div>
