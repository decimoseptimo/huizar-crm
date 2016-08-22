<?php

use yii\grid\GridView;
use yii\helpers\Html;
use app\models\Order;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;

$this->title = 'Ordenes';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fullName, 'url' => ['view', 'id'=>$model->id]];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/bootstrap-select.min.css');
$this->registerJsFile('@web/js/bootstrap-select.min.js', ['depends' => [BootstrapAsset::className(), JqueryAsset::className()]]);

//JUI Highlight
$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs('
    $(document).ready(function(){
        $(".juiHighlight").delay(250).effect("highlight", {color: "#ffff94", easing: "easeInQuad"}, 1250);
    });
');
?>

<div class="customer-orders">

    <div class="page-header">
        <h1><?= Html::encode($model->fullName) . '<span class="lighten"><span class="separator"> / </span>' . Html::encode($this->title) . '</span>'; ?></h1>
        <div class="action-menu">
            <select class="selectpicker item" data-style="btn btn-default btn-sm" data-width="fit" data-size="54">
                <option>Ultimas 48 hrs</option>
                <option>Todas</option>
            </select><!--
            --><?= Html::a('<span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Crear Orden', ['order/create', 'id' => $model->id], ['class' => 'btn btn-success btn-sm item']) ?>
        </div>
    </div>

    <?= GridView::widget([
        'rowOptions'=> function ($model, $key, $index, $grid) use($highlight) {
            return ($highlight == $model->id) ? ['class' => 'juiHighlight'] : null;
        },
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            //id,
            [
                'attribute' => 'number',
                'value' => function($model) {
                    return sprintf('%08d', $model->number);
            }],
            //'created_at:datetime',
            [
                'attribute' => 'created_at',
                'contentOptions' => ['class'=>'datetime'],
                'format' => 'raw',
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
            [
                'attribute' => 'status',
                'contentOptions' => ['class' => 'text-center'],
                'format' => 'raw',
                'value' => function($model) {
                    return ($model->status === Order::STATUS_IN_PROCESS) ? '<i title="En proceso" class="glyphicon glyphicon-minus-sign" style="color: orange"></i>' : '<i title="Finalizada" class="glyphicon glyphicon-ok-sign"  style="color: limegreen"></i>';
            }],
            [
                'format' => 'raw',
                'value' => function ($model) {
                    return ($model->status === Order::STATUS_IN_PROCESS) ? Html::a('Finalizar Orden', ['order/complete', 'id' => $model->id], ['class' => 'btn btn-default btn-block btn-sm']) : '<div class="btn btn-default btn-block btn-sm disabled">Finalizar Orden</div>';
            }],
        ],
    ]); ?>

</div>