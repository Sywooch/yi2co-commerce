<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Product;
use common\models\Customer;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">
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

            <?php
                echo $form->field($model, 'customer_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Customer::find()->all(), 'customer_id', 'customer_name'),
                    'options' => ['placeholder' => 'Select a customer ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Customer');
            ?>

            <?= $form->field($model, 'comment_text')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'comment_date_added')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Comment Date Added'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    

</div>
