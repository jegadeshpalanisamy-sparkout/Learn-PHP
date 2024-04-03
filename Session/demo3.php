<?php 
        session_start();

       
       

        echo $_SESSION["Name"];
        echo $_SESSION["Age"];
        // session_unset();

        //session_destroy();
    ?>