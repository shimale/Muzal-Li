<?php
include_once("function.php");
class SubCategoryController extends  Controller {
	
	public function actionCreateSubCategory($id,$model=NULL){
		if(is_null($model)){
					$model = new SubCategory();
					$model->setIdCategory($id);
		}
	

		$title="הוספת תת קטגוריה";
		$form =createForm($model,"הוסף",$this->createUrl("SubCategory/insertsubcategory"));
		$this->render("insert",array("form" =>$form ,"id" =>$id,"title"=>$title));
	
	}
					
	public function actionReviewSubCategory($id){
		
		 $model=$this->getSubCategory($id);

		
	
		$prodect = Prodect::model()->findAll("idSubCategory=:idSubCategory" ,array("idSubCategory"=>$id));
		
		if($model){
			$form =createForm($model,"מחק",$this->createUrl("SubCategory/deletesubcategory"));
			$title=$model->getName() ;
			
			$this->render("view",array("form"=>$form ,"prodects"=>$prodect,"id"=>$model->getId(),"idCategory"=>$model->getIdCategory(),
				"title"=>$title));
			
		}else{
			
			Yii::app()->user->setFlash('msg',NOTSUBCATEGORY);
			$url =$this->createUrl('Category/categorys');
			$this->redirect($url);
		}
	   
	}
	public function actionEditSubCategory($id,$model=NULL){
		
		if(is_null($model)){
		
		$model=$this->getSubCategory($id);
		}
		if($model){
			$title= $model->getName(). " / עדכון תת קטגוריה" ;
			$form =createForm($model,"עדכן",$this->createUrl("SubCategory/updatesubcategory"));
			$this->render("edit",array("form" =>$form ,"title"=>$title));
			
		}else{
			Yii::app()->user->setFlash('msg',NOTSUBCATEGORY);
			$url =$this->createUrl('category/categorys');
			$this->redirect($url);
		}
	}
	
	public function  actionUpdateSubCategory(){
		
		if(isset($_POST['submit'])){
			$id= $_POST["SubCategory"]["id"];
			$model = $this->getSubCategory($id);
			
			$model->attributes=$_POST["SubCategory"];
			if(!$model->validate()){
				$model =$this->setSubCategory($id,$model );
				$this->actionEditSubCategory($id,$model);
			}
			
			$model->save();
			$this->actionReviewSubCategory($id);
		}else{
			
			Yii::app()->user->setFlash('msg', NOTPARAMETERS);
			$url =$this->createUrl("Category/categorys");
				$this->redirect($url);
			
		}
	

	}
	public function  actionInsertSubCategory(){
			
		$model =  new SubCategory();
		if(isset($_POST['submit'])){
			$id=$_POST["SubCategory"]['idcategory'];
			$model->setIdCategory($id);
			$model->attributes=$_POST["SubCategory"];
			

			if(!$model->validate()){

				$this->actionCreateSubCategory($id,$model);

			}else{
				
				$model->save();
				$url =$this->createUrl("category/reviewcategory",array("id"=>$id));
				$this->redirect($url);
			}
		}else{
			Yii::app()->user->setFlash('msg',NOTPARAMETERS);
			$this->redirect("categorys");
			
			
		}

	}
	public function actionDeleteSubCategory(){
		if(isset($_POST['submit'])){
		    
		    $id= $_POST["SubCategory"]["id"];
		    $idCategory=$_POST["SubCategory"]["idcategory"];
			$model=$this->getSubCategory($id);
		    
		    if($model){
				if($model->delete()){
					$this->deleteProdect($id);
					$url =$this->createUrl("Category/reviewcategory",array("id"=>$idCategory));
					 $this->redirect($url);
				 }
			  
			}else{
				Yii::app()->user->setFlash('msg',NOTSUBCATEGORY);
				$url =$this->createUrl("Category/categorys");
				$this->redirect($url);
			}
		}else{
				Yii::app()->user->setFlash('msg',NOTPARAMETERS);
				$url =$this->createUrl("Category/categorys");
				$this->redirect($url);
		}
	}
	

	public function deleteProdect($id){
		Prodect::model()->deleteAll("idSubCategory=:idSubCategory",array(":idSubCategory" =>$id));
	}
}

?>