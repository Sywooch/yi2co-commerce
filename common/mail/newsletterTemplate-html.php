<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
<div class="password-reset">

    <h3><?= Html::encode($newsletter->newsletter_title)?></h3>

    <p>Hello <?= Html::encode($customer->customer_name) ?>,</p>

    <p><?= Html::encode($newsletter->newsletter_message) ?></p>

    <div class="single-shop-product">
    	<div class="product-upper">
    		<!-- <img src="<?php echo Yii::getAlias('@imageurl')."/".$product->product_image; ?>" alt=""> -->
            <a href="<?php echo Yii::getAlias('@producturl'); echo $product->product_id ?>">
                <img src="<?= $message->embed($imageFileName); ?>">
            </a>
    	</div>

    	<h2><a href="<?php echo Yii::getAlias('@producturl'); echo $product->product_id/*Url::to(['site/single', 'id' => $product->product_id])*/; ?>"><?php echo $product->product_name;?></a></h2>
    	<div class="product-carousel-price">
    		<?php if($product->deal_category_id == 1) { ?>
                <ins>Rp <?php echo $product->product_price * ((100-$product->dealDeal->discount_value)/100);?></ins> <del>Rp <?php echo $product->product_price;?></del>
            <?php } elseif($product->deal_category_id == 2) {?>
                <ins>Rp <?php echo $product->product_price?></ins> Buy <?php echo $product->dealDeal->quantity_threeshold ?> Get <?php echo $product->dealDeal->get_quantity - $product->dealDeal->quantity_threeshold ?>
            <?php } elseif($product->deal_category_id == 3) {?>
                <ins>Rp <?php echo $product->product_price?></ins> Buy <?php echo $product->dealDeal->quantity_threeshold ?> Discount <?php echo $product->dealDeal->discount_value ?> %
            <?php } else {?>
                <ins>Rp <?php echo $product->product_price?></ins>
            <?php } ?>
    	</div>
    </div>

    <div class="product-option-shop">
        <a href="<?php echo Yii::getAlias('@addtocarturl'); echo $product->product_id; ?>"><button class="add_to_cart_button">Add to Cart</button></a>
    </div>

</div>
