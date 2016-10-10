<?php
use app\models\Search;
use yii\data\ActiveDataProvider;

/**
 * @var yii\web\View       $this
 * @var ActiveDataProvider $dataProvider
 * @var Search             $search
 */

if (!$this->title) {
    $this->title = Yii::t('app', 'Wallpapers') . Yii::$app->params['titlePostfix'];
}
if (!Yii::$app->request->isAjax) {
    echo $this->render('@app/views/site/_search-navbar', ['model' => $search]);
}
echo $this->render('@app/views/wallpaper/_list_wallpapers', ['dataProvider' => $dataProvider, 'afterSearchNavBar' => true]);