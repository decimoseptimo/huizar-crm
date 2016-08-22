<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class'=>'btn btn-primary']); ?><!--
        --><?= Html::a('Cancelar', Yii::$app->request->referrer, ['class'=>'btn btn-default btn-gray']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>