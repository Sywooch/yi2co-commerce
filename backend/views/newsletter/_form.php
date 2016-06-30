<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Product;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Newsletter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="newsletter-form">
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
                ])->label('Product');
            ?>

            <?= $form->field($model, 'newsletter_title')->textInput() ?>

            <?= $form->field($model, 'newsletter_message')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

    
</div>
