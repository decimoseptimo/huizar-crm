<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'Ver';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->fullName;
?>

<div class="customer-view">
    <div class="page-header">
        <h1><?= Html::encode($model->fullName) . '<span class="lighten"><span class="separator"> / </span>' . Html::encode($this->title) . '</span>'; ?></h1>
        <div class="action-menu">
            <?= Html::a('<i class="glyphicon glyphicon-pencil "></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-default bg-default btn-sm item', 'title' => 'Actualizar']) ?><!--
            --><?= Html::a('<i class="glyphicon glyphicon-remove"></i>', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-sm item',
                'title' => 'Eliminar',
                'data' => [
                    'confirm' => 'Esta usted seguro de querer eliminar este elemento?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        //'template' => '<tr><th>{label}</th><td class="datetime">{value}</td></tr>',
        'template' => function ($attribute, $index, $this) {
            return ($index == 3 || 4) ? '<tr><th>' . $attribute['label'] . '</th><td class="datetime">' . $attribute['value'] . '</td></tr>' : '<tr><th>' . $attribute['label'] . '</th><td>' . $attribute['value'] . '</td></tr>';
        },
        'attributes' => [
            //'id',
            'first_name',
            'last_name',
            'email:email',
            //'created_at:datetime',
            [
                'format' => 'raw',
                'attribute' => 'created_at',
                'value' => isset($model->created_at) ? Yii::$app->formatter->asDate($model->created_at) . '&nbsp;&nbsp;<span class="lighten time" title="' . Yii::$app->formatter->asTime($model->created_at, 'php:h:i:s A') . '">' . Yii::$app->formatter->asTime($model->created_at) . '</span>' : '--',
            ],
            [
                'format' => 'raw',
                'attribute' => 'updated_at',
                'value' => isset($model->updated_at) ? Yii::$app->formatter->asDate($model->updated_at) . '&nbsp;&nbsp;<span class="lighten time" title="' . Yii::$app->formatter->asTime($model->updated_at, 'php:h:i:s A') . '">' . Yii::$app->formatter->asTime($model->updated_at) . '</span>' : '--',
            ],
        ],
        'options' => ['class' => 'table table-bordered detail-view'],
    ]) ?>
</div>