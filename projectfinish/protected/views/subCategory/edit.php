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
   <div id="page" data-role="header" data-theme="b"> 
   <?php include_once("breadcrumbs.php") ?>
  </div>
  <div data-role="content">
   <?php include_once("userInterface.php");
   echo $form->renderBegin();

   foreach($form->getElements() as $element){
    echo   $element->render();
  }
  foreach($form->getButtons() as $button){
    echo  $button->render();
  }
  echo $form->renderEnd(); ?>


</div>  
<div  class="footer" data-role="footer"></div>

</div>
</body>
</html>
