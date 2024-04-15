<?php
     function set_cookie(){
         $cookie_name='user';
         $cookie_value="john due";
         $expire_time=time()+(24*60*60);

        setcookie($cookie_name,$cookie_value,$expire_time,"/");
        echo "cookie is setted";


    }

     function get_cookie()
    {
        if(isset($_COOKIE['user']))
        {
            echo "<br> user=".$_COOKIE['user'];
        }
    }

    set_cookie();
    get_cookie();



?>