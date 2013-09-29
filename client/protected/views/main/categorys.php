<?php  include_once 'function.php';?>
<!DOCTYPE html>
<html lang="he">

<head>
	<meta charset="utf-8">
	<title> קטגוריות</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include_once 'link.php';?>


</head>
<body>
	<div  data-role="page" id="catgorty">
		<div id="page" data-role="header" data-theme="b"> 
			<h1> קטגוריות </h1>
			<a  data-theme="e" id="back" data-role="button" href="#" data-rel="back">אחורה</a>
		
		</div>
		<div data-role="content">
			<?php  
			 if(isset($categorys)){?>
			<ul id="list"   data-role="listview" data-inset="true" data-divider-theme="b"  data-filter="true" >
				<li data-role="list-divider">רשימת קטגוריות</li>
				<?php
				foreach ($categorys as $category){
					$url= $this->createUrl("Main/SubCatgorys",array("id"=> $category->getId()));
					?>
					<li data-icon="false" data-theme="d"><a href="<?php echo $url?>"><?php echo  $category->getName() ?></a></li>
					<?php
				}
				?>	
			</ul>
			<?php 
		}
		?>
		
		
		
		
		
  		
			
			
		</div>  
		<div  class="footer" data-role="footer">
			
			
		</div>
	</div>
	
	
	
</body>
</html>



