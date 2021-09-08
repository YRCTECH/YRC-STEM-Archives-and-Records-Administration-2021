<?php 
    session_start();
    include("../connect/connect.php");
    $f_id2 = filter_input(INPUT_POST , 'f_id2' , FILTER_SANITIZE_STRING);
    $p_id2 = filter_input(INPUT_POST , 'p_id2' , FILTER_SANITIZE_STRING);
    if($_POST['f_id2'] == ''){
        header("location:../admin_check_project.php?file_id=$f_id2&project_id=$p_id2&status=success");
    }else{
        
        $f_message2 = filter_input(INPUT_POST , 'f_message2' , FILTER_SANITIZE_STRING);
        $f_status2 = filter_input(INPUT_POST , 'f_status2' , FILTER_SANITIZE_STRING);

        if($f_status2 == 'unsuccess'){
            $doc = "SELECT * FROM file WHERE f_id =' $f_id2'";
            $qdoc = mysqli_query($conn,$doc);
            $fetch = mysqli_fetch_array($qdoc);
            $path = '../yrcstem2021/poster/';
            $f = $fetch['f_poster'];
            $file_pointer = $path.$f; 
            // Use unlink() function to delete a file 
            if (!unlink($file_pointer)) { 
                echo ("$file_pointer cannot be deleted due to an error"); 
            }
            else { 
                echo ("$file_pointer has been deleted"); 
                $sql = "UPDATE file SET
                f_message2 = '$f_message2',
                f_status2 = '$f_status2',
                f_poster = ''
                WHERE f_id = '$f_id2'";
                $result = mysqli_query($conn,$sql);
                    

                if($result){
                    header("location:../admin_check_project.php?file_id=$f_id2&project_id=$p_id2&status=success");
                }else{
                    header("location:../admin_check_project.php?file_id=$f_id2&project_id=$p_id2&status=error");
                }
            } 
        }else{
            $sql = "UPDATE file SET
            f_message2 = '$f_message2',
            f_status2 = '$f_status2'
            WHERE f_id = '$f_id2'";
            $result = mysqli_query($conn,$sql);
                

            if($result){
                header("location:../admin_check_project.php?file_id=$f_id2&project_id=$p_id2&status=success");
            }else{
                header("location:../admin_check_project.php?file_id=$f_id2&project_id=$p_id2&status=error");
            }
        }

        

       
            
       

    }


?>