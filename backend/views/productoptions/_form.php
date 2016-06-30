<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\ProductOptions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-options-form">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>

            <?php
                echo $form->field($model, 'product_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Product::find()->all(), 'product_id', 'product_name'),
                    'options' => ['placeholder' => 'Select a product ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>

            <?= $form->field($model, 'product_options_name')->textInput(['maxlength' => true])->label('Options Name') ?>

            <?= $form->field($model, 'product_options_description')->textarea(['rows' => 6])->label('Options Description') ?>

            <?= $form->field($model, 'product_options_price')->textInput()->label('Options Price') ?>

            <?= $form->field($model, 'product_options_tier')->textInput()->label('Options Tier') ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    

</div>
