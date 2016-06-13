<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <!-- <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->username; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> -->

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    [
                        'label' => 'Master Data',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Province', 'icon' => 'fa fa-file-code-o', 'url' => ['/province'],],
                            ['label' => 'City', 'icon' => 'fa fa-file-code-o', 'url' => ['/city'],],
                            ['label' => 'Bank Transfer', 'icon' => 'fa fa-money', 'url' => ['/banktransfer'],],
                        ],
                    ],

                    [
                        'label' => 'Manage Product',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Product', 'icon' => 'fa fa-file-code-o', 'url' => ['/product'],],
                            ['label' => 'Product Category', 'icon' => 'fa fa-file-code-o', 'url' => ['/productcategory'],],
                            ['label' => 'Manufacturer', 'icon' => 'fa fa-file-code-o', 'url' => ['/manufacturer'],],
                            ['label' => 'Product Options', 'icon' => 'fa fa-file-code-o', 'url' => ['/productoptions'],],
                        ],
                    ],

                    [
                        'label' => 'Manage Customer',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Customer', 'icon' => 'fa fa-file-code-o', 'url' => ['/customer'],],
                            ['label' => 'Delivery Address', 'icon' => 'fa fa-file-code-o', 'url' => ['/deliveryaddress'],],
                        ],
                    ],

                    [
                        'label' => 'CRM',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Coupon',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Coupon', 'icon' => 'fa fa-circle-o', 'url' => ['/coupon'],],
                                    ['label' => 'Coupon List', 'icon' => 'fa fa-circle-o', 'url' => ['/couponlist'],],
                                    
                                ],
                            ],
                            [
                                'label' => 'Deal',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Deal', 'icon' => 'fa fa-circle-o', 'url' => ['/deal'],],
                                    ['label' => 'Deal Category', 'icon' => 'fa fa-circle-o', 'url' => ['/dealcategory'],],
                                    
                                ],
                            ],
                            [
                                'label' => 'SupportTicket',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Support Ticket', 'icon' => 'fa fa-circle-o', 'url' => ['/supportticket'],],
                                    ['label' => 'Support Ticket Category', 'icon' => 'fa fa-circle-o', 'url' => ['/supportticketcategory'],],
                                ],
                            ],
                            ['label' => 'Comment', 'icon' => 'fa fa-comments', 'url' => ['/comment'],],
                            ['label' => 'Newsletter', 'icon' => 'fa fa-envelope', 'url' => ['/newsletter']],
                        ],
                    ],
                    ['label' => 'Manage Order', 'icon' => 'fa fa-fax', 'url' => ['/order']],
                    ['label' => 'Backup Restore', 'icon' => 'fa fa-database', 'url' => ['/db-manager']],
                ],
            ]
        ) ?>

<?php if(Yii::$app->user->identity->role==30){?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Manage Admin', 'icon' => 'fa fa-file-code-o', 'url' => ['/manageadmin']],
                ],
            ]
        ) ?>

<?php } ?>

    </section>

</aside>
