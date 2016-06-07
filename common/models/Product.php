<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class Product extends \yii\db\ActiveRecord
{
    const PRODUCT_STATUS_INACTIVE = 0;
    const PRODUCT_STATUS_ACTIVE = 10;

    /**
     * @var UploadedFile
     */
    //public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['product_category_id', 'manufacturer_id', 'product_name', 'product_model', 'product_price', 'product_description'], 'required'],
            [['product_category_id', 'manufacturer_id', 'product_price', 'product_reward_point', 'deal_deal_id', 'deal_category_id', 'product_status'], 'integer'],
            ['product_reward_point', 'default', 'value' => 0],
            ['product_status', 'default', 'value' => 10],
            [['product_description'], 'string'],
            [['product_name'], 'string', 'max' => 64],
            [['product_model'], 'string', 'max' => 64],
//            [['product_image'], 'string', 'max' => 255]
        ];
    }

    public function formatProductStatus() {
        if ($this->product_status == 0)
            return "Inactive";
        else if
            ($this->product_status == 10)
            return "Active";
        else
            return "Not Set";
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->product_image->saveAs('uploads/products/' . $this->product_image->baseName . '.' . $this->product_image->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_category_id' => 'Product Category',
            'manufacturer_id' => 'Manufacturer',
            'product_name' => 'Product Name',
            'product_model' => 'Product Model',
            'product_price' => 'Product Price',
            'product_description' => 'Product Description',
            'product_image' => 'Product Image',
            'product_reward_point' => 'Product Reward Point',
            'deal_deal_id' => 'Deal',
            'deal_category_id' => 'Deal Category ID',
            'product_status' => 'Product Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartLists()
    {
        return $this->hasMany(CartList::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['cart_id' => 'cart_id'])->viaTable('cart_list', ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderLists()
    {
        return $this->hasMany(OrderList::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDealDeal()
    {
        return $this->hasOne(Deal::className(), ['deal_id' => 'deal_deal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(Manufacturer::className(), ['manufacturer_id' => 'manufacturer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['product_category_id' => 'product_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributes()
    {
        return $this->hasMany(ProductAttribute::className(), ['product_id' => 'product_id']);
    }

    public function getNewsletter()
    {
        return $this->hasMany(Newsletter::className(), ['product_id' => 'product_id']);
    }
}
