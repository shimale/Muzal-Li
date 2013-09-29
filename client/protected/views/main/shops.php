<?php  
include_once 'function.php';			
?>
<!DOCTYPE html>
<html lang="he">

<head>
	<meta charset="utf-8">
	<title> חנויות</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include_once 'link.php';?>
<script type="text/javascript">
	
	
	

	
			
			
	</script>
</head>
<body>
	<div  data-role="page">
		<div id="page" data-role="header" data-theme="b"> 
			<h1>חנויות </h1>
			<a  data-theme="e" id="back" data-role="button" href="#" data-rel="back">אחורה</a>
		
		</div>
		<div id="content" data-role="content">
		<?php
			if(count($array)){

				echo '<ul id="list"   data-role="listview"data-inset="true" data-divider-theme="b"  data-filter="true" ><li data-role="list-divider">רשימת חנויות</li>';
					
				for ($i =0 ;$i<count($array) ;$i++){
					
				echo $i . '<li class="listitem" data-theme="d">
				<div  class="iconshop">
				<img width="88" height="31" src="http://img.zap.co.il/pics/imgs/nsite/newssite-'. $array[$i][0]->getId() .'.gif"></div>
					<div  class="viewshop" >
					<div> שם חנות : '. htmlentities( $array[$i][0]->getName(),ENT_QUOTES,"UTF-8") .'</div>
					<div> כתובת : '. htmlentities($array[$i][0]->getAdress(),ENT_QUOTES,"UTF-8" ).'</div>
					<div>מרחק מיעד הוא : '. $array[$i][1] * 1000 . ' מטר</div></div>
					<div class="clear"> </div>
					<div class="buttonshop"><a   data-role="button" data-theme="e"
					 href="'.$this->createUrl("Main/ViewShop",array("id"=>$array[$i][0]->getId())) .'">תצוגת חנות</a></div></li>';
			  
			
				}
				echo "</ul>";
	

			}else{
				echo "לא קיים חנויות באזור שאתה נמצא";
			}

		?>
	
		</div>  
		<div  class="footer" data-role="footer">
		</div>
	</div>
</body>
</html>



