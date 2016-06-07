<?php
use yii\widgets\Menu;
use yii\widgets\DetailView;
use yii\helpers\Html;
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Redeem Coupon</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php echo Menu::widget([
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
    <h3>Your Reward Point: <?php echo $modelCust->customer_reward_point; ?></h3>
    <?php foreach ($model as $model): ?>
    <div class="row">
        <?php
            $x=\common\models\CouponList::find()
            ->where(['customer_id'=>Yii::$app->user->id, 'coupon_id'=>$model->coupon_id])
            ->one();
            if($model->coupon_used < $model->coupon_total && !isset($x)){
                echo Html::a('redeem', ['redeem-coupon', 'id' => $model->coupon_id, 'cust' => Yii::$app->user->id], ['class'=>'btn btn-primary']);
                echo  DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'coupon_name',
                        'redeem_point',
                        'coupon_discount',
                        'coupon_date_end',
                    ],
                ]);
            }
        ?>
    </div>
    <?php endforeach;?>
    <?php if(count($x)
    !==0){?>
        <h3>There is no active offer this time, kindly check again later...</h3>
    <?php }; ?>
</div>