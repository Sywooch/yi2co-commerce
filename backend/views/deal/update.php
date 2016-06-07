<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Deal */

$this->title = 'Update Deal: ' . ' ' . $model->deal_name;
$this->params['breadcrumbs'][] = ['label' => 'Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->deal_id, 'url' => ['view', 'id' => $model->deal_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="deal-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
