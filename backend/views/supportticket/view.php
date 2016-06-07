<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SupportTicket */

$this->title = $model->support_ticket_id;
$this->params['breadcrumbs'][] = ['label' => 'Support Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-ticket-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->support_ticket_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->support_ticket_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'support_ticket_id',
            [
                'attribute' => 'support_ticket_category_id',
                'value' => $model->supportTicketCategory->support_ticket_category_name,
            ],
            'issue',
            'date_submit:date',
            [
                'attribute' => 'customer_id',
                'value' => $model->customer->customer_name,
            ],
            [
                'label' => 'Status',
                'value' => $model->formatSupportstatus(),
            ],
        ],
    ]) ?>

    <div class="container">
    <?php foreach($listmessage as $data): ?>
    <!-- <div class="row">
        <?php if (isset($data->admin_id)){echo $data->admin_id;}else{echo $data->customer_id;} ?>
        <?php echo $data->date_submit; ?>
        <?php echo $data->message; ?>
    </div> -->
    <div class="row-fluid">
        <div class="span6" style="padding-bottom: 10px; border-bottom: 1px solid black; border-top: 1px solid black;">
            <div class="highlighted-box center">
            <span style="float: right;"><?php echo $data->date_submit; ?></span>
            <h2><?php if (isset($data->admin_id)){echo 'Admin - ' . $data->admin->username;}else{echo $data->customer->customer_name;} ?></h2>
            <p><?php echo $data->message ?></p>
                
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="row">
        <?php $form = ActiveForm::begin(['class'=>'form-horizontal',]); ?>

        <?= $form->field($addmessage, 'message')->textarea(['rows'=>6]) ?>

        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'order-button']) ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>

</div>
