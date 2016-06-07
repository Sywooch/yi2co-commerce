<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "support_ticket_message".
 *
 * @property integer $support_ticket_message_id
 * @property integer $support_ticket_id
 * @property integer $customer_id
 * @property integer $admin_id
 * @property string $message
 * @property string $date_submit
 *
 * @property SupportTicket $supportTicket
 */
class SupportTicketMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_ticket_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['support_ticket_id', 'message', 'date_submit'], 'required'],
            [['support_ticket_id', 'customer_id', 'admin_id'], 'integer'],
            [['message'], 'string'],
            [['date_submit'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'support_ticket_message_id' => 'Support Ticket Message ID',
            'support_ticket_id' => 'Support Ticket ID',
            'customer_id' => 'Customer ID',
            'admin_id' => 'Admin ID',
            'message' => 'Message',
            'date_submit' => 'Date Submit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportTicket()
    {
        return $this->hasOne(SupportTicket::className(), ['support_ticket_id' => 'support_ticket_id']);
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customer_id' => 'customer_id']);
    }

    public function getAdmin()
    {
        return $this->hasOne(User::className(), ['id' => 'admin_id']);
    }
}
