<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */

$this->title = $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->customer_name;
?>
<div class="customer-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->customer_id], ['class' => 'btn btn-primary']) ?>
        <!-- <?= Html::a('Delete', ['delete', 'id' => $model->customer_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'customer_id',
            'customer_name',
            'customer_dob',
            [
                'label' => 'Gender',
                'value' => $model->formatGender(),
            ],
            'customer_telephone',
            'customer_address:ntext',
            'customer_reward_point',
            'username',
            'email:email',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //
            //
            [
                'label' => 'Status',
                'value' => $model->formatStatus(),
            ],
            [
                'label' => 'Newsletter',
                'value' => $model->formatNewsletter(),
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
