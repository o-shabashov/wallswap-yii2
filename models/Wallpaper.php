<?php

namespace app\models;

use yii\helpers\Url;

/**
 * This is the model class for table "wallpaper".
 * @property integer $id
 * @property string  $thumb_url
 * @property string  $url
 */
class Wallpaper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wallpaper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'thumb_url'], 'required'],
            [['url', 'thumb_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'        => 'ID',
            'url'       => 'Url',
            'thumb_url' => 'Thumbnail Url',
        ];
    }

    /**
     * @inheritdoc
     * @return WallpaperQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WallpaperQuery(get_called_class());
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return Url::to("@cdn/wallpapers/$this->created_at/$this->filename");
    }

    /**
     * @param null $width
     *
     * @return mixed
     */
    public function getThumbUrl($width = null)
    {
        return Url::to(sprintf("@cdn/wallpapers/%s", $this->url));
    }
}
