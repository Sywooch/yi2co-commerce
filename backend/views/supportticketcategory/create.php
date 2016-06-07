<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SupportTicketCategory */

$this->title = 'Create Support Ticket Category';
$this->params['breadcrumbs'][] = ['label' => 'Support Ticket Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-ticket-category-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
