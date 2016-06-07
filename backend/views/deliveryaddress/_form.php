<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Customer;
use common\models\City;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\DeliveryAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delivery-address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        echo $form->field($model, 'customer_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Customer::find()->all(), 'customer_id', 'username'),
            'options' => ['placeholder' => 'Select a customer by username ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Customer Username');
    ?>

    <!-- <?= Html::activeLabel($model, 'customer_id') ?> <br>
    <?= Html::activeDropDownList($model, 'customer_id',
        ArrayHelper::map(Customer::find()->all(), 'customer_id', 'customer_name'))
    ?> <br><br> -->

    <?php
        echo $form->field($model, 'city_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(City::find()->all(), 'city_id', 'city_name'),
            'options' => ['placeholder' => 'Select a city ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <!-- <?= Html::activeLabel($model, 'city_id') ?> <br>
    <?= Html::activeDropDownList($model, 'city_id',
        ArrayHelper::map(City::find()->all(), 'city_id', 'city_name'))
    ?> <br><br> -->

    <?= $form->field($model, 'delivery_address_name')->textInput(['maxlength' => true])->label('Delivery Name') ?>

    <?= $form->field($model, 'delivery_address_address')->textarea(['rows' => 6])->label('Delivery Address') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
