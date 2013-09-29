<!DOCTYPE html>
<html lang="he">

<head>
	<meta charset="utf-8">
	<title>תת קטגוריות</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include_once 'link.php';?>
	


	
</head>
<body>
	<div data-role="page">
		<div id="page" data-role="header" data-theme="b"> 
			<h1> תת קטגוריות</h1>
			<a  data-theme="e" id="back" data-role="button" href="#" data-rel="back">אחורה</a>
		
		</div>
		<div data-role="content">


		<?php
		if($subcategory){
			
			echo'<ul class="list" data-role="listview" data-inset="true" data-divider-theme="b" data-filter="true">';
			echo '<li data-role="list-divider">רשימת תת קטגוריות</li>';
			
			foreach($subcategory as $item){
			?>
			 <li data-icon="false" data-theme="d">
			 <a href="<?php echo $this->createUrl("Main/Prodects",array("id" => $item->getId()))  ?>"><?php echo $item->getName() ?>  </a> </li>
			  <?php
			}
			echo "</ul>";	
			
		}
		
		?>

	
		
		
		
		

	</div>
	<div class="footer" data-role="footer"></div>
</div>



</body>
</html>
