<?php
 
    require "/var/www/resume/model/db.php";
   
    
    $username=$_SESSION['usernam'];
    $passward=$_SESSION['passwar'];
    if(empty($username)||empty($passward)){
        header("Location: /view/loginform.php");
    }
    else{
    $_SESSION['user']=$_SESSION['usernam'];
    $login=new database();
    $login->check_login_credentials($username, $passward);
    $login->get_uid($username);
    $login->closeconnection();
    header("Location: /view/home.php");
}
?>