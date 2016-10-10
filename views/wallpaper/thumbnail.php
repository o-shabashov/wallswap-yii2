<?php
use app\models\Wallpaper;

/**
 * @var yii\web\View $this
 * @var Wallpaper    $model
 */
?>
<div class="item-img-wrap img-hover">
    <a href="<?= $model->url ?>" target="_blank">
        <img class="img-responsive" src="<?= $model->thumb_url ?>" style="min-width: 300px"/>
    </a>
</div>
