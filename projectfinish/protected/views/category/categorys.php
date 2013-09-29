<?php  include_once 'function.php';?>
<!DOCTYPE html>
<html lang="he">

<head>
	<meta charset="utf-8">
	<title> <?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include_once 'link.php';?>
<script type="text/javascript">
 $(document).ready(function() {
	$('#list').listview('refresh'); 
	$(".ui-input-text ui-body-c").attr("placeholder","חפש")
});

</script>
</head>
<body>
	<div  data-role="page">
		<div id="page" data-role="header" data-theme="b"> 
			<?php include_once("breadcrumbs.php") ?>
		</div>
		<div data-role="content">
			<?php include_once("userInterface.php"); 
			 if(isset($categorys)){?>
			<ul id="list"   data-role="listview" data-inset="true" data-divider-theme="b"  data-filter="true" >
				<li data-role="list-divider">רשימת קטגוריות</li>
				<?php
				foreach ($categorys as $category){
					$url= $this->createUrl("Category/reviewcategory",array("id"=> $category->getId()));
					?>
					<li data-icon="false" data-theme="d"><a href="<?php echo $url?>"><?php echo  $category->getName() ?></a></li>
					<?php
				}
				?>	
			</ul>
			<?php 
		}
		?>
		<a  class="link" data-role="button" data-theme="e"  href="<?php echo $this ->createUrl("Category/createcategory");?>"  > הוספת  קטגוריה</a>
		<div class="clear"> </div>
		<?php
		if(Yii::app()->user->hasFlash('msg')){
			printMsg();
		}
		?>
		
  		
			
			
		</div>  
		<div  class="footer" data-role="footer">
			
			
		</div>
	</div>
	
	
	
</body>
</html>



