<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use app\models\Order;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property integer $global_tinto_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Order[] $orders
 */
class Customer extends \yii\db\ActiveRecord
{
    
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'id'], 'required'],
            [['id'], 'number'],
            [['email'], 'email'],
            [['email', 'id'], 'unique'],
            [['first_name', 'last_name', 'email'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'global_tinto_id' => 'ID Global Tinto',
            'first_name' => 'Nombre',
            'last_name' => 'Apellido',
            'email' => 'Email',
            'created_at' => 'Creado en',
            'updated_at' => 'Actualizado en',
            'fullName' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['customer_id' => 'id']);
    }
    
    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($this->isNewRecord) {
                $this->created_at = gmdate('Y-m-d H:i:s');
            }
            $this->updated_at = gmdate('Y-m-d H:i:s');

            //$this->isNewRecord ? $this->created_at = new Expression('NOW()') : $this->updated_at = new Expression('NOW()');
            //$this->isNewRecord ? $this->created_at = new Expression('UTC_TIMESTAMP()') : $this->updated_at = new Expression('UTC_TIMESTAMP()');

            return true;
        } else {
            return false;
        }
    }
    
    public function createOrder()
    {
        $order = new Order();
        $order->customer_id = $this->id;
        return $order;
    }

}