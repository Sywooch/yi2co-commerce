<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'cart' => [
        	'class' => 'yz\shoppingcart\ShoppingCart',
        	'cartId' => 'my_application_cart',
        ],
    ],
];
