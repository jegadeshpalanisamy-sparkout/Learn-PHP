<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table App</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container  rounded p-4 mt-4">
        <div class="row p-4 calcWidth m-auto bgForm rounded-5 ">
            <div class="row text-center bg-dark text-white m-auto rounded-5">
                <h1>Multiplication Table Generator</h1>
             </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="row m-auto">
                    <label class="form-label">Enter the table number:</label>
                    <input type="number" class="form-control" name="number" required>
                </div>
                <div class="row m-auto">
                    <label class="form-label">Enter the table Size(range):</label>
                    <input type="number" class="form-control" name="size" required>
                </div>
                <div class="row m-auto mt-3 ">
                    <button type="submit" class="btn bg-warning rounded-3  buttonStyle w-50 m-auto" name="submit">Generate Table</button>
                    
                </div>


            </form>
            
            <div class="row p-3 m-auto mt-3 text-center bgOutput rounded-5">
                <?php
                    // Check if the form has been submitted
                    if(isset($_POST['submit']))
                    {
                        // Retrieve form data
                        $num=$_POST['number'];
                        $size=$_POST['size'];
                        
                        // Perform operations with form data
                        for($i=1;$i<=$size;$i++)
                        {
                            echo "<span>"."$num"." * "."$i"."=".$i*$num . "</span><br>";
                        }
                    }
                   
                ?>

            </div>
        </div>
       
    </div>
    
</body>
</html>