<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "coupon".
 *
 * @property integer $coupon_id
 * @property double $coupon_discount
 * @property integer $coupon_total
 * @property integer $coupon_used
 * @property string $coupon_date_start
 * @property string $coupon_date_end
 * @property integer $coupon_status
 *
 * @property CouponList[] $couponLists
 * @property Customer[] $customers
 * @property Order[] $orders
 */
class Coupon extends \yii\db\ActiveRecord
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coupon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['coupon_discount', 'coupon_total', 'coupon_name'], 'required'],
            [['coupon_discount'], 'number'],
            [['coupon_total', 'coupon_used', 'coupon_status'], 'integer'],
            [['coupon_date_start', 'coupon_date_end'], 'safe'],
            ['redeem_point', 'default', 'value' => 0],
            ['coupon_status', 'default', 'value' => self::STATUS_ACTIVE],
            ['coupon_status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'coupon_id' => 'Coupon ID',
            'coupon_name' => 'Name',
            'coupon_discount' => 'Discount %',
            'coupon_total' => 'Total',
            'coupon_used' => 'Used',
            'coupon_date_start' => 'Date Start',
            'coupon_date_end' => 'Date End',
            'coupon_status' => 'Status',
        ];
    }

    public function formatStatus() {
        if ($this->coupon_status == 0)
            return "Inactive";
        else if
            ($this->coupon_status == 10)
            return "Active";
        else
            return "Not Set";
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCouponLists()
    {
        return $this->hasMany(CouponList::className(), ['coupon_id' => 'coupon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['customer_id' => 'customer_id'])->viaTable('coupon_list', ['coupon_id' => 'coupon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['coupon_id' => 'coupon_id']);
    }
}
