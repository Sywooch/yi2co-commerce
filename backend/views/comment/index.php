<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'product_id',
                'label' => 'Product Name',
                'value' => function ($data){
                    return $data->product->product_name;
                },
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'customer_id',
                'label' => 'Customer Name',
                'value' => function ($data){
                    return $data->customer->customer_name;
                },
            ],
            'comment_text:ntext',
            'comment_date_added:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
