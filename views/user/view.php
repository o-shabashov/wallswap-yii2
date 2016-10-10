<?php
use app\components\EntityHeaderWidget;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

/**
 * @var yii\web\View       $this
 * @var User               $model
 * @var ActiveDataProvider $dataProvider
 */

$this->title = "$model->name profile" . Yii::$app->params['titlePostfix'];
if (!Yii::$app->request->isAjax) {
    echo EntityHeaderWidget::widget(['model' => $model]);
}
?>

<section class="cta-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="<?= Url::to(['user/update', 'id' => Yii::$app->user->identity->user->id]) ?>"
                   class="btn btn-lg btn-border-white wow animated slideInLeft"
                   data-wow-duration="700ms" data-wow-delay="100ms"><?= Yii::t('app', 'Settings') ?></a>
            </div>
        </div>
    </div>
</section>
<div class="divided-50"></div>

<?= $this->render('@app/views/wallpaper/_list_wallpapers', ['dataProvider' => $dataProvider, 'afterSearchNavBar' => false]); ?>

