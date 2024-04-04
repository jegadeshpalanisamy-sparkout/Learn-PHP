<?php  
    if(isset($_POST['sub']))
    {
        $fileTolInfo=$_FILES['upload'];
       // print_r($fileTolInfo); //if we need to see file all information

      //split the information
      $fileName=$_FILES['upload']['name'];
      $fileTmpName=$_FILES['upload']['tmp_name'];
      $fileSize=$_FILES['upload']['size'];
      $fileError=$_FILES['upload']['error'];
      $fileType=$_FILES['upload']['type'];

      $fileExt=explode('.',$fileName); //create array to split name and extension
      $fileActualExt=strtolower(end($fileExt)); //get this extenstion

      $allowedExt=array("jpg","png","pdf","jpeg"); //set allowed extenstions

      if(in_array($fileActualExt,$allowedExt))
      {
            if($fileError===0)//it must be 0
            {
                if($fileSize<5000000)
                {
                    $fileNameNew=uniqid().".".$fileActualExt;//generated unique id.file ext
                    $fileSaveLocation='upload/'.$fileNameNew; //file name with location
                    move_uploaded_file($fileTmpName,  $fileSaveLocation);
                  //  header("Location:indexPageForValidationUpload.php?uploaded success");
                    echo "File was successfully uploaded";

                }
                else{
                    echo "This file size too long";
                }

            }
            else{
                echo "There was some error this file";
            }
      }
      else{
        echo "Cannot upload this file type";
      }
         


    }


?>