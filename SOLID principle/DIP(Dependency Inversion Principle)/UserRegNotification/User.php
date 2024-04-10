<?php
    include_once "interfaceDIP.php";
    class User {
        private $notificationService;

        public function __construct( NotificationPerpose $notification)
        {
            $this->notificationService=$notification;
        }

        public function registrationUser($email)
        
        {
            $this->notificationService->sendNotification($email,"Welcome to our site");
        }

    }
?>