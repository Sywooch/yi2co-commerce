<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Menu;

?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>My Address</h2>
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

<div id="_review" style="position: relative;">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'delivery_address_id',
                'label' => 'Delivery Address Id',
            ],
            [
                'attribute' => 'customer_id',
                'label' => 'customer_name',
                'value' => $model->customer->customer_name,
            ],
            [
                'attribute' => 'city_id',
                'value' => $model->city->city_name,
            ],
            'delivery_address_name',
            'delivery_address_address:ntext',
        ],
    ]) ?>
</div>
