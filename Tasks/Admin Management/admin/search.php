<?php

include_once "../Dbconfig.php";

if (isset($_POST['action'])) {
    $input = '';
    $sql = "SELECT * FROM product WHERE name!=''";
    setcookie("search", $input, time() - 3600, '/');
    if (isset($_POST['input'])) {
        $input = $_POST['input'];
        setcookie("search", $input, time() + 86000, '/');
        $sql .= " and name LIKE('%$input%')";
    }
    $result = mysqli_query($con,$sql );


?>
    <div class="h-100%" id="mainId">
        <?php
        while ($getAll = mysqli_fetch_assoc($result)) {
        ?>
            <div class="product border border-1 text-center ">
                <div class="child"><img src="../Product/uploadImg/<?php echo $getAll['image']; ?>" alt="" height="200px" width="200px"></div>
                <div class="child">Name:<?php echo $getAll['name']; ?></div>
                <div class="child">Rs:<?php echo $getAll['price'] ?>/-</div>
            </div>
        <?php } ?>
    </div>

<?php } else {
    $input = '';
    $sql = "SELECT * FROM product WHERE name!=''";
    setcookie("search", $input, time() - 3600, '/');
    if (isset($_COOKIE['search'])) {
        $input = $_COOKIE['search'];
        setcookie("search", $input, time() + 86000, '/');
        $sql .= " and name LIKE('%$input%')";
    }
    $result = mysqli_query($con,$sql );


?>
    <div class="h-100%" id="mainId">
        <?php
        while ($getAll = mysqli_fetch_assoc($result)) {
        ?>
            <div class="product border border-1 text-center ">
                <div class="child"><img src="../Product/uploadImg/<?php echo $getAll['image']; ?>" alt="" height="200px" width="200px"></div>
                <div class="child">Name:<?php echo $getAll['name']; ?></div>
                <div class="child">Rs:<?php echo $getAll['price'] ?>/-</div>
            </div>
        <?php } ?>
    </div>
<?php } ?>