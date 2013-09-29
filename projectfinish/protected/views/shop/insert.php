<!DOCTYPE html>
<html lang="he">

<head>
	<meta charset="utf-8">
	<title> <?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include_once 'link.php';?>
	
</head>
<body>
	
	
	<div id="page" data-role="page">
		<div  id="page" data-role="header" data-theme="b">
		<?php include_once("breadcrumbs.php") ?>
		</div>
		<div data-role="content" data-theme="a">
		<?php include_once("userInterface.php"); 
		
			echo $form->renderBegin();

			foreach($form->getElements() as $element){
				
				echo   $element->render();
			}
			?>
			<div class="find">
			<input id="find"  data-theme="e" type="button" value="חיפוש מיקום" />
			</div>
			<div id='map_canvas'></div>
			

			 <input name="lat" type="hidden" value="">
			 <input name="lng" type="hidden" value="">
			 <?php
			foreach($form->getButtons() as $button){
		        echo  $button->render();
		     }
		     echo $form->renderEnd(); 

		     ?>

	 		
		
				
		</div>
		<div class="footer" data-role="footer">
			<script  type="text/javascript" >
			 $(function(){
	        $(".geocomplete").geocomplete({
	          map: "#map_canvas",
	          details: "form",
	          types: ["geocode", "establishment"],
	        });

	        $("#find").click(function(){
	          $(".geocomplete").trigger("geocode");
	        });
	      });


			</script> 
			 


		</div>
	</div>



</body>
</html>

