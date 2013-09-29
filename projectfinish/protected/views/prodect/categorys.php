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
  		<ul data-role="listview" data-inset="true" data-divider-theme="b">
			<li data-role="list-divider">רשימת קטגוריות</li>
			<?php
			 include_once("userInterface.php"); 
				foreach ($allcategory as $category){
					$url= $this->createUrl("prodect/subCategoryprodect",array("id"=> $category->getId()));
					?>
					<li data-icon="false" data-theme="a"><a href="<?php echo $url?>"><?php echo  $category->getName() ?></a></li>
					<?php
				}
				?>	
		</ul>
  		
  </div>  
  <div  class="footer" data-role="footer">
  
  
  	</div>
  </div>
	
	
	
</body>
</html>

			

