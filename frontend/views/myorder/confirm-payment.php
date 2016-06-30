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
	use kartik\widgets\Select2;
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
		<p>Your Total Order is: Rp <?php echo number_format($sum,0,',','.');?></p>
        <p>Shipping Cost: Rp <?php echo number_format($shipping,0,',','.') ?></p>
        <p>Total you have to transfer: <strong>Rp <?php echo number_format($sum + $shipping,0,',','.') ?></strong></p>
		<p>Enter your payment details for order code: <strong><?php echo $modelOrder->order_code; ?></strong></p>
		<?php $form = ActiveForm::begin(['id' => 'payment-form']); ?>

			<?php
                echo $form->field($modelPayment, 'bank_transfer_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(BankTransfer::find()->all(), 'bank_transfer_id', 'bank_transfer_text'),
                    'options' => ['placeholder' => 'Select Bank Destination ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>

		    <?= $form->field($modelPayment, 'payment_conf_name')->textInput() ?>

			<?= $form->field($modelPayment, 'payment_conf_account')->textInput() ?>

			<?= $form->field($modelPayment, 'payment_conf_nominal')->textInput() ?>

			<div class="form_group">
				<?= Html::submitButton('Confirm', ['class' => 'btn btn-primary']) ?>
			</div>

		<?php ActiveForm::end(); ?>
	</div>
</div>