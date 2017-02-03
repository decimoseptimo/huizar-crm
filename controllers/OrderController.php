<?php

namespace app\controllers;

use Yii;
use app\models\Order;
use app\models\OrderSearch;
use yii\base\Exception;
use yii\data\ArrayDataProvider;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Customer;
use yii\httpclient\Client;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $customer = Customer::findOne($id);
        if($customer === null) {
            throw new NotFoundHttpException('No se puede crear la orden solicitada porque el cliente seleccionado no existe');
        }

        $model = new Order();
        $model->customer_id = $customer->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['customer/orders', 'id' => $customer->id, 'highlight' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'customer' => $customer,
            ]);
        }
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    /*public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }*/

    /*
     * Updates an Order status
     *
     * @throws HttpException if model cannot save
     */
    public function actionUpdateStatus($id, $status)
    {
        $model = $this->findModel($id);
        //$model->scenario = Order::SCENARIO_STATUS_UPDATE;

        $model->status = $status;

        if ($model->save()) {
            //return $this->redirect(['customer/orders', 'id' => $model->customer->id]);
            return $this->redirect(Yii::$app->request->referrer);
        }

        throw new HttpException('No se pudo completar la operacion.');
    }

    public function actionSearch() {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('search', [
            'searchModel' => $searchModel,
            'dtaProvider' => $dataProvider,
        ]);
    }

    /*
     * Sends an email to a test address
     */
    public function actionSendMailTest()
    {
        $response = Order::sendMail(
            Yii::$app->params['api.emailFrom'],
            Yii::$app->params['api.emailToTest'],
            'Tu orden esta lista',
            'Juan Gonzalez',
            '1'
        );

        return $this->render('send-mail-test', [
            'response' => $response
        ]);
    }

    /*
     * Renders an email template. A preview of what is sent to customers
     */
    public function actionPreviewMail() {
        $mailTemplate = Order::getMailTemplate(
            'Jose Perez',
            '1'
        );

        $this->layout = false;

        return $this->renderContent($mailTemplate);
    }

    /*
     * Searches an Order model by id
     */
    public function actionIndividualSearch()
    {
        //search model
        $searchModel = new Order();
        $searchModel->scenario = Order::SCENARIO_SEARCH;

        if ($searchModel->load($post = Yii::$app->request->post()) && $searchModel->validate()) {

            $session = Yii::$app->session;

            //query model
            if (($model = Order::find()->where(['id' => $post['Order']['id']])->one()) !== null) {
                $session->setFlash('model', $model);
            }
            else {
                $session->setFlash('modelNotFound');
            }

            $session->setFlash('modelId', $post['Order']['id']);
            return $this->refresh();
        }

        return $this->render('individual-search', [
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La página solicitada no existe.');
        }
    }
}