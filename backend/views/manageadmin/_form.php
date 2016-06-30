<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

	        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

	        <?= $form->field($model, 'email') ?>

	        <?= $form->field($model, 'password')->passwordInput() ?>

	        <div class="form-group">
	            <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
	        </div>

	    <?php ActiveForm::end(); ?>
		</div>
	</div>

    

</div>
