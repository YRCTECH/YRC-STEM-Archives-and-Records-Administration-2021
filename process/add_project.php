<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_POST['Insert'])){
        $p_nameth = filter_input(INPUT_POST , 'p_nameth' , FILTER_SANITIZE_STRING);
        $p_nameen = filter_input(INPUT_POST , 'p_nameen' , FILTER_SANITIZE_STRING);
        $p_subject = filter_input(INPUT_POST , 'p_subject' , FILTER_SANITIZE_STRING);

        $p_fname1 = filter_input(INPUT_POST , 'p_fname1' , FILTER_SANITIZE_STRING);
        $p_name1 = filter_input(INPUT_POST , 'p_name1' , FILTER_SANITIZE_STRING);
        $p_surname1 = filter_input(INPUT_POST , 'p_surname1' , FILTER_SANITIZE_STRING);
        $p_grade1 = filter_input(INPUT_POST , 'p_grade1' , FILTER_SANITIZE_STRING);
        $p_room1 = filter_input(INPUT_POST , 'p_room1' , FILTER_SANITIZE_STRING);

        $p_fname2 = filter_input(INPUT_POST , 'p_fname2' , FILTER_SANITIZE_STRING);
        $p_name2 = filter_input(INPUT_POST , 'p_name2' , FILTER_SANITIZE_STRING);
        $p_surname2 = filter_input(INPUT_POST , 'p_surname2' , FILTER_SANITIZE_STRING);
        $p_grade2 = filter_input(INPUT_POST , 'p_grade2' , FILTER_SANITIZE_STRING);
        $p_room2 = filter_input(INPUT_POST , 'p_room2' , FILTER_SANITIZE_STRING);

        $p_fname3 = filter_input(INPUT_POST , 'p_fname3' , FILTER_SANITIZE_STRING);
        $p_name3 = filter_input(INPUT_POST , 'p_name3' , FILTER_SANITIZE_STRING);
        $p_surname3 = filter_input(INPUT_POST , 'p_surname3' , FILTER_SANITIZE_STRING);
        $p_grade3 = filter_input(INPUT_POST , 'p_grade3' , FILTER_SANITIZE_STRING);
        $p_room3 = filter_input(INPUT_POST , 'p_room3' , FILTER_SANITIZE_STRING);

        $p_fname_t = filter_input(INPUT_POST , 'p_fname_t' , FILTER_SANITIZE_STRING);
        $p_name_t = filter_input(INPUT_POST , 'p_name_t' , FILTER_SANITIZE_STRING);
        $p_sname_t = filter_input(INPUT_POST , 'p_sname_t' , FILTER_SANITIZE_STRING);

        $p_idstu = filter_input(INPUT_POST , 'p_idstu' , FILTER_SANITIZE_STRING);

        
        $sql_ref_code = "SELECT MAX(p_ref_code) as lastbill FROM project"; 
        $resultlastbill = mysqli_query($conn, $sql_ref_code); 
        $row = mysqli_fetch_array($resultlastbill);
      
        $lastbill = $row['lastbill'];
        if($lastbill==''){
            $lastbill=1;
        }else{
            $lastbill = ($lastbill + 1);
        }
        $p_ref_code = $lastbill;

        $sql_check = "SELECT * FROM project WHERE p_idstu ='$p_idstu'";
        $query_check = mysqli_query($conn,$sql_check);
        $num_check = mysqli_num_rows($query_check);
        if($num_check > 0){
            header('location:../add_project_stem.php?status=error');
        }else{

            $sql = "INSERT INTO `project` (`p_id`, `p_nameth`, `p_nameen`, `p_idstu`, `p_ref_code`, `p_subject`, `p_fname1`, `p_name1`, `p_surname1`, `p_grade1`, `p_room1`, `p_fname2`, `p_name2`, `p_surname2`, `p_grade2`, `p_room2`, `p_fname3`, `p_name3`, `p_surname3`, `p_grade3`, `p_room3`, `p_fname_t`, `p_name_t`, `p_sname_t`) 
                    VALUES (NULL, '$p_nameth', '$p_nameen', '$p_idstu', '$p_ref_code', '$p_subject', '$p_fname1', '$p_name1', '$p_surname1', '$p_grade1', '$p_room1', '$p_fname2', '$p_name2', '$p_surname2', '$p_grade2', '$p_room2', '$p_fname3', '$p_name3', '$p_surname3', '$p_grade3', '$p_room3', '$p_fname_t', '$p_name_t', '$p_sname_t')
                ";
            $result = mysqli_query($conn ,$sql);
            if($result){
                $select_data = "SELECT * FROM project WHERE p_idstu ='$p_idstu'";
                $query_data = mysqli_query($conn,$select_data);
                $fetch_data = mysqli_fetch_array($query_data);

                $sql_insert = "INSERT INTO `file` (`f_id`, `f_proposal`, `f_status1` , `f_message1` , `f_poster`, `f_status2` , `f_message2`, `f_clip`, `f_status3` , `f_message3` ,`f_ref`, `f_idstudent`, `f_id_team`) 
                VALUES (NULL,'','','','','','','','','','$p_ref_code', '$p_idstu', '$fetch_data[p_id]')";
                $query_insert = mysqli_query($conn,$sql_insert);

                if($query_insert){
                    header('location:../add_project_stem.php?status=success');
                }else{
                    header('location:../add_project_stem.php?status=error2');
                }
                
            }else{
                header('location:../add_project_stem.php?status=error3');
            }
        }
    }


?>