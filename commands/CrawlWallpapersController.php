<?php
namespace app\commands;

use app\models\Wallpaper;
use Wallhaven\Category;
use Wallhaven\Purity;
use Wallhaven\Sorting;
use Wallhaven\Wallhaven;
use yii\console\Controller;

class CrawlWallpapersController extends Controller
{
    /**
     * Run once a week
     *
     * @throws \Wallhaven\Exceptions\LoginException
     * @throws \Wallhaven\Exceptions\NotFoundException
     */
    public function actionRun()
    {
        Wallpaper::deleteAll();
        $wh         = new Wallhaven("WindDrop", "Mi7UEeML5lLj");
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
    }
}
