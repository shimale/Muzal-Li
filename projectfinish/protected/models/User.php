<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Roee
 */
class User extends CActiveRecord{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'user';
	}

	public function primaryKey()
	{
		return 'id';
	}
	public function getId(){
			
		return   $this->id ;
	}
	public function setId($id){
			
		return   $this->id = $id ;
	}
	public function getPassword(){
			
		return   $this->password ;
	}

	public function setPassword($password){
			
		return   $this->password = $password ;
	}
	public function getUserName(){
			
		return   $this->username ;
	}
	public function setUserName($username){
			
		return   $this->username = $username ;
	}
	public function getName(){
		return $this->name;
	}
	public function setName($name){
		$this->name=$name;
	}
	public function getPhone(){
		return $this->phone;
	}
	public function setPhone($phone){
		$this->phone=$phone;
	}
	public function getListShop(){
		return $this->listshop;
	}
	public function setListShop($listshop){
		$this->listshop=$listshop;
	}
	public function getLevel (){
			
		return   $this->level  ;
	}
	public function setLevel ($premission){
			
		return   $this->level  = $premission  ;
	}


}

?>
