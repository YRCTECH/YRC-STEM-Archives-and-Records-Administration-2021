<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_POST['Update'])){
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



        $sql = "UPDATE project SET
            p_nameth = '$p_nameth',
            p_nameen = '$p_nameen', 
            p_subject = '$p_subject',
            p_fname1 = '$p_fname1',
            p_name1 = '$p_name1',
            p_surname1 = '$p_surname1',
            p_grade1 = '$p_grade1',
            p_room1 = '$p_room1',
            
            p_fname2 = '$p_fname2',
            p_name2 = '$p_name2',
            p_surname2 = '$p_surname2',
            p_grade2 = '$p_grade2',
            p_room2 = '$p_room2',

            p_fname3 = '$p_fname3',
            p_name3 = '$p_name3',
            p_surname3 = '$p_surname3',
            p_grade3 = '$p_grade3',
            p_room3 = '$p_room3',

            p_fname_t = '$p_fname_t',
            p_name_t = '$p_name_t',
            p_sname_t = '$p_sname_t'
        
        WHERE p_idstu = '$p_idstu'";
        $result = mysqli_query($conn ,$sql);
        if($result){
            header('location:../add_project_stem.php?status=success');
        }else{
            header('location:../add_project_stem.php?status=error');
        }
    }


?>