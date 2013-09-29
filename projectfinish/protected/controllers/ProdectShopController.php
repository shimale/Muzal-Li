<?php

class ProdectShopController extends  Controller {
	
	public function actionCreateProdect($id){
		$idcategory =$_GET['idcategory'];		
		$this->render("insert",array("id"=>$id,"idcategory"=>$idcategory));
		
	}
	public function actionCategoryProdect(){
	
		$allcategory =Category ::model()->findAll();
				
		if($allcategory){
			$this->render("categorys",array("allcategory" =>$allcategory));
		}
							

	}
	public function actionSubCategoryProdect($id){
		
		$subcategory = SubCategory::model()->findall("idcategory=:idcategory",array(":idcategory" =>$id));
		if($subcategory){
			
			$this->render("subcategorys",array("subcategorys" =>$subcategory));
			
		}
	}
	public function actionReviewProdect($id){
		
		$product=Prodect::model()->findByPk($id); 
		$this->render("view",array("prodect"=> $product));
		
	}
	public function actionEditProdect($id){
		
		$prodect=Prodect::model()->findByPk($id); 
		$this->render("edit",array("prodect"=> $prodect));
		
		
	}				   
	public function  actionInsertProdectShop(){
		
		if(isset($_POST['submit'])){
			
			$model = new ProdectShop();
			
			$idcategory =$_POST['Prodect']['idcategory'];
			$idsubcategory =$_POST['Prodect']['idsubcategory'];
			$idshop =$_POST['idshop'];
			$model->setIdShop($idshop);
			$model->setIdSubCategory($idsubcategory);
			$model->setIdCategory($idcategory);
			$model->setPrice($_POST['Prodect']['price']);
			$model->setIdProdect($_POST['Prodect']['id']);
		
			 
			if($model ->save()){
				$url =$this->createUrl("shop/prodectshop",array("id"=>$idsubcategory,"idshop" =>$idshop,"idcategory"=>$idcategory));
				$this->redirect($url);
			}
		}else{
			Yii::app()->user->setFlash('msg', NOTPARAMETERS);
			$url =$this->createUrl("shop/shops");
			$this->redirect($url);
		}
			
		
	}
	public function  actionUpdateProdectShop(){
	
		if(isset($_POST['submit'])){
			
			$model =ProdectShop::model()->findByPk($_POST['ProdectShop']['id']);
			$model->attributes=$_POST['ProdectShop'];
		
			 
			if($model ->save()){
				$url =$this->createUrl("shop/prodectshop",array("id"=>$model->getIdSubCategory(),"idshop" =>$model->getidShop(),"idcategory"=>$model->getIdCategory()));
				$this->redirect($url);
			}
		}else{
			Yii::app()->user->setFlash('msg', NOTPARAMETERS);
			$url =$this->createUrl("shop/shops");
			$this->redirect($url);
		
		}
	}
	public function actionDeleteProdectShop($idshop){
		$id =$_GET['id'];
		$productshop=ProdectShop::model()->findByPk($id); 
		
		if($productshop){
			$idsubcategory=$productshop->getIdSubCategory();
			$idcategory =$productshop->getIdCategory();
			if($productshop->delete()){
				$url =$this->createUrl("Shop/prodectshop",array("id"=>$idsubcategory,"idshop" =>$idshop ,"idcategory"=>$idcategory));
				$this->redirect($url);
			}
		}
		else{
			Yii::app()->user->setFlash('notprodect', NOTPRODECT);
			$url =$this->createUrl("shop/reviewshop",array("id"=>$idshop));
			$this->redirect($url);
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
	public function actionError()
	{	
		if($error=Yii::app()->errorHandler->error){
			Yii::app()->user->setFlash('notprameters', NOTPARAMETERS);
			$url =$this->createUrl("shop/shops");
			$this->redirect($url);
			
		}
	}
}

?>