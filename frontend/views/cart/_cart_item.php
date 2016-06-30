<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
?>

<tr class="cart_item">
    <td class="product-remove">
        <?= Html::a('Cancel', ['remove', 'id' => $model['id']], ['class'=>'remove', 'title'=>'Remove this item']) ?>
        <!-- <a title="Remove this item" class="remove" href="">×</a>  -->
    </td>

    <?php echo Html::hiddenInput('id' . $i, $model['id']); ?>

    <td class="product-thumbnail">
        <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php echo Yii::getAlias('@imageurl')."/".$model['product_image']; ?>"></a>
    </td>

    <td class="product-name">
        <a href="single-product.html"><?= $model['product_name'] ?> <?php if($model['product_options_name']!="default"){echo $model['product_options_name'];} ?></a> 
    </td>

    <td class="product-price">
        <span class="amount">Rp <?= number_format($model['product_price'] + $model['product_options_price'] - (($model['product_price'] + $model['product_options_price'])*($model['deal_discount']/100)),0,',','.') ?></span> 
    </td>

    <td class="product-quantity">
        <div class="quantity buttons_added">
            <?= Html::textInput('qty' . $i, $model['qty'], ['class'=>'input-text qty text', 'title'=>'Qty', 'size'=>'4', 'type'=>'number', 'min'=>'0', 'step'=>'1']) ?>
        </div>
    </td>

    <td class="product-subtotal">
        <span class="amount">Rp <?= number_format(($model['product_price'] + $model['product_options_price'] - (($model['product_price'] + $model['product_options_price']) * ($model['deal_discount']/100))) * $model['qty'],0,',','.') ?></span> 
    </td>
</tr>