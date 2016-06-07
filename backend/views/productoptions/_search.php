<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductoptionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-options-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'product_options_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'product_options_name') ?>

    <?= $form->field($model, 'product_options_description') ?>

    <?= $form->field($model, 'product_options_price') ?>

    <?php // echo $form->field($model, 'product_options_tier') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
