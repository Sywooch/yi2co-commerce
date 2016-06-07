<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SupportticketcategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Support Ticket Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-ticket-category-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Support Ticket Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'support_ticket_category_id',*/
            'support_ticket_category_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
