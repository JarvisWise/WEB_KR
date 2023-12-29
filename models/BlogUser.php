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
 * --@property string|null $image
 * --@property string|null $authKey
 * --@property string|null $accessToken
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
            [['username','email','password'], 'required'],
            [['email'], 'email'],
            //[['email'], 'email'],
            //'authKey', 'accessToken'
            [['username', 'email', 'password', 'image'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /*public function rules(){
        return [
            [['name','login','password'], 'required'],
            ['login','email'],
            [['name','login','password'], 'string'],
            [['name', 'login', 'password', 'image'], 'string', 'max' => 255],

        ];
    }*/

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(){
        return [
            'id' => 'ID',
            'username' => 'User Name',
            'email' => 'Email',
            'password' => 'Password',
            'image' => 'Image',
            //'authkey' => 'Auth Key',
            //'accesstoken' => 'Access Token',
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
      
        /*if (null !== BlogUser::find()->where(['accessToken' => $token])->one()) {
            $user_ = new static(BlogUser::find()->where(['accessToken' => $token])->one());
            return $user_;
        }*/
        //not implemented
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
        //not implemented
        return null;
        //return $this->authkey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey) {
        //not implemented
        //return $this->authkey === $authKey;
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

    public function saveImage($filename) {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage() {
        if($this->image) {
            return '/uploads/' . $this->image;
        }
        return '/no-image.png';
    }

    public function deleteImage() {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete() {
        $this->deleteImage();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
}
