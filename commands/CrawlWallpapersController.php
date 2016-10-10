<?php
namespace app\commands;

use app\components\SaveHelper;
use app\components\Wallhaven;
use app\models\Wallpaper;
use Yii;
use yii\base\Exception;
use yii\console\Controller;

class CrawlWallpapersController extends Controller
{
    public function actionRun()
    {
        for ($i = 0; $i < 5000; $i++) {
            try {
                $wh               = new Wallhaven("WindDrop", "Mi7UEeML5lLj");
                $wallpapersRandom = $wh->getRandom(7, 7);
            } catch (\Exception $e) {
                continue;
            }
            $date = \Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');

            foreach ($wallpapersRandom as $wallpaper) {
                // Skip CRAWLED
                if (Crawled::findOne(['wallpaper_id' => $wallpaper['id']])) {
                    continue;
                }

                $model          = new Wallpaper();
                $model->user_id = 2; // wallHaven
                $model->save(false);

                // Save as-is file to local disk
                Yii::$app->filesystem->createDir($date);
                try {
                    $wall = $wh->getWallpaperInformation($wallpaper['id']);
                } catch (\Exception $e) {
                    $model->delete();
                    continue;
                }
                echo "Iteration - $i, Work on {$wall['infoUrl']}" . PHP_EOL;
                $fileName = sprintf('wallpaper-%s.%s', $model->id, $wall['type']);

                try {
                    $contents = @file_get_contents($wall['imgUrl']);
                } catch (Exception $e) {
                    $model->delete();
                    continue;
                }
                if (!$contents) {
                    $model->delete();
                    continue;
                }
                Yii::$app->filesystem->write(sprintf('%s/%s', $date, $fileName), $contents);

                $model->filename = $fileName;
                $model->purity   = $wall['purity'];
                $model->status   = Wallpaper::STATUS_ACTIVE;
                $model->source   = $wall['infoUrl'];

                // Resolution
                $resArr     = explode('x', $wall['resolution']);
                $resolution = Resolution::findOne(['width' => $resArr[0], 'height' => $resArr[1]]);
                if (!$resolution) {
                    $resolution         = new Resolution();
                    $resolution->width  = $resArr[0];
                    $resolution->height = $resArr[1];
                    SaveHelper::save($resolution);
                }
                $model->link('resolution', $resolution);

                // Generate thumbnail
                $thumbFileName = sprintf('thumb_%s', $fileName);
                $point         = new Point(0, 0);
                $thumbnailSize = new Box(\Yii::$app->params['wallpaperThumbWidth'], \Yii::$app->params['wallpaperThumbHeight']);

                Image::thumbnail("@web/wallpapers/$date/$fileName", \Yii::$app->params['wallpaperThumbWidth'], \Yii::$app->params['wallpaperThumbHeight'])
                     ->crop($point, $thumbnailSize)
                     ->save(\Yii::getAlias("@web/wallpapers/$date/$thumbFileName"), ['quality' => 85]);

                // Tags
                foreach ($wall['tags'] as $tag) {
                    if (!$tagModel = Tag::findOne(['name' => $tag])) {
                        $tagModel       = new Tag();
                        $tagModel->name = $tag;
                        SaveHelper::save($tagModel);
                    }

                    try {
                        $model->link('tags', $tagModel);
                    } catch (\Exception $exception) {
                    }
                }

                // Set CRAWLED!
                $crawled               = new Crawled();
                $crawled->wallpaper_id = $wallpaper['id'];
                SaveHelper::save($crawled);
            }
        }
    }
}
