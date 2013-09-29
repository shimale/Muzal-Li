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
class ProdectShop extends CActiveRecord{
    public static function model($className=__CLASS__){
       return parent::model($className);
    }
    public function tableName(){
        return 'prodectshop';
    }
	public function primaryKey()
	{
		return 'id';
	}
	 public function rules()
    {
        return array(
            array('price', 'required'),
         

        );
    }
    public function setIdProdect($id) {
       $this->idprodect=$id;
    }
    public function getIdProdect(){
        return $this->idprodect;
    }
	public function setId($id) {
       $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }

 	public function setIdCategory($id) {
       $this->idcategory=$id;
    }
    
    public function getIdCategory(){
        return $this->idcategory;
    }
	public function setIdSubCategory($id) {
       $this->idsubcategory=$id;
       		  
    }
    
    public function getIdSubCategory(){
        return $this->idsubcategory;
    }
   
  	public function getPrice(){
    	
    	return $this->price;
    }
	public function setPrice($price){
    	
    	return $this->price =$price;
    }
	public function getIdShop(){
    	
    	return $this->idshop;
    }
	public function setIdShop($idshop){
    	
    	return $this->idshop =$idshop;
    }

	
}

?>
