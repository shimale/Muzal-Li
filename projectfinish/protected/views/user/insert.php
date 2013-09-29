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
   	
    	 $("#registrar").click(function(){
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
				<h1>טופס רישום</h1>
			</div>
			<div id="home"></div>
			<form id="formRegister" action="<?php echo  $this->createUrl("insertuser");?>" method="post">
				<label>שם משתמש( איימל):</label> <input id="username"
					name="username" type="email" required>
				<div class="control-group">
					<label>סיסמה:</label> <input id="password" name="password" required
						type="password">
				</div>
				<div class="control-group">
					<label>שם מלא:</label> <input id="name" name="name" type="text"
						required>
				</div>
				<div class="control-group">
					<label>טלפון:</label> <input id="phone" name="phone" type="text"
						required>
				</div>
				<input type="hidden" value="register" id="checkregister"
					name="checkregister" />
				<button type="submit" id="insert" class="btn btn-primary">הוסף</button>
				<button id="clear" type="reset" class="btn btn-primary">מחיקה</button>


				<?php
				if(isset($msg)&& $msg !=""){

			 	echo '<div id="msg" style="display:block;">' .$msg .'</div>';
				}
				?>
			</form>


		</div>

	</div>



	<script src="<?php echo yii::app()->baseUrl?>/js/bootstrap.js">
    </script>
</body>
</html>
