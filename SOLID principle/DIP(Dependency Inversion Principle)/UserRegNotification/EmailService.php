<?php 
include_once "interfaceDIP.php";
//low level module
    class EmailService implements NotificationPerpose{

        public function sendNotification($to,$message)
        {
            echo $to ." ". $message;
        }

    }
?>