    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Confirm Payment</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
?>

<div class="row">
	<div class="col-lg-5">
		<p>Enter your payment details</p>
		<?php echo $modelOrder->order_code; ?>
		<?php $form = ActiveForm::begin(['id' => 'payment-form']); ?>

			<?= $form->field($modelPayment, 'payment_conf_name')->textInput() ?>

			<?= $form->field($modelPayment, 'bank_transfer_id')->textInput() ?>

			<?= $form->field($modelPayment, 'payment_conf_account')->textInput() ?>

			<?= $form->field($modelPayment, 'payment_conf_nominal')->textInput() ?>

			<div class="form_group">
				<?= Html::submitButton('Confirm', ['class' => 'btn btn-primary']) ?>
			</div>

		<?php ActiveForm::end(); ?>
	</div>
</div>