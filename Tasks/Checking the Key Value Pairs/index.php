
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
    <div class="container p-2 bg-secondary">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="row m-auto widthForm" method="post" >
            <h3 class="text-center">Checking Key Value Pairs</h3>
            <div class="row">
                <div class="col text-center">
                    <label for="" class="form-label bg-light">Key</label>
                </div>
                <div class="col text-center">
                    <label for="" class="form-label bg-light">value</label>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <input type="text" class="form-control  m-auto" name="key" required></input>
                </div>
                <div class="col text-center">
                    <input type="text" class="form-control  m-auto" name="value" required></input>
                </div>
            </div>
            <div class="row">
                <input type="submit" class="btn  w-50 m-auto mt-2 btncolor" name="add"></input>
            </div>          
            <div class="row">
                <div class="col">
                    <?php                         
                        // Check if the form is submitted
                        if(isset($_POST['add'])) 
                        {
                            // Get the submitted key
                            //$key = $_POST['key'];
                              $key=$_POST['key'];
                            $value=$_POST['value'];
                           setcookie("$key","$value",time()+(86400 * 30),"/");
                        
                        // Display the select element with options
                        echo "<select id='keySelection' class='w-75 mt-2'>";
                        echo "<option disabled selected>select key</option>";
                        foreach ($_COOKIE as $cookie_key => $value) 
                        {
                            echo "<option value='$cookie_key' name='$value'>$cookie_key</option>";
                        }
                        echo "<option value='$key' name='$value'>$key</option>";
                        echo "</select>";

                    
                    }                 
                        
                ?>
               
                </div>
                <div class="col">
                        
                </div>
                   
                
            </div>
            
        </form>
     </div>
</body>
   
</html>