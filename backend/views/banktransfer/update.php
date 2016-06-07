<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BankTransfer */

$this->title = 'Update Bank Transfer: ' . ' ' . $model->bank_transfer_name;
$this->params['breadcrumbs'][] = ['label' => 'Bank Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bank_transfer_name, 'url' => ['view', 'id' => $model->bank_transfer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bank-transfer-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
