c<?php  include_once 'function.php';?>

<!DOCTYPE html>
<html lang="he">

<head>
<meta charset="utf-8">
<title> <?php echo $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include_once 'link.php';?>
<script type="text/javascript">

function Onsubmit(){
	var flag=confirm("You want to delete the current sub category?");

	if(flag){
		 return true;
	}else{

		 return false;
	}
	
	 
	

}


</script>
</head>
<body>
  <div  data-role="page">
  	<div id="page" data-role="header" data-theme="b"> 
  		<?php include_once("breadcrumbs.php") ?>
  	</div>
  	<div data-role="content">
  	<?php include_once("userInterface.php"); 
	echo $form->renderBegin();
      
      foreach($form->getElements() as $element){
      		$element->readOnly =true;
          echo   $element->render();
      }
      
      echo	'<a   data-role="button" data-theme="e" href="'.$this ->createUrl("SubCategory/editsubcategory" ,array ("id"=>$id)).'" > עריכה </a>';
      
      foreach($form->getButtons() as $button){
        echo  $button->render();
      }
      if(count($prodects)==0){
		?>
			<a  class="link" data-role="button" data-theme="e"  href="<?php echo $this ->createUrl("prodect/createprodect",array("id"=>$id));?>" >הוסף מוצר</a>
				
		<?php 
		}
			 echo $form->renderEnd(); ?>
			
		
		<div class="clear"></div>
		<?php 
		
		
		if (count($prodects)){?>
		<ul class="list" data-role="listview" data-inset="true" data-filter="true" data-divider-theme="b">
			<li data-role="list-divider">רשימת מוצרים</li>
			<?php
				foreach ($prodects as $prodect){
					$url= $this->createUrl("Prodect/reviewprodect",array("id"=> $prodect->getId()));
				
					?>
					<li data-icon="false" data-theme="d"><a href="<?php echo $url?>"><?php echo printString($prodect->getName() );?></a></li>
					<?php
				}
				?>	
		</ul>
		<a  class="link" data-role="button" data-theme="e"  href="<?php echo $this ->createUrl("Prodect/createprodect",array("id"=>$id));?>" >הוסף מוצר</a>
		<?php }
		
		 if(Yii::app()->user->hasFlash('notprodect')){

				echo '<div style="display:block" id="msg" >'. Yii::app()->user->getFlash('notprodect').'</div>';
			}
		
		
		?>
  </div>  
  <div  class="footer" data-role="footer">
  
  
  	</div>
  </div>
	
	
	
</body>
</html>
