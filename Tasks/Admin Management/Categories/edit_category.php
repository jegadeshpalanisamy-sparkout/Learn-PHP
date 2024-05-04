<?php
include_once "../DbConfig.php";
$id = $_GET['edit'];
// echo $id;
if (isset($_POST['update_category'])) {
    // echo "hii";
    $categoryName = $_POST['catyName'];
    // echo $categoryName;
    $categoryDesc = $_POST['desc'];
    //  echo $categoryName. $categoryDesc;
    if (empty($categoryName) || empty($categoryDesc)) {
        $msg[] = "please fill out all";
    } else {
        $insert = "UPDATE category SET category_name='$categoryName',description='$categoryDesc' WHERE category_id=$id";
        $executeQuery = mysqli_query($con, $insert);
        if ($executeQuery) {
            $msg[] = "New category updated successfully";
            foreach($msg as $msg)
            {
                echo "<script>alert('". $msg ."')</script>";
            }
            echo "<script>window.location.href:'addCategories.php'</script>";
            
            // header('location:addCategories.php');
        } else {
            $msg[] = "Could not be update the category";
        }
        // print_r($msg);
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./editCategory.css">
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
            <div class="mt-5 h-50"><br><br><br><br></div>
        </div>
        <div class="main-form  m-auto text-center row">
            <div class="col p-4">
                <form action="" class="form-group" enctype="multipart/form-data" method="POST">
                    <?php
                    // if (isset($msg)) {
                    //     foreach ($msg as $msg) {
                    //         if ($msg == "Could not be update the category") {
                    //             echo "<div class='bg-danger text-center err-width rounded-2'><span class='error-msg'>$msg</span></div>";
                    //         } else {
                    //             echo "<div class='success-msg text-center err-width rounded-2'><span class='success-msg text-light'>$msg</span></div>";
                    //         }
                    //     }
                    // }
                    $select = mysqli_query($con, "SELECT * FROM category WHERE category_id=$id");
                    while ($row = mysqli_fetch_assoc($select)) {
                    ?>




                        <div class="row mb-3">
                            <h3>UPDATE CATEGORY</h3>
                        </div>
                        <div class="row"><input type="text" placeholder="Category Name" class="form-control mb-2 w-75 m-auto" name="catyName" value="<?php echo $row['category_name'] ?>" required></div>

                        <div class="row"><input type="text" placeholder="Category Description" class="form-control mb-2 w-75 m-auto" name="desc" value="<?php echo $row['description'] ?>" required></div>

                        <div class="row"><input type="submit" class="btn btn-success w-25 m-auto mt-4 p-1" name="update_category" value="Update"></div>
                        <div class="row"><a href="./addCategories.php" class="btn btn-primary btn-sm w-25 m-auto mt-3 mb-2">Go Back</a></div>

                    <?php } ?>
                </form>


            </div>


        </div>




    </div>

</body>

</html>