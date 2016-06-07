<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Coupon;
use common\models\Customer;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\CouponList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coupon-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        echo $form->field($model, 'coupon_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Coupon::find()->all(), 'coupon_id', 'coupon_name'),
            'options' => ['placeholder' => 'Select a coupon group ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Coupon Group');
    ?>

    <?php
        echo $form->field($model, 'customer_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Customer::find()->all(), 'customer_id', 'username'),
            'options' => ['placeholder' => 'Select a customer ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Customer Username');
    ?>

    <?= $form->field($model, 'coupon_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
