<?php

/**
 * @var yii\web\View $this
 * @var string|false $authUrl
 */

$this->title = Yii::t('app', 'Wallswap');
?>

<?php if (\Yii::$app->user->isGuest): ?>
    <a href="<?= $authUrl ?>" class="btn btn-theme btn-lg"><i class="fa fa-dropbox"></i> <?= Yii::t('app', 'Dropbox') ?>
    </a>
<?php endif ?>
