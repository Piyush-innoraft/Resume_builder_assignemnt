<?php
session_start();
function set_url( $url )
{
    echo("<script>history.replaceState({},'','$url');</script>");
}
set_url("http://resume.local/home");
print_r($_SESSION);
if($_SESSION['log']!=1){
  header("Location: /view/loginform.php");
}



?>
<html>
    <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <style>
        .res{
          padding:10px;
          background-color: green;
          display: inline-block;
          color:white;
          text-decoration: none;
        }
        a:hover{
          text-decoration: none;
          color:black !important;
        }
      </style>
    </head>   
    <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-success text-light">
        <div class="container-fluid text-light">
          <a class="navbar-brand" href="#">   Resume_builder</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " href="/view/home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About us</a>
              </li>
             <li class="nav-item">
                <a class="nav-link "href="#">Contact us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/view/profile.php">Profile</a>
              </li>
            </ul>
            <ul class="navbar-nav me-2 mb-2 mb-lg-0">
              <li class="nav-item me-2">
                <a class="nav-link "href="/view/logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container-fluid text-center mt-3">
        <p>This is <strong>Resume builder</strong> web application . Click on below button to generate your resume in pdf format</p>
      </div>
      <div class="container-fluid text-center mt-3">
        <a class="nav-link res" href="/view/details.php">Start building your resume</a>
      </div>
      
  </body>
</html>
