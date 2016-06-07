<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DeliveryAddress */

$this->title = $model->delivery_address_id;
$this->params['breadcrumbs'][] = ['label' => 'Delivery Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-address-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->delivery_address_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->delivery_address_id], [
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
            [
                'attribute' => 'delivery_address_id',
                'label' => 'Delivery Address Id',
            ],
            [
                'attribute' => 'customer_id',
                'label' => 'Customer Name',
                'value' => $model->customer->customer_name,
            ],
            [
                'attribute' => 'city_id',
                'value' => $model->city->city_name,
            ],
            'delivery_address_name',
            'delivery_address_address:ntext',
        ],
    ]) ?>

</div>
