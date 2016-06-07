<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "delivery_address".
 *
 * @property integer $delivery_address_id
 * @property integer $customer_id
 * @property integer $city_id
 * @property string $delivery_address_name
 * @property string $delivery_address_address
 *
 * @property City $city
 * @property Customer $customer
 * @property Order[] $orders
 */
class DeliveryAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delivery_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'city_id', 'delivery_address_name', 'delivery_address_address'], 'required'],
            [['customer_id', 'city_id'], 'integer'],
            [['delivery_address_address'], 'string'],
            [['delivery_address_name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'delivery_address_id' => '',
            'customer_id' => 'Customer ID',
            'city_id' => 'City Name',
            'delivery_address_name' => 'Delivery Name',
            'delivery_address_address' => 'Delivery Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'city_id']);
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
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['delivery_address_id' => 'delivery_address_id']);
    }
}
