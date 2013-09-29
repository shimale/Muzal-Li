<?php

class LoginForm extends CFormModel{
	public $username;
	public $password;
	
	 public function rules()
    {
        return array(
            array('username, password', 'required')
		);

    }

}
?>


