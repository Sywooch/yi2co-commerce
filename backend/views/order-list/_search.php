<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrderListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'order_list_id') ?>

    <?= $form->field($model, 'order_code') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'product_options_id') ?>

    <?= $form->field($model, 'product_options_name') ?>

    <?php // echo $form->field($model, 'product_options_price') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'subtotal') ?>

    <?php // echo $form->field($model, 'deal_id') ?>

    <?php // echo $form->field($model, 'deal_category_id') ?>

    <?php // echo $form->field($model, 'deal_discount') ?>

    <?php // echo $form->field($model, 'deal_quantity') ?>

    <?php // echo $form->field($model, 'deal_quantity_threeshold') ?>

    <?php // echo $form->field($model, 'coupon_id') ?>

    <?php // echo $form->field($model, 'coupon_code') ?>

    <?php // echo $form->field($model, 'coupon_discount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
