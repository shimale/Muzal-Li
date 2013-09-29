<?php
	/* users */
	define('ADMAIN', 0);
	define('SHOP', 1);
	define("ADMIN_AND_SHOP", 2);
	define ("EXIT" ,0);

	/*error */
	define ("NOTLOGIN" ,1);
	define("NOTPARAMETERS",2);
	define("THANKS",3);
	define("NOTCATEGORY",4);
	define("NOTSUBCATEGORY",5);
	define("NOTPRODECT",6);
	define("NOTSHOP",7);
	define ("NOTADRESS",8);
	

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	private $userData;
	/**
	 * @var string the default layout for the controller view. Defaults to 'column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	//public $layout='column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	//public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public function init() {
	   	
	    if (!Yii::app()->user->isGuest){
	      
	        $this->userData = User::model()->findByPk(Yii::app()->user->id);

	    
		}else{
			
			$this->userData=null;
			
		}
		

	}
	public function allowUser() { //-1 no login required 0..3: admin level
    	$level = -1;
	    if ($this->userData !== null){

	        $level = $this->userData->level;

		}
		return $level;
	    
	}
	
	public function getlistCategory($arrayCategory){
		$index=0 ;
		$temparray = array();
	
		foreach ($arrayCategory as $category) {

			$listcatgory = Category::model()->findByPk($category->getIdCategory());

			$temparray [$index]= array($listcatgory ->getId(),$listcatgory->getName());
			$index++;
		}
		
		return $temparray;
	
	}
	public function updateShopCategory($arrayCategory,$idshop){
		
		for($i=0; $i <count($arrayCategory);$i++){
			$shopCategory = new ShopCategory();
			$shopCategory->setIdShop($idshop);
			$shopCategory->setIdCategory($arrayCategory[$i]);
			$shopCategory->save();
		}
	}
	
	public function checkProdectList($id,$idshop){
		$flag=true;
		$index=0;
		$list=array();

	 	$prodects =Prodect::model()->findAllByAttributes(array ("idSubCategory"=>$id));
		$prodectshops = ProdectShop::model()->findAllByAttributes(array ("idsubcategory"=>$id,"idshop"=>$idshop));
		foreach ($prodects as $item){
			foreach ($prodectshops as $prodectshop){
					
					if($item ->getID() == $prodectshop->getIdProdect()){
						$flag=false;
						break;
					}
			}
			if($flag){
				$min =$item->getMinPrice();
				$max =$item->getMaxPrice();
				$from= $this->createForm($item,$min,$max,$min);
				$list[$index++] =array($item->getName(),$min,$max,$from,$item->getPicture());
			}
			$flag=true;
		}
		return $list;
	}
	public function setProdectList($id,$idshop){
	
		$listprodect =array();
		$index=0;
		$products =Prodect::model()->findAllByAttributes(array ("idSubCategory"=>$id));
		$prodectshops = ProdectShop::model()->findAllByAttributes(array ("idsubcategory"=>$id,"idshop"=>$idshop));
		foreach ($prodectshops as $prodectshop){
			
			foreach ($products as $prodect){
				
				if($prodect ->getID() == $prodectshop->getIdProdect()){
					$model =ProdectShop::model()->findByPk($prodectshop->getId());
					$from= $this->createForm($model,$prodect->getMinPrice(),$prodect->getMaxPrice(),$prodectshop->getPrice());
					
					$listprodect[$index++] = array($prodectshop->getId(),$prodect->getName(),$prodect->getMinPrice(),$prodect->getMaxPrice(),$prodect->getPicture(),$prodect->getId(),$from);
				}
			}
		}
		
		return $listprodect;
	}
	public function createForm($model,$min,$max,$price){
		
		$nameTable =$model["tableSchema"]->name;
		if($nameTable =="prodectshop"){
			$from = new CForm('application.views.shop.prodectshopFrom', $model);
			$from->action =$this->createurl("ProdectShop/updateprodectshop");
		}else{
			$from = new CForm('application.views.shop.prodectFrom', $model);
			$from->action =$this->createurl("ProdectShop/insertProdectShop");
		}
		$from->getElements()->getIterator()->current()->min=
		$min;
		$from->getElements()->getIterator()->current()->max=
		$max;
		$from->getElements()->getIterator()->current()->value=$price;
		return $from;
	}
	public function getUrl(){
	 	$url =$this->createUrl("main/index");
		$this->redirect($url);
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
		public function getSubCategory($id){
		$model=SubCategory::model()->findByPk($id);
		return $model;
	}
	public function setSubCategory($id,$model){
		$tempmodel =$this->getSubCategory($id);
		$model->setName($tempmodel->getName());
		$model->setIdCategory($tempmodel->getIdCategory());
		return $model;
	}
}