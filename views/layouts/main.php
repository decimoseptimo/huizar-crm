<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<div class="logo"><img src="' . Yii::getAlias("@web") . '/img/huizar-top.png" alt=""><span>Huizar POS</span></div>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            //['label' => 'About', 'url' => ['/site/about']],
            //['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
                ['label' => 'Ingresar', 'url' => ['/site/login']] :
                [
                    'label' => 'Salir (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="copyright pull-left"><b>Limpiaduria Huizar de Mexicali S.A. </b>Prestigio sin mancha<span class="lighten">. © 2016</span></p>
        <p class="developer-credits pull-right">Desarrollado por <a href="http://www.azulacero.mx" alt="azulacero.mx" title="Azulacero, agencia interactiva"><img src="<?= Yii::getAlias('@web'); ?>/img/copyright.png" alt="azulacero logo"></a></p>
    </div>
</footer>

<?php $this->endBody() ?>

</body>
</html>

<?php $this->endPage() ?>