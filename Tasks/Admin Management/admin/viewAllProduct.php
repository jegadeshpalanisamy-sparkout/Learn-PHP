<?php
include_once "../DbConfig.php";

$listQuery = mysqli_query($con, "SELECT * FROM product");

while ($getAll = mysqli_fetch_assoc($listQuery)) {
?>
    <div class="product border border-1 text-center ">
        <div class="child"><img src="../Product/uploadImg/<?php echo $getAll['image']; ?>" alt="" height="200px" width="200px"></div>
        <div class="child">Name:<?php echo $getAll['name']; ?></div>
        <div class="child">Rs:<?php echo $getAll['price'] ?>/-</div>
    </div>
<?php } ?>
