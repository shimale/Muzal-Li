<?php include_once 'function.php';?>
<!DOCTYPE html>
<html lang="he">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include_once 'link.php';?>
	<title> <?php echo $title ?></title>
<body>
<div data-role="page">
	<div  id="page" data-role="header" data-theme="b">
		<?php include_once("breadcrumbs.php") ?>
		</div>
	<div data-role="content">
		<?php include_once("userInterface.php"); ?>
		<div data-role="collapsible-set" > 
		<ul id="list"   data-role="listview" data-inset="true" data-divider-theme="b">
				<li data-role="list-divider">רשימת מוצרים כללית</li>
		</ul>
			<?php
			for($i=0 ;$i<count( $items); $i++){
			?>
				<div data-role="collapsible" data-theme="d" ><h3><?php printString($items[$i][0]);?></h3>

					
					<div class="clear"></div>
					<?php if($items[$i][4] !=""){  ?>
					<div class="shopprodect">
					<img src='http://img.zap.co.il/pics/<?php echo  $items[$i][4]?>.gif' width="150" height="150"> 
					</div>
					<?php } ?>
					<div class="clear"></div>
					<?php
					echo $items[$i][3]->renderBegin();
						foreach($items[$i][3]->getElements() as $element){
					  
							echo   $element->render();
						}
			            echo '<input type="hidden" value="'.$idshop.'" name="idshop" id="idshop"/>';
						foreach($items[$i][3]->getButtons() as $button){
							echo  $button->render();
						}
						echo $items[$i][3]->renderend();
						?>
					
			</div>   

			<?php 
			}
			?>
				</div>
			</div>
			<div class="footer" data-role="footer"></div>
		</div>
	</body>
	</html>



