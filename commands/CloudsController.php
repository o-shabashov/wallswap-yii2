<?php
namespace app\commands;

use app\components\SaveHelper;
use app\models\ext\CloudSettings;
use app\models\Wallpaper;
use Dropbox\Client;
use Dropbox\Exception_BadResponseCode;
use Dropbox\Exception_InvalidAccessToken;
use Dropbox\Exception_ServerError;
use League\Flysystem\Dropbox\DropboxAdapter;
use League\Flysystem\Filesystem;
use Yii;
use yii\console\Controller;
use yii\helpers\Url;

class CloudsController extends Controller
{
    public function actionUpload()
    {
        /** @var CloudSettings[] $cloudSettings */
        $cloudSettings = CloudSettings::find()->where(['is_active' => 1])->all();
        $workDir       = 'Wallpapers';

        foreach ($cloudSettings as $model) {
            if (!$model->user->activeToken->dropbox) {
                continue;
            }
            echo '[', date('d-m-Y H:i:s'), '] - Start uploading for user ', $model->user_id, PHP_EOL;

            $client     = new Client($model->user->activeToken->dropbox, 'Wallswap/1.0');
            $adapter    = new DropboxAdapter($client);
            $filesystem = new Filesystem($adapter);

            try {
                $filesystem->deleteDir($workDir);
            } catch (Exception_BadResponseCode $e) {
            } catch (Exception_InvalidAccessToken $e) {
                echo '[', date('d-m-Y H:i:s'), '] - Invalid access token, set null', PHP_EOL, PHP_EOL;
                $token = $model->user->activeToken;
                $token->dropbox = null;
                SaveHelper::save($token);
                continue;
            } catch (Exception_ServerError $e){
                echo '[', date('d-m-Y H:i:s'), '] - Exception ', $e, PHP_EOL, PHP_EOL;
                continue;
            }
            $filesystem->createDir($workDir);

            $wallpapers = Wallpaper::find()
                                   ->active()
                                   ->cloudSettings($model)
                                   ->random()
                                   ->limit(24)// TODO
                                   ->all();

            /** @var Wallpaper[] $wallpapers */
            foreach ($wallpapers as $wallpaper) {
                $stream = fopen(Url::to("@web/wallpapers/$wallpaper->created_at/$wallpaper->filename"), 'r');
                $filesystem->writeStream("$workDir/$wallpaper->filename", $stream);
                unset($stream);
            }
            unset($wallpapers);
            echo '[', date('d-m-Y H:i:s'), '] - Stop uploading for user ', $model->user_id, PHP_EOL, PHP_EOL;
        }
    }
}
