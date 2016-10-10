<?php
use app\assets\AppAsset;
use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var string        $content
 */

AppAsset::register($this);

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?php
    echo $this->render('partials/meta');
    echo Html::csrfMetaTags();
    ?>
    <title><?= Html::encode($this->title) ?></title>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php $this->head(); ?>
</head>

<body data-spy="scroll" data-offset="80">

<?php $this->beginBody(); ?>

<section id="navigation">
    <?= $this->render('partials/nav-bar') ?>
</section>

<?= $content ?>

<footer id="footer">
    <div class="footer-btm">
        <div class="copyright text-center">
            <?= Yii::t('app', 'Copyright') ?> &copy; <?= date('Y') ?>, <?= Yii::t('app', 'Wallswap') ?>
        </div>
    </div>
    <a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
</footer>

<!--Google analytics-->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-59187869-2', 'auto');
    ga('send', 'pageview');
</script>
<!--/Google analytics-->

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage() ?>
