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
			
			if(isset($listsubCategory)){
				?>
				<ul data-role="listview" data-inset="true" data-filter="true" data-divider-theme="b">
					<li data-role="list-divider">רשימת תת קטגוריות</li>
					<?php
					foreach ($listsubCategory as $subcategory){
						$url = $this->createUrl("Shop/prodectshop",array("idshop" =>$_GET['idshop'],"id"=>$subcategory->getId()));
						?>
						<li data-icon='false' data-theme='d'>
							<a
							href="<?php echo $url ?>"> <?php echo $subcategory-> getName() ?>
						</a>
					</li>
					<?php

				}
				echo "</ul>";
			}
			?>
		</div>

		<div class="footer" data-role="footer"></div>

	</div>
</body>
</html>

