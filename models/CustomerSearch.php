<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * CustomerSearch represents the model behind the search form about `app\models\Customer`.
 */
class CustomerSearch extends Customer
{

    public $timeNumber;
    public $timeUnit = 'DAY';

    //DBMS time unit => label
    const ALLOWED_TIME_UNITS = [
        'MINUTE' => 'Minutos',
        'HOUR' => 'Horas',
        'DAY' => 'Dias',
        'MONTH' => 'Meses',
    ];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['first_name', 'last_name',], 'safe'],
            [['email'], 'email'],
            ['timeNumber', 'integer', 'message' => 'Este campo debe ser un número entero'],
            ['timeUnit', 'in', 'range' => array_keys(self::ALLOWED_TIME_UNITS), 'allowArray' => true]
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Customer::find()->with('orders');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['created_at' => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email]);

        if(!empty($this->timeNumber)) {
            $query->andWhere(['>=', 'created_at', new Expression('DATE_SUB(NOW(), INTERVAL ' . $this->timeNumber . ' ' . $this->timeUnit . ')')]);
        }

        //$sql = $query->createCommand()->getRawSql();

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied for customer orders
     */
    public function searchOrders($params)
    {
        $query = $this->getOrders();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['created_at' => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if(!empty($this->timeNumber)) {
            $query->andWhere(['>=', 'created_at', new Expression('DATE_SUB(NOW(), INTERVAL ' . $this->timeNumber . ' ' . $this->timeUnit . ')')]);
        }

        return $dataProvider;
    }

}