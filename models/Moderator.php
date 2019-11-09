<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\Security;

/**
 * This is the model class for table "moderators".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $token
 * @property string $auth_key
 */
class Moderator extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /** @var Security $security */
    public $security;

    public function __construct($config = [])
    {
        $this->security = Yii::$app->security;
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'moderators';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password', 'token', 'auth_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'token' => 'Token',
            'auth_key' => 'authKey',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @throws \yii\base\Exception
     */
    public function hashPassword($password)
    {
        return $this->security->generatePasswordHash($password);
    }

    /**
     * @return string
     * @throws Exception
     */
    public function generateToken()
    {
        return $this->security->generateRandomString(32);
    }

    public function validatePassword($password)
    {
        return $this->security->validatePassword($password, $this->password);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $model = Moderator::findOne($id);

        return $model ?: null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $model = Moderator::find()
            ->where(
                [
                    'token' => $token
                ]
            )
            ->one();

        return $model ?: null;
    }

    public static function findByUsername($username)
    {
        $model = Moderator::find()
            ->where(
                [
                    'username' => $username
                ]
            )
            ->one();

        return $model ?: null;
    }
}
