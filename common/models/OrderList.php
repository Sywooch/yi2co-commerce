<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_list".
 *
 * @property string $order_code
 * @property integer $product_id
 * @property integer $quantity
 * @property integer $subtotal
 *
 * @property Order $orderCode
 * @property Product $product
 */
class OrderList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_code', 'product_id', 'quantity'], 'required'],
            [['product_id', 'quantity', 'subtotal'], 'integer'],
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
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'subtotal' => 'Subtotal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderCode()
    {
        return $this->hasOne(Order::className(), ['order_code' => 'order_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }
}
