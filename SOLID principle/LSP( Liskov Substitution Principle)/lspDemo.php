<?php
    class Bird{
        public function fly()
        {
            return "flying";
        }
    }

    class Duck extends Bird
    {
        public function fly()
        {
            return "cannot fly";
        }
        public function quack()
        {
            return "Quack";
        }
    }

    class Penguin extends Bird{
        public function swim()
        {
            return "Swimming";
        }
    }

    function makeBirdfly(Bird $bird)
    {
        return $bird->fly();
    }
    $duck = new Duck();
    $penguin = new Penguin();


    echo "Duck: " . makeBirdfly($duck) . "<br>"; 
    echo "Penguin: " . makeBirdfly($penguin) ."<br>"; 


?>