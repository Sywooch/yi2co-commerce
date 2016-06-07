<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment_conf".
 *
 * @property integer $payment_conf_id
 * @property string $order_code
 * @property integer $bank_transfer_id
 * @property string $payment_conf_name
 * @property string $payment_conf_account
 * @property integer $payment_conf_nominal
 *
 * @property BankTransfer $bankTransfer
 * @property Order $orderCode
 */
class PaymentConf extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_conf';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_code', 'bank_transfer_id', 'payment_conf_name', 'payment_conf_account', 'payment_conf_nominal'], 'required'],
            [['bank_transfer_id', 'payment_conf_nominal'], 'integer'],
            [['order_code'], 'string', 'max' => 17],
            [['payment_conf_name'], 'string', 'max' => 64],
            [['payment_conf_account'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_conf_id' => 'Payment Conf ID',
            'order_code' => 'Order Code',
            'bank_transfer_id' => 'Bank Transfer Destination',
            'payment_conf_name' => 'Your Bank Account Name',
            'payment_conf_account' => 'Your Bank Account Number',
            'payment_conf_nominal' => 'Transfer Nominal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankTransfer()
    {
        return $this->hasOne(BankTransfer::className(), ['bank_transfer_id' => 'bank_transfer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderCode()
    {
        return $this->hasOne(Order::className(), ['order_code' => 'order_code']);
    }
}
