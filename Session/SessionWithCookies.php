<?php 
session_start();
$_SESSION['visitied']=false;
if($_SESSION['visitied'])
{
    echo "Hii user welcome back to vist our page <br>";
    echo "your session id :".session_id();
}
else{
    setcookie("visited","yes",time()+(84600*60),"/");
    $_SESSION['visit']=true;

    echo "Hi welcome to first visit our page <br>";
    echo "your session id is:".session_id();
}
unset($_SESSION['visited']);
session_destroy();


?>