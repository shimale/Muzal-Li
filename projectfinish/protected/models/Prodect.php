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
class Prodect extends CActiveRecord{


    public static function model($className=__CLASS__){
       return parent::model($className);
    }
    public function tableName(){
        return 'prodect';
    }
	public function primaryKey()
	{
		return 'id';
	}
     public function rules()
    {
        return array(
            array('name, minprice, maxprice,idCategory,idSubCategory ', 'required'),
             

        );
    }
	public function setName($name){
		$this->name= $name;
	}
	public function getName(){
		return $this->name;
	}
    public function setId($id) {
       $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }

 	public function setIdCategory($id) {
       $this->idCategory=$id;
    }
    
    public function getIdCategory(){
        return $this->idCategory;
    }
	public function setIdSubCategory($id) {
       $this->idSubCategory=$id;
    }
    
    public function getIdSubCategory(){
        return $this->idSubCategory;
    }
 
	public function setPicture($picture) {
       $this->picture=$picture;
    }
    public function getPicture(){
        return $this->picture;
    }
    public function getMinPrice(){
    	
    	return $this->minprice;
    }
	public function setMinPrice($price){
    	
    	return $this->minprice =$price;
    }
  	public function getMaxPrice(){
    	
    	return $this->maxprice;
    }
	public function setMaxPrice($price){
    	
    	return $this->maxprice =$price;
    }
	

	
}

?>
