<?php
use app\models\forms\SignInForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var SignInForm   $model
 * @var ActiveForm   $form
 */

$this->title = Yii::t('app', 'Sign In') . Yii::$app->params['titlePostfix'];
$form        = ActiveForm::begin([
    'options'     => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template'     => '{label}
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">{input}</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">{error}</div>',
        'labelOptions' => ['class' => 'col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label'],
    ],
]);
?>
<section id="sign-in" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="center-heading text-center">
                    <h2><?= Yii::t('app', 'Sign In') ?></h2>
                    <span class="icon"><i class="fa fa-sign-in"></i></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center wow animated fadeInUp" data-wow-duration="700ms" data-wow-delay="300ms">
                <p class="lead margin-btm-30">
                    <?= Yii::t('app', 'Please fill out the following fields to sign in') ?>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?php
                echo $form->field($model, 'email');
                echo $form->field($model, 'password')->passwordInput();
                ?>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <?= Html::submitButton(Yii::t('app', 'Sign In'), ['class' => 'btn btn-theme btn-lg']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="divided-50"></div>

    <div class="cta">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 margin-btm-30 text-center">
                    <h3>
                        <?= Yii::t('app', 'You can sign in with cloud services.') ?> <?= Yii::t('app', 'More clouds will be available soon.') ?>
                        <a href="<?= Url::to(['dropbox/auth-start']) ?>" class="btn btn-theme btn-lg"><i class="fa fa-dropbox"></i> <?= Yii::t('app', 'Dropbox') ?></a>
                    </h3>

                </div>
            </div>
        </div>
    </div>

    <div class="divided-50"></div>
</section>

<?php ActiveForm::end(); ?>
