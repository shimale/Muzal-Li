<?php

  function printString($str){
		$arr =explode(" ",$str);
		
		for($i =0 ;$i<count($arr);$i++){
			
			if($i % 5== 0 && $i !=0 ){
				echo "<br>";
			}
			echo $arr[$i]." ";
		}
  }
  function printMsg(){
	
	$baginMsg ='<div  data-role="content" data-theme="b" id="msg">';
	$endMsg ='</div>';
	$msg =Yii::app()->user->getFlash('msg');
	
	switch ($msg){
		
		case NOTLOGIN:
			echo $baginMsg."פרטי משתמש לא קיימים במערכת".$endMsg;
			break;

		case NOTPARAMETERS:
			echo  $baginMsg ."לא נשלחו פרמטרים" .$endMsg;
			break;
		case THANKS:
			echo  $baginMsg ."תודה נשמח לראות אותך שוב" .$endMsg;
			break;
		case NOTCATEGORY:
			echo  $baginMsg ."לא קיימת קטגוריה בעלת מספר כזה" .$endMsg;
			break;

		case NOTSUBCATEGORY:
			echo  $baginMsg ."לא קיימת תת  קטגוריה בעלת מספר כזה" .$endMsg;
			break;
		case NOTPRODECT:
			echo  $baginMsg ."לא קיימ מוצר בעלת מספר כזה" .$endMsg;
			break;
		case NOTSHOP:
			echo  $baginMsg ."לא קיימ חנות בעלת מספר כזה" .$endMsg;
			break;
		case NOTADRESS:
			echo  $baginMsg ."כתובת לא קיימת" .$endMsg;


	}
	
  }
  function createForm($model,$namebutton,$url){

  	$nameTable =$model["tableSchema"]->name;
  
	switch($nameTable){
		
		case "category":

			$from = new CForm('application.views.category.categoryForm', $model);
			$from->action =$url;
			$from->getButtons()->getIterator()->current()->label=
			$namebutton;
			break;
		case "subcategory":
		
			$from = new CForm('application.views.subCategory.subCategoryForm', $model);
			
			$from->action =$url;
			$from->getButtons()->getIterator()->current()->label=
			$namebutton;
			break;
	  case "prodect":
			
			$from = new CForm('application.views.prodect.prodectFrom', $model);
			$from->action =$url;
			$from->getButtons()->getIterator()->current()->label=
			$namebutton;
			break;
	 case "shop":
			
			$from = new CForm('application.views.shop.shopFrom', $model);
			$from->action =$url;
			$from->getButtons()->getIterator()->current()->label=
			$namebutton;
			break;

	}
	return $from;
  	

  }

?>