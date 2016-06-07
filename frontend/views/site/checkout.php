<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\widgets\DetailView;
?>
<!DOCTYPE html>
<html lang="en">
  <body>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">

                            <form enctype="multipart/form-data" action="#" class="checkout" method="post" name="checkout">

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Billing Details</h3>

                                            <?php $form = ActiveForm::begin(['id' => 'form-checkout']); ?>

                                                <?php $i=1;foreach ($modelAddress as $address): ?>
                                                
                                                <?= $form->field($address, 'delivery_address_id')->radioList([$address->delivery_address_id=>$i]); $i++ ?>

                                                <?= DetailView::widget([
                                                    'model' => $address,
                                                    'attributes' => [
                                                        'delivery_address_name',
                                                        'delivery_address_address:ntext',
                                                    ],
                                                ]) ?>

                                                <?php endforeach;?>

                                            <?php ActiveForm::end(); ?>
                                            <div class="clear"></div>

                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="woocommerce-shipping-fields">
                                            <h3 id="ship-to-different-address">
                        <label class="checkbox" for="ship-to-different-address-checkbox">Ship to a different address?</label>
                        <input type="checkbox" value="1" name="ship_to_different_address" checked="checked" class="input-checkbox" id="ship-to-different-address-checkbox">
                        </h3>
                                            <div class="shipping_address" style="display: block;">

                                                <?php $form = ActiveForm::begin(['id' => 'form-checkout']); ?>

                                                    <?= $form->field($modelAddAddress, 'delivery_address_name')->textInput() ?>

                                                    <?= $form->field($modelAddAddress, 'city_id')->textInput() ?>

                                                    <?= $form->field($modelAddAddress, 'delivery_address_address')->textarea(['rows' => 6]) ?>

                                                    <div class="form-group">
                                                        <?= Html::submitButton('Add Address', ['class' => 'btn btn-primary', 'name' => 'order-button']) ?>
                                                    </div>

                                                <?php ActiveForm::end(); ?>

                                                <div class="clear"></div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <h3 id="order_review_heading">Your order</h3>

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
                                                foreach(Yii::$app->cart->positions as $positions):
                                            ?>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    <?= $positions->product_name ?><strong class="product-quantity">× <?= $positions->quantity ?></strong> </td>
                                                <td class="product-total">
                                                    <span class="amount">Rp <?= $positions->getCost() ?></span> </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">Rp <?php echo \Yii::$app->cart->getCost(); ?></span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Shipping and Handling</th>
                                                <td>

                                                    Free Shipping
                                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                </td>
                                            </tr>


                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">Rp <?php echo \Yii::$app->cart->getCost(); ?></span></strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table>


                                    <div id="payment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_bacs">
                                                <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                <label for="payment_method_bacs">Direct Bank Transfer </label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="form-row place-order">

                                            <input type="submit" data-value="Place order" value="Place order" id="place_order" name="woocommerce_checkout_place_order" class="button alt">


                                        </div>

                                        <div class="clear"></div>

                                    </div>
                                </div>
                            </form>

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>
  </body>
</html>