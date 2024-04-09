<?php
    include "DeveloperEmp.php";
    include "ManagerEmp.php";
    $manager=new $ManagerEmp();
    $develoer=new $DeveloperEmp();

    echo $manager->work()." ,".$manager->manageTeam();
    echo $developer->work()." ,".$developer->code();

?>