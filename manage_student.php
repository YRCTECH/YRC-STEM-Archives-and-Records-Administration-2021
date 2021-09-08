<?php
  session_start();
  include("connect/connect.php");
  include("function.php");
  if(!$_SESSION['s_id'] && $_SESSION['s_status'] == 'A'){
      header("location:login.php");
  }else{

  
?>

<!DOCTYPE html>
<html lang="en">
<?php
      require_once './components/head.php';
  ?>

<body>
    <div id="main-wrapper">
        <?php
            require_once './components/navbar.php';
        ?>

        <?php
            require_once './components/menu.php';
        ?>


        <div class="page-wrapper">
            <?php
                  require_once 'components/bar.php';
              ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <br>

                                <?php boxstatus();?>
                                <hr>

                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="50px" class="text-center">ลำดับที่</th>
                                                <th>เลขประจำตัวนักเรียน</th>
                                                <th>ชื่อ</th>
                                                <th>ห้อง</th>

                                                <th width="100px" class="text-center">แก้ไข</th>
                                                <th width="100px" class="text-center">ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $sql = "SELECT * FROM student ORDER BY s_id ASC";
                                            $result = mysqli_query($conn,$sql);
                                            $i = 0;
                                            while($row = mysqli_fetch_array($result)){
                                            $i++;
                                            
                                        
                                        
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i; ?></td>
                                                <td><?php echo $row['s_idstudent'] ?></td>
                                                <td><?php echo $row['s_title'].$row['s_name']; echo '&nbsp;'; echo $row['s_surname']; ?></td>
                                                <td><?php echo $row['s_level']; echo '&nbsp;'; echo $row['s_room']; ?></td>

                                                <td class="text-center">
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <a href="process/delete_student.php?student_id=<?php echo $row[0] ?>"
                                                        class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                        ลบ
                                                    </a>
                                                </td>
                                            </tr>

                                            <?php }?>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                © <?php echo date("Y") ?> Yupparaj Wittayalai School
            </footer>

        </div>

    </div>

    <?php
        require_once'./components/jslink.php';
    ?>

</body>

</html>

<?php } ?>