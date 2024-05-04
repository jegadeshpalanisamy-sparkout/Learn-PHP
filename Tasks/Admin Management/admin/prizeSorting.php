<?php 
include_once "../DbConfig.php";
if(isset($_POST['radioInput'])){
    // header('location:addProduct.php');
    $radioInput=$_POST['radioInput'];
    list($min,$max)=explode("-",$radioInput);
    $sqlPriceSort=mysqli_query($con,"SELECT * FROM product where price between $min and $max");
   

   
}

?>   
<div class="h-100%" id="mainId">
    <?php
    while ($getAll = mysqli_fetch_assoc($sqlPriceSort)) {
    ?>
        <div class="product border border-1 text-center ">
            <div class="child"><img src="../Product/uploadImg/<?php echo $getAll['image']; ?>" alt="" height="200px" width="200px"></div>
            <div class="child">Name:<?php echo $getAll['name']; ?></div>
            <div class="child">Rs:<?php echo $getAll['price'] ?>/-</div>
        </div>
    <?php } ?>
</div>
