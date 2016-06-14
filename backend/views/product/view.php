<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php if($model->deal_deal_id!==null){?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_id',
            [
                'attribute' => 'product_category_id',
                'value' => $model->productCategory->product_category_name,
            ],
            [
                'attribute' => 'manufacturer_id',
                'value' => $model->manufacturer->manufacturer_name,
            ],
            'product_name',
            'product_model',
            [
                'attribute' => 'product_price',
                'value' => number_format($model->product_price,0,',','.'),
            ],
            'product_description:ntext',
            'product_image',
            'product_reward_point',
            [
                'attribute' => 'deal_deal_id',
                'label' => 'Deal',
                'value' => $model->dealDeal->deal_name,
            ],
            [
                'label' => 'Status',
                'value' => $model->formatProductStatus(),
            ],
        ],
    ]) ?>
    <?php } else { ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_id',
            [
                'attribute' => 'product_category_id',
                'value' => $model->productCategory->product_category_name,
            ],
            [
                'attribute' => 'manufacturer_id',
                'value' => $model->manufacturer->manufacturer_name,
            ],
            'product_name',
            'product_model',
            'product_price',
            'product_description:ntext',
            'product_image',
            'product_reward_point',
            [
                'attribute' => 'deal_deal_id',
                'label' => 'Deal',
                'value' => 'Not Set',
            ],
            [
                'label' => 'Status',
                'value' => $model->formatProductStatus(),
            ],
        ],
    ]) ?>
    <?php } ?>
</div>
