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
class SubCategory extends CActiveRecord{
    public static function model($className=__CLASS__){
       return parent::model($className);
    }
    public function tableName(){
        return 'subcategory';
    }
    public function rules()
    {
        return array(
            array('name,idcategory', 'required'),
        );
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
    public function setName($name) {
       $this->name=$name;
    }
    public function getName(){
        return $this->name;
    }
	public function setIdCategory($id){
		
		$this->idcategory=$id;
		
	}
	public function getIdCategory(){
		
		return $this->idcategory;
		
	}
}

?>
