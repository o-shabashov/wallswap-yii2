<?php
use app\components\EntityHeaderWidget;
use app\models\ext\Tag;
use yii\data\ActiveDataProvider;

/**
 * @var yii\web\View       $this
 * @var Tag                $model
 * @var ActiveDataProvider $dataProvider
 */

$this->title = "#$model->name" . Yii::$app->params['titlePostfix'];

if (!Yii::$app->request->isAjax) {
    echo EntityHeaderWidget::widget(['model' => $model]);
}

echo $this->render('@app/views/wallpaper/_list_wallpapers', ['dataProvider' => $dataProvider, 'afterSearchNavBar' => false]);