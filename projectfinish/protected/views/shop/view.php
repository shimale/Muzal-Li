<!DOCTYPE html>
<html lang="he">

<head>
<meta charset="utf-8">
<<title> <?php echo $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include_once 'link.php';?>	
</head>
<body>
<div data-role="page">
	<div  id="page" data-role="header" data-theme="b">
		<?php include_once("breadcrumbs.php") ?>
		</div>
		<div data-role="content" data-theme="a">
		<?php
		 include_once("userInterface.php"); 
			
			echo $form->renderBegin();

			foreach($form->getElements() as $element){
				 $element->readOnly =true;
				echo   $element->render();
			}
			if(file_exists('http://img.zap.co.il/pics/imgs/nsite/newssite-'.$img.'.gif')){
			echo '<label>לוגו חנות:</label>
			<div id="iconshop">
			<img src="http://img.zap.co.il/pics/imgs/nsite/newssite-'.$img.'.gif"></div>';
			}
			if(count($list)){
			?>
				<ul data-role="listview" data-inset="true" data-filter="true" data-divider-theme="b">
				<li data-role="list-divider">רשימת קטגוריות </li>
				<?php 
					for ( $i =0 ; $i <count($list) ;$i++) {
						$url =$this->createUrl("Shop/subcategoryshop",array("idshop"=>$id ,"id"=> $list[$i][0] ));
						?>
						<li data-icon='false'data-theme='d'><a href='<?php echo $url ?>'><?php echo $list[$i][1] ?></a></li>
										<?php 
					}
					echo "</ul>";
				}
					?>
					<a   data-role="button" data-theme="e"  href="<?php echo $this ->createUrl("Shop/editshop" ,array ("id"=>$id));?>"  > עריכת חנות</a>
			
			<?php 
  			foreach($form->getButtons() as $button){
				echo  $button->render();
			}
			
			echo $form->renderEnd();
			
  		
  		?>
		
		</div>
		<div class="footer" data-role="footer"></div>
	</div>



</body>


</html>
