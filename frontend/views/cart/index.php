<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>

<!DOCTYPE html>
<html lang="en">
  <body>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="#">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                </div> -->
                
                <?php
                    if (empty($data)){
                ?>
                <div class="col-md-8">
                    <h1>Cart Empty</h1>
                </div>
                <?php } else { ?>

                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo \yii\helpers\Html::beginForm(\yii\helpers\Url::to(['cart/change'])); ?>
                                        <?php
                                            $i=1;
                                            foreach($data as $model){
                                                $sum = $sum+ (($model['product_price'] + $model['product_options_price'] - (($model['product_price']+$model['product_options_price'])*($model['deal_discount']/100))) * $model['qty']);
                                                echo $this->render('_cart_item',['model'=>$model, 'sum'=>$sum, 'i'=>$i]);
                                                $i++;
                                            }
                                        ?>
                                        <tr>
                                            <td class="actions" colspan="5">
                                                <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    
                                                    <!-- <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="button"> -->
                                                    <?php
                                                        if (!isset($discount)) {
                                                            echo \yii\helpers\Html::textInput('coupon_code');
                                                            echo \yii\helpers\Html::submitButton('Apply Coupon' , ['class'=>'button']);
                                                        } else {
                                                            echo $discount->coupon_code . " - " . $discount->coupon_discount . " % Discount";
                                                        }
                                                    ?>
                                                    <!-- <?php echo \yii\helpers\Html::hiddenInput('coupon_code', ''); ?> -->
                                                    <!-- <?php echo \yii\helpers\Html::textInput('coupon_code'); ?>
                                                    <?php echo \yii\helpers\Html::submitButton('Apply Coupon' , ['class'=>'button']); ?> -->
                                                    <?php echo \yii\helpers\Html::submitButton('Update Cart' , ['class'=>'button']); ?>
                                                </div>
                                                <!-- <input type="submit" value="Checkout" name="proceed" class="checkout-button button alt wc-forward"> -->
                                            </td>
                                            <td>
                                                <?php echo \yii\helpers\Html::a('Checkout', ['/checkout'], ['type'=>'Button', 'class'=>'btn btn-primary']); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                        <?php echo \yii\helpers\Html::endForm(); ?>
                                </table>
                            <div class="cart-collaterals">


                            <div class="cross-sells">
                            <?php if (count($data)>0){ ?><h2>You may be interested in...</h2><?php } ?>
                            <?php foreach($data as $data): ?>
                            <?php
                                $opt = \common\models\ProductOptions::find()
                                    ->where(['product_id' => $data['product_id']])
                                    ->orderBy(['product_options_tier'=>SORT_DESC])
                                    ->limit(1)
                                    ->one();
                                $upsell = \common\models\ProductOptions::find()
                                    ->where(['product_id' => $data['product_id']])
                                    ->andWhere(['product_options_id' => $data['product_options_id']])
                                    ->one();
                            ?>

                            <?php if(count($opt)>0 && count($upsell)>0 && $upsell['product_options_tier']<$opt->product_options_tier){ ?>
                                <?php $i=$upsell['product_options_tier'];while($i<$opt->product_options_tier){ 
                                    $product = common\models\ProductOptions::find()
                                    ->where(['product_id' => $data['product_id']])
                                    ->andWhere(['product_options_tier'=>$i+1])
                                    ->one()
                                    ?>
                                <ul class="products">
                                    <li class="product">
                                        <a href="single-product.html">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="<?php echo Yii::getAlias('@imageurl')."/".$data['product_image']; ?>">
                                            <h3><?php echo $data['product_name']; echo ' '; echo $product->product_options_name; ?></h3>
                                            <span class="price"><span class="amount">Rp <?php echo number_format($data['product_price'] + $product->product_options_price,0,',','.'); ?></span></span>
                                        </a>

                                        <?php echo Html::a('Add to Cart', Url::to(['cart/upsell-add-to-cart', 'id' => $data['product_id'],'options'=>$opt->product_options_id]), ['class'=>'add_to_cart_button']); ?>
                                    </li>
                                </ul>
                                <?php $i++;} ?>
                            <?php } elseif (count($opt)>0){ ?>
                                <!-- <ul class="products">
                                    <li class="product">
                                        <a href="single-product.html">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="<?php echo Yii::getAlias('@imageurl')."/".$data['product_image']; ?>">
                                            <h3><?php echo $data['product_name']; echo ' '; echo $opt->product_options_name; ?></h3>
                                            <span class="price"><span class="amount">Rp <?php echo number_format($data['product_price'] + $opt->product_options_price,0,',','.'); ?></span></span>
                                        </a>

                                        <?php echo Html::a('Add to Cart', Url::to(['cart/upsell-add-to-cart', 'id' => $data['product_id'],'options'=>$opt->product_options_id]), ['class'=>'add_to_cart_button']); ?>
                                    </li>
                                </ul> -->
                            <?php } ?>

                            <?php endforeach; ?>
                                
                            </div>


                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">Rp <?php echo number_format($sum,0,',','.'); ?></span></td>
                                        </tr>

                                        <?php if (isset($discount)){ ?>
                                        <tr class="shipping">
                                            <th>Coupon Discount</th>
                                            <td><?php echo $discount->coupon_discount ?>%</td>
                                        </tr>
                                        <?php } ?>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">Rp
                                            <?php if (isset($discount)) {echo number_format($sum * ((100-$discount->coupon_discount)/100),0,',','.');} else {echo number_format($sum,0,',','.');};?>
                                            </span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            


                            </div>
                        </div>                        
                    </div>                    
                </div> <?php }; ?>
            </div>
        </div>
    </div>
  </body>
</html>