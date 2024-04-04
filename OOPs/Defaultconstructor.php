<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>constructor</title>
</head>
<body>
    <?php
        class TestDefaultConstructor{
            public $name;
            function __construct() //when object was create constructor called automatically
            {
                $this->name="jega";
               
            }
            function getName()
            {
                echo $this->name;
            }
            
        }
        $dconst=new TestDefaultConstructor();
        $dconst->getName();

    
    ?>
</body>
</html>