<?php
    use yii\helpers\ArrayHelper;
    use yii\widgets\Menu;
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use common\models\SupportTicketCategory;
?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Submit Support Ticket</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container">
    <div class="row">
        <?php
            echo Menu::widget([
                'items' => [
                    ['label' => 'Account Info', 'url' => ['account/index']],
                    ['label' => 'Change Password', 'url' => ['account/changepassword']],
                    ['label' => 'Change Info', 'url' => ['account/changeinfo']],
                    ['label' => 'My Coupon', 'url' => ['account/coupon']],
                    ['label' => 'Redeem Coupon', 'url' => ['account/redeem']],
                    ['label' => 'My Order', 'url' => ['myorder/index']],
                    ['label' => 'My Address', 'url' => ['myaddress/index']],
                ],
                'activateItems' => true,
                'options' => [
                    'class' => 'nav navbar-nav',
                ],
            ]);
        ?>
    </div>
</div> -->

<div class="container">
    <div class="row">
        <div class="col-lg-5">
            <p>Please fill out the following fields to submit Support Ticket:</p>

            <?php $form = ActiveForm::begin(['id' => 'submit-ticket-form']); ?>

                <?= Html::activeLabel($ticket, 'support_ticket_category_id') ?> <br>
                <?= Html::activeDropDownList($ticket, 'support_ticket_category_id',
                    ArrayHelper::map(SupportTicketCategory::find()->all(), 'support_ticket_category_id', 'support_ticket_category_name'))
                ?> <br><br>

                <?= $form->field($ticket, 'issue')->TextInput() ?>

                <?= $form->field($message, 'message')->textarea(['rows' => 6]) ?>

                <div class="form_group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>    
</div>
