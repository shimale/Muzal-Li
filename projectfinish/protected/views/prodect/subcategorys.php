<!DOCTYPE html>
<html lang="he">

<head>
<meta charset="utf-8">
<title> <?php echo $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include_once 'link.php';?>

</head>
<body>
  <div  data-role="page">
  	<div data-role="header" data-theme="b"> 
  		<h1> רשימת קטגוריות של מוצרים </h1>
  		<a href="#" data-rel="back">back</a>
  	</div>
  	<div data-role="content">
  	<?php
  	 include_once("userInterface.php"); 
			if($subcategorys){
			?>
	  			<ul data-role="listview" data-inset="true" data-divider-theme="b">
					<li data-role="list-divider">רשימת תת קטגוריות</li>
				<?php 
					foreach($subcategorys as $subcategory){
						$url = $this->createUrl("prodect/prodects",array("id"=>$subcategory->getId(),"idcategory"=>$subcategory->getIdCategory()));
														 
						?>
						 <li data-icon="false" data-theme="a"> <a href="<?php echo $url;?>"><?php echo  $subcategory->getName() ;?> </a> </li>
						<?php 
					}
							
			}
		 ?>
		</ul>
  </div>  
  <div  class="footer" data-role="footer">
  
  
  	</div>
  </div>
	
	
	
</body>
</html>

			

