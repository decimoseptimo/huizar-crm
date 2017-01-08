<?php

namespace app\models;

use Yii;
use yii\web\BadRequestHttpException;


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

    const STATUS_RECEIVED = 0;
    const STATUS_READY_TO_DELIVER = 1;
    const STATUS_DELIVERED = 2;
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
            [['id'], 'required'],
            [['id'], 'integer'],
            [['id'], 'unique', 'except' => self::SCENARIO_SEARCH],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Numero',
            //'number' => 'Numero de Orden',
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

    /*
     * Ensures status value integrity before assign it to attribute
     */
    public function setStatus($value) {
        if($this->status == $value)
            throw new BadRequestHttpException('La orden ya se encuentra en el estado solicitado.');

        if (!in_array($value, self::allowedStatus()))
            throw new BadRequestHttpException('El estado solicitado no es valido.');

        $this->status = $value;
    }

    /**
     * Returns a list of allowed status codes
     *
     * @return array
     */
    protected function allowedStatus() {
        return [self::STATUS_RECEIVED, self::STATUS_READY_TO_DELIVER, self::STATUS_DELIVERED];
    }

}