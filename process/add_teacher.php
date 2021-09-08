<?php
    include("../connect/connect.php");

    if(isset($_POST['Insert'])){ 
        $s_title = filter_input(INPUT_POST , 's_title' , FILTER_SANITIZE_STRING);
        $s_name = filter_input(INPUT_POST , 's_name' , FILTER_SANITIZE_STRING);
        $s_surname = filter_input(INPUT_POST , 's_surname' , FILTER_SANITIZE_STRING);
        $s_level = filter_input(INPUT_POST , 's_level' , FILTER_SANITIZE_STRING);
        $s_room = filter_input(INPUT_POST , 's_room' , FILTER_SANITIZE_STRING);
        $s_idstudent = filter_input(INPUT_POST , 's_idstudent' , FILTER_SANITIZE_STRING);
        $s_status = filter_input(INPUT_POST , 's_status' , FILTER_SANITIZE_STRING);
       

        $sql = "INSERT INTO `teacher` (`t_id`, `t_name`, `t_title`, `t_position`, `t_group`, `t_permission`, `t_pic`) 
        VALUES (NULL, '$t_name', '$t_title', '$t_position', '$t_group', '$t_permission', '".$newName."')";

        $query = mysqli_query($conn,$sql);
        if($query){
            header("location:../manage_student.php?status=success");
        }else{
            header("location:../manage_student.php?status=error");
        }

    }
    
   

?>