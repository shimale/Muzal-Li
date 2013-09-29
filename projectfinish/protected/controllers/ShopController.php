<?php
 include_once("function.php");
class 	ShopController extends  Controller {
	

	public function actionCreateShop($model=NULL){
		$listcatgory = $this->getAllCatgory();
		if(is_null($model)){
			$model = new Shop();
		}
		
		 $title="הוספת חנות" ;
		 $form =createForm($model,"הוסף",$this->createUrl("Shop/insertshop"));
		$this->render("insert",array("form" =>$form,"list"=> $listcatgory,"title"=>$title));
	}	
	public function actionReviewShop($id){
		
		$list =array() ;
		$model=$this->getShop($id); 
		if($model){
			
			$list = $this->getShopCatgory($id);
			$title=$model->getName() ;
			if($list){

				$list = $this->getlistCategory($list);
			}
			$form =createForm($model,"מחק",$this->createUrl("Shop/deleteShop"));
		
			$this->render("view",array("form" =>$form ,"list" =>$list,"title"=>$title,"id"=>$id,"img" =>$model->getimg()));
			
		}else{
			Yii::app()->user->setFlash('msg', NOTSHOP);
			$url =$this->createUrl("Shop/shops");
			$this->redirect($url);
		}
	}
	public function actionEditShop($id,$model=NULL){
		
		if(is_null($model)){
			$model=$this->getShop($id);
		}

		$category =$this->getAllCatgory();
		 $lat =$model->getLoctionX();
		 $lng =$model->getLoctionY();
		if($model){
			$title = $model->getName(). " / עדכון חנות";
			$list = $this->getShopCatgory($id);
			if($list){
				$list = $this->getlistCategory($list);
			}
			$form =createForm($model,"עדכן",$this->createUrl("Shop/updateshop"));
			$this->render("edit",array("form" => $form ,"list" =>$list,"category"=> $category,"title"=>$title,"lat"=>$lat,"lng"=>$lng));
		
		}else{
			
			Yii::app()->user->setFlash('msg', NOTSHOP);
			$this->actionShops();
		
		}
	}
	
