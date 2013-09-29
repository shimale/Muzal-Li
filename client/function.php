<?php

  function printString($str){
		$arr =explode(" ",$str);
		
		for($i =0 ;$i<count($arr);$i++){
			
			if($i % 5== 0 && $i !=0 ){
				echo "</br>";
			}
			echo $arr[$i]." ";
		}
  }
  function orderList($array,$loctionx,$loctiony){
  	
  	$index = 0;
  	foreach ($array as $prodect) {
  		$id = $prodect-> getIdShop();
  		$model=Shop::model()->findByPk($id);

      if($model){
        
        $distance =distance(array($loctionx,$loctiony),array($model->getLoctionX(),$model->getLoctionY()));
       
        if( $distance <= 1.5){
            $list[$index][0] =$model;
            $list[$index][1] =$distance;
            $index++;
        }
        
      }
  }
  $list =sortList($list);
  return $list;
   


  }

  function sortList($array){
  	
  	for($i=0; $i<count($array);$i++){

  		for($j=0 ; $j <count($array) ;$j++){

  			if($array[$i][1] < $array[$j][1]){

  				$temp = $array[$i];
  				$array[$i] =$array[$j];
  				$array[$j] =$temp;
  			}
  		}
  	}

  	return $array;
  }
  function 	distance($point1,$point2){
 
      $R = 6371; 
      $lat = array($point1[0],$point2[0]);
      $lng = array($point1[1],$point2[1]);
      $dLat = ($lat[1]-$lat[0]) * pi() / 180;
      $dLng = ($lng[1]-$lng[0]) * pi() / 180;
      $a = sin($dLat/2) * sin($dLat/2) +
      cos($lat[0] *  pi() / 180 ) * cos($lat[1] * pi() / 180 ) * sin($dLng/2) * sin($dLng/2);
     
      $c = 2 * atan2(sqrt($a),sqrt(1-$a));

        $d= $R *$c;
      return $d;
      
  }
 
?>