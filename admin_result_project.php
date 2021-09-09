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
                                    <h4>สารสนเทศโครงงาน THE 1ST NATIONAL BASIC STEM INNOVATION E-FORUM 2021</h4>
                                    <hr>
                                    <div class="row">
                                  
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

    <!-- Chart JS -->
    <script src="dist/js/pages/chartjs/chartjs.init.js"></script>
    <script src="assets/libs/chart.js/dist/Chart.min.js"></script>

</body>
</html>

<?php } ?>