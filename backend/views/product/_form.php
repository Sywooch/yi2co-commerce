<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ProductCategory;
use common\models\Manufacturer;
use common\models\Deal;
use kartik\widgets\Select2;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <div class="row"><img src="<?php echo Yii::getAlias('@imageurl')."/".$model->product_image; ?>" alt=""></div>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'product_model')->textInput(['maxlength' => true]) ?>

            <?php
                echo $form->field($model, 'product_category_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(ProductCategory::find()->all(), 'product_category_id', 'product_category_name'),
                    'options' => ['placeholder' => 'Select a category ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>

            <?php
                echo $form->field($model, 'manufacturer_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Manufacturer::find()->all(), 'manufacturer_id', 'manufacturer_name'),
                    'options' => ['placeholder' => 'Select a manufacturer ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>

            <?= $form->field($model, 'product_description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'product_price')->textInput() ?>

            <?= $form->field($model, 'product_image')->fileInput() ?>

            <?= $form->field($model, 'product_reward_point')->textInput() ?>

            <?php
                echo $form->field($model, 'deal_deal_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Deal::find()->all(), 'deal_id', 'deal_name'),
                    'options' => ['placeholder' => 'Not Available ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>

        <!--     <?= Html::activeLabel($model, 'product_status') ?> <br>
            <?= Html::activeDropDownList($model, 'product_status', ['0' => 'Inactive', '10' => 'Active'])
            ?> <br><br> -->

            <?php
                echo $form->field($model, 'product_status')->dropDownList(['0' => 'Inactive', '10' => 'Active'], ['prompt' => 'Product Status']);
            ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    

</div>
