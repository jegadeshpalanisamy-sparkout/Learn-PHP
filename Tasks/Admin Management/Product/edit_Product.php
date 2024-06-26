<?php

include_once "../DbConfig.php";
$id = $_GET['edit'];
// echo $id;
if (isset($_POST['update_product'])) {
    $productName = $_POST['productName'];
    $productPrice = $_POST['price'];
    $productImg = $_FILES['productImg']['name'];
    $productImg_tempName = $_FILES['productImg']['tmp_name'];
    $productImg_folder = 'uploadImg/' . $productImg;
    $productDesc = $_POST['desc'];
    $productCategory = $_POST['category'];

    $getCategoryId = mysqli_query($con, "SELECT distinct category_name from category where category_name='$productCategory'");
    $categoryID = '';
    //  while($categoryRow = mysqli_fetch_assoc($getCategoryId)){
     $categoryID = $productCategory;
    //  }


    if (empty($productName) || empty($productPrice) || empty($productDesc)) {
        $msg[] = "please fill out all";
    } else {
        $update = "UPDATE product SET name='$productName',price='$productPrice',image='$productImg',description='$productDesc', categories_id='$categoryID' WHERE id=$id";
        $executeQuery = mysqli_query($con, $update);
        if ($executeQuery) {
            move_uploaded_file($productImg_tempName, $productImg_folder);
            $msg[] = "Product was updated successfully";
            foreach ($msg as $msg)
            {
                echo "<script>alert('".$msg."');</script>";
            }
            echo "<script>window.location.href = 'addProduct.php';</script>"; 
            // header('location:addProduct.php');
        } else {
            $msg[] = "Could not be update the product";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./editproduct.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="container ">
        <div>


            <nav class="navbar navbar-expand-lg bg-secondary shadow  fixed-top" data-bs-theme="light">
                <div class="container-fluid">
                    <a class="navbar-brand text-light" href="#">Admin Dashboard</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item btn btn-primary btn-sm me-3 p-0">
                                <a class="nav-link text-light " aria-current="page" href="../admin/admin_dashboard.php"><i class="fa fa-home me-1" style="font-size:20pxpx;color:white"></i>Home</a>
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
            <div class=" mt-5"></div>
        </div>
        <div class="main-form  m-auto text-center row">
            <div class="col p-4">
                <form action="" class="form-group" enctype="multipart/form-data" method="POST">
                    <?php
                    // if (isset($msg)) {
                    //     foreach ($msg as $msg) {
                    //         if ($msg == "Could not be update the product") {
                    //             echo "<div class='bg-danger text-center err-width rounded-2'><span class='error-msg'>$msg</span></div>";
                    //         } else {
                    //             echo "<div class='success-msg text-center err-width rounded-2'><span class='success-msg text-light'>$msg</span></div>";
                    //         }
                    //     }
                    // }

                    $select = mysqli_query($con, "SELECT * FROM product WHERE id=$id");
                    while ($row = mysqli_fetch_assoc($select)) {


                    ?>
                        <div class="row mb-3">
                            <h3>UPDATE PRODUCT</h3>
                        </div>
                        <div class="row"><input type="text" placeholder="Enter Product Name" value="<?php echo $row['name']; ?>" class="form-control mb-2 w-75 m-auto" name="productName" required></div>
                        <div class="row"><input type="number" placeholder="Enter Price" value="<?php echo $row['price'] ?>" class="form-control mb-2 w-75 m-auto" name="price" required></div>
                        <div class="row"><input type="text" placeholder="Enter Description" value="<?php echo $row['description'] ?>" class="form-control mb-2 w-75 m-auto" name="desc" required></div>
                        <select title="ctegru" name="category" id="" class="w-50 m-auto mb-2 form-select">
                            <?php
                            $selectedCategory = $row['categories_id'];
                            $sql_select = mysqli_query($con, "SELECT category_name, category_id FROM category");
                            while ($catRow = mysqli_fetch_assoc($sql_select)) {

                                $categoryId = $catRow['category_id'];
                                $categoryName = $catRow['category_name'];
                                $selected = ($selectedCategory ==  $categoryId) ? 'selected' : '';
                                echo "<option value='$categoryId' $selected>$categoryName</option>";
                            }
                            ?>
                        </select>

            </div>

            <div class="row">
                <label for="productImg" class="form-label">Update Image:</label><input type="file" class="form-control text w-50 m-auto" name="productImg">
            </div>

            <div class="row"><input type="submit" class="btn btn-warning w-25 m-auto mt-4" name="update_product" value="Update"></div>
            <div class="row"><a href="addProduct.php" class="btn btn-primary w-25 m-auto mt-3 mb-2">Go Back</a></div>



            </form>
        <?php } ?>

        </div>

</body>

</html>