<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'product_category_id') ?>

    <?= $form->field($model, 'manufacturer_id') ?>

    <?= $form->field($model, 'product_name') ?>

    <?= $form->field($model, 'product_model') ?>

    <?php // echo $form->field($model, 'product_price') ?>

    <?php // echo $form->field($model, 'product_description') ?>

    <?php // echo $form->field($model, 'product_image') ?>

    <?php // echo $form->field($model, 'product_reward_point') ?>

    <?php // echo $form->field($model, 'deal_deal_id') ?>

    <?php // echo $form->field($model, 'product_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
