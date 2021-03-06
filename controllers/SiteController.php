<?php
namespace app\controllers;

use app\models\User;
use app\models\Wallpaper;
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        Yii::$app->session->open();

        $dropbox = new Dropbox(new DropboxApp(Yii::$app->params['db_app_key'], Yii::$app->params['db_app_secret']));
        $authUrl = $dropbox->getAuthHelper()->getAuthUrl('http://localhost:8080/oauth2callback');

        return $this->render('index', [
            'authUrl'    => $authUrl,
            'wallpapers' => new ActiveDataProvider([
                'query' => Wallpaper::find(),
            ]),
        ]);
    }

    public function actionAuth($code, $state)
    {
        Yii::$app->session->open();

        $dropbox     = new Dropbox(new DropboxApp(Yii::$app->params['db_app_key'], Yii::$app->params['db_app_secret']));
        $accessToken = $dropbox->getAuthHelper()
                               ->getAccessToken($code, $state, 'http://localhost:8080/oauth2callback')
                               ->getToken();

        if ($user = User::authByDropbox($accessToken)) {
            Yii::$app->user->login($user);
        }

        return $this->goHome();
    }
}
