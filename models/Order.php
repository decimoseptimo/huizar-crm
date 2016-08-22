<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $number
 * @property integer $status
 * @property integer $created_at
 * @property integer $finished_at
 * @property integer $customer_id
 *
 * @property Customer $user
 */
class Order extends \yii\db\ActiveRecord
{
    
    const STATUS_IN_PROCESS = 0;
    const STATUS_COMPLETED = 1;
    const SCENARIO_SEARCH = 1;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number'], 'required'],
            [['number'], 'integer'],
            [['number'], 'unique', 'except' => self::SCENARIO_SEARCH],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Numero de Orden',
            'status' => 'Estado',
            'created_at' => 'Creado en',
            'finished_at' => 'Finalizado en',
            'customer_id' => 'ID Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->isNewRecord ? $this->created_at = gmdate('Y-m-d H:i:s') : null;

            return true;
        } else {
            return false;
        }
    }

}