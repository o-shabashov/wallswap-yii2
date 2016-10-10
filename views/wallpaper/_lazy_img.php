<?php
use app\models\Wallpaper;

/**
 * @var yii\web\View $this
 * @var Wallpaper    $model
 */
$height = round($model->resolution->height / $model->resolution->width * Yii::$app->params['wallpaperThumbWidth']);
?>
<div style="width: <?= Yii::$app->params['wallpaperThumbWidth'] ?>px; height: <?= $height ?>px">

    <img class="lazy"
         style="width: <?= Yii::$app->params['wallpaperThumbWidth'] ?>px; height: <?= $height ?>px"
         data-original="<?= $model->thumbUrl ?>" alt="<?= $model->tagsAsString ?>"/>

    <noscript>
        <img class="img-responsive"
             src="<?= $model->thumbUrl ?>"alt="<?= $model->tagsAsString ?>"/>
    </noscript>

</div>
