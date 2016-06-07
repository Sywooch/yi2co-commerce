<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\widgets\DetailView;
    use yii\helpers\Url;
    use yii\helpers\ArrayHelper;
    use common\models\DeliveryAddress;
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

                                        <div class="form-row place-order">

                                        </div>

                                        <div class="clear"></div>

                                    </div>
                                </div>

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Billing Details</h3>

                                            <!-- <?php $form = ActiveForm::begin(['class'=>'form-horizontal', 'action'=>Url::toRoute(['checkout/place-order'])]); ?>

                                            <?= $form->field($modelOrder, 'order_code')->textInput(['maxlength' => true]) ?>

                                            <?= $form->field($modelOrder, 'delivery_address_id')->textInput() ?>

                                            <div class="form-group">
                                                <?= Html::submitButton('Place Order', ['class' => 'btn btn-primary', 'name' => 'order-button']) ?>
                                                </div>

                                            <?php ActiveForm::end(); ?> -->

                                            <?php $form = ActiveForm::begin(['class'=>'form-horizontal', 'action'=>Url::toRoute(['checkout/place-order'])]); ?>

                                                <!-- <?php $i=1;foreach ($modelAddress as $address): ?>
                                                
                                                <?= $form->field($modelOrder, 'delivery_address_id')->radioList([$address->delivery_address_id=>$i]); $i++ ?>

                                                <?= DetailView::widget([
                                                    'model' => $address,
                                                    'attributes' => [
                                                        'delivery_address_name',
                                                        'delivery_address_address:ntext',
                                                    ],
                                                ]) ?>

                                                <?php endforeach;?> -->
                                                <?= Html::activeDropDownList($modelOrder, 'delivery_address_id',
                                                    ArrayHelper::map(DeliveryAddress::find()->where(['customer_id' => Yii::$app->user->id])->all(), 'delivery_address_id', 'delivery_address_address'))
                                                ?> <br><br>

                                                <!-- <?= $form->field($modelOrder, 'order_code')->textInput(['maxlength' => true]) ?> -->

                                                <div class="form-group">
                                                <?= Html::submitButton('Place Order', ['class' => 'btn btn-primary', 'name' => 'order-button']) ?>
                                                </div>

                                            <?php ActiveForm::end(); ?>
                                            <div class="clear"></div>

                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="woocommerce-shipping-fields">
                                            <h3 id="ship-to-different-address">
                        <label class="checkbox" for="ship-to-different-address-checkbox">Ship to a different address?</label>
                        </h3>
                                            <div class="shipping_address" style="display: block;">

                                                <?php $form = ActiveForm::begin(['class'=>'form-horizontal', 'action'=>Url::toRoute(['checkout/add-address', 'id'=>Yii::$app->user->id])]); ?>

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

                                
                            

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>
  </body>
</html>