<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\SupportTicketCategory;
use kartik\widgets\DateTimePicker;
use common\models\Customer;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\SupportTicket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="support-ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        echo $form->field($model, 'support_ticket_category_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(SupportTicketCategory::find()->all(), 'support_ticket_category_id', 'support_ticket_category_name'),
            'options' => ['placeholder' => 'Select a category ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Support Category');
    ?>

    <?= $form->field($model, 'issue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_submit')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Date of Submit'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh::mm::ss',
        ]
    ]); ?>

    <?php
        echo $form->field($model, 'customer_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Customer::find()->all(), 'customer_id', 'username'),
            'options' => ['placeholder' => 'Select a customer ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Customer Username');
    ?>

    <?php
        echo $form->field($model, 'support_ticket_status')->dropDownList(['0' => 'Closed', '10' => 'Open'], ['prompt' => 'Support Ticket Status'], ['default'=>10]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
