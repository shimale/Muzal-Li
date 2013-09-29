<?php include_once 'function.php';?>
<!DOCTYPE html>
<html lang="he">

<head>
<meta charset="utf-8">
<title> <?php echo $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include_once 'link.php';?>
</head>
<body>
	<div data-role="page">
		<div  id="page" data-role="header" data-theme="b">
		<?php include_once("breadcrumbs.php") ?>
		</div>
		<div data-role="content">
			<?php include_once("userInterface.php"); 
			if(isset($prodectshop)){
				?>
			<div data-role="collapsible-set"> 
			<ul id="list"   data-role="listview" data-inset="true" data-divider-theme="b">
				<li data-role="list-divider">רשימת מוצרים בחנות</li>
			</ul>
				<?php
				
				for($i=0 ;$i<count( $prodectshop); $i++){
				
				?>
				 <div  data-role="collapsible" data-theme="d"  data-theme-content="d">       
				 	 <h3><?php printString($prodectshop[$i][1]);?></h3>        
				 	
					
				  	
						<?php if($prodectshop[$i][4] !=""){  ?>
						<div class="shopprodect">
						<img src='http://img.zap.co.il/pics/<?php echo $prodectshop[$i][4]?>.gif' width="150" height="150"> 
						</div>
						<?php
						}
						/*echo $prodectshop[$i][6]->renderBegin();
						foreach($prodectshop[$i][6]->getElements() as $element){
					  
							echo   $element->render();
						}
			
						foreach($prodectshop[$i][6]->getButtons() as $button){
							echo  $button->render();
						}*/
						echo '<a   data-role="button" data-theme="e"  href=" '.$this ->createUrl("ProdectShop/deleteprodectshop",array("id" => $prodectshop[$i][0],"idshop"=>$_GET["idshop"])).'">מחיקת מוצר</a>	';
						//echo $prodectshop[$i][6]->renderend();
						?>
				  </div>   
				
				  	<?php 
					}
				}
					
				
				  	
				  	
				  	?>
				  
				
		</div>
			<a   data-role="button" data-theme="e"  href="<?php echo $this ->createUrl("Shop/selectprodectshop" ,array ("id"=>$_GET['id'],"idshop"=>$_GET['idshop']));?>"  > הוספת מוצרים לחנות</a>
		</div>
		<div class="footer" data-role="footer"></div>
	</div>



</body>
</html>



