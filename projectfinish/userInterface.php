<?php

	if(isset(Yii::app()->session['user'])){
?>

<ul class="user" data-role="listview" data-inset="true" data-divider-theme="b">
	   <li data-role="list-divider">ממשק משתמש</li>
	    <li data-theme="d"> משתמש: <?php 
	    echo 	 Yii::app()->session['user']->getUsername(); ?></li>
		 <li data-theme="d"> <a href="<?php echo $this->createUrl("Main/logout") ?>">התנתק </a></li>
</ul>
<?php
 }else{

 	$url =$this->createUrl("Main/index");
 	header('Location: '.$url);
 }