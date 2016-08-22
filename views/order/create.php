<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Crear Orden';
$this->params['breadcrumbs'][] = ['label' => 'Ordenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="order-create">

    <div class="page-header">
        <h1><?= Html::encode($model->customer->fullName) . '<span class="lighten"><span class="separator"> / </span>' . Html::encode($this->title) . '</span>'; ?></h1>
        <div class="right-area">
        </div>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'customer' => $customer,
    ]) ?>

</div>