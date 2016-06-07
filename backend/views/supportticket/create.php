<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SupportTicket */

$this->title = 'Create Support Ticket';
$this->params['breadcrumbs'][] = ['label' => 'Support Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-ticket-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
