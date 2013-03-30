<?php
class UserLogin extends CFormModel
{
    public $login;
    public $password;
    public $rememberMe;
    public $errorCode;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function rules()
    {
        return array(
            array('login, password', 'required'),
            array('login', 'length', 'max'=>16),
            array('password', 'length', 'max'=>35),
            array('rememberMe', 'boolean'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'login' => 'Login',
            'password' => 'Password',
        );
    }

    public function login()
    {
        $identity = new UserIdentity($this->login,$this->password);
        $identity->authenticate();
        if($identity->errorCode===UserIdentity::ERROR_NONE){
            $duration=$this->rememberMe ? 3600*24*30 : 0;
            Yii::app()->user->login($identity,$duration);
            return true;
        } else {
            $this->errorCode = $identity->errorCode;
            return false;
        }
    }
}