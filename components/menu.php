<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <div class="user-profile position-relative" style="background: url(./assets/images/background/bg2.jpg);">
            <!-- User profile image -->
            <div class="text-left" style="margin-left: 20px;">
                <br>
                    <img src="assets/images/users/yrc_tech.png" alt="user" class="w-50 rounded-circle" />
                <br>
                <br>
            </div>
            <!-- User profile text-->
            <div class="profile-text pt-1">
                <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block" data-toggle="dropdown"
                    role="button" aria-haspopup="true" aria-expanded="true">
                    <?php echo $_SESSION['s_title']; echo $_SESSION['s_name']; echo '&nbsp;'; echo $_SESSION['s_surname']; ?></a>
                <div class="dropdown-menu animated flipInY">
                   
                    <div class="dropdown-divider"></div>
                    <a href="process/logout.php" class="dropdown-item"><i class="fa fa-power-off"></i>
                        ออกจากระบบ</a>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                

                <?php if($_SESSION['s_status'] == 'A'){ ?>
                    <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i>
                        <span class="hide-menu">ระบบบริหารจัดการทั่วไป</span>
                    </li>
                    <!-- <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_student.php"
                            aria-expanded="false">
                            <i class="mdi mdi-sitemap"></i>
                            <span class="hide-menu">บริหารจัดการนักเรียน ผู้ใช้งาน</span>
                        </a>
                    </li> -->

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_news.php"
                            aria-expanded="false">
                            <i class="mdi mdi-newspaper"></i>
                            <span class="hide-menu">บริหารจัดการข่าวสาร</span>
                        </a>
                    </li>


                    <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i>
                        <span class="hide-menu">ระบบบริหารจัดการโครงงาน</span>
                    </li>

                    <!-- <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin_result_project.php"
                            aria-expanded="false">
                            <i class="mdi mdi-chart-line"></i>
                            <span class="hide-menu">สารสนเทศโครงงาน</span>
                        </a>
                    </li> -->

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin_manage_project.php"
                            aria-expanded="false">
                            <i class="mdi mdi-file"></i>
                            <span class="hide-menu">ตรวจสอบไฟล์</span>
                        </a>
                    </li>

                    <!-- <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin_award_project.php"
                            aria-expanded="false">
                            <i class="mdi mdi-clipboard-check"></i>
                            <span class="hide-menu">ตัดสินโครงงาน</span>
                        </a>
                    </li> -->

                

                <?php } else{?>
                

                <?php }?>

                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">ระบบบริหารโครงงาน</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="add_project_stem.php"
                        aria-expanded="false">
                        <i class="mdi mdi-calendar"></i><span class="hide-menu">บริหารจัดการโครงงาน</span>
                    </a>
                </li>


              



                <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">เกี่ยวกับระบบ</span>
                </li>
                <!-- <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin.php" aria-expanded="false">
                        <i class="mdi mdi-xml"></i>
                        <span class="hide-menu">ทีมพัฒนา</span>
                    </a>
                </li> -->

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="policy.php"
                        aria-expanded="false">
                        <i class="mdi mdi-xml"></i>
                        <span class="hide-menu">นโยบายเว็บไซต์</span>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>