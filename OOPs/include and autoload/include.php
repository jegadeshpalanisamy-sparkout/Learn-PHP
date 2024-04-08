<?php 
    class IncludingDemo{
        public $name;
        public $age;

        function setName($name){
            $this->name=$name;

            echo "$name";
        }
    }
?>