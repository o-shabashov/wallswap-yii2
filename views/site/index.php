<?php
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/**
 * @var yii\web\View       $this
 * @var string|false       $authUrl
 * @var ActiveDataProvider $wallpapers
 */

$this->title = Yii::t('app', 'Wallswap');
?>

<?php if (\Yii::$app->user->isGuest): ?>
    <div align="center">
        <a href="<?= $authUrl ?>">
            <img src="images/wallswap-02.png" alt="" width="250">
        </a>
    </div>
<?php endif ?>

<?php
echo ListView::widget([
    'options'      => ['class' => 'non-ajax-list-view'],
    'dataProvider' => $wallpapers,
    'layout'       => '
        <div class="row">
            <ul class="items">{items}</ul>
        </div>
    ',
    'itemView'     => '@app/views/wallpaper/thumbnail',
    'itemOptions'  => [
        'tag'   => 'li',
        'class' => 'item',
    ],
]);
?>
