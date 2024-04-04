<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class and Object</title>
</head>
<body>
    <?php
        class Car{
            public $name;
            public $color;
            function set_Car($name,$color){
                $this->name=$name;
                $this->color=$color;
            }
            function get_CarName(){
                return $this->name;
            }
            function get_CarColor()
            {
                return $this->color;
            }
        }

        $car=new Car();
        $car->set_Car("BMW","red");

        
        echo $car->get_CarName();
        echo $car->get_CarColor();
        echo "<br>";
        $car2=new Car();
        $car2->set_Car("audi","black");
        echo $car2->get_CarName()." ".$car2->get_CarColor();
    ?>
</body>
</html>