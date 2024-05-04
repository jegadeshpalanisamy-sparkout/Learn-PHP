<?php
include_once "../DbConfig.php";
if (isset($_POST['add_product'])) {
    $productName = $_POST['productName'];
    $productPrice = $_POST['price'];
    $productImg = $_FILES['productImg']['name'];
    $productImg_tempName = $_FILES['productImg']['tmp_name'];
    $productImg_folder = 'uploadImg/' . $productImg;
    $productDesc = $_POST['desc'];
    $productCategory = $_POST['category'];
    // echo $productCategory;
    $getCategoryId = mysqli_query($con, "SELECT category_id from category where category_name='$productCategory'");
    $categoryRow = mysqli_fetch_assoc($getCategoryId);
    $categoryID = $categoryRow['category_id'];


    if (empty($productName) || empty($productPrice) || empty($productImg) || empty($productDesc) || empty($categoryID)) {
        $msg[] = "please fill out all";
    } else {
         
           
        $insert = "INSERT INTO product(name,price,image,description,categories_id) VALUES ('$productName','$productPrice','$productImg','$productDesc','$categoryID')";
        $executeQuery = mysqli_query($con, $insert);
        // echo "product added successfully";
        if ($executeQuery) {
            move_uploaded_file($productImg_tempName, $productImg_folder);
            
            $msg[] = "New product added successfully";
            // echo "<script>alert('" . $msg. "');</script>";
            foreach ($msg as $message) {
                echo "<script>alert('" . $message . "');</script>";
            }
            echo "<script>window.location.href = 'addProduct.php';</script>"; // Redirect using JavaScript
            
            // header('location:addProduct.php');
        } else {
            $msg[] = "Could not be add the product";
        }
    }
}

if (isset($_GET['delete'])) {
    // echo "hiii";
    $id = $_GET['delete'];
    // echo $id;
    mysqli_query($con, "DELETE FROM product WHERE id=$id");
    header('location:addProduct.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./productForm.css">
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
            <div class="h-50 mt-5"><br></div>
        </div>
        <div class="main-form  m-auto text-center row">
            <div class="col p-4">
                <form action="" class="form-group" enctype="multipart/form-data" method="POST">
                    <?php
                    // if (isset($msg)) {
                    //     foreach ($msg as $msg) {
                    //         if ($msg == "Could not be add the product") {
                    //             echo "<div class='bg-danger text-center err-width rounded-2'><span class='error-msg'>$msg</span></div>";
                    //         } else {
                    //             echo "<div class='success-msg text-center err-width rounded-2'><span class='success-msg text-light'>$msg</span></div>";
                    //         }
                    //     }
                    // }
                    ?>
                    <div class="row mb-3">
                        <h3>ADD A NEW PRODUCT</h3>
                    </div>
                    <div class="row"><input type="text" placeholder="Enter Product Name" class="form-control mb-2 w-75 m-auto" name="productName" required></div>
                    <div class="row"><input type="number" placeholder="Enter Price" class="form-control mb-2 w-75 m-auto" name="price" required></div>
                    <div class="row"><input type="text" placeholder="Enter Description" class="form-control mb-2 w-75 m-auto" name="desc" required></div>
                    <div class="row">

                        <select name="category" id="" class="w-50 m-auto mb-2 form-select">
                            <option value="">select category</option>
                            <?php
                            $sql_select = mysqli_query($con, "SELECT category_name FROM category");
                            while ($row = mysqli_fetch_assoc($sql_select)) {


                            ?>
                                <option value="<?php echo $row['category_name'] ?>"><?php echo $row['category_name'] ?></option>

                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row"><input type="file" class="form-control text w-50 m-auto" name="productImg" required></div>

                    <div class="row"><input type="submit" class="btn btn-success w-25 m-auto mt-4" name="add_product" value="Add Product"></div>
                    <div class="row"><a href="../admin/admin_dashboard.php" class="btn btn-primary btn-sm w-25 m-auto mt-3 mb-2">Go Back</a></div>



                </form>


            </div>
            <?php
            // $view_Product_query = mysqli_query($con, "SELECT * FROM product inner join category ON product.categories_id=category.category_id");
            $view_Product_query = mysqli_query(
                $con,
                " SELECT 
                        product.*,
                        category.category_name,
                        category.description AS category_description
                    FROM 
                        product
                    INNER JOIN 
                        category ON product.categories_id = category.category_id;"
            );

            ?>

        </div>
        <table class="table table-striped table-style border-secondary mt-5 text-center">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category Name</th>
                    <th scope="col-2">Action</th>
                </tr>
            </thead>
            <?php $sno = 1 ?>
            <?php
            while ($row = mysqli_fetch_assoc($view_Product_query)) {
                //print_r($row);

            ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $sno++; ?></th>
                        <td><img src="./uploadImg/<?php echo $row['image']; ?>" height="100" alt="err"></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['price'] ?>/-</td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['category_name'] ?></td>

                        <td>
                            <a href="edit_product.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="fa fa-edit me-1" style="font-size:15px;"></i>Edit</a>
                            <a href="addProduct.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash me-1" style="font-size:15px;color:white"></i>Delete</a>
                        </td>

                    </tr>

                </tbody>
            <?php }; ?>
        </table>



    </div>
</body>

</html>