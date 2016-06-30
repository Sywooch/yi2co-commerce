<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use common\models\City;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'customer_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']])->textInput() ?>

                <?= $form->field($model, 'customer_dob')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter Date of Birth'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy/mm/dd'
                    ]
                ]); ?>

                <?= $form->field($model, 'customer_gender')->dropDownList(['0' => 'Female', '10' => 'Male'], ['prompt' => 'Select Gender']);?>

                <?= $form->field($model, 'customer_telephone')->textInput() ?>

                <?= $form->field($model, 'customer_address')->textarea(['rows' => 6]) ?>

                <?php
                    echo $form->field($modelAddress, 'city_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(City::find()->all(), 'city_id', 'city_name'),
                        'options' => ['placeholder' => 'Select a city ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'newsletter')->dropDownList(['0' => 'No', '10' => 'Yes'], ['prompt' => 'Receive Newsletter']);?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
