<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $modelOrder->order_code;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="order-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $modelOrder->order_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $modelOrder->order_code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h1>Order Detail</h1>
    <?= DetailView::widget([
        'model' => $modelOrder,
        'attributes' => [
            'order_code',
            'order_date:datetime',
            [
                'attribute' => 'payment_status',
                'value' => $modelOrder->formatPaymentStatus(),
            ],
            [
                'attribute' => 'order_status',
                'value' => $modelOrder->formatOrderStatus(),
            ],
            //'coupon_id',
            'coupon_code',
            [
                'attribute' => 'delivery_address_id',
                'label' => 'Delivery Address Name',
                'value' => $modelOrder->deliveryAddress->delivery_address_name,
            ],
            [
                'attribute' => 'delivery_address_id',
                'label' => 'Delivery Address',
                'value' => $modelOrder->deliveryAddress->delivery_address_address,
            ],
        ],
    ]) ?>

    <h1>Payment Detail</h1>
    <?php if (count($modelPaymentconf)>0){ ?>
    <?php if ($modelOrder->payment_status!==20){?>
    <p>
        <?= Html::a('Verify Payment', ['verify-payment', 'ordercode' => $modelOrder->order_code], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Are you sure you want to verify this payment?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php } ?>
    <?= DetailView::widget([
        'model' => $modelPaymentconf,
        'attributes' => [
            [
                'attribute' => 'payment_conf_name',
                'label' => 'Sender Name',
            ],
            [
                'attribute' => 'payment_conf_account',
                'label' => 'Sender Account Number',
            ],
            [
                'attribute' => 'payment_conf_nominal',
                'label' => 'Transfer Nominal',
            ],
            [
                'attribute' => 'bank_transfer_id',
                'label' => 'Bank Designation',
                'value' => $modelPaymentconf->bankTransfer->bank_transfer_name,
            ],
            [
                'attribute' => 'bank_transfer_id',
                'label' => 'Account Designation',
                'value' => $modelPaymentconf->bankTransfer->bank_transfer_account,
            ],
        ],
    ]) ?>
    <?php }else { ?>
    <p>No payment detail available</p>
    <?php } ?>

<h1>Item Detail</h1>
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
            <thead>
                <tr>
                    <th class="product-name">Product</th>
                    <th class="product-total">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i=1;
                    foreach($data as $model):
                    $sum =  $sum+ (($model['product_price'] + $model['product_options_price'] - (($model['product_price']+$model['product_options_price'])*($model['deal_discount']/100))) * $model['quantity']);
                    $save = $save+ ((($model['product_price']+$model['product_options_price']) * ($model['deal_discount']/100)) * $model['quantity']);
                ?>
                <tr class="cart_item">
                    <td class="product-name">
                        <?= $model['product_name'] ?> <?= $model['product_options_name'] ?> <?= number_format($model['product_price']+$model['product_options_price'],0,',','.') ?><strong class="product-quantity"> × <?= $model['quantity'] ?></strong>
                        <?php if($model['deal_category_id'] == 1){ ?>
                            <br>Discount -<?php echo number_format((($model['product_price']+$model['product_options_price']) * ($model['deal_discount']/100)) * $model['quantity'],0,',','.') ?>
                        <?php } ?>
                        <?php if($model['deal_category_id'] == 3 && $model['quantity'] >= $model['deal_quantity_threeshold']){ ?>
                            <br>Discount -<?php echo number_format((($model['product_price']+$model['product_options_price']) * ($model['deal_discount']/100)) * $model['quantity'],0,',','.') ?>
                        <?php } ?>
                    </td>
                    <td class="product-total">
                        <span class="amount">Rp <?= number_format((($model['product_price'] + $model['product_options_price']) - (($model['product_price']+$model['product_options_price'])*($model['deal_discount']/100))) * $model['quantity'],0,',','.') ?></span> </td>
                </tr>
                <?php $i++;endforeach; ?>
            </tbody>
            <tfoot>

                <tr class="cart-subtotal">
                    <th>Cart Subtotal</th>
                    <td><span class="amount">Rp <?php echo number_format($sum,0,',','.');?></span>
                    </td>
                </tr>

                <?php if($save != NULL){ ?>
                <tr class="cart-save">
                    <th>You Save</th>
                    <td><span class="amount">Rp <?php echo number_format($save,0,',','.');?></span>
                    </td>
                </tr>
                <?php } ?>

                <?php foreach ($data as $model): ?>
                <?php if($model['deal_category_id'] == 2){ ?>
                <tr class="cart-get">
                    <th>You Get</th>
                    <td><span class="amount"> <?= $model['product_name'] ?><strong class="product-quantity"> × <?= $model['deal_quantity'] ?></strong></span>
                    </td>
                </tr>
                <?php } ?>
                <?php endforeach; ?>

                <tr class="order-total">
                    <th>Order Total</th>
                    <td><strong><span class="amount">Rp <?php echo number_format($sum * ((100-$coupondiscount)/100),0,',','.') ?></span></strong> </td>
                </tr>

            </tfoot>
        </table>
    </div>

</div>
