<?php
include_once "EmailService.php";
include_once "User.php";
    $emailservice=new EmailService();
    $user= new User($emailservice);

    $user->registrationUser("abc@gmail.com");
    

?>