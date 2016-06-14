<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "coupon_list".
 *
 * @property integer $coupon_id
 * @property integer $customer_id
 * @property string $coupon_code
 * @property integer $coupon_list_status
 *
 * @property Coupon $coupon
 * @property Customer $customer
 */
class CouponList extends \yii\db\ActiveRecord
{
    const COUPON_AVAILABLE = 0;
    const COUPON_USED = 10;
    const COUPON_EXPIRED = 20;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coupon_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['coupon_id', 'customer_id', 'coupon_code'], 'required'],
            [['coupon_id', 'customer_id', 'coupon_list_status'], 'integer'],
            [['coupon_code'], 'string', 'max' => 20],
            ['coupon_list_status', 'default', 'value' => self::COUPON_AVAILABLE],
            ['coupon_list_status', 'in', 'range' => [self::COUPON_AVAILABLE, self::COUPON_USED, self::COUPON_EXPIRED]],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'coupon_id' => 'Coupon ID',
            'customer_id' => 'Customer ID',
            'coupon_code' => 'Coupon Code',
            'coupon_list_status' => 'Status',
        ];
    }

    public function formatCouponliststatus() {
        if ($this->coupon_list_status == 0)
            return "Available";
        else if
            ($this->coupon_list_status == 10)
            return "Used";
        else if
            ($this->coupon_list_status == 20)
            return "Expired";
        else
            return "Not Set";
    }

    public function generateCouponcode()
    {
        $this->coupon_code = Yii::$app->security->generateRandomString(4);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoupon()
    {
        return $this->hasOne(Coupon::className(), ['coupon_id' => 'coupon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customer_id' => 'customer_id']);
    }
}
