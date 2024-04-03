<?php 
    $file=fopen("test.txt","r");
    //  echo fread($file,filesize("test.txt"));

 //   echo fgets($file);// it retrived first line of file.
    // while(!feof($file))
    // {
    //     echo fgets($file) ."<br>";
    // }
    
    // while(!feof($file)) 
    // {
    //     echo fgetc($file)."<br>";// it retrived character
    // }

    echo readfile("test.txt")

    //fclose($file);
?>