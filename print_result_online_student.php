<?php
    include_once 'connect/connect.php';
    session_start();
    header("Content-Type: application/vnd.ms-excel");
    header('Content-Disposition: attachment; filename="รายงานผลการลงทะเบียนผ่านระบบออนไลน์.xls"');# ชื่อไฟล์
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<HTML>
<HEAD>
    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
</HEAD>
<BODY>
<?php
    if(isset($_GET['id_subject'] , $_GET['grade'] , $_GET['room'] , $_GET['time'], $_GET['date'] ,$_GET['t_id'])){
        $subject_id = filter_input(INPUT_GET, 'id_subject' , FILTER_SANITIZE_NUMBER_INT);
        $grade = filter_input(INPUT_GET, 'grade' , FILTER_SANITIZE_NUMBER_INT);
        $room = filter_input(INPUT_GET, 'room' , FILTER_SANITIZE_NUMBER_INT);
        $time = filter_input(INPUT_GET, 'time' , FILTER_SANITIZE_NUMBER_INT);
        $t_id = filter_input(INPUT_GET, 't_id' , FILTER_SANITIZE_NUMBER_INT);
        $date = $_GET['date'];
    }   
    $sqlselectsub = "SELECT * FROM time_table WHERE ti_id = '$subject_id' ";
    $querysub  = mysqli_query($conn,$sqlselectsub);
    $fetchsub = mysqli_fetch_array($querysub);
?>
<TABLE BORDER="1" x:str>
    <TR>
        <TD colspan="4">รายงานสถานะการอัพโหลดโครงงาน</TD>
    </TR>

    <TR>
        <TD colspan="4">รหัสโครงการ</TD>
    </TR>

    <TR>
        <TD colspan="4">ชื่อโครงงาน</TD>
    </TR>

    <TR>
        <TD colspan="4">สาขา </TD>
    </TR>

    <TR>
        <TD colspan="4">สมาชิกลำดับที่ 1 </TD>
    </TR>
    

    <TR>
        <TD colspan="4"><?php 
                                         $tz = 'Asia/Bangkok';
                                         $timestamp = time();
                                         $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
                                         $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
                                         $date = $dt->format('D');
                                         $date2 = $dt->format('d');
                                         $month = $dt->format('m');
                                         $date3 = $dt->format('Y');

                                         if($date == 'Tue'){
                                            echo 'วันอังคาร ที่ ';
                                        }
                                        else if($date == 'Wed'){
                                            echo 'วันพุธ ที่ ';
                                        }
                                        else if($date == 'Thr'){
                                            echo 'วันพฤหัสบดี ที่ ';
                                        }else if($date == 'Fri'){
                                            echo 'วันศุกร์ ที่ ';
                                        }else if($date == 'Sat'){
                                            echo 'วันเสาร์ ที่ ';
                                        }else if($date == 'Sun'){
                                            echo 'วันอาทิตย์ ที่ ';
                                        }else if($date == 'Mon'){
                                            echo 'วันจันทร์ ที่ ';
                                        }
                                        echo $date2;

                                        
                                      
                                         if($month == '04'){
                                            echo ' เมษายน ';
                                        }else if($month == '05'){
                                            echo ' พฤษภาคม ';
                                        }else if($month == '06'){
                                            echo ' มิถุนายน ';
                                        }else if($month == '07'){
                                            echo ' กรกฎาคม ';
                                        }else if($month == '08'){
                                            echo ' สิงหาคม ';
                                        }else if($month == '09'){
                                            echo ' กันยายน ';
                                        }else if($month == '10'){
                                            echo ' ตุลาคม ';
                                        }else if($month == '11'){
                                            echo ' พฤศจิกายน ';
                                        }else if($month == '12'){
                                            echo ' ธันวาคม ';
                                        }else if($month == '01'){
                                            echo ' มกราคม ';
                                        }else if($month == '02'){
                                            echo ' กุมภาพันธ์ ';
                                        }else if($month == '03'){
                                            echo ' มีนาคม ';
                                        }
                                         echo '';
                                         echo $date3+543;
                                      
                                        
                                    ?></TD>
    </TR>

    <TR>
        <TD align="center" width="90">ที่</TD>
        <TD align="center" width="190">เลขประจำตัว</TD>
        <TD align="center" width="180">ชื่อ - นามสกุล</TD>
        <TD align="center" width="180">สถานะการมา</TD>
  
    </TR>

  
    <?php
        $sql = "SELECT * FROM student WHERE s_level = '$grade' AND s_room = '$room' ";
        $result = mysqli_query($conn,$sql);
        $i = 0;
        while($row = mysqli_fetch_array($result)){
        $i++;
                                            
    ?>

<TR>

    <TD><?php echo $i; ?></TD>
    <TD><?php echo $row['s_idstudent'] ?></TD>
    <TD><?php echo $row['s_title'].$row['s_name']. '&nbsp;'.$row['s_surname'] ?></TD>

    <TD>
        <?php
            $sqlcheckstuop = "SELECT * FROM checktime WHERE s_id = '$row[s_id]' AND t_id = '$t_id' 
            AND ti_id = '$subject_id' AND c_timecheck = '$time' AND c_date = '$date'";
            $q = mysqli_query($conn,$sqlcheckstuop);

            $num = mysqli_num_rows($q);
            if($num == '0'){
                echo 'ขาด';
            }else{
                while($u = mysqli_fetch_array($q)){
                    if($u['s_id'] == $row['s_id']){
                            echo 'มา';
                    }else{
                        echo 'ขาด';
                    }
                }
            }
   
        ?>
        
    </TD>
</TR>
                    
<?php } ?>
</TABLE>
</BODY>
</HTML>