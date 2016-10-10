<?php
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var string       $name
 * @var string       $message
 * @var Exception    $exception
 */

$this->title = $name . Yii::$app->params['titlePostfix'];
?>
<section id="contact" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="center-heading text-center">
                    <h2><?= Html::encode($this->title) ?></h2>
                    <span class="icon"><i class="fa fa-close"></i></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center wow animated fadeInUp" data-wow-duration="700ms" data-wow-delay="300ms">
                <p class="lead margin-btm-30">
                    <?php
                    echo nl2br(Html::encode($message));
                    echo Yii::t('app', 'The above error occurred while the Web server was processing your request.');
                    echo Yii::t('app', 'Please contact us if you think this is a server error. Thank you.');
                    ?>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="cta-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="<?= Url::previous() ?>" class="btn btn-lg btn-border-white wow animated slideInLeft" data-wow-duration="700ms"
                   data-wow-delay="100ms"><?= Yii::t('app', 'Return back') ?></a>
            </div>
        </div>
    </div>
</section>

<div class="divided-50"></div>
