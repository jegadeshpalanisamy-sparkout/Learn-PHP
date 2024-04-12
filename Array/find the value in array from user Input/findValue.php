<?php
session_start();


    if(isset($_POST['find']))
    {
        if(isset($_POST['num']))
        {
            $no=$_SESSION['arr'];//retrived the array
            
           // print_r($no); 
             $check = in_array($_POST['num'], $no);
            if ($check===TRUE)  
            {
                echo "this value contain in array";
            }
            else
            {
                echo "value not there in array";
            }

          }
        
     }
   
?>