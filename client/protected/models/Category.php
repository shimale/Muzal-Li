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
class Category extends CActiveRecord{
    public static function model($className=__CLASS__){
       return parent::model($className);
    }

    public function rules()
    {
        return array(
            array('name', 'required'),
        );
    }

	public function primaryKey()
	{
		return 'id';
	}
    public function tableName(){
        return 'category';
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
}

?>
