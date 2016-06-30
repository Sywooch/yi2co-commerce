<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Manufacturer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manufacturer-form">
	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(); ?>

		    <?= $form->field($model, 'manufacturer_name')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'manufacturer_address')->textarea(['rows' => 6]) ?>

		    <?= $form->field($model, 'manufacturer_telephone')->textInput(['maxlength' => true]) ?>

		    <div class="form-group">
		        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>

		    <?php ActiveForm::end(); ?>
		</div>
	</div>

    

</div>
