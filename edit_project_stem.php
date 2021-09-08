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
                                        $fetch = mysqli_fetch_array($query_check);
                                        
                                    ?>        
                                    <div class="col-xl-8">
                                        <h4>1. แก้ไขรายละเอียดโครงงาน</h4>
                                        <hr>
                                        <form action="process/edit_project.php" method="post" enctype="multipart/form-data">

                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">ชื่อโครงงาน ภาษาไทย </label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control m-b-5" name="p_nameth"
                                                        required="" value="<?php echo $fetch['p_nameth'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">ชื่อโครงงาน ภาษาอังกฤษ </label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control m-b-5" name="p_nameen"
                                                        required="" value="<?php echo $fetch['p_nameen'] ?>">
                                                </div>
                                            </div>

                                            

                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">สาขา</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="p_subject" id="n_tp_subjectype" required="">
                                                        <option><?php echo $fetch['p_subject'] ?></option>
                                                        <option>ฟิสิกส์</option>
                                                        <option>เคมี</option>
                                                        <option>ชีววิทยา</option>
                                                        <option>เทคโนโลยี</option>
                                                        <option>คณิตศาสตร์</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <h4 class="mt-4">2. แก้ไขสมาชิกกลุ่ม</h4>
                                            <hr>
                                            <p style="font-weight: 600;">สมาชิกกลุ่มลำดับที่ 1</p>
                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">คำนำหน้า</label>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="p_fname1" required="">
                                                        <option><?php echo $fetch['p_fname1'] ?></option>
                                                        <option value="นาย">นาย</option>
                                                        <option value="นางสาว">นางสาว</option>
                                                        <option value="เด็กชาย">เด็กชาย</option>
                                                        <option value="เด็กหญิง">เด็กหญิง</option>

                                                    </select>
                                                </div>

                                                

                                                <label class="col-form-label col-md-1 text-center">ชื่อ</label>
                                                    <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_name1"
                                                        required="" value="<?php echo $fetch['p_name1'] ?>">
                                                </div>

                                                <label class="col-form-label col-md-1 text-center">นามสกุล</label>
                                                    <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_surname1"
                                                        required="" value="<?php echo $fetch['p_surname1'] ?>">
                                                </div>
                                            </div> 

                                            

                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">ระดับชั้นมัธยมศึกษาปีที่</label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="p_grade1" required="">
                                                        <option><?php echo $fetch['p_grade1'] ?></option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>

                                                    </select>
                                                </div>

                                                

                                                <label class="col-form-label col-md-1">ห้อง</label>
                                                <div class="col-md-5">
                                                    <select class="form-control" name="p_room1"  required="">
                                                        <option><?php echo $fetch['p_room1'] ?></option>
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
                                                
                                                <a class="btn btn-success btn-sm" href="javascript:toggleFormElements(false);">มี</a>
                                                <a class="btn btn-danger btn-sm"href="javascript:toggleFormElements(true);">ไม่มี</a>

                                            </p>    
                                      
                                                
                                         
                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">คำนำหน้า</label>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="p_fname2" >
                                                    <option><?php echo $fetch['p_fname2'] ?></option>
                                                        <option value="นาย">นาย</option>
                                                        <option value="นางสาว">นางสาว</option>
                                                        <option value="เด็กชาย">เด็กชาย</option>
                                                        <option value="เด็กหญิง">เด็กหญิง</option>

                                                    </select>
                                                </div>

                                                

                                                <label class="col-form-label col-md-1 text-center">ชื่อ</label>
                                                    <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_name2"
                                                       value="<?php echo $fetch['p_name2'] ?>">
                                                </div>

                                                <label class="col-form-label col-md-1 text-center">นามสกุล</label>
                                                    <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_surname2"
                                                    value="<?php echo $fetch['p_surname2'] ?>">
                                                </div>
                                            </div> 

                                            

                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">ระดับชั้นมัธยมศึกษาปีที่</label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="p_grade2">
                                                    <option><?php echo $fetch['p_grade2'] ?></option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>

                                                    </select>
                                                </div>

                                                

                                                <label class="col-form-label col-md-1">ห้อง</label>
                                                <div class="col-md-5">
                                                    <select class="form-control" name="p_room2"  >
                                                    <option><?php echo $fetch['p_room2'] ?></option>
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
                                                <a class="btn btn-success btn-sm" href="javascript:toggleFormElements2(false);">มี</a>
                                                <a class="btn btn-danger btn-sm"href="javascript:toggleFormElements2(true);">ไม่มี</a>
                                            </p>  
                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">คำนำหน้า</label>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="p_fname3">
                                                    <option><?php echo $fetch['p_fname3'] ?></option>
                                                        <option value="นาย">นาย</option>
                                                        <option value="นางสาว">นางสาว</option>
                                                        <option value="เด็กชาย">เด็กชาย</option>
                                                        <option value="เด็กหญิง">เด็กหญิง</option>

                                                    </select>
                                                </div>

                                                

                                                <label class="col-form-label col-md-1 text-center">ชื่อ</label>
                                                    <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_name3"
                                                    value="<?php echo $fetch['p_name3'] ?>">
                                                </div>

                                                <label class="col-form-label col-md-1 text-center">นามสกุล</label>
                                                    <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_surname3"
                                                    value="<?php echo $fetch['p_surname3'] ?>">
                                                </div>
                                            </div> 

                                            

                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">ระดับชั้นมัธยมศึกษาปีที่</label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="p_grade3">
                                                    <option><?php echo $fetch['p_grade3'] ?></option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>

                                                    </select>
                                                </div>

                                                

                                                <label class="col-form-label col-md-1">ห้อง</label>
                                                <div class="col-md-5">
                                                    <select class="form-control" name="p_room3">
                                                    <option><?php echo $fetch['p_room3'] ?></option>
                                                        <?php
                                                            for($sub =1 ; $sub<17; $sub++){
                                                        ?>
                                                        <option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>

                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>





                                            <h4 class="mt-4">3. แก้ไขครูที่ปรึกษา</h4>
                                            <hr>

                                            <div class="form-group row m-b-15">
                                                <label class="col-form-label col-md-2">คำนำหน้า</label>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="p_fname_t">
                                                    <option><?php echo $fetch['p_fname_t'] ?></option>
                                                        <option value="นางสาว">นาง</option>
                                                        <option value="เด็กชาย">นางสาว</option>
                                                        <option value="นาย">นาย</option>
                                                     

                                                    </select>
                                                </div>

                                                

                                                <label class="col-form-label col-md-1 text-center">ชื่อ</label>
                                                    <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_name_t"
                                                    value="<?php echo $fetch['p_name_t'] ?>">
                                                </div>

                                                <label class="col-form-label col-md-1 text-center">นามสกุล</label>
                                                    <div class="col-md-3">
                                                    <input type="text" class="form-control m-b-5" name="p_sname_t"
                                                    value="<?php echo $fetch['p_sname_t'] ?>">
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

                                         



                                            

                                            <input type="submit" class="btn btn-warning w-100" name="Update"
                                                value="แก้ไขโครงงาน">
                                        </form>

                                    </div>

                                    <?php ?>
                                   
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