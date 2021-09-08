<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_POST['Upload'])){
        $idstudent = filter_input(INPUT_POST , 'idstudent' , FILTER_SANITIZE_STRING);
        $ref_code = filter_input(INPUT_POST , 'ref_code' , FILTER_SANITIZE_STRING);
        $idteam = filter_input(INPUT_POST , 'idteam' , FILTER_SANITIZE_STRING);
        $link = filter_input(INPUT_POST , 'link' , FILTER_SANITIZE_STRING);

       
            
            $sql = "UPDATE file SET
            f_clip = '$link',
            f_status3 = 'process'
            WHERE f_idstudent = '$idstudent'";
            $result = mysqli_query($conn,$sql);
            

            if($result){
                header("location:../add_project_stem.php?status=success");
            }else{
                header("location:../add_project_stem.php?status=error");
            }
    
        

    }
?>