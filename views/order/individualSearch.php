<?php

use yii\helpers\Html;

$this->title = 'Consulta tu orden';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-header">
    <h1>Consulta tu Orden</h1>
</div>

    <?php if(Yii::$app->session->hasFlash('orderReady')): ?>

    <div class="panel"><div class="panel-body text-success bg-success">Buen día <?= Html::encode(Yii::$app->session->getFlash('model')->customer->first_name); ?>, tu orden está lista.
    <br>Puedes pasar a recoger tus prendas en nuesto horario de atención de 7:30 AM a 8:00 PM. Gracias.</div></div>

    <?php elseif(Yii::$app->session->hasFlash('orderNotReady')): ?>

        <div class="panel"><div class="panel-body text-warning bg-warning">Buen dia <?= Html::encode(Yii::$app->session->getFlash('model')->customer->first_name); ?>, aún no tenemos lista tu orden pero seguimos trabajando en ella.
        <br>Si lo solicitaste en mostrador, recibirás una notificación por correo electrónico cuando este lista. Gracias.</div></div>

    <?php elseif(Yii::$app->session->hasFlash('orderDelivered')): ?>

        <div class="panel"><div class="panel-body text-info bg-info">Buen dia, la orden solicitada ya ha sido entregada.</div></div>

    <?php elseif(Yii::$app->session->hasFlash('orderNotFound')): ?>

        <div class="panel"><div class="panel-body text-danger bg-danger">Estimado Cliente,
        <br>No hemos podido encontrar la orden solicitada, verifique el número e intente nuevamente. Si el problema persiste llámenos a sucursal al (686)552.80.25. Disculpe las molestias.</div></div>

    <?php endif; ?>

<p>Por favor introduce el número de orden impreso en tu ticket.</p>

<?= $this->render('_search', ['model' => $model, 'value' => Yii::$app->session->getFlash('submittedId')]); ?>