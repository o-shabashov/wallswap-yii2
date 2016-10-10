<?php
use app\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var User         $model
 * @var ActiveForm   $form
 */

$form = ActiveForm::begin([
    'enableClientValidation' => false,
]);

echo Html::beginTag('section');
echo $form->field($model, 'show_sfw', ['options' => ['class' => 'inline']])
          ->checkbox([
              'data' => [
                  'size'       => 'small',
                  'on-text'    => '<i class="fa fa-check"></i>',
                  'off-text'   => '<i class="fa fa-remove"></i>',
                  'on-color'   => 'success',
                  'label-text' => 'SFW'
              ]
          ])
          ->label(false);

echo $form->field($model, 'show_sketchy', ['options' => ['class' => 'inline']])
          ->checkbox([
              'data' => [
                  'size'       => 'small',
                  'on-text'    => '<i class="fa fa-check"></i>',
                  'off-text'   => '<i class="fa fa-remove"></i>',
                  'on-color'   => 'warning',
                  'label-text' => 'Sketchy'
              ]
          ])
          ->label(false);

echo $form->field($model, 'show_nsfw', ['options' => ['class' => 'inline']])
          ->checkbox([
              'data' => [
                  'size'       => 'small',
                  'on-text'    => '<i class="fa fa-check"></i>',
                  'off-text'   => '<i class="fa fa-remove"></i>',
                  'on-color'   => 'danger',
                  'label-text' => 'NSFW'
              ]
          ])
          ->label(false);
echo Html::endTag('section');

echo Html::beginTag('section');
echo Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']);
echo Html::endTag('section');

ActiveForm::end();
