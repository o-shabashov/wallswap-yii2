<?php
use app\assets\DropZoneAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 */
DropZoneAsset::register($this);

$this->title = Yii::t('app', 'Wallpapers upload, step 1') . Yii::$app->params['titlePostfix'];
?>
<section id="upload" class="section-padding">
    <div class="container">
        <?php
        $form = ActiveForm::begin([
            'id'      => 'wallpapersUpload',
            'options' => ['class' => 'dropzone'],
        ]);

        ActiveForm::end();
        ?>
    </div>
</section>

<div class="divided-50"></div>

<div class="cta-3">
    <div class="container text-center">
        <p class=" wow animated fadeInDown" data-wow-duration="700ms" data-wow-delay="100ms">
            <a href="<?= Url::to(['queue']) ?>" class="btn btn-border-white btn-lg"><?= Yii::t('app', 'Next') ?></a>
        </p>
    </div>
</div>

<div class="divided-50"></div>


<?php
$this->registerJs("Dropzone.options.wallpapersUpload = {
        acceptedFiles: 'image/*'
    };");
?>
