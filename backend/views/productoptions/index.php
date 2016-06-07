<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductoptionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Options';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-options-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Options', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'product_options_id',
            [
                'class' => 'yii\grid\DataColumn',
                'label' => 'Product Name',
                'attribute' => 'product_id',
                'value' => function ($data){
                    return $data->product->product_name;
                },
            ],
            'product_options_name',
            'product_options_description:ntext',
            'product_options_price',
            'product_options_tier',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
