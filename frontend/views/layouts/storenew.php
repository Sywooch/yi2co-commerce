<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- Google Fonts -->
    <link href='css/font-titilium-web.css' rel='stylesheet' type='text/css'>
    <link href='css/font-roboto-condensed.css' rel='stylesheet' type='text/css'>
    <link href='css/font-raleway.css' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <?php if (Yii::$app->user->isGuest){?>
                        <ul>
                            <li><a href="<?php echo Url::to(['site/login']); ?>"><i class="fa fa-user"></i> Login</a></li>
                            <li><a href="<?php echo Url::to(['site/signup']); ?>"><i class="fa fa-user"></i> Signup</a></li>
                            <li><a href="<?php echo Url::to(['/cart']); ?>"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                        </ul>
                    <?php } else {?>
                        <ul>
                            <li><a href="<?php echo Url::to(['account/index']); ?>"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="<?php echo Url::to(['/cart']); ?>"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="<?php echo Url::to(['supportticket/submit']); ?>"><i class="fa fa-user"></i> Support</a></li>
                            <!-- <li><a href="<?php echo Url::to(['site/checkout']); ?>"><i class="fa fa-user"></i> Checkout</a></li> -->
                            <li><a href="<?php echo Url::to(['site/logout']); ?>" data-method="post"><i class="fa fa-user"></i> Logout</a></li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php echo Html::beginForm(Url::to(['search']), 'get'); ?>
                    <?php
                        echo Html::textInput('query');
                        echo Html::submitButton('Search', ['class'=>'button']);
                    ?>
                <?php echo Html::endForm(); ?>
            </div>
        </div>
    </div>
</div><!-- End Header Area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="./"><img src="<?php echo Yii::$app->request->baseUrl ?>/img/logo.png"></a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="<?php echo Url::to(['cart/index']); ?>">Cart - <span class="cart-amunt"><?php echo common\models\Cart::getCost(); ?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo common\models\Cart::getCount(); ?></span></a>
                </div>
            </div>

            
        </div>

    </div>
</div>

<div class="container">
    <?= $content ?>
</div>

<div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>e<span>Comm</span></h2>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p> -->
                        <p>eComm is e-commerce Content Management System that include operational CRM into application core.</p>
                        <!-- <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div> -->
                    </div>
                </div>
                
                <!-- <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Order history</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Vendor contact</a></li>
                            <li><a href="#">Front page</a></li>
                        </ul>                        
                    </div>
                </div> -->
                
                <!-- <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="#">Mobile Phone</a></li>
                            <li><a href="#">Home accesseries</a></li>
                            <li><a href="#">LED TV</a></li>
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">Gadets</a></li>
                        </ul>                        
                    </div>
                </div> -->
                
                <!-- <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div> <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2016 eComm. Eko Radityo Leonan/H1L011009. Unversitas Negeri Jenderal Sudirman<!-- <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a> --></p>
                    </div>
                </div>
                
                <!-- <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div> -->
            </div>
        </div>
    </div> <!-- End footer bottom area -->

    <!-- Latest jQuery form server -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
    <script type="text/javascript" src="js/script.slider.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
