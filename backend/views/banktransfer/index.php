<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BanktransferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bank Transfers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-transfer-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bank Transfer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'bank_transfer_id',
            'bank_transfer_name',
            'bank_transfer_account',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
