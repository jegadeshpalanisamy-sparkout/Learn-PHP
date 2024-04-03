<?php 
session_start();
$_SESSION["Age"]=22;   //we can override
    
   print_r($_SESSION);

//   session_destroy();

 
?>