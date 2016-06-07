<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_name',
            'product_model',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'product_category_id',
                'value' => function ($data){
                    return $data->productCategory->product_category_name;
                },
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'manufacturer_id',
                'value' => function ($data){
                    return $data->manufacturer->manufacturer_name;
                },
            ],
            'product_price',
            'product_description:ntext',
            // 'product_image',
            'product_reward_point',
            // 'deal_deal_id',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'product_status',
                'value' => function ($data){return Html::encode($data->formatProductStatus());},
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