	public function  actionInsertShop(){

		$model =  new Shop();
		
		if(isset($_POST['submit'])){

			$model->attributes =$_POST['Shop'];
			 $model->setLoctionX($_POST['lat']);
			 $model->setLoctionY($_POST['lng']);

		      if(!$model->validate()){
		      	
		      	 if($model->getLoctionX()=="" || $model->getLoctionY()==""){

		      		Yii::app()->user->setFlash('msg', NOTADRESS);
				}
				$this->actionCreateShop($model);
			
		      }else{

				$model->save() ;
			  	$insertid= $model->primaryKey;
			  
			  	if(isset($_POST['catgory'])){
			  		
					$this->updateShopCategory($_POST['catgory'],$insertid);
			  	}
			 	 $this->actionShops();
			  }
			 	
			
		}else{
			
			Yii::app()->user->setFlash('msg', NOTPARAMETERS);
			$this->actionShops();
			
		}
		
		
	}
	public function  actionUpdateShop(){
		if(isset($_POST['submit'])){
			$id = $_POST['Shop']['id'];
			$model = $this->getShop($id ) ;
			$model->attributes =$_POST['Shop'];
		     $model->setLoctionX($_POST['lat']);
			 $model->setLoctionY($_POST['lng']);
		      if(!$model->validate()){
		      	$model = $this->setShop($id,$model);
		      	$this->actionEditShop($id,$model);
				
				
		      }else{
					if($model->save()){
						$this->deleteShopCatgory($id);
					 	if(isset($_POST['catgory'])){
							$this->updateShopCategory($_POST['catgory'],$id);
					 	}	
					 	$this->actionReviewShop($id);
					}
			  }
			 	
			
		}else{
			
			Yii::app()->user->setFlash('msg', NOTPARAMETERS);
			$this->actionShops();
		}
		
	}
	public function actionDeleteShop(){
	
		if(isset($_POST['submit'])){
		    $id= $_POST["Shop"]["id"];
			$model=$this->getShop($id);
		    
		    if($model){
				if($model->delete()){
				
					ShopCategory::model()->deleteAll("idshop=:idshop",array(":idshop" =>$id));
					ProdectShop::model()->deleteAll("idshop=:idshop",array(":idshop" =>$id));
					$this->actionShops();
				
				}
			
			}else{
				Yii::app()->user->setFlash('msg', NOTSHOP);
				$this->actionShops();
			}
		}else{
			Yii::app()->user->setFlash('msg', NOTPARAMETERS);
			$this->actionShops();
		}
	}
	public function actionShops($page=0){
		
		$title ="רשימת חנויות";
		$sqlcount = "SELECT COUNT(*) FROM shop";
		
		$numshops = Yii::app()->db->createCommand($sqlcount)->queryScalar();
		
		$numpage = (int)($numshops /100);

		if($page >$numpage){
			
			$sql ='SELECT *  FROM `shop`  limit 0 , 100';
		}else{
			$startlimit = $page *100;
			$sql ='SELECT *  FROM `shop`  limit '.$startlimit.' , 100';
		}
		$shop = Shop::model()->findAllBySql($sql);
		$this->render("shops",array("listshop" =>$shop,"title"=>$title,"page"=>$numpage ));
	}
	 public function actionSubCategoryShop($idshop){
		$model=$this->getShop($idshop);
	 	if($model && isset($_GET['id'])){
			$id= $_GET['id'];
			$model=$this->getShop($idshop);
			$catgory =$this->getCategory($id);
			$title="רשימת תת קטגוריות" ;
			if( $catgory){
				$subCategory = SubCategory::model()->findAll("idcategory=:idcategory",array(":idcategory"=>$id));
				$this->render("subCategory",array("listsubCategory"=>$subCategory,"title"=>$title));
			}else{
				Yii::app()->user->setFlash('msg', NOTSUBCATEGORY);
				$this->actionShops();
			 }
	 	
		 }else{
			Yii::app()->user->setFlash('msg', NOTPARAMETERS);
					$this->actionShops();
		 }
	 }											
	 public function  actionSelectProdectShop($idshop){
	 	$model =$this->getShop($idshop);
	 	if($model && isset($_GET['id'])){
			$id=$_GET['id'];
	 		$subcatgory=$this->getSubCategory($id);
			$title="רשימת מוצרים כללית" ;
	 	 if($subcatgory){
			 $items =	$this->checkProdectList($id,$idshop);
		
			if($items){
				 $subcatgory=$this->getSubCategory($id);
				$catgory =$this->getCategory($subcatgory->getIdCategory());
				$model =$this->getShop($idshop);
				$this->render("prodectselectshop",array("items" =>$items,"idshop" =>$idshop,"title"=>$title));
			}

		}else{
			Yii::app()->user->setFlash('msg',NOTSUBCATEGORY);
			$this->actionShops();
		}

		
	}else{
		Yii::app()->user->setFlash('msg', NOTPARAMETERS);
				$this->actionShops();
	}
	 	
	 }					 
	public function  actionProdectShop($idshop){
		
		$model =$this->getShop($idshop);
	 		
	 	if($model && isset($_GET['id'])){
			
			$id=$_GET['id'];
			$subcatgory=$this->getSubCategory($id);
			$title ="רשימת מוצרים בחנות";
			if($subcatgory){
				
				$prodectshop =$this->setProdectList($id,$idshop);
		   		$subcatgory=$this->getSubCategory($id);
				$catgory =$this->getCategory($subcatgory->getIdCategory());
	 	
	 	
				if($prodectshop){
					
					$this->render("prodectshop",array("prodectshop" =>$prodectshop,"title"=>$title));
				}else{
					$this->render("prodectshop",array("title"=>$title));
				}
			}else{
				Yii::app()->user->setFlash('msg',NOTSUBCATEGORY);
						$this->actionShops();
			}
		}else{
			Yii::app()->user->setFlash('msg', NOTPARAMETERS);
					$this->actionShops();
		}
	 	
	 }
	 public function getShop($id){
		$model=Shop::model()->findByPk($id);
		return $model;
	}
	public function setShop($id,$model){
		$tempmodel =$this->getShop($id);
		$model->setName($tempmodel->getName());
		$model->setAdress($tempmodel->getAdress());
		$model->setLink($tempmodel->getLink());
		$model->setPhone($tempmodel->getPhone());
		$model->setLoctionX($tempmodel->getLoctionX());
		$model->setLoctionY($tempmodel->getLoctionY());
		return $model;
	}
	public function getAllCatgory(){
		$catgory=Category::model()->findAll();
		return $catgory;
	}
	public function getShopCatgory ($id){
		$catgory=ShopCategory::model()->findAll("idshop=:idShop",array(":idShop"=>$id));
		return $catgory;
	}
	public function deleteShopCatgory($id){
		ShopCategory::model()->deleteAll("idshop=:idshop",array(":idshop" =>$id));
	}

	
}
   


?>