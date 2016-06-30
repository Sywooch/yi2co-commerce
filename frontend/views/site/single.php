<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\ProductAttribute;
use common\models\ProductOptions;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

$this->params['breadcrumbs'][] = ['label' => $model->productCategory->product_category_name, 'url' => ['category', 'id' => $model->product_category_id]];
$this->params['breadcrumbs'][] = ['label' => $model->product_name];
?>

<div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo Url::to(['site/index']); ?>">Home</a></li>
                        <li class="active"><a href="<?php echo Url::to(['site/shop']); ?>">Shop page</a></li>
                        <li><a href="<?php echo Url::to(['site/show-category']); ?>">Category</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
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
                        <h2 class="sidebar-title">Product Category</h2>
                        <?php foreach($category as $data): ?>
                            <li>
                                <a href="<?php
                                echo Url::to(['site/category', 'id'=>$data->product_category_id]);
                            ?>"><?php echo $data->product_category_name ?></a>
                            </li>
                        <?php endforeach; ?>
                        <!-- <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form> -->
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <?=
                            Breadcrumbs::widget(
                                [
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                ]
                            ) ?>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="<?php echo Yii::getAlias('@imageurl')."/".$model->product_image ?>" alt="">
                                    </div>
                                    
                                    <!-- <div class="product-gallery">
                                        <img src="img/product-thumb-1.jpg" alt="">
                                        <img src="img/product-thumb-2.jpg" alt="">
                                        <img src="img/product-thumb-3.jpg" alt="">
                                    </div> -->
                                </div>
                            </div>

                            <!-- 
                                Untuk Number Formatter number_format(,0,',','.')
                             -->
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $model->product_name; ?></h2>
                                    <div class="product-inner-price">
                                        <?php if($model->deal_category_id == 1) { ?>
                                            <ins>Rp <?php echo number_format($model->product_price * ((100-$model->dealDeal->discount_value)/100),0,',','.');?></ins> <del>Rp <?php echo number_format($model->product_price,0,',','.');?></del> <br><?php echo $model->product_reward_point . ' reward point'; ?>
                                        <?php } elseif($model->deal_category_id == 2) {?>
                                            <ins>Rp <?php echo number_format($model->product_price,0,',','.')?></ins> Buy <?php echo $model->dealDeal->quantity_threeshold ?> Get <?php echo $model->dealDeal->get_quantity - $model->dealDeal->quantity_threeshold ?> <br><?php echo $model->product_reward_point . ' reward point'; ?>
                                        <?php } elseif($model->deal_category_id == 3) {?>
                                            <ins>Rp <?php echo number_format($model->product_price,0,',','.')?></ins> Buy <?php echo $model->dealDeal->quantity_threeshold ?> Discount <?php echo $model->dealDeal->discount_value ?> % <br><?php echo $model->product_reward_point . ' reward point'; ?>
                                        <?php } else {?>
                                            <ins>Rp <?php echo number_format($model->product_price,0,',','.')?></ins> <br><?php echo $model->product_reward_point . ' reward point'; ?>
                                        <?php } ?>
                                    </div>    
                                    
                                        <?php $form = ActiveForm::begin(['options'=>['class'=>'cart'], 'action'=>Url::toRoute(['cart/multiple-add-to-cart', 'id' => Yii::$app->getRequest()->getQueryParam('id'), 'quantity'=>'', 'options'=>''])]); ?>
                                        <div class="quantity">
                                        <?= $form->field($cart, 'quantity')->textInput(['class' => 'input-text qty text', 'size'=>'4', 'type'=>'number', 'title'=>'Qty', 'value'=>'1', 'min'=>'1', 'step'=>'1']) ?>
                                            <?php if ($optionsCheck) { ?>
                                            <?= Html::activeLabel($cart, 'product_options_id') ?> <br>
                                            <?= Html::activeDropDownList($cart, 'product_options_id', ArrayHelper::map(ProductOptions::find()->where(['product_id' => Yii::$app->getRequest()->getQueryParam('id')])->all(), 'product_options_id', 'product_options_text')) ?><br><br>
                                            <?php } ?>

                                        </div>
                                            <?= Html::submitButton('Add to Cart', ['class' => 'add_to_cart_button', 'name' => 'order-button']) ?>
                                    <?php ActiveForm::end(); ?>    
                                    

                                    <!-- <form action="<?php Url::toRoute(['site/multiple-add-to-cart', 'id' => Yii::$app->getRequest()->getQueryParam('id')]) ?>" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                    </form>    -->
                                    
                                    <div class="product-inner-category">
                                        <p>Category: <a href="<?php echo Url::to(['site/category', 'id'=>$model->product_category_id]);?>"><?php echo $data->product_category_name ?></a><!-- . Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>.  --></p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <p><?php echo $model->product_description; ?></p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <!-- <div class="row-fluid">
                                                    <div class="span6" style="padding-bottom: 10px; border-bottom: 1px solid black; border-top: 1px solid black;">
                                                        <div class="highlighted-box center">
                                                        <span style="float: right;">tanggal</span>
                                                        <h2>nama</h2>
                                                        <p>isi
                                                        </p>
                                                            
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <?php foreach($comment as $data):?>
                                                    <div class="row-fluid">
                                                    <div class="span6" style="padding-bottom: 10px; border-bottom: 1px solid black; border-top: 1px solid black;">
                                                        <div class="highlighted-box center">
                                                        <span style="float: right;"><?php echo $data->comment_date_added; ?></span>
                                                        <h2><?php echo $data->customer->customer_name ?></h2>
                                                        <p><?php echo $data->comment_text ?></p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                    <!-- <div class="container">
                                                        <div class="row">
                                                            <?php echo $data->customer->customer_name ?>
                                                        </div>
                                                        <div class="row">
                                                            <?php echo $data->comment_text ?>
                                                        </div>
                                                    </div> -->
                                                <?php endforeach; ?>
                                                <div class="submit-review">
                                                    <?php $form = ActiveForm::begin(['class'=>'form-horizontal',]); ?>

                                                        <?= $form->field($addComment, 'comment_text')->textarea(['rows' => 6]) ?>

                                                        <div class="form-group">
                                                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'order-button']) ?>
                                                        </div>

                                                    <?php ActiveForm::end(); ?>
                                                    <!-- <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="related-products-wrapper">
                            <?php 
                                $related = \common\models\Product::find()
                                    ->where(['product_category_id'=>$model->product_category_id])
                                    ->andWhere(['not', ['product_id'=>$model->product_id]])
                                    ->all();
                            ?>
                            <?php if($related != null){ ?>
                            <h2 class="related-products-title">Related Products</h2>
                            <?php } ?>
                            <div class="related-products-carousel">
                            <?php foreach($related as $data): ?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="<?php echo Yii::getAlias('@imageurl')."/".$data->product_image ?>" alt="">
                                        <div class="product-hover">
                                            <a href="<?php echo Url::to(['cart/add-to-cart', 'id'=>$data->product_id]);?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="<?php echo Url::to(['site/single', 'id'=>$data->product_id]) ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href=""><?php echo $data->product_name; ?></a></h2>

                                    <!-- 
                                        Untuk Number Formatter number_format(,0,',','.')
                                     -->

                                    <div class="product-carousel-price">
                                        <?php if($data->deal_category_id == 1) { ?>
                                            <ins>Rp <?php echo number_format($data->product_price * ((100-$data->dealDeal->discount_value)/100),0,',','.');?></ins> <del>Rp <?php echo number_format($data->product_price,0,',','.');?></del><!-- <br><?php echo $data->product_reward_point; ?> -->
                                        <?php } elseif($data->deal_category_id == 2) {?>
                                            <ins>Rp <?php echo number_format($data->product_price,0,',','.');?></ins> Buy <?php echo $data->dealDeal->quantity_threeshold ?> Get <?php echo $data->dealDeal->get_quantity - $data->dealDeal->quantity_threeshold ?><!-- <br><?php echo $data->product_reward_point; ?> -->
                                        <?php } elseif($data->deal_category_id == 3) {?>
                                            <ins>Rp <?php echo number_format($data->product_price,0,',','.')?></ins> Buy <?php echo $data->dealDeal->quantity_threeshold ?> Discount <?php echo $data->dealDeal->discount_value ?> %<!-- <br><?php echo $data->product_reward_point; ?> -->
                                        <?php } else {?>
                                            <ins>Rp <?php echo number_format($data->product_price,0,',','.')?></ins><!-- <br><?php echo $data->product_reward_point; ?> -->
                                        <?php } ?>
                                    </div> 
                                </div>
                            <?php endforeach; ?>

                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>