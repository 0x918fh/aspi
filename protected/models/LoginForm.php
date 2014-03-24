<?php
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $email;
	
	private $_identity;
	
	public function rules(){
		return array(
			array('username, password', 'required'),
			array('password', 'authenticate'),
		);
	}
	
	public function authenticate($attribute,$params){
		$_identity=new UserIdentity($this->username,$this->password);
		if($_identity->authenticate())
			Yii::app()->user->login($_identity);
		else
			$this->addError('password','Неправильное имя пользователя или пароль.');
    }
}