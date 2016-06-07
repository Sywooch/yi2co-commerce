<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SupportTicketCategory */

$this->title = 'Update Support Ticket Category: ' . ' ' . $model->support_ticket_category_name;
$this->params['breadcrumbs'][] = ['label' => 'Support Ticket Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->support_ticket_category_name, 'url' => ['view', 'id' => $model->support_ticket_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="support-ticket-category-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
