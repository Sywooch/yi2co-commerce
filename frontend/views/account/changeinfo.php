<?php
    use yii\widgets\Menu;
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use kartik\widgets\DatePicker;
?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Change Account Info</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php
            echo Menu::widget([
                'items' => [
                    ['label' => 'Account Info', 'url' => ['account/index']],
                    ['label' => 'Change Password', 'url' => ['account/changepassword']],
                    ['label' => 'Change Info', 'url' => ['account/changeinfo']],
                    ['label' => 'My Coupon', 'url' => ['mycoupon/index']],
                    ['label' => 'Redeem Coupon', 'url' => ['mycoupon/redeem']],
                    ['label' => 'My Order', 'url' => ['myorder/index']],
                    ['label' => 'My Support Ticket', 'url' => ['supportticket/index']],
                    ['label' => 'My Address', 'url' => ['myaddress/index']],
                ],
                'activateItems' => true,
                'options' => [
                    'class' => 'nav navbar-nav',
                ],
            ]);
        ?>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-5">
            <p>Please fill out the following fields to change account info:</p>

            <?php $form = ActiveForm::begin(['id' => 'change-info-form']); ?>

                <?= $form->field($model, 'customer_name')->TextInput() ?>

                <?= $form->field($model, 'customer_dob')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter Date of Birth'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy/mm/dd'
                    ]
                ]); ?>

                <?php
                    echo $form->field($model, 'customer_gender')->dropDownList(['0' => 'Female', '10' => 'Male'], ['prompt' => 'Select Gender']);
                ?>

                <?= $form->field($model, 'customer_telephone')->TextInput() ?>

                <!-- <?= $form->field($model, 'customer_address')->TextInput() ?> -->

                <?php
                    echo $form->field($model, 'customer_gender')->dropDownList(['0' => 'Female', '10' => 'Male'], ['prompt' => 'Select Gender']);
                ?>

                <?= $form->field($model, 'newsletter')->dropDownList(['0' => 'No', '10' => 'Yes'], ['prompt' => 'Receive Newsletter']);?>

                <div class="form_group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>    
</div>
