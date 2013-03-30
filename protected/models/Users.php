<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $email
 * @property integer $profile_id
 *
 * The followings are the available model relations:
 * @property Profile $profile
 */
class Users extends CActiveRecord
{
    public $rememberMe;
    private $errorCode;
    const ERROR_NONE = 0;
    const ERROR_USERNAME_INVALID = 1;
    const ERROR_PASSWORD_INVALID = 2;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'users';
	}

	public function rules()
	{
		return array(
			array('login, password, email, profile_id', 'required'),
			array('profile_id', 'numerical', 'integerOnly'=>true),
			array('login', 'length', 'max'=>16),
			array('password, email', 'length', 'max'=>35),
            array('rememberMe', 'boolean'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, login, password, email, profile_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'profile' => array(self::BELONGS_TO, 'Profile', 'profile_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Login',
			'password' => 'Password',
			'email' => 'Email',
			'profile_id' => 'Profile',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('profile_id',$this->profile_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}