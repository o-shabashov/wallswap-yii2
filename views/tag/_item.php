<?php
use app\models\ext\Tag;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var Tag $model
 */

switch ($model->purity) {
    case 'sfw':
        $class = 'success';
        break;

    case 'sketchy':
        $class = 'warning';
        break;

    case 'nsfw':
        $class = 'danger';
        break;

    default:
        break;
}
?>
<a href="<?= Url::toRoute(['/tag/view', 'id' => $model->id]) ?>"
   class="tag text-<?= $class ?>"><?= $model->name; ?>
</a>