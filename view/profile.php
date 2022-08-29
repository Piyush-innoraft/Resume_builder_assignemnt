
<html>
    <head>
        <style>
            .lbl{
                width:20vw;
            }
            .content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 500px;
                height: 200px;
                text-align: center;
                background-color: #e8eae6;
                box-sizing: border-box;
                padding: 10px;
                z-index: 100;
                display: none;
                /*to hide popup initially*/
            }
          
            .close-btn 
            {
                position: absolute;
                right: 20px;
                top: 15px;
                background-color: black;
                color: white;
                border-radius: 50%;
                padding: 4px;
            }

            .popup .popuptext 
            {
                visibility: hidden;
                width: 800px;
                height:470px;
                background-color: #555;
                color: #fff;
                text-align: center;
                position: absolute;
                z-index: 1;
                top: 0;
                left: 0;
                opacity: 0.8; 
            }
            .popup .show {
            visibility: visible;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>




<nav class="navbar navbar-expand-lg navbar-light bg-light text-light">
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
    </body>
</html>

<?php
session_start();
print_r($_SESSION);

echo "USERNAME:";
echo $_SESSION['usernam'];
echo "<br><br>";

 
// Set the current working directory
$directory = "../controller/pdf/".$_SESSION["id"]."/";
// echo $_SESSION['files'];
 
// Initialize filecount variable
$filecount = 0;
 
$files2 = glob( $directory ."*" );
 
if( $files2 ) {
    $filecount = count($files2);
}



for($i=0;$i<$filecount;$i++){
    echo date ("F d Y H:i:s.", filemtime($files2[$i]));
    echo "<a href=$files2[$i]> $files2[$i] </a><br>";
    

}



function set_url( $url )
{
    echo("<script>history.replaceState({},'','$url');</script>");
}
set_url("http://resume.local/profile");

if(($_SESSION['log']!=1)){
  header("Location: /view/loginform.php");
}
echo $_SESSION['log'];



?>
