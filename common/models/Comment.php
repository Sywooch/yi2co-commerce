<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $product_id
 * @property integer $customer_id
 * @property integer $comment_id
 * @property string $comment_text
 * @property string $comment_date_added
 *
 * @property Customer $customer
 * @property Product $product
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'customer_id', 'comment_text'], 'required'],
            [['product_id', 'customer_id', 'comment_id'], 'integer'],
            [['comment_text'], 'string'],
            [['comment_date_added'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'customer_id' => 'Customer ID',
            'comment_id' => 'Comment ID',
            'comment_text' => 'Comment Text',
            'comment_date_added' => 'Comment Date Added',
        ];
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
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }
}
