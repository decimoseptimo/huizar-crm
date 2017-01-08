<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use app\models\Order;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = [
    'encode' => false,
    'label' => '<span class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>' . Html::a("Ordenes", ["order/index"]) . '</li>
            </ul>
        </span>
    ',
];

//Bootstrap Select
$this->registerCssFile('@web/css/bootstrap-select.min.css', ['depends' => [BootstrapAsset::className()]]);
$this->registerJsFile('@web/js/bootstrap-select.min.js', ['depends' => [JqueryAsset::className()]]);
?>

<div class="customer-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="action-menu">
            <select class="selectpicker item" data-style="btn btn-default btn-sm" data-width="fit" data-size="54">
                <option>últimas 72 horas</option>
                <option>últimos 7 días</option>
                <option selected>últimos 30 días</option>
            </select><!--
            --><?= Html::a('<span class="glyphicon glyphicon-plus-sign"></span> &nbsp;Crear Cliente', ['create'], ['class' => 'btn btn-success btn-sm item']) ?>
        </div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'customer table table-striped table-bordered'],
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'format' => 'raw',
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    return Html::a('<span class="glyphicon glyphicon-user text-warning" title="Ver cliente"></span>', ['customer/view', 'id' => $model->id], ['tooltip' => 'ver cliente']);
                }
            ],
            //'id',
            /*[
                'attribute' => 'id',
                'filterOptions' => ['class' => 'id-filter'],
                'contentOptions' => ['class' => 'id-content'],
            ],*/
            'first_name',
            'last_name',
            'email:email',
            [
                'attribute' => 'Ordenes',
                'format' => 'raw',
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    //$ordersCount = count($model->orders);
                    $ordersCount = $model->getOrders()->count();
                    $completedOrdersCount = $model->getOrders()->where(['status' => Order::STATUS_DELIVERED])->count();

                    if($ordersCount == 0) {
                        $text = '0 / 0';
                        $class = 'label custom label-info';
                        $tooltip = 'Sin ordenes';
                    } else if ($completedOrdersCount < $ordersCount) {
                        $text = $completedOrdersCount . ' / ' . $ordersCount;
                        $class = 'label custom label-blue-1';
                        $tooltip = $completedOrdersCount . ' de ' . $ordersCount . ' finalizadas';
                    } else {
                        $text = $ordersCount . ' / ' . $ordersCount;
                        $class = 'label custom label-blue-2';
                        $tooltip = 'Todas finalizadas';
                    }

                    return HTML::a($text, ['customer/orders', 'id' => $model->id], ['class' => $class, 'title' => $tooltip]);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                //'header' => 'Crear Orden',
                'template' => '{new-order}',
                'buttons' => [
                    'new-order' => function ($url,$model) {
                        return Html::a('Crear Orden', ['order/create', 'id' => $model->id], ['class' => 'btn btn-default btn-sm btn-block']);
                    },
                ],
            ],
        ],
    ]); ?>


</div>