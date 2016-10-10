<?php
use app\models\User;

/**
 * @var yii\web\View $this
 * @var User         $model
 */

$this->title = Yii::t('app', 'Profile update') . Yii::$app->params['titlePostfix'];
?>
<section id="settings" class="section-padding">
    <div class="container">

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="center-heading text-center">
                            <h2><?= Yii::t('app', 'Site settings') ?></h2>
                            <span class="icon"><i class="fa fa-user"></i></span>
                        </div>

                    </div>
                </div>

                <?= $this->render('_form', ['model' => $model]) ?>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="center-heading text-center">
                            <h2><?= Yii::t('app', 'Available clouds') ?></h2>
                            <span class="icon"><i class="fa fa-user"></i></span>
                        </div>

                    </div>
                </div>

                <?= $this->render('_available-clouds', ['model' => $model]); ?>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="center-heading text-center">
                            <h2><?= Yii::t('app', 'Cloud sync settings') ?></h2>
                            <span class="icon"><i class="fa fa-user"></i></span>
                        </div>

                    </div>
                </div>

                <?= $this->render('_cloud-settings', ['model' => $model->cloudSettings]); ?>
            </div>
        </div>
    </div>
</section>
