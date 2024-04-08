<?php
    class StaticVarAndMeth{
        public static $name;
        

        public static function getName($name){
           return self::$name=$name;
            
        }
    }
?>