<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use common\models\Customer;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'customer_id',
            'customer_name',
            'customer_dob:date',
            /*[
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'customer_gender',
                'value' => function ($data){return Html::encode($data->formatGender());},
                'filter' => [0=>'Female', 10=>'Male']
            ],*/
            //'customer_telephone',
            //'customer_address:ntext',
            'customer_reward_point',
            // 'username',
            'email:email',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            //'created_at',
            //'updated_at',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'status',
                'value' => function ($data){return Html::encode($data->formatStatus());},
                'filter' => [0=>'Deleted', 10=>'Active']
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'newsletter',
                'value' => function ($data){return Html::encode($data->formatNewsletter());},
                'filter' => [0=>'No', 10=>'Yes']
            ],

            ['class' => 'yii\grid\ActionColumn', 'template'=>'{view}{update}'],
        ],
    ]); ?>

</div>
