<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CouponSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coupon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'coupon_id') ?>

    <?= $form->field($model, 'coupon_discount') ?>

    <?= $form->field($model, 'coupon_total') ?>

    <?= $form->field($model, 'coupon_used') ?>

    <?= $form->field($model, 'coupon_date_start') ?>

    <?php // echo $form->field($model, 'coupon_date_end') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
