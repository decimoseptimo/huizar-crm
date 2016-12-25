<?php

namespace app\api\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\web\Controller;

/**
 * Default controller for the `v1` module
 */
class CustomerController extends ActiveController
{

    public $modelClass = 'app\models\Customer';
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

}