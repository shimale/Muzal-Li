<!DOCTYPE html>
<html lang="he">
<head>
  <meta charset="utf-8">
 <title> <?php echo $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once 'link.php';?>
</head>
<body>
  <div  data-role="page">
  	<div  id="page" data-role="header" data-theme="b">
    <?php include_once("breadcrumbs.php") ?>
    </div>
  	<div data-role="content">
		 
		<?php include_once("userInterface.php"); ?>
	   
  		
      <ul data-role="listview" data-inset="true" data-divider-theme="b">
       <li data-role="list-divider">ממשק ניהול</li>
       <li data-icon="false" data-theme="d"><a href="<?php echo $this->createUrl("Category/categorys")?>">רשימת קטגוריות</a></li>
       <li data-icon="false" data-theme="d"><a href="<?php echo $this->createUrl("Shop/shops");?>">רשימת חנויות</a></li>

     </ul>	


   </div>  
   <div  class="footer" data-role="footer"> </div>
 </div>



</body>
</html>
