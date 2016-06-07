<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Please choose your new password:</p>

        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

            <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>