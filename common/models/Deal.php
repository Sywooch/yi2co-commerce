<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "deal".
 *
 * @property integer $deal_id
 * @property string $deal_name
 * @property string $deal_date_start
 * @property string $deal_date_end
 * @property integer $deal_category_id
 * @property integer $discount_value
 * @property integer $get_quantity
 * @property integer $quantity_threeshold
 * @property integer $sum_threeshold
 *
 * @property DealCategory $dealCategory
 * @property Product[] $products
 */
class Deal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deal_name', 'deal_category_id'], 'required'],
            [['deal_date_start', 'deal_date_end'], 'safe'],
            [['deal_category_id', 'discount_value', 'get_quantity', 'quantity_threeshold', 'sum_threeshold'], 'integer'],
            [['deal_name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'deal_id' => 'Deal ID',
            'deal_name' => 'Deal Name',
            'deal_date_start' => 'Deal Date Start',
            'deal_date_end' => 'Deal Date End',
            'deal_category_id' => 'Deal Category ID',
            'discount_value' => 'Discount Value',
            'get_quantity' => 'Get Quantity',
            'quantity_threeshold' => 'Quantity Threeshold',
            'sum_threeshold' => 'Sum Threeshold',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDealCategory()
    {
        return $this->hasOne(DealCategory::className(), ['deal_category_id' => 'deal_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['deal_deal_id' => 'deal_id']);
    }
}
