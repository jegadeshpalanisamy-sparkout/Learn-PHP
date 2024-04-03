<?php
    //key and values
    $name="ABC";
    $age=22;

    setcookie($name,$age,time()-3600,"/"); //set cookies
    if(!isset($_COOKIE[$name])) //check cookie is there are not
    {
        echo "Cookie is not set";
    }
    else{
        echo "Cookie name=".$name." age=".$age;
    }
    //how many cookies are there
    if(count($_COOKIE)>0)
    {
         echo "cookie is enabled and count is=". count($_COOKIE);
        
    }
    else{
        echo "cookie is not enabled";
    }


   
     
?>