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
class ShopCategory extends CActiveRecord{
    public static function model($className=__CLASS__){
       return parent::model($className);
    }
    public function tableName(){
        return 'shopcatgory';
    }
	public function primaryKey()
	{
		return 'id';
	}
    public function setId($id) {
       $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setIdShop($id) {
       $this->idshop=$id;
    }
    public function getIdShop(){
        return $this->idshop;
    }
	public function setIdCategory($id){
		
		$this->idcategory=$id;
		
	}
	public function getIdCategory(){
		
		return $this->idcategory;
						
	}

}
?>
