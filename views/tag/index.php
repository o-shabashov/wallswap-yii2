<?php
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/**
 * @var yii\web\View       $this
 * @var ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('app', 'Tags') . Yii::$app->params['titlePostfix'];

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'layout'       => '
        <div class="row">
            <div class="col-lg-12 text-center">{summary}</div>
        </div>
        <div class="row">{items}</div>
        <div class="row">
            <div class="col-lg-12 text-center">{pager}</div>
        </div>
    ',
    'itemView'     => '_list',
    'itemOptions'  => ['class' => 'item'],
]);
