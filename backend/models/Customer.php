<?php

namespace backend\models;

use Yii;

class Customer extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    const GENDER_MALE = 0;
    const GENDER_FEMALE = 10;

    const NEWSLETTER_NO = 0;
    const NEWSLETTER_YES = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_dob'], 'safe'],
            [['customer_gender', 'customer_reward_point', 'created_at', 'updated_at', 'status', 'newsletter'], 'integer'],
            [['customer_address'], 'string'],
            [['username', 'email', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['customer_name'], 'string', 'max' => 64],
            [['customer_telephone'], 'string', 'max' => 20],
            [['username', 'email', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32]
        ];
    }

    public function formatGender() {
        if ($this->customer_gender == 0)
            return "Female";
        else if
            ($this->customer_gender == 10)
            return "Male";
        else
            return "Not Set";
    }

    public function formatStatus() {
        if ($this->status == 0)
            return "Deleted";
        else if
            ($this->status == 10)
            return "Active";
        else
            return "Not Set";
    }

    public function formatNewsletter() {
        if ($this->newsletter == 0)
            return "No";
        else if
            ($this->newsletter == 10)
            return "Yes";
        else
            return "Not Set";
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'customer_name' => 'Customer Name',
            'customer_dob' => 'Customer Dob',
            'customer_gender' => 'Customer Gender',
            'customer_telephone' => 'Customer Telephone',
            'customer_address' => 'Customer Address',
            'customer_reward_point' => 'Customer Reward Point',
            'username' => 'Username',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCouponLists()
    {
        return $this->hasMany(CouponList::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoupons()
    {
        return $this->hasMany(Coupon::className(), ['coupon_id' => 'coupon_id'])->viaTable('coupon_list', ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryAddresses()
    {
        return $this->hasMany(DeliveryAddress::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportTickets()
    {
        return $this->hasMany(SupportTicket::className(), ['customer_id' => 'customer_id']);
    }
}
