<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 * 
 * @property int $id
 * @property string $username
 * @property string|null $email
 * @property string|null $password
 * @property string|null $authKey
 * @property string|null $accessToken
 */
class BlogUser extends \yii\db\ActiveRecord  implements \yii\web\IdentityInterface {
    
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'blog_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['email'], 'required'],
            [['email'], 'default', 'value' => null],
            //[['email'], 'email'],
            [['username', 'email', 'password', 'authKey', 'accessToken'], 'string'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(){
        return [
            'id' => 'ID',
            'username' => 'User Name',
            'email' => 'Email',
            'password' => 'Password',
            'authkey' => 'Auth Key',
            'accesstoken' => 'Access Token',
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($email){
        if (null !== BlogUser::find()->where(['email' => $email])->one()) {
            $user_ = new static(BlogUser::find()->where(['email' => $email])->one());
            return $user_;
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null){
      
        if (null !== BlogUser::find()->where(['accessToken' => $token])->one()) {
            $user_ = new static(BlogUser::find()->where(['accessToken' => $token])->one());
            return $user_;
        }

        return null;
    }


    public static function findByEmail($email){

        if (null !== BlogUser::find()->where(['email' => $email])->one()) {
            $user_ = new static(BlogUser::find()->where(['email' => $email])->one());
            
            return $user_;
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId() {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey() {
        return $this->authkey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey) {
        return $this->authkey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
        return $this->password === $password;
    }
}
