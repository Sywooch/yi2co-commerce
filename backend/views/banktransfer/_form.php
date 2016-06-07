<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BankTransfer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-transfer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bank_transfer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_transfer_account')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
