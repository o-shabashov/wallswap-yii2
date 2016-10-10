<?php
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

/**
 * @var yii\web\View       $this
 * @var ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('app', 'Wallpapers upload, step 2') . Yii::$app->params['titlePostfix'];
?>
<section id="upload" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="center-heading text-center">
                    <h2><?= Yii::t('app', 'Queue') ?></h2>
                    <span class="icon"><i class="fa fa-user"></i></span>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center wow animated fadeInUp" data-wow-duration="700ms" data-wow-delay="300ms">
                <p class="lead margin-btm-30">
                    <?= Yii::t('app', 'Queue of uploaded wallpapers. Please, set proper purity first and then click "Finish" button') ?>
                </p>
                <p>
                    <button class="btn btn-sm btn-success all-set-purity"
                            data-url="<?= Url::toRoute(['/wallpaper/queue-set-purity']) ?>"
                            data-purity="sfw">SFW
                    </button>

                    <button class="btn btn-sm btn-warning all-set-purity"
                            data-url="<?= Url::toRoute(['/wallpaper/queue-set-purity']) ?>"
                            data-purity="sketchy">SKETCHY
                    </button>

                    <button class="btn btn-sm btn-danger all-set-purity"
                            data-url="<?= Url::toRoute(['/wallpaper/queue-set-purity']) ?>"
                            data-purity="nsfw">NSFW
                    </button>
                    <a href="<?= Url::to(['wallpaper/queue-finish']) ?>" class="btn btn-info"><?= Yii::t('app', 'Finish') ?></a>
                </p>


            </div>
        </div>

        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <?php
                echo $this->render('_list_wallpapers', ['dataProvider' => $dataProvider, 'afterSearchNavBar' => false]);
                ?>
            </div>
        </div>
    </div>
</section>

