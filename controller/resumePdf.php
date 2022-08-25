<?php
    require("/var/www/resume/model/db.php");
    require("/var/www/resume/controller/fpdf/fpdf.php");
    session_start();
    
    $image1="fcd";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['submit'])){
            if(isset($_FILES['image'])){
                $file_name=$_FILES['image']['name'];
                $file_size=$_FILES['image']['size'];
                $file_tmp=$_FILES['image']['tmp_name'];
                $file_type=$_FILES['image']['type'];
                $value = move_uploaded_file($file_tmp, "images/".$file_name);
                $image=$file_name; /* Displaying Image*/
                $img="images/"."$image";
                $GLOBALS['image1']=$img;
            }
            $sname= $_COOKIE['sname'];
            $cname= $_COOKIE['cname'];
            $pname= $_COOKIE['pname'];
            $pdf= new FPDF();
            $pdf->AddPage();
            $pdf->SetFont("Arial","",12);
            $pdf->Image($image1,140,0,"70","50");
            $pdf->Cell(50,10,"Name",0,0,"L");
            $pdf->Cell(60,10,$_POST['fullname'],0,1,"L");//width,height,text,border,nextline,center
            $pdf->Cell(50,10,"DOB",0,0,"L");
            $pdf->Cell(60,10,$_POST['dob'],0,1,"L");
            $pdf->Cell(50,10,"EMAIL",0,0,"L");
            $pdf->Cell(60,10,$_POST['email'],0,1,"L");
            $pdf->Cell(50,10,"LINKEDIN PROFILE URL",0,0,"L");
            $pdf->Cell(60,10,$_POST['linkedin'],0,1,"L");
            if($sname>0)
            {
                $pdf->Cell(0,10,"SCHOOL DETAILS",0,1,"C");
                $pdf->Cell(50,10,"NAME",1,0,"L");
                $pdf->Cell(50,10,"STREAM",1,0,"L");
                $pdf->Cell(50,10,"PASSING YEAR",1,0,"L");
                $pdf->Cell(50,10,"MARKS",1,1,"L");
            
            for($i=1;$i<=$sname;$i++){
          
                $pdf->Cell(50,10,$_POST['name'. $i],1,0,"L");
                $pdf->Cell(50,10,$_POST['stream'. $i],1,0,"L");
                $pdf->Cell(50,10,$_POST['pass'. $i],1,0,"L");
                $pdf->Cell(50,10,$_POST['marks'. $i],1,1,"L");
                }
            }
                if($cname>0)
                {
                    $pdf->Cell(0,10,"COLLEGE DETAILS",0,1,"C");
                    $pdf->Cell(50,10,"NAME",1,0,"L");
                    $pdf->Cell(50,10,"STREAM",1,0,"L");
                    $pdf->Cell(50,10,"PASSING YEAR",1,0,"L");
                    $pdf->Cell(50,10,"MARKS",1,1,"L");
                
                for($i=1;$i<=$cname;$i++){
                  
                    $pdf->Cell(50,10,$_POST['cname'. $i],1,0,"L");
                    $pdf->Cell(50,10,$_POST['cstream'. $i],1,0,"L");
                    $pdf->Cell(50,10,$_POST['cmarks'. $i],1,0,"L");
                    $pdf->Cell(50,10,$_POST['cpass'. $i],1,1,"L");
                    }
                }
                    if($pname>0)
                    {
                        $pdf->Cell(0,10,"PROJECT DETAILS",0,1,"C");
                        $pdf->Cell(50,10,"NAME",1,0,"L");
                        $pdf->Cell(50,10,"DESCRIPTION",1,0,"L");
                        $pdf->Cell(50,10,"COMPLETION YEAR",1,1,"L");
                    
                    for($i=1;$i<=$sname;$i++){
                        $pdf->Cell(50,10,$_POST['pname'. $i],1,0,"L");
                        $pdf->Cell(50,10,$_POST['pdes'. $i],1,0,"L");
                        $pdf->Cell(50,10,$_POST['pcomp'. $i],1,1,"L");
                    }
                }
            $file = time(). '.pdf';
            $dir="pdf/";
            $fol=$_SESSION['id'];

            mkdir($dir. $fol);
            $_SESSION['files']=$dir.$fol."/";
            $_SESSION['dat']=date("l jS \of F Y h:i:s A");
            
            $pdf->output( $_SESSION['files'].$file,'F');   
            $pdf->output($file,'D'); 
            

        }
    }
?>