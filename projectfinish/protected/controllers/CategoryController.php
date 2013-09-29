<?php
  include_once("function.php");
class CategoryController extends  Controller {

	public function actionCreateCategory($model=NULL){
		if(is_null($model)){
				$model = new Category();
		}
		
		$title ="הוספת קטגוריה";
		
		$form =createForm($model,"הוסף",$this->createUrl("insertcategory"));
			
		$this->render("insert",array("form" =>$form,"title"=>$title));
		

	}
				  
	public function actionReviewCategory($id){
		
	 if($this->allowUser()== ADMAIN){
		$model=$this->getCategory($id);
	
		$subcategory = SubCategory::model()->findall("idcategory=:idcategory",array(":idcategory" =>$id));
		
		if($model){
		
			$form =createForm($model,"מחק",$this->createUrl("Category/deletecategory"));

			$title = $model->getName();
		
			$this->render("view",array("form"=>$form ,"subcategory" =>$subcategory,"id"=>$id,"title"=>$title));
			
		}else{
			
			Yii::app()->user->setFlash('msg',NOTCATEGORY);
			$this->actionCategorys();
		}
	   
	   }
	}
	public function actioneditCategory($id,$model=NULL){
		
		if(is_null($model)){
			$model=$this->getCategory($id);
		}
	
		$subcategory = SubCategory::model()->findall("idcategory=:idcategory",array(":idcategory" =>$id));
		if($model){
			 $from =createForm($model,"עדכן",$this->createUrl("Category/updatecategory"));

			$title =$model -> getName()." / עדכון קטגוריה ";
			$this->render("edit",array("from" => $from ,"subcategory" =>$subcategory,"title"=>$title));
		
		}else{
			Yii::app()->user->setFlash('msg',NOTCATEGORY);
			$this->actionCategorys();
		}
	}
	public function  actionUpdateCategory(){

		if(isset($_POST['submit'])){
			$id= $_POST["Category"]["id"];
			$model = $this->getCategory($id);
			
			$model->attributes=$_POST["Category"];
			if(!$model->validate()){
				$model =$this->setCategory($id,$model );
				$this->actioneditCategory($id,$model);
			}
			
			$model->save();
			$this->actionReviewCategory($model->getId());
		}else{
			
			Yii::app()->user->setFlash('msg', NOTPARAMETERS);
			$this->actionCategorys();
		}
		
	

	}
	public function  actionInsertCategory(){
		
		$model =  new Category();
		if(isset($_POST['submit'])){

			$model->attributes=$_POST["Category"];

			if(!$model->validate()){
				$this->actionCreateCategory($model);
			}
			$model->save();
			$this->actionCategorys();
		}else{
			
			Yii::app()->user->setFlash('msg', NOTPARAMETERS);
			$this->actionCategorys();
		}

	}
	public function actionDeleteCategory(){
		
		if(isset($_POST['submit'])){
		    
		    $id= $_POST["Category"]["id"];
			$model=$this->getCategory($id);
		    
		    if($model){
				
				if($model->delete()){
					
					SubCategory::model()->deleteAll("idcategory=:idcategory",array(":idcategory" =>$id));
					 Prodect::model()->deleteAll("idcategory=:idcategory",array(":idcategory" =>$id));
					$this->actionCategorys();
			   	}
			  
			}else{
				Yii::app()->user->setFlash('msg',NOTCATEGORY);
				$this->actionCategorys();;
			}
		}else{
				Yii::app()->user->setFlash('msg',NOTPARAMETERS);
				$this->actionCategorys();;
		}
	}
	public function actionCategorys(){

		if($this->allowUser()==  ADMAIN ){
			$categorys =Category ::model()->findAll();
				
			if($categorys){
				
				$title ="רשימת קטגוריות";
			
				$this->render("categorys",array("categorys" =>$categorys,"title"=>$title));
			}else{
				$this->actionViewInsert();
			}
		}else{
			$categorys =Category ::model()->findAll();
				
			if($categorys){
				$this->render("categorys",array("categorys" =>$categorys));
			}else{
				$this->actionViewInsert();
			}
		}

	}
	public function getCategory($id){
		$model=Category::model()->findByPk($id);
		return $model;
	}
	public function setCategory($id,$model){
		$tempmodel =$this->getCategory($id);
		$model->setName($tempmodel->getName());
		return $model;
	}
}

?>