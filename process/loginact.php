<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_POST['submit'])){
            $s_username = mysqli_real_escape_string($conn ,$_POST['s_username']);
            $s_password = mysqli_real_escape_string($conn , $_POST['s_password']);
            $sql = "SELECT * FROM `student` WHERE `s_username` = '".$s_username."' AND `s_password` = '".$s_password."'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            if($row > 0){
                $_SESSION["s_id"] = $row["s_id"];
                $_SESSION["s_title"] = $row["s_title"];
                $_SESSION["s_name"] = $row["s_name"];
                $_SESSION["s_surname"] = $row["s_surname"];
                $_SESSION["s_idstudent"] = $row["s_idstudent"];
                $_SESSION["s_status"] = $row["s_status"];
                header('Location: ../index.php');
            }else{
                header('Location: ../login.php?status=error');
            }
    }
?>
