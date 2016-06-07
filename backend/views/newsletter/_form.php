<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\Newsletter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="newsletter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::activeLabel($model, 'product_id') ?> <br>
    <?= Html::activeDropDownList($model, 'product_id',
        ArrayHelper::map(Product::find()->all(), 'product_id', 'product_name'), ['prompt'=>'Select Product'])
    ?> <br><br>

    <!-- <?= $form->field($model, 'product_id')->textInput() ?> -->

    <?= $form->field($model, 'newsletter_message')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
