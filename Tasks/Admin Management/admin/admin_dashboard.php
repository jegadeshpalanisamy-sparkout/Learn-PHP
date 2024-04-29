<?php
include_once "../DbConfig.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./admin.css">

</head>

<body>
    <!-- nav bar starts -->
    <nav class="navbar navbar-expand-lg bg-secondary shadow  fixed-top " data-bs-theme="light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#"><i class="fa fa-home me-1" style="font-size:20pxpx;color:white"></i>Home</a>
                    </li>

                </ul>
                <div class="d-flex">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <button class="btn btn-primary btn-sm me-3 p-0"><a class="nav-link text-light  " aria-current="page" href="../Product/addProduct.php"><i class="fa fa-cart-plus me-1" style="font-size:14px;color:white"></i>Add Product</a></button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-primary btn-sm me-3 p-0"><a class="nav-link text-light  " aria-current="page" href="../Categories/addCategories.php"><i class="fa fa-pencil me-1" style="font-size:15px;color:white"></i>Categories</a></button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-danger  btn-sm p-0"><a class="nav-link text-light" aria-current="page" href="../index.php">Logout</a></button>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </nav>
    <div class="main-content">
        <div>
            this is side bar
        </div>
        <div class="" id="mainId">
        <?php
        $listQuery = mysqli_query($con, "SELECT * FROM product");

        while ($getAll = mysqli_fetch_assoc($listQuery)) {
        ?>
            <div class="product">
                <div class="child"><img src="<?php echo $getAll['image']; ?>" alt="" height="200px" width="200px"></div>
                <div class="child"><?php echo $getAll['name']; ?></div>
                <div class="child"><?php echo $getAll['price'] ?></div>
            </div>
        <?php } ?>
    </div>




    </div>
    <!-- nav bar ends -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>