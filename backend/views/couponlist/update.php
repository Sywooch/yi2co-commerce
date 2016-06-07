<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CouponList */

$this->title = 'Update Coupon List: ' . ' ' . $model->coupon_id;
$this->params['breadcrumbs'][] = ['label' => 'Coupon Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->coupon_id, 'url' => ['view', 'coupon_id' => $model->coupon_id, 'customer_id' => $model->customer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coupon-list-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
