<?php
use app\models\Wallpaper;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var Wallpaper    $model
 */
?>
<div class="item-img-wrap img-hover img-<?= $model->purity ?>">
    <a href="<?= Url::to(['wallpaper/view', 'id' => $model->id]) ?>" target="_blank">
        <?= $this->render('_lazy_img', ['model' => $model]) ?>
    </a>
</div>
