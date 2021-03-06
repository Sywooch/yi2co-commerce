<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DealCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deal-category-form">
	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(); ?>

		    <?= $form->field($model, 'deal_category_name')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'deal_category_description')->textarea(['rows' => 6]) ?>

		    <div class="form-group">
		        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>

		    <?php ActiveForm::end(); ?>
		</div>
	</div>

    

</div>
