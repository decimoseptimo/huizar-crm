<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fullName, 'url' => ['view', 'id'=>$model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="customer-update">

    <div class="page-header">
        <h1><?= Html::encode($model->fullName) . '<span class="lighten"><span class="separator"> / </span>' . Html::encode($this->title) . '</span>'; ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>