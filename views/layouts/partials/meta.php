<?php
use yii\helpers\Url;

?>
<meta charset="<?= Yii::$app->charset ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>

<!-- SEO -->
<meta name="author" content="<?= Yii::t('app', 'Oleg Shabashov') ?>">
<meta name="description" content="<?= Yii::t('app', 'The best wallpapers delivered to your cloud based on your preferences') ?>"/>
<meta name="keywords" content="<?= Yii::t('app', 'wallpapers, wallpaper, free, download, cloud, search wallpaper, swap wallpaper, cloud-sync wallpapers') ?>"/>
<link rel="canonical" href="<?= Url::to('', true) ?>">

<!-- Pinterest confirm -->
<meta name="p:domain_verify" content="ca1982fc2dc5d9d714c2f90b2f15fba5"/>

<!-- Google confirm -->
<meta name="google-site-verification" content="3w7kOEz1jmz5ULh-MRL2jqgXUzX5MPuPELhg-Y0Fwbw"/>

<!-- Social: Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@WallswapUs">
<meta name="twitter:creator" content="<?= Yii::t('app', 'Oleg Shabashov') ?>">
<meta name="twitter:title" content="<?= $this->title ?>">
<meta name="twitter:description" content="<?= Yii::t('app', 'The best wallpapers delivered to your cloud based on your preferences') ?>">
<meta name="twitter:image:src" content="<?= Url::to("@cdn/images/ico/favicon-128.png", true) ?>">

<!-- Social: Facebook / Open Graph -->
<meta property="og:url" content="<?= Url::to('', true) ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= $this->title ?>">
<meta property="og:image"
      content="<?= isset($this->params['wallpaper-url']) ? $this->params['wallpaper-url'] : Url::to("@cdn/images/ico/wallswap-logo-dark.png", true) ?>"/>
<meta property="og:description" content="<?= Yii::t('app', 'The best wallpapers delivered to your cloud based on your preferences') ?>">
<meta property="og:site_name" content="Wallswap.us">
<meta property="article:author" content="https://www.facebook.com/wallswap">
<meta property="article:publisher" content="https://www.facebook.com/wallswap">

<!-- Fav icons -->
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= Url::to("@cdn/images/ico/apple-touch-icon-57x57.png", true) ?>"/>
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= Url::to("@cdn/images/ico/apple-touch-icon-114x114.png", true) ?>"/>
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= Url::to("@cdn/images/ico/apple-touch-icon-72x72.png", true) ?>"/>
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= Url::to("@cdn/images/ico/apple-touch-icon-144x144.png", true) ?>"/>
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= Url::to("@cdn/images/ico/apple-touch-icon-60x60.png", true) ?>"/>
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= Url::to("@cdn/images/ico/apple-touch-icon-120x120.png", true) ?>"/>
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= Url::to("@cdn/images/ico/apple-touch-icon-76x76.png", true) ?>"/>
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= Url::to("@cdn/images/ico/apple-touch-icon-152x152.png, true") ?>"/>
<link rel="icon" type="image/png" href="<?= Url::to("@cdn/images/ico/favicon-196x196.png", true) ?>" sizes="196x196"/>
<link rel="icon" type="image/png" href="<?= Url::to("@cdn/images/ico/favicon-96x96.png", true) ?>" sizes="96x96"/>
<link rel="icon" type="image/png" href="<?= Url::to("@cdn/images/ico/favicon-32x32.png", true) ?>" sizes="32x32"/>
<link rel="icon" type="image/png" href="<?= Url::to("@cdn/images/ico/favicon-16x16.png", true) ?>" sizes="16x16"/>
<link rel="icon" type="image/png" href="<?= Url::to("@cdn/images/ico/favicon-128.png", true) ?>" sizes="128x128"/>

<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF"/>
<meta name="msapplication-TileImage" content="<?= Url::to("@cdn/images/ico/mstile-144x144.png", true) ?>"/>
<meta name="msapplication-square70x70logo" content="<?= Url::to("@cdn/images/ico/mstile-70x70.png", true) ?>"/>
<meta name="msapplication-square150x150logo" content="<?= Url::to("@cdn/images/ico/mstile-150x150.png", true) ?>"/>
<meta name="msapplication-wide310x150logo" content="<?= Url::to("@cdn/images/ico/mstile-310x150.png", true) ?>"/>
<meta name="msapplication-square310x310logo" content="<?= Url::to("@cdn/images/ico/mstile-310x310.png", true) ?>"/>