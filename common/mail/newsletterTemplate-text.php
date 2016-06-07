<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
Hello <?= $customer->customer_name ?>,

<?= $newsletter->newsletter_message ?>

<?= $product->product_image ?>

<?= $product->product_name ?>

<?php if($product->deal_category_id == 1) { ?>
    <ins>Rp <?= $product->product_price * ((100-$product->dealDeal->discount_value)/100);?></ins> <del>Rp <?= $product->product_price;?></del>
<?php } elseif($product->deal_category_id == 2) {?>
    <ins>Rp <?= $product->product_price?></ins> Buy <?= $product->dealDeal->quantity_threeshold ?> Get <?= $product->dealDeal->get_quantity - $product->dealDeal->quantity_threeshold ?>
<?php } elseif($product->deal_category_id == 3) {?>
    <ins>Rp <?= $product->product_price?></ins> Buy <?= $product->dealDeal->quantity_threeshold ?> Discount <?= $product->dealDeal->discount_value ?> %
<?php } else {?>
    <ins>Rp <?= $product->product_price?></ins>
<?php } ?>