<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SupportticketmessageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="support-ticket-message-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'support_ticket_message_id') ?>

    <?= $form->field($model, 'support_ticket_id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'admin_id') ?>

    <?= $form->field($model, 'message') ?>

    <?php // echo $form->field($model, 'date_submit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
