<?php
    // $file=fopen("test.txt","w") or die("file not there"); //when if we w mode to open all content wil be deleted
    // $text1="hi am jegadesh \n";
    // $text2="i am from tirupur";
    // fwrite($file,$text1);
    // fwrite($file,$text2);
    // fclose($file);

    $file=fopen("test.txt","a+") or die("file not there"); //when if we w mode to open all content wil be deleted
    $text1="i am software engineer\n";
    
    fwrite($file,$text1);
    
    fclose($file);

?>