<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Huizar POS';
?>
<div class="site-index">

    <!--<div class="jumbotron">
        <h1>Huizar POS</h1>

        <p class="lead">Bienvenido.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Manual de operacion</a></p>
    </div>-->

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <a href="<?= Url::toRoute('customer/index'); ?>" class="panel panel-default">
                    <div class="panel-body text-primary">
                        <h2>Administración de Clientes <span class="lighten">y Ordenes</span></h2>
                        <p>Búsqueda, visualización, y mantenimiento de clientes. Asi como visualización, y mantenimiento de sus ordenes.</p>
                        <div class="pull-right access-btn">Accesar <i class="glyphicon glyphicon-arrow-right"></i></div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6">
                <a href="<?= Url::toRoute('order/index'); ?>" class="panel panel-default">
                    <div class="panel-body text-primary">
                        <h2>Consulta de Ordenes</h2>
                        <p>Búsqueda, visualización, y mantenimiento de ordenes.<br>&nbsp;</p>
                        <div class="pull-right access-btn">Accesar <i class="glyphicon glyphicon-arrow-right"></i></div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-lg-offset-6">
                <a href="<?= Url::toRoute('order/individual-search'); ?>" class="panel panel-default">
                    <div class="panel-body text-primary">
                        <h2>Consulta tu Orden</h2>
                        <p>Consulta el estado de tu orden con el "número de orden" impreso en tu ticket.<br>&nbsp;</p>
                        <div class="pull-right access-btn">Accesar <i class="glyphicon glyphicon-arrow-right"></i></div>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>
