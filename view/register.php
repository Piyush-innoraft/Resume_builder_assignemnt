<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      form {
        border: 3px solid #f1f1f1;
      }
      input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
      } 
      .button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
      }
      .button:hover {
        opacity: 0.8;
      }     
      .container {
        padding: 16px;
      }
      span.psw {
        float: right;
        padding-top: 16px;
      }
    </style>
  </head>
  <body>
    <form action="/controller/registerUser.php" method="post">
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" >
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Passward" name="passward" >
        <input type="submit" name="register" class="button" value="Register">
      </div>
    </form>
  </body>
</html>
<?php
session_start();
function set_url( $url )
{
    echo("<script>history.replaceState({},'','$url');</script>");
}
set_url("http://resume.local/register");
if(($_SESSION['log']==1)){
  header("Location: /view/home.php");
}



?>