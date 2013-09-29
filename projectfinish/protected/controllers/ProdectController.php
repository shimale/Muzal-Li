<?php
include_once("function.php");
class ProdectController extends  Controller {
	
	public function actionCreateProdect($id,$model=NULL){
		
		$subcategory = SubCategory::model()->find("id=:id",array(":id" =>$id));
		if(is_null($model)){
			$model = new Prodect();
			$model->setIdSubCategory($id);
			$model ->setIdCategory($subcategory->getIdCategory());
	    }
	    $title ="הוספת קטגוריה";
	    $form =createForm($model,"הוסף",$this->createUrl("Prodect/insertprodect"));
	    $this->render("insert",array("form" =>$form,"title"=>$title));
		
	}
		 					   
	public function actionReviewProdect($id){
	 
	 $model=$this->getProdect($id);

	
		if($model){
			$category = Category::model()->findByPk($model->getIdCategory());
			$subcategory = SubCategory::model()->findByPk($model->getIdSubCategory());
			$form =createForm($model,"מחק",$this->createUrl("Prodect/deleteprodect"));
			$title=$category->getName() ." / " . $subcategory->getName() ." / מוצר" ;
			$this->render("view",array("form"=>$form ,"id" =>$id,
				"title"=>$title));
		}else{
			
			Yii::app()->user->setFlash('msg',NOTPRODECT);
			$url =$this->createUrl('Category/categorys');
			$this->redirect($url);
		}
		
	}
	public function actionEditProdect($id,$model=NULL){
		
		if(is_null($model)){
			$model=$this->getProdect($id);
		}
		if($model){
			$category = Category::model()->findByPk($model->getIdCategory());
			$subcategory = SubCategory::model()->findByPk($model->getIdSubCategory());
			
			$title=$category->getName() ." / " . $subcategory->getName() ." / עדכון מוצר" ;
			$form =createForm($model,"עדכן",$this->createUrl("Prodect/updateprodect"));
			$this->render("edit",array("form" =>$form,"title"=>$title ));

		}else{
			Yii::app()->user->setFlash('msg',NOTPRODECT);
			$url =$this->createUrl('Category/categorys');
			$this->redirect($url);
		}
	}
	public function  actionInsertProdect(){
	
		$model =  new Prodect();
		
		if(isset($_POST['submit'])){
			$id = $_POST["Prodect"]["idSubcategory"];
			$idCategory = $_POST["Prodect"]["idCategory"];
			$model->attributes=$_POST["Prodect"];
			$model->setIdSubCategory($id);
			$model ->setIdCategory($idCategory);
				
			if(!$model->validate()){
			$this->actionCreateProdect($id,$model);
			}else{

				$model->save();
				$url =$this->createUrl("SubCategory/reviewsubcategory",array("id"=>$id));
				$this->redirect($url );
			}
		}else{
			
			Yii::app()->user->setFlash('msg',NOTPARAMETERS);
				$url =$this->createUrl("Category/categorys");
				$this->redirect($url);
		}
	
		
	}
	public function  actionUpdateProdect(){
		
		if(isset($_POST['submit'])){
			$id= $_POST ['Prodect']['id'];
			$model = $this->getProdect($id);
			
			$model->attributes=$_POST['Prodect'];
			if(!$model->validate()){
				$model =$this->setProdect($id,$model );
				$this->actionEditProdect($id,$model);
			
			}
			$model->save();
			$this->actionReviewProdect($id);
				
		}else{
			
			Yii::app()->user->setFlash('msg', NOTPARAMETERS);
			$url =$this->createUrl('Category/categorys');
			$this->redirect($url);
		}
		
	}
	public function actionDeleteProdect(){

		if(isset($_POST['submit'])){
		    
		    
		  	$id= $_POST ['Prodect']['id'];
			$model = $this->getProdect($id);
		    
		    if($model){
		    	$idSubcategory= $_POST["Prodect"]["idSubcategory"];
				if($model->delete()){
					$url =$this->createUrl("SubCategory/reviewsubcategory",array("id"=>$idSubcategory));
					$this->redirect($url );
				 }
			  
			}else{
				Yii::app()->user->setFlash('msg',NOTPRODECT);
				$this->redirect("categorys");
			}
		}else{
				Yii::app()->user->setFlash('msg',NOTPARAMETERS);
				$this->redirect("categorys");
		}

		
		
		
		
	}
	public function actionProdects($id ){
		
		$idcategory =$_GET['idcategory'];

		$products =Prodect::model()->findAllByAttributes(array ("idCategory"=>$idcategory,"idSubCategory"=>$id));
		if($products){
			$this->render("prodects",array("prodects" =>$products,"idCategory"=>$idcategory,"idSubCategory"=>$id));
		}else{
			$url =$this ->createUrl("prodect/createprodect",array("id"=>$id,"idcategory"=>$idcategory));
			$this->redirect( $url);
		}
	}
		public function getProdect($id){
		$model=Prodect::model()->findByPk($id);
		return $model;
	}
	public function setProdect($id,$model){
		$tempmodel =$this->getProdect($id);
		$model->setName($tempmodel->getName());
		$model->setIdCategory($tempmodel->getIdCategory());
		$model ->setMinPrice($tempmodel->getMinPrice());
		$model ->setMaxPrice($tempmodel->getMaxPrice());
		$model->setIdSubCategory($tempmodel->getIdSubCategory());
		$model->setPicture($tempmodel->getPicture());
		return $model;
	}
	
}

?>