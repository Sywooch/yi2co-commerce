<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SupportTicketMessage */

$this->title = 'Create Support Ticket Message';
$this->params['breadcrumbs'][] = ['label' => 'Support Ticket Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-ticket-message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
