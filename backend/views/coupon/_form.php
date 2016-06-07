<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Coupon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coupon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'coupon_name')->textInput() ?>

    <?= $form->field($model, 'coupon_discount')->textInput() ?>

    <?= $form->field($model, 'coupon_total')->textInput() ?>

    <?= $form->field($model, 'coupon_used')->textInput() ?>

    <?= $form->field($model, 'redeem_point')->textInput() ?>

    <?= $form->field($model, 'coupon_date_start')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter Date Start'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]); ?>

    <?= $form->field($model, 'coupon_date_end')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter Date End'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
