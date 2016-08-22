<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        //'action' => ['search'],
        //'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'number', ['template' => "{input}\n{hint}\n{error}", 'inputOptions' => ['class' => 'form-control', 'value'=> $value]]); ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?><!--
        --><?= Html::resetButton('Borrar', ['class' => 'btn btn-default btn-gray']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>