<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author Roee
 */
class Shop extends CActiveRecord{
    public static function model($className=__CLASS__){
       return parent::model($className);
    }
    public function tableName(){
        return 'shop';
    }
	public function primaryKey()
	{
		return 'id';
	}
	 public function rules()
    {
        return array(
            array('name,phone,email,adress,link,lat,lng', 'required'),
            array('email','email'),

        );
    }
    public function setId($id) {
       $this->id=$id;
    }
	
    public function getId(){
        return $this->id;
    }

    public function setName($name) {
       $this->name=$name;
    }
    public function getName(){
        return $this->name;
    }
	public function setPhone($phone){
		
		$this->phone =$phone;
	}
	public function getPhone(){
		
		return $this->phone ;
	}
	public function setEmail($email){
		
		$this->email =$email;
	}
	public function getEmail(){
		
		return $this->email ;
	}
	public function setAdress($adress){
		
		$this->adress =$adress;
	}
	public function getAdress(){
		
		return $this->adress ;
	}
	public function setLoctionX($lat){
		
		$this->lat =$lat;
	}
	public function getLoctionX(){
		
		return $this->lat ;
	}
	public function setLoctionY($lng){
		
		$this->lng =$lng;
	}
	public function getLoctionY(){
		
		return $this->lng ;
	}
	public function setLink($loctionY){
		
		$this->link;
	}
	public function getlink(){
		
		return $this->link ;
	}

}

?>
