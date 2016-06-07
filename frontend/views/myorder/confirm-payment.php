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
	use yii\helpers\ArrayHelper;
	use common\models\BankTransfer;
?>

<?php
    $i=1;
    foreach($data as $model):
    $sum =  $sum+ (($model['product_price'] + $model['product_options_price'] - (($model['product_price']+$model['product_options_price'])*($model['deal_discount']/100))) * $model['quantity']);
    $save = $save+ ((($model['product_price']+$model['product_options_price']) * ($model['deal_discount']/100)) * $model['quantity']);
?>

<?php $i++;endforeach; ?>

<div class="row">
	<div class="col-lg-5">
		<p>Your Total Order is: <strong><?php echo $sum;?></strong></p>
		<p>Enter your payment details for order code: <strong><?php echo $modelOrder->order_code; ?></strong></p>
		<?php $form = ActiveForm::begin(['id' => 'payment-form']); ?>

			<?= Html::activeLabel($modelPayment, 'bank_transfer_id') ?> <br>
		    <?= Html::activeDropDownList($modelPayment, 'bank_transfer_id',
		        ArrayHelper::map(BankTransfer::find()->all(), 'bank_transfer_id', 'bank_transfer_text'), ['prompt'=>'Select Bank Destination'])
		    ?> <br><br>

		    <?= $form->field($modelPayment, 'payment_conf_name')->textInput() ?>

			<?= $form->field($modelPayment, 'payment_conf_account')->textInput() ?>

			<?= $form->field($modelPayment, 'payment_conf_nominal')->textInput() ?>

			<div class="form_group">
				<?= Html::submitButton('Confirm', ['class' => 'btn btn-primary']) ?>
			</div>

		<?php ActiveForm::end(); ?>
	</div>
</div>