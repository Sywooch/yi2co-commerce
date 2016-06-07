<?php
	use yii\widgets\Menu;
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Change Password</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
		<?php
			echo Menu::widget([
				'items' => [
					['label' => 'Account Info', 'url' => ['account/index']],
					['label' => 'Change Password', 'url' => ['account/changepassword']],
					['label' => 'Change Info', 'url' => ['account/changeinfo']],
					['label' => 'My Coupon', 'url' => ['mycoupon/index']],
					['label' => 'Redeem Coupon', 'url' => ['mycoupon/redeem']],
					['label' => 'My Order', 'url' => ['myorder/index']],
					['label' => 'My Support Ticket', 'url' => ['supportticket/index']],
					['label' => 'My Address', 'url' => ['myaddress/index']],
				],
				'activateItems' => true,
				'options' => [
					'class' => 'nav navbar-nav',
				],
			]);
		?>
	</div>
</div>

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
