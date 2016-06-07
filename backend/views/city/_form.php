<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Province;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        echo $form->field($model, 'province_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Province::find()->all(), 'province_id', 'province_name'),
            'options' => ['placeholder' => 'Select a province ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <!-- <?= $form->field($model, 'province_id')->textInput() ?> -->

    <?= $form->field($model, 'city_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
