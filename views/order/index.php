<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\JqueryAsset;
use app\models\Order;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ordenes';
$this->params['breadcrumbs'][] = [
    'encode' => false,
    'label' => '<span class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Ordenes <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>' . Html::a("Clientes", ["customer/index"]) . '</li>
            </ul>
        </span>
    ',
];

//Bootstrap Select
$this->registerCssFile('@web/css/bootstrap-select.min.css', ['depends' => [BootstrapAsset::className()]]);
$this->registerJsFile('@web/js/bootstrap-select.min.js', ['depends' => [JqueryAsset::className()]]);

//Boostrap Datepicker
$this->registerCssFile('@web/css/bootstrap-datepicker.min.css', ['depends' => [BootstrapPluginAsset::className()]]);
$this->registerJsFile('@web/js/bootstrap-datepicker.min.js', ['depends' => [JqueryAsset::className()]]);
$this->registerJsFile('@web/js/bootstrap-datepicker.es.min.js', ['depends' => [BootstrapPluginAsset::className()]]);
$this->registerJs("
    $('#datepicker').datepicker({
        maxViewMode: 0,
        autoclose: true,
        showOnFocus: false,
        format: 'yyyy/mm/dd',
        //language: 'es-MX',
        language: '" . Yii::$app->language . "',
        todayHighlight: true,
        //orientation: 'bottom',
        templates: {
            leftArrow: '<i class=\"glyphicon glyphicon-chevron-left\"></i>',
            rightArrow: '<i class=\"glyphicon glyphicon-chevron-right\"></i>',
        },
    });
");
?>

<div class="order-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="action-menu">
            <?= $this->render('_search', ['model' => $searchModel, 'allowedTimeUnits' => $allowedTimeUnits]); ?>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            /*[
                'attribute' => 'id',
                'filter' => false,
            ],*/
            [
                'attribute' => 'id',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a(sprintf('%08d', $model->id), ['customer/orders', 'id'=>$model->customer->id, 'highlight'=>$model->id]);
                },
                'filterOptions' => ['class' => 'input-container'],
            ],
            [
                'attribute' => 'created_at',
                'contentOptions' => ['class'=>'datetime'],
                'format' => 'raw',
                'filter' => '
                    <div class="input-group date" id="datepicker">
                        <input type="text" name="OrderSearch[createdAtDate]" class="form-control" value="' . $searchModel['createdAtDate'] . '">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                    </div>
                ',
                'filterOptions' => ['class' => 'datepicker-container'],
                'value' => function($model) {
                    return Yii::$app->formatter->asDate($model->created_at) . '&nbsp;&nbsp;<span class="lighten time" title="' . Yii::$app->formatter->asTime($model->created_at, 'php:h:i:s A') . '">' . Yii::$app->formatter->asTime($model->created_at) . '</span>';
            }],
            [
                'attribute' => 'finished_at',
                'contentOptions' => ['class'=>'datetime'],
                'format' => 'raw',
                'value' => function($model) {
                    return isset($model->finished_at) ? Yii::$app->formatter->asDate($model->finished_at) . '&nbsp;&nbsp;<span class="lighten time" title="' . Yii::$app->formatter->asTime($model->finished_at, 'php:h:i:s A') . '">' . Yii::$app->formatter->asTime($model->finished_at) . '</span>' : '--';
            }],
            //'customer.fullName',
            [
                'attribute' => 'customer',
                'format' => 'raw',
                'label' => 'Cliente',
                'value' => function ($model){
                    return Html::a($model->customer->fullName, ['customer/view', 'id'=>$model->customer->id]);
            }],
            [
                'attribute' => 'status',
                'contentOptions' => ['class' => 'text-center'],
                'format' => 'raw',
                'value' => function($model) {
                    return Order::getStatusIcon($model->status);
            }],
            [
                'format' => 'raw',
                'value' => function ($model) {
                    switch ($model->status){
                        case Order::STATUS_RECEIVED:
                            $return = Html::a('Marcar lista', ['order/update-status', 'id' => $model->id, 'status'=> Order::STATUS_READY_TO_DELIVER], ['class' => 'btn btn-default btn-block btn-sm']);
                            break;
                        case Order::STATUS_READY_TO_DELIVER:
                            $return = Html::a('Marcar entregada', ['order/update-status', 'id' => $model->id, 'status'=> Order::STATUS_DELIVERED], ['class' => 'btn btn-default btn-block btn-sm']);
                            break;
                        case Order::STATUS_DELIVERED:
                            $return = '<div class="btn btn-default btn-block btn-sm disabled">Orden entregada</div>';
                            break;
                    }
                    return $return;
            }],
        ],
    ]); ?>

</div>