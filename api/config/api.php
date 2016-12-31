<?php

//$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'api',
    'basePath' => dirname(__DIR__).'/..',
    'bootstrap' => ['log'],
    'components' => [
        'urlManager'  => [
            'enablePrettyUrl'  => true,
            'showScriptName'  => false,
            'rules' => [
                [
                    'class'  => 'yii\rest\UrlRule',
                    'controller'  => [
                        'v1/customer'
                    ],
                ],
            ],
        ],
        'request' => [
            'parsers' => [
                'application/json'  => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
            'enableSession' => false,
            'loginUrl' => null,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile'  => '@api/runtime/logs/error.log',
                ],
            ],
        ],
        'db' => require(__DIR__ . '/../../config/db.php'),
    ],
    'modules' => [
        'v1' => [
            'class' => 'app\api\modules\v1\Module',
        ],
    ],
    'aliases' => [
        '@api' => dirname(dirname(__DIR__)) . '/api',
    ],
    //'params' => $params,
];

return $config;