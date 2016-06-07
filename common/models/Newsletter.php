<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "newsletter".
 *
 * @property integer $newsletter_id
 * @property integer $product_id
 * @property string $newsletter_message
 */
class Newsletter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'newsletter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'newsletter_message', 'newsletter_title'], 'required'],
            [['product_id'], 'integer'],
            [['newsletter_message'], 'string'],
            [['newsletter_title'], 'string', 'max'=>128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'newsletter_id' => 'Newsletter ID',
            'product_id' => 'Product ID',
            'newsletter_title' => 'Newsletter Title',
            'newsletter_message' => 'Newsletter Message',
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }
}
