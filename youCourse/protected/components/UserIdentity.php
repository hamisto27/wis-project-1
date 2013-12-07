<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

    private $_id;

    public function authenticate()
    {

        $file = 'c:\Users\Pantoufle\Documents\mohamed.txt';
        //file_put_contents($file, 'username:'.$username .'_password:'. $this->password);

        $username=strtolower($this->username);
        $user=User::model()->find('LOWER(Name)=?',array($username));
        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!$user->validatePassword($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$user->UserID;
            $this->username=$user->Name;
            $this->errorCode=self::ERROR_NONE;
            if($user->isAdmin()){
                file_put_contents($file,'is an Admin');
            }
        }
        return $this->errorCode==self::ERROR_NONE;
    }

    public function getId()
    {
        return $this->_id;
    }

}