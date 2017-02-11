<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="alert-simple">
        <i class="glyphicon glyphicon-alert"></i> Esta informacion debe corresponder con la de su punto de venta fisico.
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="row form-row-last">
        <div class="form-group form-group-a col-lg-3">
            <?= Html::submitButton('Guardar', ['class'=>'btn btn-primary']); ?><!--
        --><?= Html::a('Cancelar', $model->isNewRecord ? ['customer/index'] : ['customer/view', 'id'=>$model->id], ['class'=>'btn btn-default btn-gray']); ?>
            <?php //echo Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
