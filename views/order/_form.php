<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <div class="row form-row-last">
        <div class="form-group col-lg-3">
            <?= Html::submitButton('Guardar', ['class'=>'btn btn-primary']); ?><!--
            --><?= Html::a('Cancelar', Yii::$app->request->referrer, ['class'=>'btn btn-default btn-gray']); ?>
        </div>
        <div class="col-lg-9">
        <div class="alert alert-danger-2">
            <i class="glyphicon glyphicon-exclamation-sign glyphicon-first"></i>
            Por favor cersiorese que esta informacion corresponda con la de su punto de venta fisico.
        </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>