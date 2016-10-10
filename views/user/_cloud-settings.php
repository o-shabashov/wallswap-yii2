<?php
use app\models\ext\CloudSettings;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View  $this
 * @var CloudSettings $model
 * @var ActiveForm    $form
 */

if (Yii::$app->user->identity->dropbox) {
    $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'action'                 => Url::to(['update-cloud-settings'])
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
    echo $form->field($model, 'resolution')
              ->dropDownList(
                  [
                      20  => '1024x768',
                      9   => '1280x800',
                      10  => '1366x768',
                      102 => '1280x960',
                      33  => '1280x1024',
                      8   => '1600x900',
                      36  => '1600x1200',
                      5   => '1680x1050',
                      3   => '1920x1080 Full HD',
                      4   => '1920x1200',
                      7   => '2560x1440',
                      6   => '2560x1600',
                      16  => '3840x1080',
                      63  => '3840x2160 4K',
                      272 => '5760x1080',
                  ],
                  ['prompt' => Yii::t('app', 'Resolution')]
              );
    echo Html::endTag('section');


    echo Html::beginTag('section');
    echo $form->field($model, 'is_active', ['options' => ['class' => 'inline']])
              ->checkbox([
                  'data' => [
                      'size'       => 'small',
                      'on-text'    => '<i class="fa fa-check"></i>',
                      'off-text'   => '<i class="fa fa-remove"></i>',
                      'label-text' => '<i class="fa fa-cloud"></i>',
                      'on-color'   => 'success',
                  ]
              ])
              ->label(false);

    echo Html::tag('span', ' ' . Yii::t('app', 'Upload wallpapers every 3 days'));
    echo Html::endTag('section');

    echo Html::beginTag('section');
    echo Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']);
    echo Html::endTag('section');

    ActiveForm::end();
}