<?php
    spl_autoload_register();
    function myAutoload($className){
        //$path="/";
        $extension=".php";
        $fullpath=$className.$extension;

        include_once $fullpath;
    }

?>