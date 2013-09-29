<?php  include_once 'function.php';



?>
<!DOCTYPE html>
<html lang="he">

<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
	</script>
	<meta charset="utf-8">
	<title> תצוגת חנות</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include_once 'link.php';?>
	


</head>
<body>
	<div  data-role="page" id="view">
		<div id="page" data-role="header" data-theme="b"> 
			<h1> תצוגת חנות</h1>
			<a  data-theme="e" id="back" data-role="button" href="#" data-rel="back">אחורה</a>
		
		</div>
		<div id="countent" data-role="content"  >
				</script>
<div class="view">
				<img  src="http://img.zap.co.il/pics/imgs/nsite/newssite-<?php echo $shop->getId() ?>.gif">

			</div>
			<div class="view">
				<div id="map_canvas" class="map rounded"></div>
			
			</div>
			<div  class="view">
				<div>
				  <span class="description">שם חנות :  </span> <?php echo $shop ->getName() ?>
				</div>
				<div>
		        <span class="description"> כתובת : </span><?php echo $shop ->getAdress() ?>
				</div>
				<div>
		         <span class="description">  איימל : </span><?php echo $shop ->getEmail() ?>
				</div>
				<div>
		         <span class="description"> אתר : </span><?php echo "<a href='" . $shop ->getLink() ."'>". $shop ->getLink() ." </a>" ?>
				</div>
				<div>
		         <span class="description"> טלפון : </span><?php echo $shop->getPhone() ?>
				</div>
			</div>
			<div class="view">
				<form name="myFrom" action='<?php echo $this->createUrl("Main/Direction")?>' method="post">
					<input type="hidden" value="<?php echo $shop->getId() ?>" name="id" id="id">
					<input type="hidden" value="" name="loctionX" id="loctionX">
					<input type="hidden" value="" name="loctionY" id="loctionY">
					  
						  
				</form>
				<button id="direction" data-theme="e" > נווט לחנות</button>
			</div>
			
		</div>  
		<div  class="footer" data-role="footer">
			
			
		</div>
		<script src="<?php echo yii::app()->baseUrl?>/js/global.js"></script>
		<script type="text/javascript">
	 
	 var adress ='<?php echo $shop->getAdress(); ?>';

       $(function() { 
			$('#map_canvas').gmap({
				'center':'<?php echo $shop->getLoctionX() ?>,<?php echo $shop->getLoctionY() ?>', 
				'zoom': 15, 'callback': function() {
						var self = this;
						self.addMarker({'position': this.get('map').getCenter() }).click(function() {
							self.openInfoWindow({ 'content': adress }, this);
						});	
			}});		
			$('#direction').click(function() {
			 if(navigator.geolocation){
        		navigator.geolocation.getCurrentPosition(setloction, onError);
    		
	 			}
			});
				
	    });

     
        </script>
	</div>
	
	
	
</body>
</html>



