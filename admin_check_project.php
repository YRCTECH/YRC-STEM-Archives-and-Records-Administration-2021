<?php
  session_start();
  include("connect/connect.php");
  include("function.php");
  if(!$_SESSION['s_id']  && $_SESSION['s_status'] == 'A'){
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

                                <?php 
                                        if(isset($_GET['file_id']) && isset($_GET['project_id'])){
                                            $f_id = filter_input(INPUT_GET , 'file_id' , FILTER_SANITIZE_NUMBER_INT);
                                            $p_id = filter_input(INPUT_GET , 'project_id' , FILTER_SANITIZE_NUMBER_INT);
                                            $sql = "SELECT * FROM file WHERE f_id = '$f_id'";
                                            $query = mysqli_query($conn,$sql);
                                            $fetch = mysqli_fetch_array($query);

                                            $sql2 = "SELECT * FROM project WHERE p_id = '$p_id'";
                                            $query2 = mysqli_query($conn,$sql2);
                                            $fetch2 = mysqli_fetch_array($query2);
                                            
                                        }else{
                                            header("location:login.php");
                                        }
                                    ?>
                                <h4>ระบบตรวจสอบไฟล์โครงงาน : <?php echo $fetch2['p_nameth'] ?></h4>
                                <hr>

                                <?php boxstatus();?>

                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>

                                                <th width="100px">ไฟล์</th>
                                                <th>ตรวจสอบ</th>
                                                <th width="250px">ยืนยันสถานะ</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr class="<?php if($fetch['f_proposal'] == ''){ echo 'd-none'; }else{} ?>">
                                                <td>1. ไฟล์เอกสาร
                                                    <!-- 1 -->
                                                    <?php 
                                                        if($fetch['f_status1'] === 'unsuccess'){
                                                    ?>
                                                        <p class="mb-1 text-danger" style="font-size: 16px;">สถานะ : <i class="fas fa-edit"></i> ให้นักเรียนกลับไปแก้ไข</p>
                                                        <p>รายละเอียด : <?php echo $fetch['f_message1']; ?></p>

                                                    <?php } else if($fetch['f_status1'] === 'success'){ ?>
                                                        <p class="mb-1 text-success" style="font-size: 16px;">สถานะ : <i class="fas fa-check"></i> ผ่านการตรวจสอบแล้ว</p>
                                                    <?php } else{ ?>
                                                        <p class="mb-1 text-danger" style="font-size: 16px;">สถานะ : <i class="fas fa-clock"></i> รอการตรวจสอบ</p>
                                                    <?php } ?>

                                                </td>
                                                <td><a href="./yrcstem2021/protosal/<?php echo $fetch['f_proposal'] ?>"
                                                        target="_blank" class="btn btn-primary w-100 mt-2">ดูเอกสาร</a>
                                                </td>
                                                <td>

                                                    <form action="process/status_proposal.php" method="post" style="font-size: 16px;">
                                                        <label>สถานะ : </label>
                                                        <input type="radio" name="f_status1" value="success" 
                                                            checked>
                                                        <span>ผ่าน</span>

                                                        <input type="radio" name="f_status1" value="unsuccess" >
                                                        <span>ไม่ผ่าน</span>
                                                        <br>


                                                        <label class="mt-2 text-danger">หมายเหตุ (ในกรณีที่ไม่ผ่าน) : </label>

                                                        <div class="form-group">
                                                            <textarea class="form-control" rows="3" placeholder="พิมพ์..." spellcheck="false" name="f_message1"></textarea>
                                                        </div>

                                                        <input type="text" name="f_id1" value="<?php  echo $fetch['f_id']?>" class="d-none">
                                                        <input type="text" name="p_id1" value="<?php  echo $fetch2['p_id']?>" class="d-none">

                                                        <input type="submit" name="Update" class="btn btn-success w-100"
                                                            value="บันทึก">

                                                    </form>
                                                </td>
                                            </tr>

                                            <tr class="<?php if($fetch['f_poster'] == ''){ echo 'd-none'; }else{} ?>">

                                                <td>2. ไฟล์โปสเตอร์โครงงาน
                                                    <!-- 2 -->
                                                    <?php 
                                                        if($fetch['f_status2'] === 'unsuccess'){
                                                    ?>
                                                        <p class="mb-1 text-danger" style="font-size: 16px;">สถานะ : <i class="fas fa-edit"></i> ให้นักเรียนกลับไปแก้ไข</p>
                                                        <p>รายละเอียด : <?php echo $fetch['f_message2']; ?></p>

                                                    <?php } else if($fetch['f_status2'] === 'success'){ ?>
                                                        <p class="mb-1 text-success" style="font-size: 16px;">สถานะ : <i class="fas fa-check"></i> ผ่านการตรวจสอบแล้ว</p>
                                                    <?php } else{ ?>
                                                        <p class="mb-1 text-danger" style="font-size: 16px;">สถานะ : <i class="fas fa-clock"></i> รอการตรวจสอบ</p>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="./yrcstem2021/poster/<?php echo $fetch['f_poster'] ?>"target="_blank" class="btn btn-primary w-100 mt-2">ดูโปสเตอร์</a>
                                                </td>
                                                <td>



                                                    <form action="process/status_poster.php" method="post" style="font-size: 16px;">
                                                        <label>สถานะ : </label>
                                                        <input type="radio" name="f_status2" value="success" 
                                                            checked>
                                                        <span>ผ่าน</span>

                                                        <input type="radio" name="f_status2" value="unsuccess">
                                                        <span>ไม่ผ่าน</span>
                                                        <br>


                                                        <label class="mt-2 text-danger">หมายเหตุ (ในกรณีที่ไม่ผ่าน) : </label>

                                                        <div class="form-group">
                                                            <textarea class="form-control" rows="3" placeholder="พิมพ์..." spellcheck="false" name="f_message2"></textarea>
                                                        </div>

                                                        <input type="text" name="f_id2" value="<?php echo $fetch['f_id']?>" class="d-none">
                                                        <input type="text" name="p_id2" value="<?php echo $fetch2['p_id']?>" class="d-none">

                                                        <input type="submit" name="Update2" class="btn btn-success w-100"
                                                            value="บันทึก">

                                                    </form>
                                                </td>
                                            </tr>

                                            <tr class="<?php if($fetch['f_clip'] == ''){ echo 'd-none'; }else{} ?>">
                                                <td>3. คลิปวีดิโอ
                                                    <!-- 2 -->
                                                    <?php 
                                                        if($fetch['f_status3'] === 'unsuccess'){
                                                    ?>
                                                        <p class="mb-1 text-danger" style="font-size: 16px;">สถานะ : <i class="fas fa-edit"></i> ให้นักเรียนกลับไปแก้ไข</p>
                                                        <p>รายละเอียด : <?php echo $fetch['f_message3']; ?></p>

                                                    <?php } else if($fetch['f_status3'] === 'success'){ ?>
                                                        <p class="mb-1 text-success" style="font-size: 16px;">สถานะ : <i class="fas fa-check"></i> ผ่านการตรวจสอบแล้ว</p>
                                                    <?php } else{ ?>
                                                        <p class="mb-1 text-danger" style="font-size: 16px;">สถานะ : <i class="fas fa-clock"></i> รอการตรวจสอบ</p>
                                                    <?php } ?>
                                                </td>
                                                <td><a href="<?php echo $fetch['f_clip'] ?>"
                                                        target="_blank" class="btn btn-primary w-100 mt-2">ดูคลิป</a>
                                                </td>
                                                <td>
                                                
                                                <form action="process/status_clip.php" method="post"  style="font-size: 16px;">
                                                        <label>สถานะ : </label>
                                                        <input type="radio" name="f_status3" value="success" 
                                                            checked>
                                                        <span>ผ่าน</span>

                                                        <input type="radio" name="f_status3" value="unsuccess" >
                                                        <span>ไม่ผ่าน</span>
                                                        <br>


                                                        <label class="mt-2 text-danger">หมายเหตุ (ในกรณีที่ไม่ผ่าน) : </label>

                                                        <div class="form-group">
                                                        <textarea class="form-control" rows="3" placeholder="พิมพ์..." spellcheck="false" name="f_message3"></textarea>
                                                        </div>

                                                        <input type="text" name="f_id3" value="<?php echo $fetch['f_id']?>" class="d-none">
                                                        <input type="text" name="p_id3" value="<?php echo $fetch2['p_id']?>" class="d-none">

                                                        <input type="submit" name="Update3" class="btn btn-success w-100"
                                                            value="บันทึก">

                                                </form>


                                                   
                                                    
                                                </td>
                                            </tr>

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