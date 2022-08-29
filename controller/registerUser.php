<?php
 require "/var/www/resume/model/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['register'])){
      $username=$_POST['username'];
      $passward=$_POST['passward'];
      $dbobj=new database();
      $dbobj->inser_into_db($username, $passward);
      $dbobj->closeconnection();
      
  }
}
?>