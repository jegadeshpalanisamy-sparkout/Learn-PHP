<?php
   
    include "./Authenticator.php";
    include './Logger.php';

    $auth = new Authendicator();
    $log = new Logger();

    if ($auth->authentication("user", "1234")) {
        $log->loginMsg("authentication successfully");
    } else {
        $log->loginMsg("authentication failed");
    }  

?>
