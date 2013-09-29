<?php
  include_once("function.php");
class MainController extends Controller
{	
	
	public function  actionIndex(){
		
		$categorys = Category::model()->findAll();
		$this->render("categorys",array("categorys" =>$categorys  ));
		

	}					   
	public function  actionSubCatgorys($id){
		
		$subcategory = SubCategory::model()->findall("idcategory=:idcategory",array(":idcategory" =>$id));
		if($subcategory){
			$this->render("subcategory",array("subcategory" =>$subcategory  ));
		}else{
			$this->actionIndex();
		}
		
	}
	public function  actionProdects($id){
		
		$prodects = Prodect::model()->findAll("idSubCategory=:idSubCategory" ,array(
			":idSubCategory"=>$id));

		if($prodects){
			$this->render("prodects",array("prodects" =>$prodects  ));
		}else{
			$this->actionIndex();
		}
		
	}
	public function  actionShops(){
		
		if(isset($_POST['id'])) {
		
		$prodects = ProdectShop::model()->findAll("idprodect=:idprodect" ,array(":idprodect"=>$_POST['id']));

			if($prodects ){

			$array =orderList($prodects,$_POST['loctionX'],$_POST['loctionY']);

				$this->render("shops",array("array" =>$array ,"loctionX" =>$_POST['loctionX'],"loctionY" =>$_POST['loctionY']));
			}else{
				$this->actionIndex();
			}
		}else{
			$this->actionIndex();	
		}
	}
	public function  actionViewShop($id){
		
		
		
		$model=Shop::model()->findByPk($id);

		if($model){

			$this->render("view",array("shop"=>$model));
		}
		
		
	}
	public function  actionShop($id){
		
		
	}
	public function  actionDirection(){
		
		if(isset($_POST['id'])) {
		
			$model=Shop::model()->findByPk($_POST['id']);

			if($model){
				$this->render("direction",array("shop" =>$model ,"loctionX" =>$_POST['loctionX'] ,"loctionY" =>$_POST['loctionY']));
			}else{
				$this->actionIndex();
			}
		}else{
			$this->actionIndex();	
		}

		
	}
	
	

	public function actionError(){
		
		if($error=Yii::app()->errorHandler->error){
			
			$this->render("error",$error);
		}

	}

}