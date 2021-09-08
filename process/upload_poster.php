<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_POST['Upload'])){
        $idstudent = filter_input(INPUT_POST , 'idstudent' , FILTER_SANITIZE_STRING);
        $ref_code = filter_input(INPUT_POST , 'ref_code' , FILTER_SANITIZE_STRING);
        $idteam = filter_input(INPUT_POST , 'idteam' , FILTER_SANITIZE_STRING);

        $allowed = array('jpg','jpeg','png');
        $filename = $_FILES['poster']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            header("location:../add_project_stem.php?status=error");
        }else{
            $f = 'YRCSTEM-';
            $temp = explode('.',$_FILES['poster']['name']);
            $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
            $uploadDir = "../yrcstem2021/poster/"; 
            $fileName = substr(str_shuffle( $chars ), 0, 5 ). '.'.end($temp) ;
            $uploadFilePath = $uploadDir.$fileName; 
            move_uploaded_file($_FILES['poster']['tmp_name'], $uploadFilePath);
            
            $sql = "UPDATE file SET
            f_poster = '$fileName',
            f_status2 = 'process'
            WHERE f_idstudent = '$idstudent'";
            $result = mysqli_query($conn,$sql);
            

            if($result){
                header("location:../add_project_stem.php?status=success");
            }else{
                header("location:../add_project_stem.php?status=error");
            }
    
        }

    }
?>