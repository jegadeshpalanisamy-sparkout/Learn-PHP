<?php
    include_once "../DbConfig.php";
    $cateId=$_POST['cateId'];
    $sql="SELECT DISTINCT name FROM product WHERE categories_id=$cateId";
    
    $result=mysqli_query($con,$sql);
    $out='';
    
                    
    echo "
    <option value=''>select product</option>";
    while($row=mysqli_fetch_assoc($result))
    {
        
       $out.="
       <option value='" .  $row['name'] . "'>" . $row['name'] . "</option>" ;
    }
    echo $out;
    
    
?>