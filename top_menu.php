<div class="row">
  <?php
  include "connect.php";
  $strSQL =  "SELECT * FROM member where username = '".$_SESSION['username']."'";
  $objQuery = mysqli_query($objCon,$strSQL);
  $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);



   ?>
   <?php
   function chkTime($time){
   $thistime = $time;
   $day = floor($thistime/3600/8.5);
   $hour = floor($thistime/3600);
   $T_minute = $thistime % 3600;

   $minute = floor($T_minute / 60);
   $second = $T_minute % 60;

   $word = "เวลาทั้งหมด $day วัน หรือ $hour ชั่วโมง $minute นาที $second วินาที";

   return $word;
   }
   $time = $objResult['business_time'];

   ?>


  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนวันลากิจที่เหลือ</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo chktime($time);?></div>
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

  $word = "เวลาเหลือประมาณ $day หรือ $hour ชั่วโมง $minute นาที $second วินาที";
  echo chktime5($time);


  }
  $time = $objResult['vacation_time'];

  ?>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">จำนวนวันลาพักร้อน</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo chktime($time);?></div>
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

  $word = "เวลาที่ลาป่วย $day หรือ $hour ชั่วโมง $minute นาที $second วินาที";
  echo chktime2($time);


  }
  $time = $objResult['sicktime'];

  ?>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">จำนวนเวลาลาป่วย</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo chktime($time);?></div>
              </div>
              <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
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

  <!-- Pending Requests Card Example -->

</div>
