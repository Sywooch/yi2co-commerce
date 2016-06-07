<?php
use yii\bootstrap\ActiveForm;
use yii\widgets\Menu;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Html;
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Support Ticket</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
        <?php echo Menu::widget([
			'items' => [
				['label' => 'Account Info', 'url' => ['account/index']],
				['label' => 'Change Password', 'url' => ['account/changepassword']],
				['label' => 'Change Info', 'url' => ['account/changeinfo']],
				['label' => 'My Coupon', 'url' => ['account/coupon']],
				['label' => 'Redeem Coupon', 'url' => ['account/redeem']],
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
	<?php foreach($listmessage as $data): ?>
	<!-- <div class="row">
		<?php if (isset($data->admin_id)){echo $data->admin_id;}else{echo $data->customer_id;} ?>
		<?php echo $data->date_submit; ?>
		<?php echo $data->message; ?>
	</div> -->
	<div class="row-fluid">
        <div class="span6" style="padding-bottom: 10px; border-bottom: 1px solid black; border-top: 1px solid black;">
            <div class="highlighted-box center">
            <span style="float: right;"><?php echo $data->date_submit; ?></span>
            <h2><?php if (isset($data->admin_id)){echo $data->admin->admin_name;}else{echo $data->customer->customer_name;} ?></h2>
            <p><?php echo $data->message ?></p>
                
            </div>
        </div>
    </div>
	<?php endforeach; ?>

	<?php if($model->support_ticket_status!==0){ ?>
	<div class="row">
		<?php $form = ActiveForm::begin(['class'=>'form-horizontal',]); ?>

		<?= $form->field($addmessage, 'message')->textarea(['rows'=>6]) ?>

		<?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'order-button']) ?>

		<?php ActiveForm::end(); ?>
	</div>
	<?php } else{ ?>
		<h2>This support ticket is already closed by admin, kindly submit new ticket</h2>
	<?php } ?>

</div>

