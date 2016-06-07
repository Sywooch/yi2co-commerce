<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SupportTicketMessage */

$this->title = 'Update Support Ticket Message: ' . ' ' . $model->support_ticket_message_id;
$this->params['breadcrumbs'][] = ['label' => 'Support Ticket Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->support_ticket_message_id, 'url' => ['view', 'id' => $model->support_ticket_message_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="support-ticket-message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
