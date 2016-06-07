<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DealCategory */

$this->title = $model->deal_category_name;
$this->params['breadcrumbs'][] = ['label' => 'Deal Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deal-category-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->deal_category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->deal_category_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'deal_category_id',
            'deal_category_name',
            'deal_category_description:ntext',
        ],
    ]) ?>

</div>
