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
  		<h1> רשימת מוצרים</h1>
  		<a href="#" data-rel="back">back</a>
  	</div>
  	<div data-role="content">
  		<?php include_once("userInterface.php"); ?>
  		<ul data-role="listview" data-inset="true" data-divider-theme="b">
			<li data-role="list-divider">רשימת מוצרים</li>
			<?php
				foreach ($prodects as $prodect){
					$url= $this->createUrl("prodect/reviewprodect",array("id"=> $prodect->getId()));
					?>
					<li data-icon="false" data-theme="a"><a href="<?php echo $url?>"><?php echo  $prodect->getName() ?></a></li>
					<?php
				}
				?>
		</ul>
  		<a  class="link" data-role="button" data-theme="b"  href="<?php echo $this ->createUrl("prodect/createprodect",array("id"=>$idSubCategory,"idcategory"=>$idCategory));?>">הוסף מוצר</a>
  </div>  
  <div  class="footer" data-role="footer">
  
  
  	</div>
  </div>
	
	
	
</body>
</html>

			

