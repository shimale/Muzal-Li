<?php  include_once 'function.php';?>
<!DOCTYPE html>
<html lang="he">

<head>
	<meta charset="utf-8">
	<title>התחברות משתמשים</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include_once 'link.php';?>

</head>
<body>
	<div data-role="page">
		<div data-role="header" data-theme="b"> 
			<h1>  התחברות משתמשים</h1>
		</div>
		<div data-role="content">
			<?php

			echo $form;
			if(Yii::app()->user->hasFlash('msg')){
				printMsg();
			}

			?>

		</div>  
		<div  class="footer"  data-role="footer"></div>
	</div>
</body>
</html>
