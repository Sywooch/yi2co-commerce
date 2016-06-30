<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\DealCategory;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Deal */
/* @var $form yii\widgets\ActiveForm */
?>

<section>
    <div>
        <h3>Note:</h3><br>
        <ul>
            <li><p>For Deal Category - Fixed Discount fill only the discount value</p></li>
            <li><p>For Deal Category - Buy X get Y fill only the get quantity and quantity threeshold</p></li>
            <li><p>For Deal Category - Buy X Discount Y fill only the quantity threeshold and discount value</p></li>
            <li><p>For Deal Category - Sum X Discount Y fill only the sum threeshold and discount value</p></li>
        </ul>
    </div>
</section>

<div class="deal-form">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'deal_name')->textInput(['maxlength' => true]) ?>

            <?php
                echo $form->field($model, 'deal_category_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(DealCategory::find()->all(), 'deal_category_id', 'deal_category_name'),
                    'options' => ['placeholder' => 'Select a deal category ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Deal Category');
            ?>
            
            <?= $form->field($model, 'deal_date_start')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter Date Start'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]); ?>

            <?= $form->field($model, 'deal_date_end')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter Date End'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]); ?>

            <?= $form->field($model, 'discount_value')->textInput(); ?>

            <?= $form->field($model, 'get_quantity')->textInput(); ?>

            <?= $form->field($model, 'quantity_threeshold')->textInput(); ?>

            <?= $form->field($model, 'sum_threeshold')->textInput(); ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    

</div>
