<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="DayCalcStyle.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        
        <div class="row mainCalc shadow p-3 mb-5 bg-body rounded">
                <div>
                    <form action="index.php" method="post">
                        <div class="row">
                            <div class="col">
                                
                            <center class="mt-2"><span>Start Date:</span><br><input type="date" class="shadow bg-light dateBox m-0" name="date1" required></center> 
                                
                            </div>
                            <div class="col">
                                <center class="mt-2"><span>End Date:</span><br> <input type="date" class="shadow bg-light dateBox m-0" name="date2" required></center> 
                            </div>
                            
                        </div>
                        <div class="row">
                                <center><input type="submit" class="btn btnClr shadow" value="Submit" name="submit"></center>
                        </div>
                        <div class="row">
                            <center>
                                <div class="output shadow"> 
                                    <?php
                                        if(isset($_POST['submit']))
                                        {
                                            $date1=new DateTime($_POST['date1']);
                                            $date2=new DateTime($_POST['date2']);
                                            $difference=$date1->diff($date2);
                                            echo "Difference: ". $difference->format('%R %y years,%m months,%d days');
                                            
                                        }

                                    
                                    ?>

                                </div>
                            </center>
                            
                        </div>

                    </form>
                    
                </div>
        </div>
        <div class="row row1">
            <center> <h1 class="mt-5">Date Difference Calculator</h1></center>
           
        </div>
        
        <div class="row row2">
               

        </div>
        

    </div>
</body>
</html>