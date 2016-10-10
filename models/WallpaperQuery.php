<?php

namespace app\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Wallpaper]].
 *
 * @see Wallpaper
 */
class WallpaperQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return Wallpaper[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Wallpaper|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
