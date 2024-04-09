
<?php 
    //it perform single task 
    class Authendicator {
        public function authentication($userName, $password) {
            if ($userName === "user" && $password === "1234") {
                return true;
            } else {
                return false;
            }
        }
    }
?>


    
   


