<?php 
    session_start();
    include("../connect/connect.php");
    $f_id1 = filter_input(INPUT_POST , 'f_id1' , FILTER_SANITIZE_STRING);
    $p_id1 = filter_input(INPUT_POST , 'p_id1' , FILTER_SANITIZE_STRING);
    if($_POST['f_id1'] == ''){
        header("location:../admin_check_project.php?file_id=$f_id1&project_id=$p_id1&status=success");
    }else{
        
        $f_message1 = filter_input(INPUT_POST , 'f_message1' , FILTER_SANITIZE_STRING);
        $f_status1 = filter_input(INPUT_POST , 'f_status1' , FILTER_SANITIZE_STRING);

        if($f_status1 == 'unsuccess'){
            $doc = "SELECT * FROM file WHERE f_id =' $f_id1'";
            $qdoc = mysqli_query($conn,$doc);
            $fetch = mysqli_fetch_array($qdoc);
            $path = '../yrcstem2021/protosal/';
            $f = $fetch['f_proposal'];
            $file_pointer = $path.$f; 
            // Use unlink() function to delete a file 
            if (!unlink($file_pointer)) { 
                echo ("$file_pointer cannot be deleted due to an error"); 
            }
            else { 
                echo ("$file_pointer has been deleted"); 
                $sql = "UPDATE file SET
                f_message1 = '$f_message1',
                f_status1 = '$f_status1',
                f_proposal = ''
                WHERE f_id = '$f_id1'";
                $result = mysqli_query($conn,$sql);
                    

                if($result){
                    header("location:../admin_check_project.php?file_id=$f_id1&project_id=$p_id1&status=success");
                }else{
                    header("location:../admin_check_project.php?file_id=$f_id1&project_id=$p_id1&status=error");
                }
            } 
        }else{
            $sql = "UPDATE file SET
            f_message1 = '$f_message1',
            f_status1 = '$f_status1'
            WHERE f_id = '$f_id1'";
            $result = mysqli_query($conn,$sql);
                

            if($result){
                header("location:../admin_check_project.php?file_id=$f_id1&project_id=$p_id1&status=success");
            }else{
                header("location:../admin_check_project.php?file_id=$f_id1&project_id=$p_id1&status=error");
            }
        }

        

       
            
       

    }


?>