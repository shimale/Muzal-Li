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
   	
    	 $("#viewupdate").click(function(){
   	  		var url = "viewuser/" + $("#id").val();    
   	 	 	$(location).attr('href',url);
   	 	 	return false;
   	  	 });
    	 $("#delete").click(function(){
    	  		var url = "deleteuser?id=" + $("#id").val();    
    	 	 	$(location).attr('href',url);
    	 	 	return false;
    	 });
    	 $("#changepassword").click(function(){
 	  		var url = "changepassword";
 	 	 	$(location).attr('href',url);
 	 	 	return false;
 		 });
    	 $("#addShop").click(function(){
  	  		var url = "viewinsertshop?id=" + $("#id").val();    
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
				<h1>טופס פירוט משתמש</h1>
			</div>
			<div id="home"></div>

			<form id="formRegister" action="">
				<label>שם משתמש( איימל):</label> <input id="username"
					name="username" type="email" required
					placeholder="(נא הכנס שם משתמש  ( איימל" readonly="readonly"
					value="<?php echo $user->getUserName()?>">

				<div class="control-group">
					<label>שם מלא:</label> <input id="name" name="name" type="text"
						required placeholder="נא הכנס שם פרטי" readonly="readonly"
						value="<?php echo $user->getName()?>">
				</div>
				<div class="control-group">
					<label>טלפון</label> <input id="phone" name="phone" type="text"
						required placeholder="נא הכנס מספר טלפון" readonly="readonly"
						value="<?php echo $user->getPhone()?>">
				</div>

				<?php
					
					
				if(count($listshop)){
					echo "<h2> רשימת חנויות</h2>";
					echo ' <ul class="nav nav-pills nav-stacked"> ';
					foreach ($listshop as $shop) {
							
						echo "<li class='active'><a href='viewupdateshop?id=". $shop->getId(). "&readonly=true'>".$shop->getName()."</a></li>";
							
					}

					echo "</ul>";
				}
					

				?>

				<input type="hidden" value="register" id="checkregister"
					name="checkregister" /> <input type="hidden" id="id" name="id"
					value="<?php echo $user->getId()?>">
					<?php
					if($this->allowUser()== SHOP){
					?>
						<a href="<?php echo $this->createurl("logout")?>" class="btn btn-primary link">להתנתק </a>
						<button id="addShop" class="btn btn-primary">הוספת חנות</button>
					<?php
					}
					
					?>
					
				<a href="<?php echo $this ->createUrl("edituser" ,array ("id"=> $user->getId()));?>" class="btn btn-primary">ערוך</a>
				<a href="<?php echo $this ->createUrl("deleteuser",array("id" =>$user->getId()));?>"  class="btn btn-primary">מחק</a>

				<?php
					
				if(isset($msg)&& $msg != ""){
					echo	'<div style="display:block" id="msg">'.$msg.' </div>';
				}

				?>




			</form>


		</div>

	</div>



	<script src="<?php echo yii::app()->baseUrl?>/js/bootstrap.js">
    </script>
</body>
</html>
