<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Leave Online</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      เกี่ยวกับการลา
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Edit</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <a class="collapse-item" href="edit_page_u.php">แก้ไขข้อมูลการลา</a>



        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>ดูข้อมูล</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <a class="collapse-item" href="history_leave.php">ดูข้อมูลการลาย้อนหลัง</a>

          <a class="collapse-item" href="nopay_u_page.php">ดูข้อมูลการลาไม่รับค่าจ้าง<br>ของตัวเอง</a>
          <a class="collapse-item" href="report_year_user.php">ดูข้อมูลการแบบปี</a>




        </div>
      </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="user_page.php">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>รายงานขอลา</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->

          <!-- Nav Item - Alerts -->

          <!-- Nav Item - Messages -->


          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <?php
          include "connect.php";
          $strSQL6 = "SELECT * FROM member WHERE username = '".$_SESSION['username']."'";
          $objQuery6 = mysqli_query($objCon,$strSQL6);
          $objResult6 = mysqli_fetch_array($objQuery6,MYSQLI_ASSOC);
           ?>
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php  echo $objResult6['username']; ?></span>

            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


              <a class="dropdown-item" href="logout.php">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

        </nav>
        <!-- End of Topbar -->

        <div class="container-fluid">
          <div class="row">
            <?php
            include "connect.php";
            $strSQL =  "SELECT * FROM member where username = '".$_SESSION['username']."'";
            $objQuery = mysqli_query($objCon,$strSQL);
            $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

            $kind_work = $objResult['kind_work'];


             ?>
             <?php
              if($kind_work=="office")
              {

             ?>
             <?php
             function chkTime($time){
             $thistime = $time;
             $day = floor($thistime/3600/8.5);
             $hour = floor($thistime/3600);
             $T_minute = $thistime % 3600;

             $minute = floor($T_minute / 60);
             $second = $T_minute % 60;

             $word = "$day วัน หรือ $hour ชั่วโมง $minute นาที";

             return $word;
             }
             $time = $objResult['business_time'];

             ?>

             <?php
             function testcheck($time2){
             $thistime = $time2;
             $day = floor($thistime/3600/8.5);
             $hour = floor($thistime/3600);
             $T_minute = $thistime % 3600;

             $minute = floor($T_minute / 60);
             $second = $T_minute % 60;

             $word2 = "$day วัน หรือ $hour ชั่วโมง $minute นาที ";

             return $word2;
             }
             $time2 = $objResult['exbusiness_time'];

             ?>


              <?php
              $timeresult_pen = null;
              $strSQL10 = "SELECT * FROM leave_tbl Where username = '".$_SESSION['username']."' and status = 'non approve' and kind_leave = 'ลากิจ'";
              $objQuery10 = mysqli_query($objCon,$strSQL10);
              while($objResult10 = mysqli_fetch_assoc($objQuery10))
              {

                $timeresult_pen = $objResult10['summary_time'] + $timeresult_pen;

              }
             $timeresult_pen;

              function rebusiness_pending($timeresult_pen){
              $thistime = $timeresult_pen;
              $day = floor($thistime/3600/8.5);
              $hour = floor($thistime/3600);
              $T_minute = $thistime % 3600;

              $minute = floor($T_minute / 60);
              $second = $T_minute % 60;

              $word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

              return $word2;
              }

              ?>


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนวันลากิจที่เหลือ</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo chktime($time);?></div>
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนวันทั้งหมดที่ลาได้</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo testcheck($time2);?></div>
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนลากิจที่รอการอนุมัติ</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo rebusiness_pending($timeresult_pen);?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <?php
            function chkTime5($time){
            $thistime = $time;
            $day = floor($thistime/3600/8.5);
            $hour = floor($thistime/3600);
            $T_minute = $thistime % 3600;

            $minute = floor($T_minute / 60);
            $second = $T_minute % 60;

            $word = " $day หรือ $hour ชั่วโมง $minute นาที ";
            echo chktime5($time);


            }
            $time = $objResult['vacation_time'];

            ?>
            <?php
            function testcheck2($time2){
            $thistime = $time2;
            $day = floor($thistime/3600/8.5);
            $hour = floor($thistime/3600);
            $T_minute = $thistime % 3600;

            $minute = floor($T_minute / 60);
            $second = $T_minute % 60;

            $word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที ";

            return $word2;
            }
            $time2 = $objResult['exvacation_time'];

            ?>
            <?php
            $timeresult_pen = null;
            $strSQL10 = "SELECT * FROM leave_tbl Where username = '".$_SESSION['username']."' and status = 'non approve' and kind_leave = 'ลาพักผ่อน'";
            $objQuery10 = mysqli_query($objCon,$strSQL10);
            while($objResult10 = mysqli_fetch_assoc($objQuery10))
            {

              $timeresult_pen = $objResult10['summary_time'] + $timeresult_pen;

            }
             $timeresult_pen;
            function checkvaction($timeresult_pen){
            $thistime = $timeresult_pen;
            $day = floor($thistime/3600/8.5);
            $hour = floor($thistime/3600);
            $T_minute = $thistime % 3600;

            $minute = floor($T_minute / 60);
            $second = $T_minute % 60;

            $word3 = " $day วัน หรือ $hour ชั่วโมง $minute นาที ";

            return $word3;
            }
           $$timeresult_pen = $objResult['exvacation_time']-$objResult['vacation_time'];


            ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">จำนวนวันลาพักผ่อน</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo chktime($time);?></div>
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนวันทั้งหมดที่ลาได้</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo testcheck($time2);?></div>
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนลาพักผ่อนที่รอการอนุมัติ</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo checkvaction($timeresult_pen);?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php
            function chkTime2($time){
            $thistime = $time;
            $day = floor($thistime/3600/8.5);
            $hour = floor($thistime/3600);
            $T_minute = $thistime % 3600;

            $minute = floor($T_minute / 60);
            $second = $T_minute % 60;

            $word = " $day หรือ $hour ชั่วโมง $minute นาที ";
            echo chktime2($time);


            }
            $time = $objResult['sicktime'];

            ?>
            <?php
            function sickcheck($time3){
            $thistime = $time3;
            $day = floor($thistime/3600/8.5);
            $hour = floor($thistime/3600);
            $T_minute = $thistime % 3600;

            $minute = floor($T_minute / 60);
            $second = $T_minute % 60;

            $word3 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

            return $word3;
            }
            $time3 = $objResult['exsicktime'];

            ?>
            <?php
            $timeresult_pen = null;
            $strSQL10 = "SELECT * FROM leave_tbl Where username = '".$_SESSION['username']."' and status = 'non approve' and kind_leave = 'ลาป่วย'";
            $objQuery10 = mysqli_query($objCon,$strSQL10);
            while($objResult10 = mysqli_fetch_assoc($objQuery10))
            {

              $timeresult_pen = $objResult10['summary_time'] + $timeresult_pen;

            }
           $timeresult_pen;
            function checksicktime($timeresult_pen){
            $thistime = $timeresult_pen;
            $day = floor($thistime/3600/8.5);
            $hour = floor($thistime/3600);
            $T_minute = $thistime % 3600;

            $minute = floor($T_minute / 60);
            $second = $T_minute % 60;

            $word3 = " $day วัน หรือ $hour ชั่วโมง $minute นาที ";

            return $word3;
            }
           $$timeresult_pen = $objResult['exsicktime']-$objResult['sicktime'];


            ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">จำนวนเวลาลาป่วย</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo chktime($time);?></div>
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนวันทั้งหมดที่ลาได้</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo sickcheck($time3);?></div>
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนลาป่วยที่รอการอนุมัติ</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo checksicktime($timeresult_pen);?></div>
                        </div>
                        <div class="col">

                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            $timeresult_pen10 = null;
            $strSQL10 = "SELECT * FROM leave_tbl Where username = '".$_SESSION['username']."' and status = 'approve' and kind_leave = 'ลากิจไม่รับค่าจ้าง'";
            $objQuery10 = mysqli_query($objCon,$strSQL10);
            while($objResult10 = mysqli_fetch_assoc($objQuery10)){

              $timeresult_pen10 = $objResult10['summary_time'] + $timeresult_pen10;
            }
            function nopaycheck($timeresult_pen10){
            $thistime = $timeresult_pen10;
            $day = floor($thistime/3600/8.5);
            $hour = floor($thistime/3600);
            $T_minute = $thistime % 3600;

            $minute = floor($T_minute / 60);
            $second = $T_minute % 60;

            $word3 = "$day วัน หรือ $hour ชั่วโมง $minute นาที";

            return $word3;
            }
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนลากิจไม่รับค่าจ้างทั้งหมด</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo nopaycheck($timeresult_pen10);?></div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>


                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->

          </div>
        <?php
      }else{

         ?>
         <?php
         function chkTime($time){
         $thistime = $time;
         $day = floor($thistime/3600/8);
         $hour = floor($thistime/3600);
         $T_minute = $thistime % 3600;

         $minute = floor($T_minute / 60);
         $second = $T_minute % 60;

         $word = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

         return $word;
         }
         $time = $objResult['business_time'];

         ?>

         <?php
         function testcheck($time2){
         $thistime = $time2;
         $day = floor($thistime/3600/8);
         $hour = floor($thistime/3600);
         $T_minute = $thistime % 3600;

         $minute = floor($T_minute / 60);
         $second = $T_minute % 60;

         $word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

         return $word2;
         }
         $time2 = $objResult['exbusiness_time'];

         ?>


         <?php
         $timeresult_pen = null;
         $strSQL10 = "SELECT * FROM leave_tbl Where username = '".$_SESSION['username']."' and status = 'non approve' and kind_leave = 'ลากิจ'";
         $objQuery10 = mysqli_query($objCon,$strSQL10);
         while($objResult10 = mysqli_fetch_assoc($objQuery10))
         {
        	$objResult10['summary_time'];
         	$timeresult_pen = $objResult10['summary_time'] + $timeresult_pen;

         }


         function rebusiness_pending($timeresult_pen){
          $thistime = $timeresult_pen;
          $day = floor($thistime/3600/8);
          $hour = floor($thistime/3600);
          $T_minute = $thistime % 3600;

          $minute = floor($T_minute / 60);
          $second = $T_minute % 60;

          $word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

          return $word2;
          }
?>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนวันลากิจที่เหลือ</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo chktime($time);?></div>
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนวันทั้งหมดที่ลาได้</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo testcheck($time2);?></div>
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนวันลากิจที่รอการอนุมัติ</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo rebusiness_pending($timeresult_pen);?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>


        <?php
        function chkTime5($time){
        $thistime = $time;
        $day = floor($thistime/3600/8);
        $hour = floor($thistime/3600);
        $T_minute = $thistime % 3600;

        $minute = floor($T_minute / 60);
        $second = $T_minute % 60;

        $word = " $day หรือ $hour ชั่วโมง $minute นาที";
        echo chktime5($time);


        }
        $time = $objResult['vacation_time'];

        ?>
        <?php
        function testcheck2($time2){
        $thistime = $time2;
        $day = floor($thistime/3600/8);
        $hour = floor($thistime/3600);
        $T_minute = $thistime % 3600;

        $minute = floor($T_minute / 60);
        $second = $T_minute % 60;

        $word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที ";

        return $word2;
        }
        $time2 = $objResult['exvacation_time'];

        ?>
        <?php
        $timeresult_pen3 = null;
        $strSQL10 = "SELECT * FROM leave_tbl Where username = '".$_SESSION['username']."' and status = 'non approve' and kind_leave = 'ลาพักผ่อน'";
        $objQuery10 = mysqli_query($objCon,$strSQL10);
        while($objResult10 = mysqli_fetch_assoc($objQuery10)){

        	$timeresult_pen3 = $objResult10['summary_time'] + $timeresult_pen3;
        }
        function checkvaction($timeresult_pen3){
        $thistime = $timeresult_pen3;
        $day = floor($thistime/3600/8);
        $hour = floor($thistime/3600);
        $T_minute = $thistime % 3600;

        $minute = floor($T_minute / 60);
        $second = $T_minute % 60;

        $word3 = "$day วัน หรือ $hour ชั่วโมง $minute นาที";

        return $word3;
        }



        ?>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">จำนวนวันลาผ่อน</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo chktime($time);?></div>
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนวันทั้งหมดที่ลาได้</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo testcheck($time2);?></div>
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนวันลาพักผ่อนที่รอการอนุมัติ</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo checkvaction($timeresult_pen3);?></div>
                </div>
                <div class="col-auto">
                  <i class="fa fa-plane fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        function chkTime2($time){
        $thistime = $time;
        $day = floor($thistime/3600/8);
        $hour = floor($thistime/3600);
        $T_minute = $thistime % 3600;

        $minute = floor($T_minute / 60);
        $second = $T_minute % 60;

        $word = " $day หรือ $hour ชั่วโมง $minute นาที ";
        echo chktime2($time);


        }
        $time = $objResult['sicktime'];

        ?>
        <?php
        function sickcheck($time3){
        $thistime = $time3;
        $day = floor($thistime/3600/8);
        $hour = floor($thistime/3600);
        $T_minute = $thistime % 3600;

        $minute = floor($T_minute / 60);
        $second = $T_minute % 60;

        $word3 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

        return $word3;
        }
        $time3 = $objResult['exsicktime'];

        ?>
        <?php
        $timeresult_pen2 = null;
        $strSQL10 = "SELECT * FROM leave_tbl Where username = '".$_SESSION['username']."' and status = 'non approve' and kind_leave = 'ลาป่วย'";
        $objQuery10 = mysqli_query($objCon,$strSQL10);
        while($objResult10 = mysqli_fetch_assoc($objQuery10)){

        	$timeresult_pen2 = $objResult10['summary_time'] + $timeresult_pen2;
        }
        function checksicktime($timeresult_pen2){
        $thistime = $timeresult_pen2;
        $day = floor($thistime/3600/8);
        $hour = floor($thistime/3600);
        $T_minute = $thistime % 3600;

        $minute = floor($T_minute / 60);
        $second = $T_minute % 60;

        $word3 = "$day วัน หรือ $hour ชั่วโมง $minute นาที";

        return $word3;
        }

        ?>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">จำนวนเวลาลาป่วย</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo chktime($time);?></div>
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนวันทั้งหมดที่ลาได้</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo sickcheck($time3);?></div>
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนวันลาป่วยที่รอการอนุมัติ</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo checksicktime($timeresult_pen2);?></div>
                    </div>
                    <div class="col">

                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        $timeresult_pen10 = null;
        $strSQL10 = "SELECT * FROM leave_tbl Where username = '".$_SESSION['username']."' and status = 'approve' and kind_leave = 'ลากิจไม่รับค่าจ้าง'";
        $objQuery10 = mysqli_query($objCon,$strSQL10);
        while($objResult10 = mysqli_fetch_assoc($objQuery10)){

          $timeresult_pen10 = $objResult10['summary_time'] + $timeresult_pen10;
        }
        function nopaycheck($timeresult_pen10){
        $thistime = $timeresult_pen10;
        $day = floor($thistime/3600/8);
        $hour = floor($thistime/3600);
        $T_minute = $thistime % 3600;

        $minute = floor($T_minute / 60);
        $second = $T_minute % 60;

        $word3 = "$day วัน หรือ $hour ชั่วโมง $minute นาที";

        return $word3;
        }
        ?>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">

                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนลากิจไม่รับค่าจ้างทั้งหมด</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo nopaycheck($timeresult_pen10);?></div>

                </div>
                <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>


                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- Pending Requests Card Example -->

      </div>
    <?php
  }
     ?>
