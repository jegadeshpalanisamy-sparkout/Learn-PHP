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
    <link rel="stylesheet" href="./admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <!-- nav bar starts -->
    <nav class="navbar navbar-expand-lg bg-secondary shadow  fixed-top " data-bs-theme="light">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item btn btn-primary btn-sm me-3 p-0">
                        <a class="nav-link text-light " aria-current="page" href="#"><i class="fa fa-home me-1" style="font-size:20pxpx;color:white"></i>Home</a>
                    </li>
                    <li class="nav-item form-input search  p-0">
                        <input type="search" class="form-control" placeholder="search" id="search" value=''>
                    </li>
                    <li class="nav-item btn btn-warning btn-sm ms-3 p-0">
                        <a class="nav-link btn text-dark " aria-current="page" href="#" id="allItems">View All Products</a>
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

        <div class=" shadow  p-1 pt-3">
            <div class="sort-style text-center pt-2">sort by product:</div>
            <hr class="mt-2">
            <div class="d-flex">
                <select name="caty" class="text-center" id="category_list">
                    <?php
                    $viewAllCaty = mysqli_query($con, "SELECT *  FROM category");
                    while ($row = mysqli_fetch_assoc($viewAllCaty)) {
                    ?>

                        <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                    <?php } ?>
                </select>


                <select class="ms-2 text-center" id="product_list">

                </select>


            </div>
            <div class="sort-style text-center pt-4">sort by price:</div>
            <hr class="mt-2">
            <div>
                <input type="radio" name="rate" value="0-500" class="radio-style "> 0 rs/- to 500/-</input><br>
                <input type="radio" name="rate" value="501-700" class="radio-style mt-1"> 501 rs/- to 700/-</input><br>
                <input type="radio" name="rate" value="701-1000" class="radio-style mt-1"> 701 rs/- to 1000/-</input><br>
                <input type="radio" name="rate" value="1000-1500" class="radio-style mt-1"> 1000 rs/- to 1500/-</input><br>
            </div>





        </div>
        <div class="" id="mainId">
            <?php

            $listQuery = mysqli_query($con, "SELECT * FROM product");

            while ($getAll = mysqli_fetch_assoc($listQuery)) {
            ?>
                <div class="product border border-1 text-center ">
                    <div class="child"><img src="../Product/uploadImg/<?php echo $getAll['image']; ?>" alt="" height="200px" width="200px"></div>
                    <div class="child">Name:<?php echo $getAll['name']; ?></div>
                    <div class="child">Rs:<?php echo $getAll['price'] ?>/-</div>
                </div>
            <?php } ?>
        </div>




    </div>
    <!-- nav bar ends -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $("#category_list").on('click', function() {
                var category_id = $('#category_list').val();
                // alert(category_id);
                $.ajax({
                    type: 'POST',
                    url: "subProducts.php",
                    data: {
                        cateId: category_id
                    },
                    success: function(data) {
                        // console.log(data);

                        $('#product_list').html(data);



                    }
                })
            })
            $("#product_list").on('change', function() {
                var product_val = $('#product_list').val();
                $.ajax({
                    type: "POST",
                    url: "filter.php",
                    data: {
                        product_val: product_val
                    },
                    success: function(data) {
                        // console.log(product_val);

                        $("#mainId").html(data);



                    }
                })
            })

            $.ajax({
                
                type: "POST",
                url: "search.php",
                data: {},
                success: function(data) {
                    $('#mainId').html(data);
                  
                }
            })

            $("#search").keyup(function() {
                var action = 'data';
                var input = $(this).val();
                // alert(input);
                $.ajax({
                    type: "POST",
                    url: "search.php",
                    data: {
                        action: action,
                        input: input
                    },
                    success: function(data) {
                        $('#mainId').html(data);
                    }
                })
            })

            $('input[name="rate"]').on('click', function() {
                var radioInput = $(this).val();
                // alert(radioInput);
                $.ajax({
                    type: 'POST',
                    url: 'prizeSorting.php',
                    data: {
                        radioInput: radioInput
                    },
                    success: function(data) {
                        // console.log(8);
                        $('#mainId').html(data);
                    }
                })
            })

            $("#allItems").click(function() {
                $.ajax({
                    type: "POST",
                    url: "viewAllProduct.php", // Adjust the URL if needed
                    data: {request:''},
                    success: function(data) {
                        $('#mainId').html(data);
                    }
                });
            });



        })
    </script>
</body>

</html>