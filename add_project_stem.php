<?php
  session_start();
  include("connect/connect.php");
  include("function.php");
  if(!$_SESSION['s_id']){
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

                                <div class="row">
                                    <?php
                                        $sql_check = "SELECT * FROM project WHERE p_idstu = '$_SESSION[s_idstudent]'";
                                        $query_check = mysqli_query($conn,$sql_check);
                                        $num_check = mysqli_num_rows($query_check);
                                        if($num_check == 0){
                                    ?>
                                    <div class="col-xl-8">
                                        <h4>1. เพิ่มรายละเอียดโครงงาน</h4>
                                        <hr>
                                        <form action="process/add_project.php" method="post"
                                            enctype="multipart/form-data">

                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">ชื่อโครงงาน ภาษาไทย </label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control m-b-5" name="p_nameth"
                                                        required="">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">ชื่อโครงงาน ภาษาอังกฤษ </label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control m-b-5" name="p_nameen"
                                                        required="">
                                                </div>
                                            </div>



                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">สาขา</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="p_subject" id="n_tp_subjectype"
                                                        required="">
                                                        <option>ฟิสิกส์</option>
                                                        <option>เคมี</option>
                                                        <option>ชีววิทยา</option>
                                                        <option>เทคโนโลยี</option>
                                                        <option>คณิตศาสตร์</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <h4 class="mt-4">2. สมาชิกกลุ่ม</h4>
                                            <hr>
                                            <p style="font-weight: 600;">สมาชิกกลุ่มลำดับที่ 1</p>
                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">คำนำหน้า</label>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="p_fname1" required="">
                                                        <option value="นาย">นาย</option>
                                                        <option value="นางสาว">นางสาว</option>
                                                        <option value="เด็กชาย">เด็กชาย</option>
                                                        <option value="เด็กหญิง">เด็กหญิง</option>

                                                    </select>
                                                </div>



                                                <label class="col-form-label col-md-1 text-center">ชื่อ</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_name1"
                                                        required="">
                                                </div>

                                                <label class="col-form-label col-md-1 text-center">นามสกุล</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_surname1"
                                                        required="">
                                                </div>
                                            </div>



                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">ระดับชั้นมัธยมศึกษาปีที่</label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="p_grade1" required="">
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>

                                                    </select>
                                                </div>



                                                <label class="col-form-label col-md-1">ห้อง</label>
                                                <div class="col-md-5">
                                                    <select class="form-control" name="p_room1" required="">
                                                        <?php
                                                            for($sub =1 ; $sub<17; $sub++){
                                                        ?>
                                                        <option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>

                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                            function toggleFormElements(bDisabled) {

                                                var p_fname_2 = document.getElementsByName("p_fname2");
                                                for (var i = 0; i < p_fname_2.length; i++) {
                                                    p_fname_2[i].disabled = bDisabled;
                                                }
                                                var p_grade_2 = document.getElementsByName("p_grade2");
                                                for (var i = 0; i < p_grade_2.length; i++) {
                                                    p_grade_2[i].disabled = bDisabled;
                                                }
                                                var p_room_2 = document.getElementsByName("p_room2");
                                                for (var i = 0; i < p_room_2.length; i++) {
                                                    p_room_2[i].disabled = bDisabled;
                                                }

                                                var p_name_2 = document.getElementsByName("p_name2");
                                                for (var i = 0; i < p_name_2.length; i++) {
                                                    p_name_2[i].disabled = bDisabled;
                                                }

                                                var p_surname_2 = document.getElementsByName("p_surname2");
                                                for (var i = 0; i < p_surname_2.length; i++) {
                                                    p_surname_2[i].disabled = bDisabled;
                                                }

                                            }
                                            </script>

                                            <p style="font-weight: 600;" class="mt-4">สมาชิกกลุ่มลำดับที่ 2

                                                <a class="btn btn-success btn-sm"
                                                    href="javascript:toggleFormElements(false);">มี</a>
                                                <a class="btn btn-danger btn-sm"
                                                    href="javascript:toggleFormElements(true);">ไม่มี</a>

                                            </p>



                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">คำนำหน้า</label>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="p_fname2">
                                                        <option value="นาย">นาย</option>
                                                        <option value="นางสาว">นางสาว</option>
                                                        <option value="เด็กชาย">เด็กชาย</option>
                                                        <option value="เด็กหญิง">เด็กหญิง</option>

                                                    </select>
                                                </div>



                                                <label class="col-form-label col-md-1 text-center">ชื่อ</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_name2"
                                                        required="">
                                                </div>

                                                <label class="col-form-label col-md-1 text-center">นามสกุล</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_surname2"
                                                        required="">
                                                </div>
                                            </div>



                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">ระดับชั้นมัธยมศึกษาปีที่</label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="p_grade2">
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>

                                                    </select>
                                                </div>



                                                <label class="col-form-label col-md-1">ห้อง</label>
                                                <div class="col-md-5">
                                                    <select class="form-control" name="p_room2">
                                                        <?php
                                                            for($sub =1 ; $sub<17; $sub++){
                                                        ?>
                                                        <option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>

                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>


                                            <script type="text/javascript">
                                            function toggleFormElements2(bDisabled) {

                                                var p_fname_3 = document.getElementsByName("p_fname3");
                                                for (var i = 0; i < p_fname_3.length; i++) {
                                                    p_fname_3[i].disabled = bDisabled;
                                                }
                                                var p_grade_3 = document.getElementsByName("p_grade3");
                                                for (var i = 0; i < p_grade_3.length; i++) {
                                                    p_grade_3[i].disabled = bDisabled;
                                                }
                                                var p_room_3 = document.getElementsByName("p_room3");
                                                for (var i = 0; i < p_room_3.length; i++) {
                                                    p_room_3[i].disabled = bDisabled;
                                                }

                                                var p_name_3 = document.getElementsByName("p_name3");
                                                for (var i = 0; i < p_name_3.length; i++) {
                                                    p_name_3[i].disabled = bDisabled;
                                                }

                                                var p_surname_3 = document.getElementsByName("p_surname3");
                                                for (var i = 0; i < p_surname_3.length; i++) {
                                                    p_surname_3[i].disabled = bDisabled;
                                                }

                                            }
                                            </script>

                                            <p style="font-weight: 600;" class="mt-4">สมาชิกกลุ่มลำดับที่ 3
                                                <a class="btn btn-success btn-sm"
                                                    href="javascript:toggleFormElements2(false);">มี</a>
                                                <a class="btn btn-danger btn-sm"
                                                    href="javascript:toggleFormElements2(true);">ไม่มี</a>
                                            </p>
                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">คำนำหน้า</label>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="p_fname3">
                                                        <option value="นาย">นาย</option>
                                                        <option value="นางสาว">นางสาว</option>
                                                        <option value="เด็กชาย">เด็กชาย</option>
                                                        <option value="เด็กหญิง">เด็กหญิง</option>

                                                    </select>
                                                </div>



                                                <label class="col-form-label col-md-1 text-center">ชื่อ</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_name3"
                                                        required="">
                                                </div>

                                                <label class="col-form-label col-md-1 text-center">นามสกุล</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_surname3"
                                                        required="">
                                                </div>
                                            </div>



                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">ระดับชั้นมัธยมศึกษาปีที่</label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="p_grade3">
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>

                                                    </select>
                                                </div>



                                                <label class="col-form-label col-md-1">ห้อง</label>
                                                <div class="col-md-5">
                                                    <select class="form-control" name="p_room3">
                                                        <?php
                                                            for($sub =1 ; $sub<17; $sub++){
                                                        ?>
                                                        <option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>

                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>





                                            <h4 class="mt-4">3. ครูที่ปรึกษา</h4>
                                            <hr>

                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">คำนำหน้า</label>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="p_fname_t">

                                                        <option value="นางสาว">นาง</option>
                                                        <option value="เด็กชาย">นางสาว</option>
                                                        <option value="นาย">นาย</option>


                                                    </select>
                                                </div>



                                                <label class="col-form-label col-md-1 text-center">ชื่อ</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_name_t"
                                                        required="">
                                                </div>

                                                <label class="col-form-label col-md-1 text-center">นามสกุล</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_sname_t"
                                                        required="">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-15 d-none">
                                                <label class="col-form-label col-md-2">คำนำหน้า</label>




                                                <label class="col-form-label col-md-1 text-center">ชื่อ</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_idstu"
                                                        value="<?php echo $_SESSION['s_idstudent'] ?>">
                                                </div>


                                            </div>







                                            <input type="submit" class="btn btn-success w-100" name="Insert"
                                                value="เพิ่มโครงงาน">
                                        </form>

                                    </div>


                                    <?php }else{ ?>

                                    <div class="col-xl-12">



                                        <?php boxstatus();?>

                                        <div id="printableTable" class="table-responsive">
                                            <table class="table table-bordered" style="font-size: 16px;">
                                                <thead>
                                                    <tr>
                                                        <th width="300px">ข้อมูลการสมัคร</th>
                                                        <th width="900px">การอัพโหลด</th>
                                                        <th width="200px">แก้ไข</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>
                                                            <img src="./img/logostem.png" class="img-fluid w-100">

                                                            <?php
                                                                $sqlfecth_detail = "SELECT * FROM project WHERE p_idstu = '$_SESSION[s_idstudent]'";
                                                                $qd = mysqli_query($conn,$sqlfecth_detail);
                                                                while($fetch_de = mysqli_fetch_array($qd)){
                                                                
                                                            ?>
                                                            <p class="text-danger mb-0 mt-2" style="font-weight: 600;">
                                                                รหัสโครงการ YRC
                                                                STEM-<?php echo $fetch_de['p_ref_code'] ?></p>
                                                            <p><?php echo $fetch_de['p_nameth'] ?>
                                                                <br /><small>(<?php echo $fetch_de['p_nameen'] ?>)</small>
                                                            </p>


                                                            <hr>
                                                            <p>สาขา : <?php echo $fetch_de['p_subject'] ?></p>
                                                            <p>สมาชิกในกลุ่ม<br />
                                                                1.<?php echo $fetch_de['p_fname1']; echo $fetch_de['p_name1']; echo '&nbsp'; echo $fetch_de['p_surname1']; ?>
                                                                <br />
                                                                <?php if($fetch_de['p_fname2'] == ''){
                                                                        echo '';
                                                                    }else{
                                                                         echo '2.'; echo $fetch_de['p_fname2']; echo $fetch_de['p_name2']; echo '&nbsp'; echo $fetch_de['p_surname2'];
                                                                    } 
                                                                    ?>
                                                                <br />
                                                                <?php if($fetch_de['p_fname3'] == ''){
                                                                        echo '';
                                                                    }else{
                                                                         echo '3.'; echo $fetch_de['p_fname3']; echo $fetch_de['p_name3']; echo '&nbsp'; echo $fetch_de['p_surname3'];
                                                                    } 
                                                                    ?>
                                                            </p>
                                                            <p>ครูที่ปรึกษา
                                                                <?php echo $fetch_de['p_fname_t']; echo $fetch_de['p_name_t']; echo '&nbsp'; echo $fetch_de['p_sname_t']; ?>
                                                            </p>
                                                            <?php }?>


                                                        </td>
                                                        <td>

                                                            <p class="text-danger mb-0">หมายเหตุ :
                                                                ไฟล์ที่นำมาอัพโหลดนั้นต้องมีขนาดไม่เกิน 5 mb</p>
                                                            <hr>
                                                            <?php
                                                                $sql_status = "SELECT * FROM file WHERE f_idstudent = '$_SESSION[s_idstudent]'";
                                                                $q_s = mysqli_query($conn,$sql_status);
                                                                while($fetch_s = mysqli_fetch_array($q_s)){
                                                            ?>

                                                            <!-- 1 -->

                                                            <?php 
                                                                if($fetch_s['f_status1'] === 'unsuccess'){
                                                            ?>
                                                            <p class="mb-1 text-danger" style="font-size: 16px;">1.
                                                                สถานะเอกสารโครงงาน : <i class="fas fa-edit"></i>
                                                                ให้นักเรียนกลับไปแก้ไข</p>
                                                            <p>รายละเอียด : <?php echo $fetch_s['f_message1']; ?></p>

                                                            <?php } else if($fetch_s['f_status1'] === 'success'){ ?>
                                                            <p class="mb-1 text-success" style="font-size: 16px;">1.
                                                                สถานะเอกสารโครงงาน : <i class="fas fa-check"></i>
                                                                ผ่านการตรวจสอบแล้ว</p>
                                                            <?php } else{ ?>
                                                            <p class="mb-1 text-danger" style="font-size: 16px;">1.
                                                                สถานะเอกสารโครงงาน : <i class="fas fa-clock"></i>
                                                                รอการตรวจสอบ</p>
                                                            <?php } ?>


                                                            <!-- 2 -->

                                                            <?php 
                                                                if($fetch_s['f_status2'] === 'unsuccess'){
                                                            ?>
                                                            <p class="mb-1 text-danger" style="font-size: 16px;">2.
                                                                สถานะโปสเตอร์: <i class="fas fa-edit"></i>
                                                                ให้นักเรียนกลับไปแก้ไข</p>
                                                            <p>รายละเอียด : <?php echo $fetch_s['f_message2']; ?></p>

                                                            <?php } else if($fetch_s['f_status2'] === 'success'){ ?>
                                                            <p class="mb-1 text-success" style="font-size: 16px;">2.
                                                                สถานะโปสเตอร์: <i class="fas fa-check"></i>
                                                                ผ่านการตรวจสอบแล้ว</p>
                                                            <?php } else{ ?>
                                                            <p class="mb-1 text-danger" style="font-size: 16px;">2.
                                                                สถานะโปสเตอร์ : <i class="fas fa-clock"></i>
                                                                รอการตรวจสอบ</p>
                                                            <?php } ?>


                                                            <!-- 3 -->

                                                            <?php 
                                                                if($fetch_s['f_status3'] === 'unsuccess'){
                                                            ?>
                                                            <p class="mb-1 text-danger" style="font-size: 16px;">3.
                                                                สถานะคลิป: <i class="fas fa-edit"></i>
                                                                ให้นักเรียนกลับไปแก้ไข</p>
                                                            <p>รายละเอียด : <?php echo $fetch_s['f_message3']; ?></p>

                                                            <?php } else if($fetch_s['f_status3'] === 'success'){ ?>
                                                            <p class="mb-1 text-success" style="font-size: 16px;">3.
                                                                สถานะคลิป: <i class="fas fa-check"></i>
                                                                ผ่านการตรวจสอบแล้ว</p>
                                                            <?php } else{ ?>
                                                            <p class="mb-1 text-danger" style="font-size: 16px;">3.
                                                                สถานะคลิป : <i class="fas fa-clock"></i> รอการตรวจสอบ
                                                            </p>
                                                            <?php } ?>




                                                            <?php } ?>
                                                            <hr>
                                                            <table class="table table-striped table-bordered">
                                                                <thead>
                                                                    <?php
                                                                        $sql_status1 = "SELECT * FROM file WHERE f_idstudent = '$_SESSION[s_idstudent]'";
                                                                        $q_s1 = mysqli_query($conn,$sql_status1);
                                                                        while($fetch_s1 = mysqli_fetch_array($q_s1)){
                                                                    ?>

                                                                    <?php 
                                                                        if($fetch_s1['f_status1'] === 'success'){
                                                                    ?>
                                                                    <tr>
                                                                        <th width="300px">1. ไฟล์ข้อเสนอโครงงาน
                                                                            <small class="text-danger">รองรับสกุลไฟล์
                                                                                .pdf
                                                                                เท่านั้น</small>
                                                                        </th>
                                                                        <th>
                                                                            <p class="mb-1 text-success"
                                                                                style="font-size: 16px;"><i
                                                                                    class="fas fa-check"></i>
                                                                                ผ่านการตรวจสอบแล้ว</p>
                                                                        </th>
                                                                        <th col="">
                                                                            <?php $path = './yrcstem2021/protosal/';
                                                                                    echo "<a href=$path$fetch_s1[f_proposal] class='btn btn-primary' target='_blank'>ดูไฟล์</a>";
                                                                                ?>
                                                                        </th>

                                                                    </tr>
                                                                    <?php }else{ ?>
                                                                    <tr>
                                                                        <th width="300px">1. ไฟล์ข้อเสนอโครงงาน <small
                                                                                class="text-danger">รองรับสกุลไฟล์ .pdf
                                                                                เท่านั้น</small></th>

                                                                        <th width="600px">
                                                                            <form action="process/upload_protosal.php"
                                                                                method="post"
                                                                                enctype="multipart/form-data">
                                                                                <fieldset class="form-group mb-0">
                                                                                    <input type="file"
                                                                                        class="form-control-file"
                                                                                        id="exampleInputFile"
                                                                                        name="protosal" required>
                                                                                </fieldset>
                                                                                <div
                                                                                    class="form-group row m-b-15 d-none">
                                                                                    <label
                                                                                        class="col-form-label col-md-1 text-center">เลขประจำตัวนักเรียน</label>
                                                                                    <div class="col-md-3">
                                                                                        <input type="text"
                                                                                            class="form-control m-b-5"
                                                                                            name="idstudent"
                                                                                            value="<?php echo $_SESSION['s_idstudent'] ?>">
                                                                                    </div>
                                                                                    <?php
                                                                                        $se1 = "SELECT * FROM project WHERE p_idstu = '$_SESSION[s_idstudent]'";
                                                                                        $qse1 = mysqli_query($conn,$se1);
                                                                                        $fetch_data1 = mysqli_fetch_array($qse1)
                                                                                    ?>

                                                                                    <label
                                                                                        class="col-form-label col-md-1 text-center">ไอดีทีม</label>
                                                                                    <div class="col-md-3">
                                                                                        <input type="text"
                                                                                            class="form-control m-b-5"
                                                                                            name="idteam"
                                                                                            value="<?php echo $fetch_data1['p_id'] ?>">
                                                                                    </div>

                                                                                    <label
                                                                                        class="col-form-label col-md-1 text-center">code</label>
                                                                                    <div class="col-md-3">
                                                                                        <input type="text"
                                                                                            class="form-control m-b-5"
                                                                                            name="refcode"
                                                                                            value="<?php echo $fetch_data1['p_ref_code'] ?>">
                                                                                    </div>


                                                                                </div>

                                                                        </th>
                                                                        <th width="200px">
                                                                            <input type="submit" name="Upload"
                                                                                class="btn btn-success" value="อัปโหลด">
                                                                        </th>
                                                                        </form>
                                                                        <th width="200px">
                                                                            <?php
                                                                            $sql_proposal = "SELECT * FROM file WHERE f_idstudent = '$_SESSION[s_idstudent]'";
                                                                            $qpro = mysqli_query($conn,$sql_proposal);
                                                                            
                                                                            while($fetch_pro = mysqli_fetch_array($qpro)){
                                                                                if($fetch_pro['f_proposal']== ''){
                                                                                    echo 'ไม่พบไฟล์';
                                                                                }else{
                                                                                    $path = './yrcstem2021/protosal/';
                                                                                    echo "<a href=$path$fetch_pro[f_proposal] class='btn btn-primary'>ดูไฟล์</a>";
                                                                                }
                                                                            }
                                                                        ?>
                                                                        </th>
                                                                        <th width="300px">
                                                                            <?php
                                                                            $sql_ch1 = "SELECT * FROM file WHERE f_idstudent = '$_SESSION[s_idstudent]'";
                                                                            $q1 = mysqli_query($conn,$sql_ch1);
                                                                            while($fetch1 = mysqli_fetch_array($q1)){
                                                                                if($fetch1['f_status1']== 'success'){
                                                                                    echo '<a href=$fetch_pro class="btn btn-success">ผ่านการตรวจสอบแล้ว</a>';
                                                                                }else if($fetch1['f_status1']== 'unsuccess'){
                                                                                    echo '<a href=# class="btn btn-warning">ไม่ผ่าน</a>';
                                                                                }else{
                                                                                    echo '<a href=# class="btn btn-danger">รอการตรวจสอบ</a>';
                                                                                }
                                                                            }
                                                                        ?>
                                                                        </th>


                                                                    </tr>
                                                                    <?php }?>
                                                                    <?php }?>
                                                                </thead>
                                                                <thead>
                                                                    <?php
                                                                        $sql_status2 = "SELECT * FROM file WHERE f_idstudent = '$_SESSION[s_idstudent]'";
                                                                        $q_s2 = mysqli_query($conn,$sql_status2);
                                                                        while($fetch_s2 = mysqli_fetch_array($q_s2)){
                                                                    ?>

                                                                    <?php 
                                                                        if($fetch_s2['f_status2'] === 'success'){
                                                                    ?>
                                                                    <tr>
                                                                        <th width="400px">2. ไฟล์โปสเตอร์โครงงาน <small
                                                                                class="text-danger">รองรับสกุลไฟล์ .jpg
                                                                                .jpeg .png เท่านั้น</small></th>
                                                                        <th>
                                                                            <p class="mb-1 text-success"
                                                                                style="font-size: 16px;"><i
                                                                                    class="fas fa-check"></i>
                                                                                ผ่านการตรวจสอบแล้ว</p>
                                                                        </th>
                                                                        <th col="">
                                                                            <?php $path = './yrcstem2021/poster/';
                                                                                    echo "<a href=$path$fetch_s2[f_poster] class='btn btn-primary' target='_blank'>ดูไฟล์</a>";
                                                                            ?>
                                                                        </th>

                                                                    </tr>

                                                                    <?php } else{ ?>
                                                                    <tr>
                                                                        <th width="400px">2. ไฟล์โปสเตอร์โครงงาน <small
                                                                                class="text-danger">รองรับสกุลไฟล์ .jpg
                                                                                .jpeg .png เท่านั้น</small></th>
                                                                        <th width="800px">



                                                                            <form action="process/upload_poster.php"
                                                                                method="post"
                                                                                enctype="multipart/form-data">
                                                                                <fieldset class="form-group mb-0">
                                                                                    <input type="file"
                                                                                        class="form-control-file"
                                                                                        id="exampleInputFile"
                                                                                        name="poster" required>
                                                                                </fieldset>
                                                                                <div
                                                                                    class="form-group row m-b-15 d-none">
                                                                                    <label
                                                                                        class="col-form-label col-md-1 text-center">เลขประจำตัวนักเรียน</label>
                                                                                    <div class="col-md-3">
                                                                                        <input type="text"
                                                                                            class="form-control m-b-5"
                                                                                            name="idstudent"
                                                                                            value="<?php echo $_SESSION['s_idstudent'] ?>">
                                                                                    </div>
                                                                                    <?php
                                                                                        $se1 = "SELECT * FROM project WHERE p_idstu = '$_SESSION[s_idstudent]'";
                                                                                        $qse1 = mysqli_query($conn,$se1);
                                                                                        $fetch_data1 = mysqli_fetch_array($qse1)
                                                                                    ?>

                                                                                    <label
                                                                                        class="col-form-label col-md-1 text-center">ไอดีทีม</label>
                                                                                    <div class="col-md-3">
                                                                                        <input type="text"
                                                                                            class="form-control m-b-5"
                                                                                            name="idteam"
                                                                                            value="<?php echo $fetch_data1['p_id'] ?>">
                                                                                    </div>

                                                                                    <label
                                                                                        class="col-form-label col-md-1 text-center">code</label>
                                                                                    <div class="col-md-3">
                                                                                        <input type="text"
                                                                                            class="form-control m-b-5"
                                                                                            name="refcode"
                                                                                            value="<?php echo $fetch_data1['p_ref_code'] ?>">
                                                                                    </div>


                                                                                </div>

                                                                        </th>
                                                                        <th width="200px">
                                                                            <input type="submit" name="Upload"
                                                                                class="btn btn-success" value="อัปโหลด">
                                                                        </th>
                                                                        </form>

                                                                        </th>
                                                                        <th width="200px">
                                                                            <?php
                                                                            $sql_poster = "SELECT * FROM file WHERE f_idstudent = '$_SESSION[s_idstudent]'";
                                                                            $qpos = mysqli_query($conn,$sql_poster);
                                                                            while($fetch_pos = mysqli_fetch_array($qpos)){
                                                                                if($fetch_pos['f_poster']== ''){
                                                                                    echo 'ไม่พบไฟล์';
                                                                                }else{
                                                                                    $path = './yrcstem2021/poster/';
                                                                                    echo "<a href=$path$fetch_pos[f_poster] class='btn btn-primary'>ดูไฟล์</a>";
                                                                                }
                                                                            }
                                                                        ?>
                                                                        </th>
                                                                        <th width="300px">
                                                                            <?php
                                                                            $sql_ch2 = "SELECT * FROM file WHERE f_idstudent = '$_SESSION[s_idstudent]'";
                                                                            $q2 = mysqli_query($conn,$sql_ch2);
                                                                            while($fetch2 = mysqli_fetch_array($q2)){
                                                                                if($fetch2['f_status2']== 'success'){
                                                                                    echo '<a href=$fetch_pro class="btn btn-success">ผ่านการตรวจสอบแล้ว</a>';
                                                                                }else if($fetch2['f_status2']== 'unsuccess'){
                                                                                    echo '<a href=# class="btn btn-warning">ไม่ผ่าน</a>';
                                                                                }else{
                                                                                    echo '<a href=# class="btn btn-danger">รอการตรวจสอบ</a>';
                                                                                }
                                                                            }
                                                                        ?>
                                                                        </th>

                                                                    </tr>
                                                                    <?php } ?>


                                                                    <?php } ?>
                                                                </thead>

                                                                <thead>
                                                                    <?php
                                                                        $sql_status3 = "SELECT * FROM file WHERE f_idstudent = '$_SESSION[s_idstudent]'";
                                                                        $q_s3 = mysqli_query($conn,$sql_status3);
                                                                        while($fetch_s3 = mysqli_fetch_array($q_s3)){
                                                                    ?>

                                                                    <?php 
                                                                        if($fetch_s3['f_status3'] === 'success'){
                                                                    ?>
                                                                    <tr>
                                                                        <th width="400px">3. ลิงก์ Youtube Video</th>
                                                                        <th>
                                                                            <p class="mb-1 text-success"
                                                                                style="font-size: 16px;"><i
                                                                                    class="fas fa-check"></i>
                                                                                ผ่านการตรวจสอบแล้ว</p>
                                                                        </th>
                                                                        <th col="">
                                                                            <?php 
                                                                                echo "<a href=$fetch_s3[f_clip] class='btn btn-primary' target='_blank'>ดูไฟล์</a>";
                                                                            ?>
                                                                        </th>

                                                                    </tr>

                                                                    <?php } else{ ?>
                                                                    <tr>
                                                                        <th width="300px">3. ลิงก์ Youtube Video</th>
                                                                        <th width="800px">
                                                                            <form action="process/upload_link.php"
                                                                                method="post"
                                                                                enctype="multipart/form-data">

                                                                                <input type="text"
                                                                                    class="form-control m-b-5"
                                                                                    name="link" required>

                                                                                <div
                                                                                    class="form-group row m-b-15 d-none">
                                                                                    <label
                                                                                        class="col-form-label col-md-1 text-center">เลขประจำตัวนักเรียน</label>
                                                                                    <div class="col-md-3">
                                                                                        <input type="text"
                                                                                            class="form-control m-b-5"
                                                                                            name="idstudent"
                                                                                            value="<?php echo $_SESSION['s_idstudent'] ?>">
                                                                                    </div>
                                                                                    <?php
                                                                                        $se1 = "SELECT * FROM project WHERE p_idstu = '$_SESSION[s_idstudent]'";
                                                                                        $qse1 = mysqli_query($conn,$se1);
                                                                                        $fetch_data1 = mysqli_fetch_array($qse1)
                                                                                    ?>

                                                                                    <label
                                                                                        class="col-form-label col-md-1 text-center">ไอดีทีม</label>
                                                                                    <div class="col-md-3">
                                                                                        <input type="text"
                                                                                            class="form-control m-b-5"
                                                                                            name="idteam"
                                                                                            value="<?php echo $fetch_data1['p_id'] ?>">
                                                                                    </div>

                                                                                    <label
                                                                                        class="col-form-label col-md-1 text-center">code</label>
                                                                                    <div class="col-md-3">
                                                                                        <input type="text"
                                                                                            class="form-control m-b-5"
                                                                                            name="refcode"
                                                                                            value="<?php echo $fetch_data1['p_ref_code'] ?>">
                                                                                    </div>


                                                                                </div>

                                                                        </th>
                                                                        <th width="200px">
                                                                            <input type="submit" name="Upload"
                                                                                class="btn btn-success" value="อัปโหลด">
                                                                        </th>
                                                                        </form>
                                                                        <th width="200px">
                                                                            <?php
                                                                            $sql_video = "SELECT * FROM file WHERE f_idstudent = '$_SESSION[s_idstudent]'";
                                                                            $qvi = mysqli_query($conn,$sql_video);
                                                                            while($fetch_vi = mysqli_fetch_array($qvi)){
                                                                                if($fetch_vi['f_clip']== ''){
                                                                                    echo 'ไม่พบลิงก์';
                                                                                }else{
                                                                                    echo "<a href=$fetch_vi[f_clip] target='_blank' class='btn btn-primary'>ดูไฟล์</a>";
                                                                                }
                                                                            }
                                                                        ?>
                                                                        </th>
                                                                        <th width="300px">
                                                                            <?php
                                                                            $sql_ch3 = "SELECT * FROM file WHERE f_idstudent = '$_SESSION[s_idstudent]'";
                                                                            $q3 = mysqli_query($conn,$sql_ch3);
                                                                            while($fetch3 = mysqli_fetch_array($q3)){
                                                                                if($fetch3['f_status3']== 'success'){
                                                                                    echo '<a href=$fetch_pro class="btn btn-success">ผ่านการตรวจสอบแล้ว</a>';
                                                                                }else if($fetch3['f_status3']== 'unsuccess'){
                                                                                    echo '<a href=# class="btn btn-warning">ไม่ผ่าน</a>';
                                                                                }else{
                                                                                    echo '<a href=# class="btn btn-danger">รอการตรวจสอบ</a>';
                                                                                }
                                                                            }
                                                                        ?>
                                                                        </th>

                                                                    </tr>
                                                                    <?php } ?>


                                                                    <?php } ?>
                                                                </thead>

                                                            </table>

                                                        </td>

                                                        <td>
                                                            <a href="edit_project_stem.php"
                                                                class="btn btn-warning w-100">แก้ไขข้อมูลการสมัคร</a>

                                                        </td>



                                                    </tr>



                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <?php } ?>
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