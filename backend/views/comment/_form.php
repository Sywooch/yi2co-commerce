<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Product;
use common\models\Customer;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::activeLabel($model, 'product_id') ?> <br>
    <?= Html::activeDropDownList($model, 'product_id',
        ArrayHelper::map(Product::find()->all(), 'product_id', 'product_name'))
    ?> <br><br>

    <?= Html::activeLabel($model, 'customer_id') ?> <br>
    <?= Html::activeDropDownList($model, 'customer_id',
        ArrayHelper::map(Customer::find()->all(), 'customer_id', 'customer_name'))
    ?> <br><br>

    <?= $form->field($model, 'comment_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'comment_date_added')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Comment Date Added'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
