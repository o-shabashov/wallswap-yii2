<?php

namespace app\models;

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
use Yii;
use yii\base\Exception;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 * @property integer $id
 * @property string  $email
 * @property integer $show_nsfw
 * @property string  $access_token
 * @property string  $auth_key
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     *
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     *
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds an identity by the given Dropbox ID.
     *
     * @param string $id the id to be looked for
     *
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByDropBoxId($id)
    {
        return static::findOne(['dropbox_id' => $id]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     *
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'access_token', 'auth_key', 'dropbox_id'], 'required'],
            [['show_nsfw'], 'integer'],
            [['email'], 'string', 'max' => 128],
            [['access_token', 'auth_key', 'dropbox_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'           => 'ID',
            'email'        => 'Email',
            'show_nsfw'    => 'Show Nsfw',
            'access_token' => 'Access Token',
            'auth_key'     => 'Auth Key',
            'dropbox_id'   => 'Dropbox ID',
        ];
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWallpapers()
    {
        return $this->hasMany(Wallpaper::className(), ['user_id' => 'id']);
    }

    public static function authByDropbox($accessToken)
    {
        $dropbox = new Dropbox(new DropboxApp(Yii::$app->params['db_app_key'], Yii::$app->params['db_app_secret'], $accessToken));

        if (!$user = User::findIdentityByDropBoxId($dropbox->getCurrentAccount()->getAccountId())) {
            $user = new User([
                'email'        => $dropbox->getCurrentAccount()->getEmail(),
                'access_token' => $accessToken,
                'auth_key'     => \Yii::$app->security->generateRandomString(),
                'dropbox_id'   => $dropbox->getCurrentAccount()->getAccountId(),
            ]);
        }
        $user->access_token = $accessToken;

        if (!$user->save() || !$user->refresh()) {
            throw new Exception('Error user save');
        }

        return $user;
    }
}
