<?php
use yii\bootstrap\NavBar;

NavBar::begin([
    'brandLabel' => Yii::t('app', 'Wallswap'),
    'brandUrl'   => Yii::$app->homeUrl,
    'options'    => [
        'class' => 'navbar navbar-inverse',
    ],
]);

NavBar::end();
