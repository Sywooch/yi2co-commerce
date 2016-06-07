<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Newsletter */

$this->title = $model->newsletter_id;
$this->params['breadcrumbs'][] = ['label' => 'Newsletters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsletter-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->newsletter_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->newsletter_id], [
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
            // 'newsletter_id',
            [
                'attribute' => 'product_id',
                'value' => $model->product->product_name,
                'label' => 'Product Name'
            ],
            'newsletter_title',
            'newsletter_message:ntext',
        ],
    ]) ?>

    <p>
        <?= Html::a('Send Newsletter', ['send-newsletter', 'id' => $model->newsletter_id, 'product_id' => $model->product_id], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Are you sure you want to send this newsletter?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
