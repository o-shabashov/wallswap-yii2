<?php
use app\models\User;

if (YII_ENV_DEV) {
    Yii::setAlias('@cdn', "http://{$_SERVER['HTTP_HOST']}");
} else {
    Yii::setAlias('@cdn', 'https://cdn.wallswap.us');
}

$config = [
    'id'         => 'wallswap',
    'name'       => 'Wallswap.us',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'components' => [
        'i18n'         => [
            'translations' => [
                'app*' => [
                    'class'          => 'yii\i18n\PhpMessageSource',
                    'basePath'       => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap'        => [
                        'app'       => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [],
            ],
        ],
        'request'      => [
            'cookieValidationKey' => 'ygrfG4%tg$TYbEGbeTYhGDFGnDj',
        ],
        'urlManager'   => [
            'class'           => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
                '<controller:\w+>/<id:\d+>'              => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'          => '<controller>/<action>',
                'site'                                   => '/',
            ],
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'user'         => [
            'identityClass'   => User::class,
            'enableAutoLogin' => true,
            'loginUrl'        => ['sign-in'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer'       => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db'           => require(__DIR__ . '/db.php'),
    ],
    'params'     => require(__DIR__ . '/params.php'),
];

if (YII_ENV_DEV) {
    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
