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
 * @property string $identity
 * @property string $network
 * @property integer $state
 * @property integer $access
 *
 * The followings are the available model relations:
 * @property News[] $news
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
			array('login, password, email', 'required'),
			array('profile_id, state, access', 'numerical', 'integerOnly'=>true),
            array('email', 'email'),
			array('login', 'length', 'max'=>16),
            array('login, email', 'unique'),
			array('password, email', 'length', 'max'=>35),
            array('rememberMe', 'boolean'),
            array('identity, network', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, login, password, email, profile_id, identity, network, state, access', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
            'news' => array(self::HAS_MANY, 'News', 'user_id'),
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
            'identity' => 'Identity',
            'network' => 'Network',
            'state' => 'State',
            'access' => 'Access',
		);
	}

    public function iAdmin()
    {
        if(!Yii::app()->user->isGuest){
            $model = Users::model()->findByPk(Yii::app()->user->id);
            if(isset($model) AND $model->access=='1'){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('profile_id',$this->profile_id);
        $criteria->compare('identity',$this->identity,true);
        $criteria->compare('network',$this->network,true);
        $criteria->compare('state',$this->state);
        $criteria->compare('access',$this->access);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}