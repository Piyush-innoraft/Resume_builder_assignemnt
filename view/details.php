<?php
session_start();
function set_url( $url )
{
    echo("<script>history.replaceState({},'','$url');</script>");
}
set_url("http://resume.local/details");
print_r($_SESSION);
if(($_SESSION['log']!=1)){
  header("Location: /view/loginform.php");
}



?>
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
    <nav class="navbar navbar-expand-lg navbar-light bg-succes text-light">
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
        <div class="container-fluid text-center bg-danger">
            <h1> Enter your details below </h1>
        </div>
        <div class="container-fluid bg-secondary">
            
            <form method="post" action="/controller/resumePdf.php"enctype="multipart/form-data"><label class="lbl">Enter your name:</label>
                <input type="text" name="fullname"class="mt-3"placeholder="Enter your name"pattern="[a-zA-Z ]{1,30}"><br>
                <label class="lbl">Enter your DOB:</label>
                <input type="text" class="mt-3"placeholder="dd-mm-yyyy"name="dob"pattern="([12][0-9]|[3][01])[-]([0][0-9]|[1][012])[-][0-9]{4}$"><br>
                <label class="lbl">Enter your User image:</label>
                <input type="file" class="mt-3"name="image"placeholder="Enter your User image"><br>
                <label class="lbl">Enter your Email:</label>
                <input type="text" name="email" class="mt-3"placeholder="Enter your Email"pattern="[a-zA-Z0-9]{1,}[@][a-zA-Z]{1,}[.][a-zA-Z]{1,}"><br>
                <label class="lbl">Enter your linkedin prifile link:</label>
                <input type="text"name="linkedin" class="mt-3"placeholder="Enter your linkedin profile link"><br>
                <input type="button" id="add-field" value="Add school fields">
                <input type="button" id="add-fields" value="Add College Fields">
                <input type="button" id="add-fieldss" value="Add Project Fields">
                <div id="some_div">
                </div>
                <input type="submit" value="submit" name="submit">
                
            </form> 
        </div>
        <script type='text/javascript'>  
            $(document).ready(function() {
                $("#add-field").click(function() {
                    $("#some_div").append('<div class="input-block"><h1>Enter School details</h1><label class="lbl">Enter your School name</label><input type="text" class="nam"><input type="button" class="remove-field"name="" value="-"></div>');
                    $("#some_div").append('<div class="input-block"><label class="lbl">Enter your Stream</label><input type="text" class="stream"><input type="button" class="remove-field" value="-"></div>');
                    $("#some_div").append('<div class="input-block"><label class="lbl">Enter your Passing year</label><input type="text" class="pass"><input type="button" class="remove-field" value="-"></div>');
                    $("#some_div").append('<div class="input-block"><label class="lbl">Enter your Marks</label><input type="text" class="marks"><input type="button" class="remove-field" value="-"><input type="submit" value="save" name="school"></div>');
                    var name=0;
                    $(".nam").each(function(){
                        name=name+1;
                        document.cookie = "sname"+ "=" + name+"; path=/";
                        
                        $(this).attr("name", "name" + name)
                    });
                    var stream=0;
                    $(".stream").each(function(){
                        stream=stream+1;
                        document.cookie = "sstream =" + stream;
                        $(this).attr("name", "stream" + stream)
                    });
                    var pass=0;
                    $(".pass").each(function(){
                        pass=pass+1;
                        console.log(pass);
                        document.cookie = "spass =" + pass;
                        $(this).attr("name", "pass" + pass)
                    });
                    var marks=0;
                    $(".marks").each(function(){
                        marks=marks+1;
                        document.cookie = "smarks =" + marks;
                        $(this).attr("name", "marks" + marks)});
                    });
                    $("#add-fields").click(function() {
                        $("#some_div").append('<div class="input-block"><h1>Enter College details</h1><label class="lbl">Enter your College name</label><input type="text"class="cname"><input type="button" class="remove-field" value="-"></div>');
                    $("#some_div").append('<div class="input-block"><label class="lbl">Enter your Stream</label><input type="text" class="cstream"><input type="button" class="remove-field" value="-"></div>');
                    $("#some_div").append('<div class="input-block"><label class="lbl">Enter your Passing year</label><input type="text" class="cpass"><input type="button" class="remove-field" value="-"></div>');
                    $("#some_div").append('<div class="input-block"><label class="lbl">Enter your Marks</label><input type="text"class="cmarks"><input type="button" class="remove-field" value="-"><input type="submit" value="save" name="college"></div>');
                    var ccname=0;
                    $(".cname").each(function(){
                        ccname=ccname+1;
                        document.cookie = "cname"+ "=" + ccname+"; path=/";
                        $(this).attr("name", "cname" + ccname)
                    });
                    var cstream=0;
                    $(".cstream").each(function(){
                        cstream=cstream+1;
                        document.cookie = "cstream =" + cstream;
                        $(this).attr("name", "cstream" + cstream)
                    });
                    var cpass=0;
                    $(".cpass").each(function(){
                        cpass=cpass+1;
                        document.cookie = "cpass =" + cpass;
                        $(this).attr("name", "cpass" + cpass)
                    });
                    var cmarks=0;
                        $(".cmarks").each(function(){
                        cmarks=cmarks+1;
                        document.cookie = "cmarks =" + cmarks;
                        $(this).attr("name", "cmarks" + cmarks)});
                    });
                    $("#add-fieldss").click(function() {
                        $("#some_div").append('<div class="input-block"><h1>Enter Project details</h1><label class="lbl">Enter your Project name</label><input type="text"class="pname"><input type="button" class="remove-field" value="-"></div>');
                        $("#some_div").append('<div class="input-block"><label class="lbl">Enter your description</label><input type="text" class="pdes"><input type="button" class="remove-field" value="-"></div>');
                        $("#some_div").append('<div class="input-block"><label class="lbl">Enter your Completion year</label><input type="text" class="pcomp"><input type="button" class="remove-field" value="-"><input type="submit" value="save" name="project"></div>');
                        var ppname=0;
                        $(".pname").each(function(){
                        ppname=ppname+1;
                        document.cookie = "pname"+ "=" + ppname+"; path=/";
                        $(this).attr("name", "pname" + ppname)
                    });
                    var pdes=0;
                    $(".pdes").each(function(){
                        pdes=pdes+1;
                        document.cookie = "pdes =" + pdes;
                        $(this).attr("name", "pdes" + pdes)
                    });
                    var pcomp=0;
                    $(".pcomp").each(function(){
                        pcomp=pcomp+1;
                        document.cookie = "pcomp =" + pcomp;
                        $(this).attr("name", "pcomp" + pcomp)
                    });
                });
                $(document).on("click", ".remove-field", function() {
                    $(this).closest(".input-block").remove();
                });
            });
        </script>
    </body>
</html>
