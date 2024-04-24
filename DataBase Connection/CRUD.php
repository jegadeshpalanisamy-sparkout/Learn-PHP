<?php
    include_once "DbCon.php";
    //create DB
    $query="CREATE DATABASE IF NOT EXISTS sample";
    $DbResult=mysqli_query($con,$query);
    if($DbResult)
    {
        echo "hii db created";
    }
    //select DB
    mysqli_select_db($con,"sample");
    //create table
    $table="CREATE TABLE  IF NOT EXISTS product(
        name varchar(10),
        price int,
        counts int
    )";
    $tableResult=mysqli_query($con,$table);

    if($tableResult)
    {
        echo "table was created";
    }

    //insert values
    $insetVal="INSERT INTO product VALUES('juice',10,20),('water',20,10)";
    $insertResult=mysqli_query($con,$insetVal);

    if($insertResult)
    {
        echo "record was inserted successfully";
    }

    //select values
    $select="SELECT * FROM product";
    $selectOne="SELECT name FROM product where price=10";
    $selectQuery=mysqli_query($con,$selectOne);
    if(mysqli_num_rows($selectQuery)>0){
        while($row=mysqli_fetch_assoc($selectQuery))
        {
            echo" <pre>";
            print_r ($row);
            echo" </pre>";
                         
        }
    }

    //update
    $updateQuery="UPDATE product set price=50 where name='juice'";
    $UpdateRes=mysqli_query($con,$updateQuery);

   if ($UpdateRes) {
        echo "Update successful";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
    
    //delete

    $Del="Delete from product where name='water'";
    $DelRes=mysqli_query($con,$Del);

?>