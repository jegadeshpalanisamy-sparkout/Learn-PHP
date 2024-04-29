<?php
include_once "../DbConfig.php";
if (isset($_POST['add_category'])) {
    $categoryName = $_POST['catyName'];
    $categoryDesc = $_POST['desc'];
    echo $categoryName. $categoryDesc;
    if (empty($categoryName) || empty($categoryDesc) ){
        $msg[] = "please fill out all";
    } else {
        $insert = "INSERT INTO category(category_name,description) VALUES ('$categoryName','$categoryDesc')";
        $executeQuery = mysqli_query($con, $insert);
        if ($executeQuery) {
            $msg[] = "New category added successfully";
        } else {
            $msg[] = "Could not be add the category";
        }
        print_r($msg);
    }
}

if(isset($_GET['delete']))
{
    // echo "hiii";
    $id=$_GET['delete'];
    // echo $id;
    mysqli_query($con,"DELETE FROM category WHERE category_id=$id");
    header('location:addCategories.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./category.css">
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
                            if ($msg == "Could not be add the category") {
                                echo "<div class='bg-danger text-center err-width rounded-2'><span class='error-msg'>$msg</span></div>";
                            } else {
                                echo "<div class='success-msg text-center err-width rounded-2'><span class='success-msg text-light'>$msg</span></div>";
                            }
                        }
                    }
                    ?>
                    <div class="row mb-3">
                        <h3>ADD A NEW CATEGORY</h3>
                    </div>
                    <div class="row"><input type="text" placeholder="Category Name" class="form-control mb-2 w-75 m-auto" name="catyName" required></div>
                   
                    <div class="row"><input type="text" placeholder="Category Description" class="form-control mb-2 w-75 m-auto" name="desc" required></div>
                    
                    <div class="row"><input type="submit" class="btn btn-primary w-25 m-auto mt-4 p-1" name="add_category" value="Add Category"></div>

                </form>


            </div>
            <?php
            $view_category_query = mysqli_query($con, "SELECT * FROM category");

            ?>

        </div>
        <table class="table table-striped table-style border-secondary mt-5 text-center">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Category Name</th>               
                    <th scope="col">Description</th>
                    <th scope="col-2">Action</th>
                </tr>
            </thead>
            <?php 
                while($row=mysqli_fetch_assoc($view_category_query)){
                    //print_r($row);
            
            ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $row['category_id']?></th>
                    
                    <td><?php echo $row['category_name']?></td>
                    
                    <td><?php echo $row['description']?></td>
                    
                    <td>
                       <a href="edit_category.php?edit=<?php echo $row['category_id'];?>"class="btn btn-warning"><i class="fa fa-edit me-1" style="font-size:15px;"></i>Edit</a>
                        <a href="addCategories.php?delete=<?php echo $row['category_id'];?>" class="btn btn-danger"><i class="fa fa-trash me-1" style="font-size:15px;color:white"></i>Delete</a>
                    </td>
                    
                </tr>
               
            </tbody>
            <?php };?>
        </table>



    </div>
</body>

</html>