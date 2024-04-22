
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="FormStyle.css">
    <title>Checking key and value pair</title>
</head>
<body>
    <div class="container p-2  background">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="row m-auto widthForm" method="post" >
            <h3 class="text-center ">Checking Key Value Pairs</h3>
            <div class="row">
                <div class="col text-center">
                    <label for="" class="form-label bg-light" >Key:</label>
                </div>
                <div class="col text-center">
                    <label for="" class="form-label bg-light">value:</label>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <input type="text" class="form-control  m-auto" placeholder="Enter Key" name="key" required></input>
                </div>
                <div class="col text-center">
                    <input type="text" class="form-control  m-auto" placeholder="Enter Value"name="value" required></input>
                </div>
            </div>
            <div class="row">
                <center><input type="submit" class="btn  w-25 m-auto mt-4 btncolor" name="add"></input></center>
            </div>          
            <div class="row">
                <div class="col">
                    <?php                         
                        // Check if the form is submitted
                        if(isset($_POST['add'])) 
                        {
                            $key=$_POST['key'];                                
                            $value=$_POST['value'];
                             if(isset($_COOKIE[$key]) && isset($_POST['add']))
                             {
                                echo "<script type='text/javascript'>alert('This key already exists try another Key!')</script>";
                                
                             }
                             else{
                                // $key=$_POST['key'];                                
                                // $value=$_POST['value'];
                                setcookie("$key","$value",time()+(86400 * 30),"/");
                                echo "<center><select id='keySelection' class=' mt-4' onChange='updateValue()'>";
                                echo "<option disabled selected>select key</option>";
                                foreach ($_COOKIE as $cookie_key => $value) 
                                    {
                                        echo "<option value='$value' name='$value'>$cookie_key</option>";
                                    }
                                
                                
                                echo "<option value='$value' name='$value'>$key</option>";
                                echo "</select></center>";
                             }                      
                        
                    }                 
                        
                ?>
               
                </div>
                
            </div>
            
            
        </form>
        
                <div class="col bg-light output mt-4 w-25"  id="value">
                                
                </div>
        
        
        <form action="index.php" method='post'>
           <center> <input type="submit" value="Add to file" name="addTofile" class="btn w-25 addbtn btn-primary"></center>
        </form>
        <?php 
            if(isset($_POST['addTofile']))
            {
                $file=fopen('cookieStorageDetails.txt','w') or die("File is not there");
                foreach($_COOKIE as $key=>$value)
                {

                    fwrite($file,"$key=>$value\n");
                    
                }
                echo "<script type='text/javascript'>alert('Details are added successfully')</script>";
                
                
            }
        ?>
 </div>
     <script defer src="script.js"></script>
</body>
   
</html>
