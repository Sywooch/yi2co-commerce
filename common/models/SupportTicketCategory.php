<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "support_ticket_category".
 *
 * @property integer $support_ticket_category_id
 * @property string $support_ticket_category_name
 *
 * @property SupportTicket[] $supportTickets
 */
class SupportTicketCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_ticket_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['support_ticket_category_name'], 'required'],
            [['support_ticket_category_name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'support_ticket_category_id' => 'Support Ticket Category ID',
            'support_ticket_category_name' => 'Support Ticket Category Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportTickets()
    {
        return $this->hasMany(SupportTicket::className(), ['support_ticket_category_id' => 'support_ticket_category_id']);
    }
}
