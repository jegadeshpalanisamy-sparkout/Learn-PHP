<?php
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $name=test_input($_POST['name']);
        $email=test_input($_POST['email']);
        $website=test_input($_POST['website']);
        $comment=test_input($_POST['comment']);
        $gender=test_input($_POST['gender']);
        
    }

    function test_input($dataInputs)
    {
        $data=trim($dataInputs);
        $data=stripslashes($dataInputs);
        $data=htmlspecialchars($dataInputs);
        return $data;
    }
    
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
    

?>