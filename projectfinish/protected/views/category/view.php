<!DOCTYPE html>
<html lang="he">

<head>
	<meta charset="utf-8">
	<title> <?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include_once 'link.php';?>
	<script type="text/javascript">


	function Onsubmit(){
		var flag=confirm("You want to delete the current category?");

		if(flag){
			return true;
		}else{

			return false;
		}
		
		
		

	}

	</script>
</head>
<body>
	<div data-role="page">
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
			echo '<a data-role="button" data-theme="e"
			href="'. $this ->createUrl("Category/editcategory" ,array ("id"=> $id)).'">עריכה
			</a>';
			foreach($form->getButtons() as $button){
				echo  $button->render();
			}
			if(!$subcategory){
				?>
				<a class="link" data-role="button" data-theme="e"
				href="<?php echo $this ->createUrl("SubCategory/createsubcategory" ,array ("id"=> $id));?>">
				הוספת תת קטגוריה</a>
				
				<?php 
			}
			echo $form->renderEnd(); 
			
			
			
			?>
			<div class="clear"></div>
		</form>
		
		

		
		<div class="clear" ></div>	

		<?php
		if($subcategory){
			
			echo'<ul class="list" data-role="listview" data-inset="true" data-divider-theme="b" data-filter="true">';
			echo '<li data-role="list-divider">רשימת תת קטגוריות</li>';
			
			foreach($subcategory as $item){
				echo '<li data-icon="false" data-theme="d"> <a href="'.$this->createUrl("SubCategory/reviewsubcategory",array("id"=>$item->getId())).'">'. $item->getName().' </a> </li>';
			}
			echo "</ul>";	
			echo '<a class="link" data-role="button" data-theme="e"
			href="'. $this ->createUrl("SubCategory/createsubcategory" ,array ("id"=> $id)).'">
			הוספת תת קטגוריה</a>';
		}
		
		?>
		
		
		
		

	</div>
	<div class="footer" data-role="footer"></div>
</div>



</body>
</html>
