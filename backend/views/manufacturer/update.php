<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Manufacturer */

$this->title = 'Update Manufacturer: ' . ' ' . $model->manufacturer_name;
$this->params['breadcrumbs'][] = ['label' => 'Manufacturers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->manufacturer_name, 'url' => ['view', 'id' => $model->manufacturer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manufacturer-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
