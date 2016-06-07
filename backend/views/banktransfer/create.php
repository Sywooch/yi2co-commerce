<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BankTransfer */

$this->title = 'Create Bank Transfer';
$this->params['breadcrumbs'][] = ['label' => 'Bank Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-transfer-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
