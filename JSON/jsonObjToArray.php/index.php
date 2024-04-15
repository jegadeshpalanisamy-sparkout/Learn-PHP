<?php 

    echo "<pre>";
    $jsonObj=file_get_contents('demo.json');
    $arr=json_decode($jsonObj,true);
   //print_r($arr); //get full array

  foreach($arr as $ar)
  {
    echo "<li>". $ar["name"] ." ".$ar['color']."<br> </li>";
  }
    echo "</pre>";
?>
