<?php  include_once 'function.php';?>

<!DOCTYPE html>
<html lang="he">

<head>
<meta charset="utf-8">
<title> מוצרים</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include_once 'link.php';?>



</head>
<body>
  <div id="prodect" data-role="page">
  	<div id="page" data-role="header" data-theme="b"> 
			<h1>מוצרים</h1>
			<a  data-theme="e" id="back" data-role="button" href="#" data-rel="back">אחורה</a>
		
		</div>
  	<div data-role="content" id="prodectcontent">
  <?php
		if (count($prodects)){
		 ?>
		 <form name="myFrom" action="<?php echo $this->createUrl("Main/Shops")?>" method="post">
		<input type="hidden" value="" name="id" id="id">
		<input type="hidden" value="" name="loctionX" id="loctionX">
		<input type="hidden" value="" name="loctionY" id="loctionY">
		<ul class="list" data-role="listview" data-inset="true" data-filter="true" data-divider-theme="b">
			<li data-role="list-divider">רשימת מוצרים</li>
			<?php
				foreach ($prodects as $prodect){
				?>
					<li   data-icon="false" data-theme="d">
						
					<a onclick="getloction(<?php echo $prodect->getId() ;  ?>)" id=""  href="" >	<?php echo printString($prodect->getName() 


					);?></a></li>
					<?php
				}
				?>	
		</ul>
		</form>
		<?php 
		}
		 
		
		?>
  </div>  
  <div  class="footer" data-role="footer">
 <script src="<?php echo yii::app()->baseUrl?>/js/global.js"></script>
  
  	</div>
  </div>
	
	
	
</body>
</html>
