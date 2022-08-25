<?php
session_start();


  class database{
    public function __construct()
    {
      $servername = "resume.local";
      $usernme = "root";
      $passwrd = "Piyush@555";
      $dbname="resume";
      $this->conn = new mysqli($servername, $usernme, $passwrd, $dbname);
      if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
      }
        // else{
        //   echo "successfully db created";
        // }
        
    }
    public function inser_into_db($username, $passward){
      $hash=base64_encode($passward);
      $sql = "INSERT INTO login (username, passward)
      VALUES ('$username', ' $hash')";
      if ($this->conn->query($sql) === TRUE) {
        $_SESSION['reg']=1;
         header("Location: /view/loginform.php");
      }
      else {
        echo "Error: " . $sql . "<br>" . $this->conn->error;  
      }       
    }
    public function get_uid($username){
      $sql = "SELECT uid FROM login WHERE username='$username'";
      $result = $this->conn->query($sql);
      $row = $result->fetch_assoc();
      $_SESSION["id"]=$row["uid"];

    }
    public function check_login_credentials($username,$passward){
      $sql = "SELECT passward FROM login WHERE username='$username'";
      $result = $this->conn->query($sql);
  // output data of each row
        $row = $result->fetch_assoc();

          if($passward==base64_decode($row["passward"])){
            $_SESSION['log']=1;
             
            
          }
          else{
            $_SESSION['incorrect']=1;
           header("Location: /view/loginform.php");
          }
    }
    public function closeconnection(){
      $this->conn->close();

    }
  }
?>