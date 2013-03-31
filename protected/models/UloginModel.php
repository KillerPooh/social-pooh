<?php

class UloginModel extends CModel {

    public $identity;
    public $network;
    public $email;
    public $full_name;
    public $first_name;
    public $second_name;
    public $token;
    public $error_type;
    public $error_message;
    public $step;

    private $uloginAuthUrl = 'http://ulogin.ru/token.php?token=';

    public function rules() {
        return array(
            array('identity,network,token', 'required'),
            array('email', 'email'),
            array('identity,network,email,first_name,second_name', 'length', 'max'=>255),
            array('full_name', 'length', 'max'=>55),
            array('step', 'safe'),
        );
    }

    public function attributeLabels() {
        return array(
            'network'=>'Сервис',
            'identity'=>'Идентификатор сервиса',
            'email'=>'eMail',
            'full_name'=>'Имя',
        );
    }

    public function getAuthData() {

        $authData = json_decode(file_get_contents($this->uloginAuthUrl.$this->token.'&host='.$_SERVER['HTTP_HOST']),true);

        $this->setAttributes($authData);

        $this->full_name = $authData['first_name'].' '.$authData['last_name'];
        $this->first_name = $authData['first_name'];
        $this->second_name = $authData['last_name'];
    }

    public function login() {
        $identity = new UloginUserIdentity();
        if ($identity->authenticate($this)) {
            $duration = 3600*24*30;
            Yii::app()->user->login($identity,$duration);
            return true;
        }
        return false;
    }

    public function attributeNames() {
        return array(
            'identity'
            ,'network'
            ,'email'
            ,'full_name'
            ,'token'
            ,'error_type'
            ,'error_message'
            ,'first_name'
            ,'second_name'
        );
    }
}