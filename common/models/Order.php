<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property string $order_code
 * @property string $order_date
 * @property integer $payment_status
 * @property integer $order_status
 * @property integer $coupon_id
 * @property integer $delivery_address_id
 * @property integer $customer_id
 *
 * @property Coupon $coupon
 * @property Customer $customer
 * @property DeliveryAddress $deliveryAddress
 * @property OrderList $orderList
 * @property PaymentConf[] $paymentConfs
 */
class Order extends \yii\db\ActiveRecord
{
    const PAYMENT_STATUS_NOT_CONFIRM = 0;
    const PAYMENT_STATUS_NOT_VERIFIED = 10;
    const PAYMENT_STATUS_VERIFIED = 20;

    const ORDER_STATUS_PENDING = 0;
    const ORDER_STATUS_PROCESSING = 10;
    const ORDER_STATUS_DELIVERED = 20;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_code', 'delivery_address_id', 'customer_id'], 'required'],
            [['order_date'], 'safe'],
            [['payment_status', 'order_status', 'coupon_id', 'delivery_address_id', 'customer_id'], 'integer'],
            [['order_code'], 'string', 'max' => 17]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_code' => 'Order Code',
            'order_date' => 'Order Date',
            'payment_status' => 'Payment Status',
            'order_status' => 'Order Status',
            'coupon_id' => 'Coupon ID',
            'delivery_address_id' => 'Delivery Address',
            'customer_id' => 'Customer ID',
        ];
    }

    public function formatPaymentstatus() {
        if ($this->payment_status == 0)
            return "Not Confirm";
        else if
            ($this->payment_status == 10)
            return "Not Verified";
        else if
            ($this->payment_status == 20)
            return "Verified";
        else return "Not Set";
    }

    public function formatOrderstatus() {
        if ($this->order_status == 0)
            return "Pending";
        else if
            ($this->order_status == 10)
            return "Processing";
        else if
            ($this->order_status == 20)
            return "Delivered";
        else return "Not Set";
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryAddress()
    {
        return $this->hasOne(DeliveryAddress::className(), ['delivery_address_id' => 'delivery_address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderList()
    {
        return $this->hasOne(OrderList::className(), ['order_code' => 'order_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentConfs()
    {
        return $this->hasMany(PaymentConf::className(), ['order_code' => 'order_code']);
    }
}
