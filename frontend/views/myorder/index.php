<?php
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\DetailView;
use yii\grid\GridView;
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>My Order</h2>
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
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'columns' => [
				['class' => 'yii\grid\SerialColumn'],

				'order_code',
				'order_date:datetime',
				[
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'payment_status',
                    'value' => function ($data){return Html::encode($data->formatPaymentstatus());},
                ],
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'order_status',
                    'value' => function ($data){return Html::encode($data->formatOrderstatus());},
                ],

				['class' => 'yii\grid\ActionColumn', 'template' => '{view}{delete}'],
			],
		]); ?>	
	</div>	
</div>