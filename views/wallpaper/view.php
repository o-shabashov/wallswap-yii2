<?php
use app\components\ReportWallpaperWidget;
use app\components\SourceWallpaperWidget;
use app\components\TagsWidget;
use app\models\Wallpaper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var Wallpaper    $model
 */

$titleTags                     = $model->tagsAsString ? "($model->tagsAsString)" : Yii::t('app', 'Wallpaper') . " #$model->id";
$this->title                   = $titleTags . Yii::$app->params['titlePostfix'];
$this->params['wallpaper-url'] = $model->url;
?>
<div class="divided-50"></div>

<section id="blog-wrapper" class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="blog-post-wrap">
                    <img src="<?= $model->url ?>" class="img-responsive" alt="<?= $model->tagsAsString ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 margin-btm-30">
                <div class="footer-col">
                    <h3 class="widget-title"><?= Yii::t('app', 'Purity') ?></h3>
                </div>

                <div class="footer-col">
                    <button class="btn btn-sm btn-success set-purity <?= $model->purity === 'sfw' ? 'active' : '' ?>"
                            data-wallpaper-id="<?= $model->id ?>"
                            data-url="<?= Url::toRoute(['/wallpaper/set-purity']) ?>"
                            data-purity="sfw">SFW
                    </button>

                    <button class="btn btn-sm btn-warning set-purity <?= $model->purity === 'sketchy' ? 'active' : '' ?>"
                            data-url="<?= Url::toRoute(['/wallpaper/set-purity']) ?>"
                            data-wallpaper-id="<?= $model->id ?>"
                            data-purity="sketchy">SKETCHY
                    </button>

                    <button class="btn btn-sm btn-danger set-purity <?= $model->purity === 'nsfw' ? 'active' : '' ?>"
                            data-url="<?= Url::toRoute(['/wallpaper/set-purity']) ?>"
                            data-wallpaper-id="<?= $model->id ?>"
                            data-purity="nsfw">NSFW
                    </button>

                </div>

            </div>

            <div class="col-sm-4 margin-btm-30">
                <div>
                    <h3 class="widget-title"><?= Yii::t('app', 'Info') ?></h3>
                </div>

                <div>
                    <p><strong><?= Yii::t('app', 'Resolution') ?>:</strong> <?= Yii::$app->formatter->asText($model->resolutionAsString) ?></p>

                    <p><strong><?= Yii::t('app', 'Tags') ?>:</strong> <?= Yii::$app->formatter->asText($model->tagsAsString) ?></p>

                    <p><strong><?= Yii::t('app', 'Uploaded') ?>
                            :</strong> <?= sprintf('%s %s %s', Yii::$app->formatter->asRelativeTime($model->created_at), Yii::t('app', 'by'), Html::a($model->user->name, [
                            'user/view',
                            'id' => $model->user->id
                        ])) ?></p>
                </div>

            </div>

            <div class="col-sm-4 margin-btm-30">
                <div class="footer-col">
                    <h3 class="widget-title"><?= Yii::t('app', 'Actions') ?></h3>
                </div>

                <div class="footer-col">
                    <p><?= TagsWidget::widget(['model' => $model]); ?></p>

                    <?= SourceWallpaperWidget::widget(['model' => $model]) ?>

                    <?= ReportWallpaperWidget::widget(['model' => $model]) ?>
                </div>

            </div>
        </div>
    </div>
</section>
