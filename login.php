<!DOCTYPE html>
<html lang="en">
<?php
        require_once './components/head.php';
    ?>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>

<style>
    body{
        background: rgb(240,135,227);
        background: linear-gradient(90deg, rgba(240,135,227,1) 0%, rgba(246,98,134,1) 100%);
    }
    .login {
        background-image: url("./img/bglogin.jpg");
        background-size: cover;
        min-height: 100vh;
    }

    .loginsm {
        background-image: url("./img/bgloginsm.jpg");
        background-size: cover;
        min-height: 100vh;


    }



    input,
    input::-webkit-input-placeholder {
        font-size: 16px;
        line-height: 3;
    }
</style>

<body>

    


    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 mt-5 py-4 animate__animated  animate__backInDown">            
                <div class="p-xl-5 p-sm-5" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;border-radius:10px;background-color:white">
                    <p align="center" class="mt-5"><img src="./img/logostem.png" class="img-fluid" width="60%" alt=""></p>
                    <h1 align="center" style="font-weight:bold;font-size:45px">Login เข้าสู่ระบบ</h1>
                    <h5 style="font-size:18px" align="center" class="">YRC STEM Project archives and record 2021 <br>ระบบ บริหารจัดการข้อมูลโครงงาน STEM 2021
                    </h5>
                
                    <hr>
                    <?php
                        if(isset($_GET['status'])){
                            $status = $_GET['status'];
                            if($status == 'error'){
                                echo '<div class="card bg-danger">
                                <div class="card-body text-white ">
                                    <div class="d-flex flex-row ">
                                        <div class="display-9 align-self-center"><i class="fas fa-lock"></i></div>
                                        <div class="p-1 align-self-center" align="center">
                                            <h5 class="mb-0 text-white"> Username หรือ Password ไม่ถูกต้อง !</h5>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>';
                            }else{

                            }
                        }
                    ?>
                    <form class="mt-3" action="process/loginact.php" method="post">
                        <div class="form-group">

                            <input type="text" class="form-control p-4" name="s_username" placeholder="เลขประจำตัวประชาชน"
                                style="border-radius:100px">

                            <input type="password" class="form-control mt-4 p-4" id="nametext" name="s_password"
                                placeholder="รหัสผ่าน" style="border-radius:100px">

                            <button type="submit" name="submit" class="btn btn-rounded btn-block btn-dribbble mt-4 "
                                style="font-size:16px">ลงชื่อเข้าใช้</button>

                        </div>
                    </form>
                
                    <hr>
                    <p align="center" style="color:#929292">© 2021 All Right Reserved 
                       Yupparaj Wittayalai School
                    </p>
                </div>
            </div>
        
        </div>
    </div>















    <?php
        require_once './components/jslink.php';
    ?>

</body>

</html>