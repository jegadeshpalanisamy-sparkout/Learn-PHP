<?php
// Create a class which get students details and display the students name who are greater than age 18.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body align="center">
    <form  action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <label for="">Enter Student Name: <input type="text" name="name"></label><br>
        <br>
        <label for="">Enter Student Age:  <input type="text" name="age"></label><br>
        <br>
        <input type="submit" value="submit" name="submit">
    </form>
    <?php
    
        class AgeEligibleforVote{
            public $StudentName;
            public $StudentAge;

            public function __construct($name,$age){
                $this->StudentName=$name;
                $this->StudentAge=$age;
                
            }

            public function __destruct()
            {                
                if($this->StudentAge>18)
                {
                    echo "<br>.<h2>$this->StudentName Eligible for voting</h2>";
                }
                else
                {
                    echo "<br>.<h2>$this->StudentName Not Eligible for voting</h2>";
                }
            }
        }

        if(isset($_POST['submit']))
        {   
            $name=$_POST["name"];
            $age=$_POST["age"];
            $obj=new AgeEligibleforVote($name,$age);
        }    
    ?>
    
</body>
</html>