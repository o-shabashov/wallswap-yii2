<?php
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/**
 * @var  yii\web\View       $this
 * @var  ActiveDataProvider $dataProvider
 */
echo ListView::widget([
    'options'      => ['class' => 'non-ajax-list-view'],
    'dataProvider' => $dataProvider,
    'layout'       => '
        <div class="row">
            <ul class="items">{items}</ul>
        </div>
    ',
    'itemView'     => '@app/views/wallpaper/thumbnail',
    'itemOptions'  => [
        'tag'   => 'li',
        'class' => 'item'
    ],
]);
