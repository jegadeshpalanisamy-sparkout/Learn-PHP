<?php
    $serverName="localhost";
    $password="";
    $userName="root";
    $con=mysqli_connect("$serverName","$userName","$password");

    if(!$con){
        die("Data base not connect:".mysqli_connect_error());
    }
    
?>