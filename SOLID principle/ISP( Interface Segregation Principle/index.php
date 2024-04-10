<?php
 
    include "DeveloperEmp.php";
    include "ManagerEmp.php";
  
    
    $manager = new ManagerEmp();
    $developer = new DeveloperEmp();
    
    echo $manager->work() . "," . $manager->manageTeam(). "<br>";
    echo $developer->work() . "," . $developer->coding();
?>