<?php
    include("../connect/connect.php");
    if($_POST['t_id'] == ''){
        header("location:../manage_student.php?status=notfound");
    }
    
    $s_id = filter_input(INPUT_POST , 's_id' , FILTER_SANITIZE_NUMBER_INT); 
    $s_title = filter_input(INPUT_POST , 's_title' , FILTER_SANITIZE_STRING);
    $s_name = filter_input(INPUT_POST , 's_name' , FILTER_SANITIZE_STRING);
    $s_surname = filter_input(INPUT_POST , 's_surname' , FILTER_SANITIZE_STRING);
    $s_level = filter_input(INPUT_POST , 's_level' , FILTER_SANITIZE_STRING);
    $s_room = filter_input(INPUT_POST , 's_room' , FILTER_SANITIZE_STRING);
    $s_idstudent = filter_input(INPUT_POST , 's_idstudent' , FILTER_SANITIZE_STRING);
    $s_status = filter_input(INPUT_POST , 's_status' , FILTER_SANITIZE_STRING);


    $sql = "UPDATE student SET
       s_name = '$s_name',
       s_title = '$s_title',
       s_surname = '$s_surname',
       s_level = '$s_level',
       s_room = '$s_room',
       s_idstudent = '$s_idstudent',
       s_status = '$s_status'

    WHERE s_id = '$s_id'";

    $result = mysqli_query($conn,$sql);
    if($result){
        header("location:../manage_student.php?status=success");
    }else{
        header("location:../manage_student.php?status=error");
    }
  
  
    

?>