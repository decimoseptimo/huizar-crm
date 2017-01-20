<?php

namespace app\api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use app\models\Order;

/**
 * Default controller for the `v1` module
 */
class OrderController extends ActiveController
{

    public $modelClass = 'app\models\Order';
    public $createScenario = Order::SCENARIO_API_CREATE;
    public $updateScenario = Order::SCENARIO_API_UPDATE;

    /**
     * Renders the index view for the module
     * @return string
     */
    /*public function actionIndex()
    {
        return $this->render('index');
    }*/

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['view']);
        return $actions;
    }

    public function behaviors()
    {
        $behaviours = parent::behaviors();
        $behaviours['authenticator']['class'] = \yii\filters\auth\HttpBasicAuth::className();
        return $behaviours;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if(Yii::$app->user->isGuest){
            throw new \yii\web\ForbiddenHttpException();
        }
    }

}