<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bank_transfer".
 *
 * @property integer $bank_transfer_id
 * @property string $bank_transfer_name
 * @property string $bank_transfer_account
 *
 * @property PaymentConf[] $paymentConfs
 */
class BankTransfer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank_transfer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank_transfer_name', 'bank_transfer_account'], 'required'],
            [['bank_transfer_name'], 'string', 'max' => 64],
            [['bank_transfer_account'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bank_transfer_id' => 'Bank Transfer Destination',
            'bank_transfer_name' => 'Bank Transfer Name',
            'bank_transfer_account' => 'Bank Transfer Account',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentConfs()
    {
        return $this->hasMany(PaymentConf::className(), ['bank_transfer_id' => 'bank_transfer_id']);
    }
}
