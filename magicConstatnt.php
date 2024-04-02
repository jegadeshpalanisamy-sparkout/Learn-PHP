<?php 
class Magic{


    function magicConstatnt()
    {
        echo __FILE__ ."<br>";//get file path
        echo __LINE__."<br>";//get line number
        print __LINE__."<br>";
        echo __FUNCTION__."<br>"; //get function name
        echo __CLASS__."<br>";//get class name
        echo __METHOD__."<br>";

    }

    
}
$magicInstance = new Magic();
$magicInstance->magicConstatnt();
?> 
