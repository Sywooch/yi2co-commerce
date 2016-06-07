<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DeliveryAddress */

$this->title = 'Update Delivery Address: ' . ' ' . $model->delivery_address_id;
$this->params['breadcrumbs'][] = ['label' => 'Delivery Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->delivery_address_id, 'url' => ['view', 'id' => $model->delivery_address_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="delivery-address-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
