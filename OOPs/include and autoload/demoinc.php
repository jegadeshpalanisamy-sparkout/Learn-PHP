<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include './include.php';
        $obj =new IncludingDemo();
        $obj->setName("Ram");

        $obj2 =new IncludingDemo();
        $obj->setName("Jannu");

    ?>
    
</body>
</html>