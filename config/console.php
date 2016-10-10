<?php
Yii::setAlias('@tests', dirname(__DIR__) . '/tests');
Yii::setAlias('@web', dirname(__DIR__) . '/web');

if (YII_ENV_DEV) {
    Yii::setAlias('@cdn', "//{$_SERVER['HTTP_HOST']}");
} else {
    Yii::setAlias('@cdn', '//cdn.wallswap.us');
}

return [
    'id'                  => 'basic-console',
    'basePath'            => dirname(__DIR__),
    'bootstrap'           => ['log'],
    'controllerNamespace' => 'app\commands',
    'components'          => [
        'cache'      => [
            'class' => 'yii\caching\FileCache',
        ],
        'log'        => [
            'targets' => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'filesystem' => [
            'class' => 'creocoder\flysystem\LocalFilesystem',
            'path'  => '@web/wallpapers',
        ],
        'db'         => require(__DIR__ . '/db.php'),
    ],
    'params'              => require(__DIR__ . '/params.php'),
];
