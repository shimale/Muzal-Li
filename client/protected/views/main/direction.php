<!DOCTYPE html>
<html lang="he">

<head>
	<meta charset="utf-8">
	<title>מפת ניווט</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include_once 'link.php';?>
	


	
</head>
<body>
	<div data-role="page">
		<div id="page" data-role="header" data-theme="b"> 
			<h1> מפת ניווט</h1>
			<a  data-theme="e" id="back" data-role="button" href="#" data-rel="back">אחורה</a>
		
		</div>
		<div data-role="content">
		 <?php
			Yii::import('ext.gmap.*');
		$gMap = new EGMap();
 		$gMap->setWidth('100%');
		$gMap->setHeight(400);
		$gMap->zoom = 10; 

		$gMap->setCenter($shop->getLoctionX(),$shop->getLoctionY());
 
		$pointOne = new EGMapCoord($loctionX, $loctionY);
 
		$pointTwo= new EGMapCoord($shop->getLoctionX(),$shop->getLoctionY());
 

	$direction = new EGMapDirection($pointOne,$pointTwo, 'direction_sample');
 	$direction ->travelMode =$direction::TRAVEL_MODE_DRIVING;
	$direction->optimizeWaypoints = true;
	$direction->provideRouteAlternatives = true;
 
	$renderer = new EGMapDirectionRenderer();
	//$renderer->draggable = true;
	$renderer->panel = "direction_pane";
	$renderer->setPolylineOptions(array('strokeColor'=>'red'));
	$direction->setRenderer($renderer);
 
	$gMap->addDirection($direction);
 
	$gMap->renderMap();
?>
<div id="direction_pane"></div>

		</div>
	<div class="footer" data-role="footer"></div>
</div>



</body>
</html>
