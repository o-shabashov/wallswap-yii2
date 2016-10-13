<?php
namespace app\commands;

use app\models\User;
use app\models\Wallpaper;
use Dropbox\Client;
use Dropbox\Exception_BadResponseCode;
use Dropbox\Exception_InvalidAccessToken;
use Dropbox\Exception_NetworkIO;
use Dropbox\Exception_ServerError;
use League\Flysystem\Dropbox\DropboxAdapter;
use League\Flysystem\Filesystem;
use Wallhaven\Category;
use Wallhaven\Purity;
use Wallhaven\Sorting;
use Wallhaven\Wallhaven;
use Yii;
use yii\console\Controller;

class ConsoleController extends Controller
{
    /**
     * Run once a week
     * @throws \Wallhaven\Exceptions\LoginException
     * @throws \Wallhaven\Exceptions\NotFoundException
     */
    public function actionRun()
    {
        Wallpaper::deleteAll();
        $wh         = new Wallhaven(Yii::$app->params['wallhaven_user'], Yii::$app->params['wallhaven_password']);
        $wallpapers = $wh->filter()
                         ->categories(Category::GENERAL | Category::PEOPLE)
                         ->purity(Purity::SFW | Purity::SKETCHY)
                         ->sorting(Sorting::RANDOM)
                         ->resolutions(["1920x1080", "2560x1440"])
                         ->ratios(["16x9"])
                         ->pages(1)
                         ->getWallpapers();

        /** @var \Wallhaven\Wallpaper $wallpaper */
        foreach ($wallpapers as $wallpaper) {
            $model = new Wallpaper([
                'thumb_url' => $wallpaper->getThumbnailUrl(),
                'url'       => $wallpaper->getImageUrl(),
            ]);

            $model->save();
        }

        foreach (User::find()->all() as $model) {

            $client     = new Client($model->access_token, Yii::$app->params['db_app_secret']);
            $adapter    = new DropboxAdapter($client);
            $filesystem = new Filesystem($adapter);

            try {
                $filesystem->deleteDir('wallpapers');
            } catch (Exception_BadResponseCode $e) {
            } catch (Exception_InvalidAccessToken $e) {
            } catch (Exception_ServerError $e) {
            } catch (Exception_NetworkIO $e) {
                continue;
            }
            $filesystem->createDir('wallpapers');

            $wallpapers = Wallpaper::find()->all();

            /** @var Wallpaper[] $wallpapers */
            foreach ($wallpapers as $wallpaper) {
                $stream = fopen($wallpaper->url, 'r');
                $filesystem->writeStream(sprintf('wallpapers/%s', basename($wallpaper->url)), $stream);
                unset($stream);
            }
            unset($wallpapers);
        }
    }
}
