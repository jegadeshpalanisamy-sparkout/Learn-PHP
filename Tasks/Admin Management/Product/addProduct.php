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

    if (empty($productName) || empty($productPrice) || empty($productImg) || empty($productDesc) || empty($productCategory)) {
        $msg[] = "please fill out all";
    } else {
        $insert = "INSERT INTO product(name,price,image,description,categories) VALUES ('$productName','$productPrice','$productImg','$productDesc','$productCategory')";
        $executeQuery = mysqli_query($con, $insert);
        if ($executeQuery) {
            move_uploaded_file($productImg_tempName, $productImg_folder);
            $msg[] = "New product added successfully";
        } else {
            $msg[] = "Could not be add the product";
        }
    }
}

if(isset($_GET['delete']))
{
    // echo "hiii";
    $id=$_GET['delete'];
    // echo $id;
    mysqli_query($con,"DELETE FROM product WHERE id=$id");
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
                    ?>
                    <div class="row mb-3">
                        <h3>ADD A NEW PRODUCT</h3>
                    </div>
                    <div class="row"><input type="text" placeholder="Enter Product Name" class="form-control mb-2 w-75 m-auto" name="productName" required></div>
                    <div class="row"><input type="number" placeholder="Enter Price" class="form-control mb-2 w-75 m-auto" name="price" required></div>
                    <div class="row"><input type="text" placeholder="Enter Description" class="form-control mb-2 w-75 m-auto" name="desc" required></div>
                    <div class="row">
                        <!-- <input type="text" placeholder="Enter Category" class="form-control mb-2 w-75 m-auto" name="category"> -->
                        <select name="cat" id="">
                            <?php
                                $sql_select=mysqli_query($con,"SELECT category_name FROM category");
                                while($row=mysqli_fetch_assoc($sql_select))
                                {

                               
                            ?>
                            <option value="<?php echo $row['category_name'] ?>"></option>
                            
                            </option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="row"><input type="file" class="form-control text w-50 m-auto" name="productImg" required></div>

                    <div class="row"><input type="submit" class="btn btn-primary w-25 m-auto mt-4" name="add_product" value="Add Product"></div>

                </form>


            </div>
            <?php
            $view_Product_query = mysqli_query($con, "SELECT * FROM product");

            ?>

        </div>
        <table class="table table-striped table-style border-secondary mt-5 text-center">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>                    
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col-2">Action</th>
                </tr>
            </thead>
            <?php 
                while($row=mysqli_fetch_assoc($view_Product_query)){
                    //print_r($row);
            
            ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $row['id']?></th>
                    <td><img src="./uploadImg/<?php echo $row['image']; ?>"height="100" alt="err"></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['price']?>/-</td>
                    <td><?php echo $row['description']?></td>
                    <td><?php echo $row['categories']?></td>
                    <td>
                       <a href="edit_product.php?edit=<?php echo $row['id'];?>"class="btn btn-warning"><i class="fa fa-edit me-1" style="font-size:15px;"></i>Edit</a>
                        <a href="addProduct.php?delete=<?php echo $row['id'];?>" class="btn btn-danger"><i class="fa fa-trash me-1" style="font-size:15px;color:white"></i>Delete</a>
                    </td>
                    
                </tr>
               
            </tbody>
            <?php };?>
        </table>



    </div>
</body>

</html>