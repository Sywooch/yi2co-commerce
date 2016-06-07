<?php
    use yii\widgets\LinkPager;
    use yii\helpers\Url;
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
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

                <?php foreach($models as $data):?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="<?php echo Yii::getAlias('@imageurl')."/".$data->product_image; ?>" alt="">
                        </div>
                        <h2><a href="<?php echo Url::to(['site/single', 'id' => $data->product_id]); ?>"><?php echo $data->product_name;?></a></h2>
                        <div class="product-carousel-price">
                            <?php if($data->deal_category_id == 1) { ?>
                                <ins>Rp <?php echo $data->product_price * ((100-$data->dealDeal->discount_value)/100);?></ins> <del>Rp <?php echo $data->product_price;?></del><!-- <br><?php echo $data->product_reward_point; ?> -->
                            <?php } elseif($data->deal_category_id == 2) {?>
                                <ins>Rp <?php echo $data->product_price?></ins> Buy <?php echo $data->dealDeal->quantity_threeshold ?> Get <?php echo $data->dealDeal->get_quantity - $data->dealDeal->quantity_threeshold ?><!-- <br><?php echo $data->product_reward_point; ?> -->
                            <?php } elseif($data->deal_category_id == 3) {?>
                                <ins>Rp <?php echo $data->product_price?></ins> Buy <?php echo $data->dealDeal->quantity_threeshold ?> Discount <?php echo $data->dealDeal->discount_value ?> %<!-- <br><?php echo $data->product_reward_point; ?> -->
                            <?php } else {?>
                                <ins>Rp <?php echo $data->product_price?></ins><!-- <br><?php echo $data->product_reward_point; ?> -->
                            <?php } ?>
                        </div>  
                        
                        <div class="product-option-shop">
                            <!-- <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a> -->
                            <?php $form = ActiveForm::begin(['class'=>'form-horizontal', 'action'=>Url::toRoute(['cart/add-to-cart', 'id'=>$data->product_id])]); ?>
                                <?= Html::input('submit', 'submit', 'Add to cart',['class'=>'button add',]) ?>
                            <?php ActiveForm::end(); ?>
                        </div>                       
                    </div>
                </div>

                <?php endforeach; ?>

            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <?php
                                echo LinkPager::widget(['pagination' => $pages,]);
                            ?>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>