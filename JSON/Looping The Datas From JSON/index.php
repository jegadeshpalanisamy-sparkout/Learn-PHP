<?php
    $datas=file_get_contents('StudentResults.json');
    $student=json_decode($datas);

    // echo "<pre>";
    // print_r($student);
    // echo "</pre>";

    foreach($student as $stu)
    {
        if($stu->result->ifPass==true)
        {
            echo "<li> bright students:".$stu->name."<br> </li>";
        }
        else{
            echo "$stu->name.put effort strong and get top marks";
        }
        if($stu->tamil==100 || $stu->english==100 || $stu->maths==100 || $stu->science==100 || $stu->social==100)
        {
            echo "<h6>" .$stu->name ." is get full mark in one subject </h6>";
        }
        
    }

?>