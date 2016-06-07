<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OwnerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="owner-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'owner_id') ?>

    <?= $form->field($model, 'owner_name') ?>

    <?= $form->field($model, 'owner_photo') ?>

    <?= $form->field($model, 'owner_username') ?>

    <?= $form->field($model, 'last_login_time') ?>

    <?php // echo $form->field($model, 'owner_auth_key') ?>

    <?php // echo $form->field($model, 'owner_password_hash') ?>

    <?php // echo $form->field($model, 'owner_password_reset_token') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
