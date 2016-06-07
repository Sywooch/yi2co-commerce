<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_options".
 *
 * @property integer $product_options_id
 * @property integer $product_id
 * @property string $product_options_name
 * @property string $product_options_description
 * @property integer $product_options_price
 * @property integer $product_options_tier
 *
 * @property Product $product
 */
class ProductOptions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_options_name', 'product_options_description', 'product_options_price', 'product_options_tier'], 'required'],
            [['product_id', 'product_options_price', 'product_options_tier'], 'integer'],
            ['product_options_tier', 'default', 'value' => 0],
            [['product_options_description'], 'string'],
            [['product_options_name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_options_id' => 'Product Options ID',
            'product_id' => 'Product ID',
            'product_options_name' => 'Options',
            'product_options_description' => 'Product Options Description',
            'product_options_price' => 'Product Options Price',
            'product_options_tier' => 'Product Options Tier',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasMany(ProductOptions::className(), ['product_options_id' => 'product_options_id']);
    }
}
