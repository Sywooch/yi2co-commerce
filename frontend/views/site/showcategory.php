<?php
    use yii\helpers\Url;
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
                        <li><a href="<?php echo Url::to(['site/shop']); ?>">Shop page</a></li>
                        <li class="active"><a href="<?php echo Url::to(['site/show-category']); ?>">Category</a></li>
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
                        <h2>All Product Categories</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
            <?php foreach($model as $data): ?>
                <li>
                    <a href="<?php
                    echo Url::to(['site/category', 'id'=>$data->product_category_id]);
                ?>"><?php echo $data->product_category_name ?></a>
                </li>
            <?php endforeach; ?>
            </div>
        </div>
    </div>