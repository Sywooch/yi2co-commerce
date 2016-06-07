<?php
use yii\widgets\Menu;
use yii\widgets\DetailView;
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Account Info</h2>
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
		<?php echo	DetailView::widget([
			'model' => $model,
			'attributes' => [
				'customer_name',
				[
					'label' => 'Gender',
					'value' => $model->formatGender(),
				],
				'customer_dob:date',
				'customer_address',
				'customer_telephone',
				'customer_reward_point',
			],
		]);
		?>	
	</div>	
</div>