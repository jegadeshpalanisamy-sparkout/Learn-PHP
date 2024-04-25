<?php
 $con=mysqli_connect('localhost','root','','sample');
 if(!$con){
     die("database not connected:".mysqli_connect_error());
 }
 else{
     echo "database connected";
 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="Get_input_store_to_DB.php" method="post">
        <table>
            <tr>
                <td>Name: <input type="text" name="name"></td>

            </tr>
            <tr>
                <td>Age: <input type="text" name="age"></td>
            </tr>
            <tr>
                <td>Gender:
                    <input type="radio" name="gender" value="male">male
                    <input type="radio" name="gender" value="female"> female
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="save To DB"></td>
            </tr>

        </table>
    </form>
    <?php
       
    
        if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
            $age=$_POST['age'];
            $gender=$_POST['gender'];
            if($name!=""||$age!=""||$gender!="")
            {
                $query="INSERT INTO userdetails(name,age,gender) VALUES('$name',$age,'$gender')";
                if($result=mysqli_query($con,$query))
                {
                    echo "Datas are inserted successfully";
                }
                else{
                    echo "Datas are not inserted";
                }
            }
            else{
                echo "all fields are required";
            }
           
        }
    ?>


</body>




</html>