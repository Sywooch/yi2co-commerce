<?php

namespace common\models;

use Yii;
use common\models\Cart;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $product_options_id
 * @property string $product_options_name
 * @property integer $product_options_price
 * @property integer $qty
 * @property integer $coupon_id
 * @property string $coupon_code
 * @property integer $coupon_discount
 * @property integer $deal_id
 * @property integer $deal_category_id
 * @property integer $deal_discount
 * @property integer $deal_quantity
 * @property integer $deal_quantity_threeshold
 * @property string $cart_code
 *
 * @property Product $product
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_options_id', 'product_options_price', 'qty', 'coupon_id', 'coupon_discount', 'deal_id', 'deal_category_id', 'deal_discount', 'deal_quantity', 'deal_quantity_threeshold'], 'integer'],
            [['product_options_name'], 'string', 'max' => 64],
            [['coupon_code'], 'string', 'max' => 20],
            [['cart_code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'product_options_id' => 'Product Options ID',
            'product_options_name' => 'Product Options Name',
            'product_options_price' => 'Product Options Price',
            'qty' => 'Qty',
            'coupon_id' => 'Coupon ID',
            'coupon_code' => 'Coupon Code',
            'coupon_discount' => 'Coupon Discount',
            'deal_id' => 'Deal ID',
            'deal_category_id' => 'Deal Category ID',
            'deal_discount' => 'Deal Discount',
            'deal_quantity' => 'Deal Quantity',
            'deal_quantity_threeshold' => 'Deal Quantity Threeshold',
            'cart_code' => 'Cart Code',
        ];
    }

    public function getCost() {
        $cart = Cart::find()->where(['cart_code' => Yii::$app->session['cart_code']])->all();
        $discount = Cart::find()->where(['cart_code' => Yii::$app->session['cart_code']])->andWhere(['not', ['coupon_discount'=>NULL]])->one();
        $sql = "SELECT product.product_image, product.product_price, product.product_name, cart.* FROM cart,product WHERE product.product_id=cart.product_id AND cart.cart_code='" . Yii::$app->session['cart_code'] . "'";
        $db = Yii::$app->db;
        $command = $db -> createCommand($sql);
        $results = $command->queryAll();
        $i=1;
        $sum=0;
        foreach($results as $model){
            $sum = $sum+ (($model['product_price'] + $model['product_options_price'] - ($model['product_price']*($model['deal_discount']/100))) * $model['qty']);
            $i++;
        }
        return $sum;
    }

    public function getCount() {
        $sql = "SELECT product.product_image, product.product_price, product.product_name, cart.* FROM cart,product WHERE product.product_id=cart.product_id AND cart.cart_code='" . Yii::$app->session['cart_code'] . "'";
        $db = Yii::$app->db;
        $command = $db -> createCommand($sql);
        $results = $command->queryAll();
        $i=1;
        $count=0;
        foreach($results as $model){
            $count = $count + $model['qty'];
            $i++;
        }
        return $count;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }

    public function checkQuantityThreeshold($qty, $threeshold)
    {
        if ($qty < 
            $threeshold) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
