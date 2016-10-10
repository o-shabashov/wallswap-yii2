<?php
use yii\bootstrap\NavBar;

NavBar::begin([
    'brandLabel' => Yii::t('app', 'Wallswap'),
    'brandUrl'   => Yii::$app->homeUrl,
    'options'    => [
        'class' => 'navbar navbar-inverse',
    ],
]);

if (Yii::$app->user->isGuest) {
    $items = [
        ['label' => Yii::t('app', 'Sign In'), 'url' => ['site/sign-in']],
        ['label' => Yii::t('app', 'Register'), 'url' => ['site/register']],
    ];
} else {
    $items = [
        [
            'label' => Yii::$app->user->identity->email,
            'url'   => ['user/view', 'id' => Yii::$app->user->identity->id],
        ],
    ];
}

NavBar::end();
