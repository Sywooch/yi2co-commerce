<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_dob')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Date of Birth'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <?php
        echo $form->field($model, 'customer_gender')->dropDownList(['0' => 'Female', '10' => 'Male'], ['prompt' => 'Select Gender']);
    ?>

    <?= $form->field($model, 'customer_telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'customer_reward_point')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php
        echo $form->field($model, 'status')->dropDownList(['0' => 'Deleted', '10' => 'Active'], ['prompt' => 'Change Status']);
    ?>

    <?php
        echo $form->field($model, 'newsletter')->dropDownList(['0' => 'No', '10' => 'Yes'], ['prompt' => 'Subscribe Newsletter']);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
