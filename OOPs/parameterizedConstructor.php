<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class Fruits{
           public $name;
           public $color;

           function __construct($name,$color)
           {
            $this->name=$name;
            $this->color=$color;
           }
           function get_name()
           {
            return $this->name;
           }
           function get_color()
           {
            return $this->color;
           }

        }
        $Apple=new Fruits("apple",'red');
        echo $Apple->get_name()." ".$Apple->get_color();
    
    ?>
</body>
</html>