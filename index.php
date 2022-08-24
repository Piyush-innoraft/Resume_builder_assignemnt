
<?php 



// echo "piyush";
// if( $_GET['q']==1){
//   header("Location: /view/home.php");

// }
// if( $_GET['q']==2){
//   header("Location: /view/details.php");

// }

// $path=$_SERVER['REQUEST_URI'];
// if($path!="o"){
// header("Location: /view/home.php");}

 require("/var/www/resume/core/Application.php");
//  if(isset($_GET['code'])){
//     $_SESSION['co']=1;
//     header("Location: ../controller/index.php");
//  }

$app=new Application();
$app->router->get('/check', function(){
    header("Location: /check.php");
  });

$app->router->get('/login', function(){
  header("Location: /view/loginform.php");

});
$app->router->get('/profile', function(){
      header("Location: /view/profile.php");
    
    });
$app->router->get('/home', function(){
  header("Location: /view/home.php");

});
$app->router->get('/register', function(){
  header("Location: /view/register.php");
});
$app->router->get('/details', function(){
    header("Location: /view/details.php");
  });
  $app->run();

?>