<?php
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\ListView;

/**
 * @var  yii\web\View       $this
 * @var  ActiveDataProvider $dataProvider
 * @var  bool               $afterSearchNavBar
 */
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'layout'       => '
    <section id="wallpapers-list" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">{summary}</div>
            </div>
            <div class="row">
                <ul class="items">{items}</ul>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">{pager}</div>
            </div>
        </div>
    </section>
    ',
    'options'      => ['class' => $afterSearchNavBar ? 'list-view after-search-navbar' : 'list-view'],
    'itemView'     => 'thumbnail',
    'itemOptions'  => [
        'tag'   => 'li',
        'class' => 'item'
    ],
    'emptyText'    => sprintf('%s %s', Yii::t('app', 'No wallpapers found.'), Html::a(Yii::t('app', 'Upload?'), ['wallpaper/upload'])),
]);
