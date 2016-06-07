<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<h3 id="order_review_heading">Your order code: <?php echo $order_code; ?></h3> <?php if ($modelOrder->payment_status == 0){echo \yii\helpers\Html::a('Confirm Payment', ['myorder/confirm-payment', 'ordercode'=>$order_code], ['type'=>'Button', 'class'=>'btn btn-primary']);} ?>

<div id="order_review" style="position: relative;">
    <table class="shop_table">
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
                    <?= $model['product_name'] ?> <?= $model['product_options_name'] ?> <?= $model['product_price']+$model['product_options_price'] ?><strong class="product-quantity"> × <?= $model['quantity'] ?></strong>
                    <?php if($model['deal_category_id'] == 1){ ?>
                        <br>Discount -<?php echo (($model['product_price']+$model['product_options_price']) * ($model['deal_discount']/100)) * $model['quantity'] ?>
                    <?php } ?>
                    <?php if($model['deal_category_id'] == 3 && $model['quantity'] >= $model['deal_quantity_threeshold']){ ?>
                        <br>Discount -<?php echo (($model['product_price']+$model['product_options_price']) * ($model['deal_discount']/100)) * $model['quantity'] ?>
                    <?php } ?>
                </td>
                <td class="product-total">
                    <span class="amount">Rp <?= (($model['product_price'] + $model['product_options_price']) - (($model['product_price']+$model['product_options_price'])*($model['deal_discount']/100))) * $model['quantity'] ?></span> </td>
            </tr>
            <?php $i++;endforeach; ?>
        </tbody>
        <tfoot>

            <tr class="cart-subtotal">
                <th>Cart Subtotal</th>
                <td><span class="amount">Rp <?php echo $sum;?></span>
                </td>
            </tr>

            <?php if($save != NULL){ ?>
            <tr class="cart-save">
                <th>You Save</th>
                <td><span class="amount">Rp <?php echo $save;?></span>
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
                <td><strong><span class="amount">Rp <?php echo $sum * ((100-$coupondiscount)/100) ?></span></strong> </td>
            </tr>

        </tfoot>
    </table>


    <div id="payment">

        <div class="form-row place-order">

        </div>

        <div class="clear"></div>

    </div>
</div>
