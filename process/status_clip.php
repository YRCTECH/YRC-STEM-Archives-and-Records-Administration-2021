<?php 
    session_start();
    include("../connect/connect.php");
    $f_id3 = filter_input(INPUT_POST , 'f_id3' , FILTER_SANITIZE_STRING);
    $p_id3 = filter_input(INPUT_POST , 'p_id3' , FILTER_SANITIZE_STRING);
    if($_POST['f_id3'] == ''){
        header("location:../admin_check_project.php?file_id=$f_id3&project_id=$p_id3&status=success");
    }else{
        
        $f_message3 = filter_input(INPUT_POST , 'f_message3' , FILTER_SANITIZE_STRING);
        $f_status3 = filter_input(INPUT_POST , 'f_status3' , FILTER_SANITIZE_STRING);

        if($f_status3 == 'unsuccess'){
          
                $sql = "UPDATE file SET
                f_message3 = '$f_message3',
                f_status3 = '$f_status3',
                f_clip = ''
                WHERE f_id = '$f_id3'";
                $result = mysqli_query($conn,$sql);
                    

                if($result){
                    header("location:../admin_check_project.php?file_id=$f_id3&project_id=$p_id3&status=success");
                }else{
                    header("location:../admin_check_project.php?file_id=$f_id3&project_id=$p_id3&status=error");
                }
            
        }else{
            $sql = "UPDATE file SET
            f_message3 = '$f_message3',
            f_status3 = '$f_status3'
            WHERE f_id = '$f_id3'";
            $result = mysqli_query($conn,$sql);
                

            if($result){
                header("location:../admin_check_project.php?file_id=$f_id3&project_id=$p_id3&status=success");
            }else{
                header("location:../admin_check_project.php?file_id=$f_id3&project_id=$p_id3&status=error");
            }
        }

        

       
            
       

    }


?>