<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\DeliveryAddress;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_date')->textInput() ?>

    <!-- <?php
        echo $form->field($model, 'payment_status')->dropDownList(['0' => 'Not Verified', '10' => 'Pending', '20' => 'Verified'], ['prompt' => 'Payment Status']);
    ?> -->

    <?php
        echo $form->field($model, 'order_status')->dropDownList(['0' => 'Pending', '10' => 'Processing'], ['prompt' => 'Order Status']);
    ?>

    <?= Html::activeLabel($model, 'delivery_address_id') ?> <br>
    <?= Html::activeDropDownList($model, 'delivery_address_id',
        ArrayHelper::map(DeliveryAddress::find()->all(), 'delivery_address_id', 'delivery_address_address'))
    ?> <br><br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
