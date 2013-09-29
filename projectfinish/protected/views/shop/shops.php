<!DOCTYPE html>
<html lang="he">

<head>
	<meta charset="utf-8">
	<title> <?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include_once 'link.php';?>
<script type="text/javascript">
$(document).ready(function($) {
	
	$('#list').listview('refresh'); 
});


</script>

</head>
<body>
	<div  data-role="page">
		<div id="page" data-role="header" data-theme="b"> 
			<?php include_once("breadcrumbs.php") ?>
		</div>
		<div data-role="content">
			<?php include_once("userInterface.php"); ?>
			<ul id="list" data-role="listview" data-inset="true" data-filter="true" data-divider-theme="b">
				<li data-role="list-divider">רשימת חנויות</li>
				
				<?php
				
					for($i =0 ;$i<count($listshop) ;$i++){
						
					$url= $this->createUrl("Shop/reviewshop",array("id"=> $listshop[$i]['id']));
					?>
					<li class="itemshop" data-icon="false" data-theme="d">
						
						<a href="<?php echo $url?>"><img width="88" height="36"  src="http://img.zap.co.il/pics/imgs/nsite/newssite-<?php
						echo $listshop[$i]['id']?>.gif"><span><?php echo  $listshop[$i]['name'] ?></span></a></li>

					<?php
				}
				?>	
			</ul>
			<div id="pageshop">

			<?php
				
				$currentpage =0 ;
				if(isset($_GET['page'] )){


					$currentpage =$_GET['page'];

					 if ($currentpage > 0){
					echo
					'<a   data-role="button" data-theme="e"  href="'.$this ->createUrl("Shop/shops",array("page"=>$currentpage-1)).'"> קודם </a>' ;	
					}

					if($currentpage > $page){
						
						$currentpage =0;
					}
					
					
				}
				
				if($currentpage ==1){
			           ?>
					<a   data-role="button" data-theme="e"  href="<?php echo $this ->createUrl("Shop/shops",array("page"=>$currentpage-1));?>"><?php echo $currentpage-1 ?></a>
				 <?php
					
				 }else if($currentpage >=2){
				  ?>
					<a   data-role="button" data-theme="e"  href="<?php echo $this ->createUrl("Shop/shops",array("page"=>$currentpage-2));?>"><?php echo  $currentpage-2 ?></a>
					<a   data-role="button" data-theme="e"  href="<?php echo $this ->createUrl("Shop/shops",array("page"=>$currentpage-1));?>"><?php echo $currentpage-1 ?></a>
				 <?php
				 }
				 ?>
				 <a    data-role="button" data-theme="b"  href="<?php echo $this ->createUrl("Shop/shops",array("page"=>$currentpage));?>"><?php echo $currentpage ?></a>
				 <?php
				 if($page !=$currentpage){
				?>
				<a   data-role="button" data-theme="e"  href="<?php echo $this ->createUrl("Shop/shops",array("page"=>$currentpage+1));?>"><?php echo $currentpage+1 ?></a>
				 <?php
				  if($currentpage + 2 <= $page){
				  ?>
				  <a   data-role="button" data-theme="e"  href="<?php echo $this ->createUrl("Shop/shops",array("page"=>$currentpage+2));?>"><?php echo $currentpage +2 ?></a>
				<?php
				
				 }
				 ?>
				<a   data-role="button" data-theme="e"  href="<?php echo $this ->createUrl("Shop/shops",array("page"=>$currentpage+1));?>"> הבא </a>
				<?php
				}
				?>
				 
			</div>
			<a   data-role="button" data-theme="e"  href="<?php echo $this ->createUrl("Shop/createshop");?>">הוסף חנות</a>
			<div class="clear"> </div>
			<?php 
			
			if(Yii::app()->user->hasFlash('msg')){
				printMsg();
			}
			?>
			
		</div>
			
	
		<div  class="footer" data-role="footer">
			
			
		</div>
	</div>
	
	
	
</body>
</html>



