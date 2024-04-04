<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        Choose the file: <input type="file" name="file" />
        <br>
        <input type="submit" name="btn" value="upload">

    </form>

    <?php
        if(isset($_POST['btn']))
        {
            echo "file name:" . $_FILES["file"]["name"]."<br>";
            echo "file type:" . $_FILES["file"]["type"];
    
            if(file_exists("upload/" . $_FILES["file"]["name"]))
            {
                echo $_FILES["file"]["name"] . "This file was already exists";
            }
            else{
                move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
                echo "The file was uploaded successfully";
            }
        
        }
       
    ?>
</body>
</html>