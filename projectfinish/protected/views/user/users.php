<!DOCTYPE html>
<html lang="he">

<head>
<meta charset="utf-8">
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- Le styles -->
<link href="<?php echo yii::app()->baseUrl?>/css/bootstrap.css"
	rel="stylesheet">
<link
	href="<?php echo yii::app()->baseUrl?>/css/bootstrap-responsive.css"
	rel="stylesheet">
<link href="<?php echo yii::app()->baseUrl?>/css/style.css"
	rel="stylesheet">
<script type="text/javascript"
	src="<?php echo yii::app()->baseUrl?>/js/jquery.js">
    </script>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
      </script>
    <![endif]-->
<!-- Le fav and touch icons -->
<script type="text/javascript">
  	 $(document).ready(function () {
  		
  	  	$("#insertUser").click(function(){
  		  		var url = "registrar";
  		 	 	$(location).attr('href',url);
  		 	 	return false;
  	 });
  	 });
  
  	
  	</script>
</head>
<body>
	<div class="container">
		<div class="containerBody">
			<div id="header">
				<h1>רשימת משתמשים</h1>
			</div>
			<div id="home"></div>

			<ul class="nav nav-pills nav-stacked">
			<?php
			foreach ($listuser as $user){
				$url= $this->createUrl("reviewuser",array("id"=> $user->getId()));
				?>
				<li class="active"><a href="<?php echo $url ;?>"><?php echo  $user->getName() ?></a></li>
				<?php
			}
	  ?>
			</ul>
			<a href="<?php echo $this->createUrl("register");?>" class="btn btn-primary"> הוסף משתמש </a>
			<?php
			if(isset($msg)&& $msg != ""){
				echo	'<div style="display:block" id="msg">'.$msg.' </div>';
			}

			?>
		</div>
	</div>
	<script src="<?php echo yii::app()->baseUrl?>/js/bootstrap.js">
    </script>
</body>
</html>

