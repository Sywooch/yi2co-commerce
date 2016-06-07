<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductCategory */

$this->title = 'Update Product Category: ' . ' ' . $model->product_category_name;
$this->params['breadcrumbs'][] = ['label' => 'Product Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_category_name, 'url' => ['view', 'id' => $model->product_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-category-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
