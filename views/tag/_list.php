<?php
use app\models\ext\Tag;

/**
 * @var yii\web\View $this
 * @var Tag          $model
 */
?>
<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
    <p>
        <?= $this->render('_item', ['model' => $model]); ?>
    </p>
</div>