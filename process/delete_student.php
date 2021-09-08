<?php
    session_start();
    include("../connect/connect.php");

    if(isset($_GET['student_id'])){
        $s_id = filter_input(INPUT_GET , 'student_id' , FILTER_SANITIZE_NUMBER_INT);#$_GET['id'];
        $sql = "DELETE FROM student WHERE s_id  = '$s_id';";
        $result = mysqli_query($conn,$sql);

        if($result){
            header("location:../manage_student.php?status=success");
        }else{
            header("location:../manage_student.php?status=error");
        }

    }

   


?>