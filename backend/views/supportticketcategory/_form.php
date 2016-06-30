<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SupportTicketCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="support-ticket-category-form">
	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(); ?>

		    <?= $form->field($model, 'support_ticket_category_name')->textInput(['maxlength' => true]) ?>

		    <div class="form-group">
		        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>

		    <?php ActiveForm::end(); ?>
		</div>
	</div>

    

</div>
