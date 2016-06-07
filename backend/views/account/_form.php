<?php
	use yii\bootstrap\ActiveForm;
	use yii\helpers\Html;
?>

<div class="container">
	<div class="row">
		<div class="col-lg-5">
			<p>Please fill out the following fields to change password:</p>

			<?php $form = ActiveForm::begin(['id' => 'change-password-form']); ?>

				<?= $form->field($model, 'oldPassword',
					['inputOptions'=>['placeholder'=>'Old Password']])
					->passwordInput() ?>

				<?= $form->field($model, 'newPassword',
					['inputOptions'=>['placeholder'=>'New Password']])
					->passwordInput() ?>

				<?= $form->field($model, 'comparePassword',
					['inputOptions'=>['placeholder'=>'Repeat New Password']])
					->passwordInput() ?>

				<div class="form_group">
					<?= Html::submitButton('Change Password', ['class' => 'btn btn-primary']) ?>
				</div>

			<?php ActiveForm::end(); ?>
		</div>
	</div>	
</div>