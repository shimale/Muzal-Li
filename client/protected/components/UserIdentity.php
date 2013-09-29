<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $id;
	private	$role;
	
	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{	
	
		$user=User::model()->find('LOWER(username)=?',array(strtolower($this->username)));
		
		if($user===null){
		
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}else if($user->getPassword()!==($this->password)){
		
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else
		{
			$this->id=$user->getId();
			$this->errorCode=self::ERROR_NONE;
			

		
			
		}
		return !$this->errorCode;
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->id;
	}
	
	
}