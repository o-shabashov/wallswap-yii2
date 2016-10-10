<?php
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var User         $model
 */

if (Yii::$app->user->identity->dropbox) {
    echo Html::button('<i class="fa fa-dropbox"></i> ' . Yii::t('app', 'Connected'), ['class' => 'btn btn-lg btn-success', 'disabled']);
} else {
    echo Html::a('<i class="fa fa-dropbox"></i> ' . Yii::t('app', 'Connect Dropbox'), Url::to(['dropbox/auth-start']), ['class' => 'btn btn-lg btn-primary']);
}
