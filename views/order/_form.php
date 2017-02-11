<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <div class="alert-simple">
        <i class="glyphicon glyphicon-alert"></i> Esta informacion debe corresponder con la de su punto de venta fisico.
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <div class="row form-row-last">
        <div class="form-group form-group-a col-lg-3">
            <?= Html::submitButton('Guardar', ['class'=>'btn btn-primary']); ?><!--
            --><?= Html::a('Cancelar', Yii::$app->request->referrer, ['class'=>'btn btn-default btn-gray']); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>