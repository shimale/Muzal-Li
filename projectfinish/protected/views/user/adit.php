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
   	  		var url = "viewuser";    
   	 	 	$(location).attr('href',url);
   	 	 	return false;
   	  	 });
   	  	 $("#viewupdate").click(function(){
			$("#update").submit();
   	   	  });
    	
  	 });
  	</script>
</head>
<body>
	<div class="container">
		<div class="containerBody">
			<div id="header">
				<h1>טופס עדכון משתמש</h1>
			</div>
			<div id="home"></div>
			
			<form id="formuser" action="<?php echo  $this->createUrl("updateuser");?>" method="post">
				<label>שם משתמש:</label> <input id="username" name="username"
					type="email" required value="<?php echo $user->getUserName()?>">
				<div class="control-group">
					<label>שם מלא:</label> <input id="name" name="name" type="text"
						required value="<?php echo $user->getName()?>">
				</div>
				<div class="control-group">
					<label>טלפון:</label> <input id="phone" name="phone" type="text"
						required placeholder="נא הכנס מספר טלפון"
						value="<?php echo $user->getPhone()?>">
				</div>
				<div class="control-group">
					<label>סיסמה:</label> <input id="password" name="password"
						type="password" required value="<?php echo  md5($user->getPassword())?>">
				</div>
				<input type="hidden" id="id" name="id" value="<?php echo $user->getId()?>">
				<input type="hidden" value="register" id="updateregister"
					name="updateregister" />
				<button type="submit" id="update" class="btn btn-primary">עדכון</button>
				<div id="msg"></div>


			</form>


		</div>

	</div>



	<script src="<?php echo yii::app()->baseUrl?>/js/bootstrap.js">
    </script>
</body>
</html>
