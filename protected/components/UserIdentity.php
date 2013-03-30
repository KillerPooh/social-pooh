<?php
class UserIdentity extends CUserIdentity
{
    private $_id;
	public function authenticate()
	{
        $users = Users::model()->findByAttributes(array('login'=>$this->username));
		if(!isset($users->id)){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        } elseif($users->password!==$this->password) {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id = $users->id;
            $this->errorCode=self::ERROR_NONE;
        }

		return !$this->errorCode;
	}

    public function getId()
    {
        return $this->_id;
    }
}