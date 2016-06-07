<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "manufacturer".
 *
 * @property integer $manufacturer_id
 * @property string $manufacturer_name
 * @property string $manufacturer_address
 * @property string $manufacturer_telephone
 *
 * @property Product[] $products
 */
class Manufacturer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manufacturer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manufacturer_name', 'manufacturer_address', 'manufacturer_telephone'], 'required'],
            [['manufacturer_address'], 'string'],
            [['manufacturer_name'], 'string', 'max' => 64],
            [['manufacturer_telephone'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'manufacturer_id' => 'Manufacturer ID',
            'manufacturer_name' => 'Manufacturer Name',
            'manufacturer_address' => 'Manufacturer Address',
            'manufacturer_telephone' => 'Manufacturer Telephone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['manufacturer_id' => 'manufacturer_id']);
    }
}
