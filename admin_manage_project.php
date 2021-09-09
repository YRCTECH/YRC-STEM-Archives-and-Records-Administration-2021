<?php
  session_start();
  include("connect/connect.php");
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
                                    <h4>ตรวจสอบไฟล์โครงงาน ในงาน THE 1ST NATIONAL BASIC STEM INNOVATION E-FORUM 2021</h4>
                                    <hr>
                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="50px" class="text-center">รหัสโครงการ</th>
                                                    <th width="250px">ชื่อโครงงาน</th>
                                                    <th>สาขา</th>
                                                    <th width="250px">สมาชิก/ครูที่ปรึกษา</th>
                                                    <th width="150px" class="text-center">ตรวจสอบไฟล์</th>
                                                   
                                                    
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $sql = "SELECT * FROM project ORDER BY p_id ASC";
                                                $query = mysqli_query($conn,$sql);
                                                while($fetch = mysqli_fetch_array($query)){
                                                
                                                
                                            ?>
                                        
                                                <tr>
                                                    <td>YRC STEM-<?php echo $fetch['p_ref_code'] ?></td>
                                                    <td><?php echo $fetch['p_nameth'] ?><br/><small>(<?php echo $fetch['p_nameen'] ?>)</small></td>
                                                    <td><?php echo $fetch['p_subject'] ?></td>
                                                    <td>1.<?php echo $fetch['p_fname1']; echo $fetch['p_name1']; echo '&nbsp;'; echo $fetch['p_surname1']; ?>
                                                        <br/> 
                                                        <?php
                                                            if($fetch['p_name2'] == ''){
                                                                echo '2.ไม่มี';
                                                            }else{
                                                                echo '2.';echo $fetch['p_fname2']; echo $fetch['p_name2']; echo '&nbsp;'; echo $fetch['p_surname2'];
                                                               
                                                            }
                                                        ?>
                                                        <br/> 
                                                        <?php
                                                            if($fetch['p_name3'] == ''){
                                                                echo '3.ไม่มี';
                                                            }else{
                                                                echo '3.';echo $fetch['p_fname3']; echo $fetch['p_name3']; echo '&nbsp;'; echo $fetch['p_surname3'];
                                                            }
                                                        ?>

                                                        <br/>ครูที่ปรึกษา : <?php echo $fetch['p_fname_t']; echo $fetch['p_name_t']; echo '&nbsp;'; echo $fetch['p_sname_t']; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $sql_file = "SELECT * FROM file WHERE f_id_team = $fetch[p_id]";
                                                            $query_file = mysqli_query($conn,$sql_file);
                                                            while($fetch_f = mysqli_fetch_array($query_file)){

                                                        ?>
                                                            <?php if($fetch_f['f_proposal'] != '' || $fetch_f['f_poster'] != '' || $fetch_f['f_poster'] != '') {?>
                                                                <a href="admin_check_project.php?file_id=<?php echo $fetch_f['f_id'] ?>&project_id=<?php echo $fetch_f['f_id_team'] ?>" class="btn btn-primary w-100"><i class="fas fa-search"></i> ตรวจสอบไฟล์</a>
                                                                <?php if($fetch_f['f_status1'] == 'process'){ ?>
                                                                    <p class="mb-1 text-danger">สถานะเอกสาร : <i class="fas fa-clock"></i> รอการตรวจสอบ</p>
                                                                <?php }else if($fetch_f['f_status1'] == 'unsuccess'){ ?>
                                                                    <p class="mb-1 text-warning">สถานะเอกสาร : <i class="fas fa-edit"></i> ให้นักเรียนกลับไปแก้ไข</p>
                                                                <?php }else if($fetch_f['f_status1'] == 'success'){ ?>
                                                                    <p class="mb-1 text-success">สถานะเอกสาร : <i class="fas fa-check"></i> ผ่านการตรวจสอบแล้ว</p>
                                                                <?php } else{ ?>
                                                                    <p class="mb-1 text-danger">สถานะเอกสาร : ไม่พบไฟล์</p>
                                                                <?php } ?>

                                                                <?php if($fetch_f['f_status2'] == 'process'){ ?>
                                                                    <p class="mb-1 text-danger">สถานะโปสเตอร์ : <i class="fas fa-clock"></i> รอการตรวจสอบ</p>
                                                                <?php }else if($fetch_f['f_status2'] == 'unsuccess'){ ?>
                                                                    <p class="mb-1 text-warning">สถานะโปสเตอร์ : <i class="fas fa-edit"></i> ให้นักเรียนกลับไปแก้ไข</p>
                                                                <?php }else if($fetch_f['f_status2'] == 'success'){ ?>
                                                                    <p class="mb-1 text-success">สถานะโปสเตอร์ : <i class="fas fa-check"></i> ผ่านการตรวจสอบแล้ว</p>
                                                                <?php } else{ ?>
                                                                    <p class="mb-1 text-danger">สถานะโปสเตอร์ : ไม่พบไฟล์</p>
                                                                <?php } ?>

                                                                <?php if($fetch_f['f_status3'] == 'process'){ ?>
                                                                    <p class="mb-1 text-danger">สถานะคลิป : <i class="fas fa-clock"></i> รอการตรวจสอบ</p>
                                                                <?php }else if($fetch_f['f_status3'] == 'unsuccess'){ ?>
                                                                    <p class="mb-1 text-warning">สถานะคลิป : <i class="fas fa-edit"></i> ให้นักเรียนกลับไปแก้ไข</p>
                                                                <?php }else if($fetch_f['f_status3'] == 'success'){ ?>
                                                                    <p class="mb-1 text-success">สถานะคลิป : <i class="fas fa-check"></i> ผ่านการตรวจสอบแล้ว</p>
                                                                <?php } else{ ?>
                                                                    <p class="mb-1 text-danger">สถานะคลิป : ไม่พบไฟล์</p>
                                                                <?php } ?>
                                                                
                                                            <?php }else{?>
                                                                <a href="#" class="btn btn-danger w-100"><i class="fas fa-times"></i> ยังไม่ได้อัปโหลดไฟล์</a>

                                                                

                                                                



                                                           
                                                            <?php }?>
                                                            


                                                        <?php }?>
                                                    </td>
                                                 

                                                  
                                               
                                                </tr>

                                            <?php } ?>

                                               
                                            </tbody>

                                        </table>
                                    </div>
                                   
                                  

                                    
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
             
              <footer class="footer">
                  © <?php echo date("Y") ?> STEM Yupparaj Wittayalai School 
              </footer>
            
            </div>

    </div>

    <?php
        require_once './components/jslink.php';
    ?>

</body>
</html>

<?php } ?>