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

    if (empty($productName) || empty($productPrice) || empty($productDesc) || empty($productCategory)) {
        $msg[] = "please fill out all";
    } else {
        $update = "UPDATE product SET name='$productName',price='$productPrice',image='$productImg',description='$productDesc',categories='$productCategory' WHERE id=$id";
        $executeQuery = mysqli_query($con, $update);
        if ($executeQuery) {
            move_uploaded_file($productImg_tempName, $productImg_folder);
            $msg[] = "Product was updated successfully";
            header('location:addProduct.php');
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
        <div class="main-form  m-auto text-center row">
            <div class="col p-4">
                <form action="" class="form-group" enctype="multipart/form-data" method="POST">
                    <?php
                    if (isset($msg)) {
                        foreach ($msg as $msg) {
                            if ($msg == "Could not be add the product") {
                                echo "<div class='bg-danger text-center err-width rounded-2'><span class='error-msg'>$msg</span></div>";
                            } else {
                                echo "<div class='success-msg text-center err-width rounded-2'><span class='success-msg text-light'>$msg</span></div>";
                            }
                        }
                    }

                    $select = mysqli_query($con, "SELECT * FROM product WHERE id=$id");
                    while ($row = mysqli_fetch_assoc($select)) {


                    ?>
                        <div class="row mb-3">
                            <h3>UPDATE PRODUCT</h3>
                        </div>
                        <div class="row"><input type="text" placeholder="Enter Product Name" value="<?php echo $row['name']; ?>" class="form-control mb-2 w-75 m-auto" name="productName" required></div>
                        <div class="row"><input type="number" placeholder="Enter Price" value="<?php echo $row['price'] ?>" class="form-control mb-2 w-75 m-auto" name="price" required></div>
                        <div class="row"><input type="text" placeholder="Enter Description" value="<?php echo $row['description'] ?>" class="form-control mb-2 w-75 m-auto" name="desc" required></div>
                        <div class="row"><input type="text" placeholder="Enter Category" value="<?php echo $row['categories'] ?>" class="form-control mb-2 w-75 m-auto" name="category"></div>
                        <div class="row">
                            <label for="productImg" class="form-label">Update Image:</label><input type="file" class="form-control text w-50 m-auto" name="productImg">
                        </div>

                        <div class="row"><input type="submit" class="btn btn-warning w-25 m-auto mt-4" name="update_product" value="Update"></div>
                        <div class="row"><a href="addProduct.php" class="btn btn-primary w-25 m-auto mt-4">Go Back</a></div>



                </form>
            <?php } ?>

            </div>

</body>

</html>