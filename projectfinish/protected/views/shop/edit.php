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
			

			 <input name="lat" type="hidden" value="<?php echo $lat ?>">
			 <input name="lng" type="hidden" value="<?php echo $lng ?>">
      <div data-role="fieldcontain">
      	<fieldset data-role="controlgroup">
		<?php
			$flag= true;
			$baginCheck ='<input type="checkbox"  value="';
			$middenCheck ='"name="catgory[]" id="catgory_';
			$endCheck ='"class="custom" data-mini="true" ';
			if(isset($category)){
			   
			   echo"<h2> רשימת קטגוריות לבחירה  </h2>";

			   foreach ($category as $item){

			   	for($i =0 ; $i < count($list);$i++){
					
					if($list[$i][0]== $item ->getId()){
						
						echo $baginCheck.$item->getId() .$middenCheck.$item->getId().$endCheck .'checked="checked"/>
						<label data-theme="a" for="catgory_'
						. $item->getId() .'">'.$item -> getName().'</label>';
							$flag=false;
							break;
						}
					}
					if($flag){
						echo $baginCheck.$item->getId() .$middenCheck.$item->getId().$endCheck.'/>
						<label data-theme="a" for="catgory_'.$item->getId() .'">'.$item -> getName().'</label>';
					}
					$flag=true;
				}
			}
						?>
					</fieldset>
				</div>
				<?PHP
					foreach($form->getButtons() as $button){
		        		echo  $button->render();
		     		 }
		      		echo $form->renderEnd(); ?>
			
			
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
	        })
	      });


			</script> 


		</div>
	</div>



</body>


</html>
