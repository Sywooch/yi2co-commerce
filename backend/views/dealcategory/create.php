<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DealCategory */

$this->title = 'Create Deal Category';
$this->params['breadcrumbs'][] = ['label' => 'Deal Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deal-category-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
