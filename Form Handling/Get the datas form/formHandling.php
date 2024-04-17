<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $firstName=htmlspecialchars($_POST['fName']);
        $lastName=htmlspecialchars($_POST['lName']);
        $favCity=htmlspecialchars($_POST['favCity']);
        if(empty($firstName))
        {
            header("Location:./index.php");
        }
        echo $firstName;
        echo $lastName;
        echo $favCity;

        
    }

?>