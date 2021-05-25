<?php
session_start();
if($_SESSION['user_id'] == "")
{
  echo "Please Login!";
  header("location:index.php");

}
ini_set('display_errors', 0);
error_reporting(~0);

$approve = null;

if(isset($_POST["approve"]))
{
  $approve = $_POST["approve"];
}
if(isset($_POST["leave_id"]))
{
  $approve = $_POST["leave_id"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Leave Online</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <?php
  if($_SESSION['level'] == "admin"){
    include "main_admin.php";
  }elseif($_SESSION['level']== "leader"){
    include 'main_leader.php';
  }elseif($_SESSION['level']== "hr"){
    include 'main_hr.php';
  }else{
    include "main_user.php";
  }
?>


          <!-- Content Row -->

         <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-6">
              <div class="card shadow mb-12">
                <div class="card-header py-3">
                <center>  <h6 class="m-0 font-weight-bold text-primary">ใบคำขอการลา</h6></center>
                </div>
                <!-- Card Header - Dropdown -->
                <div class="card shadow mb-12">
                  <div class="card-header py-3">
                    <div class="col-md-12">
                      <h6 class="m-0 font-weight-bold text-primary">รายการลาวันนี้ที่ยังไม่ได้อนุมัติ</h6>

  <div class="table-responsive">

  <table class="table table-striped table-hover table-bordered">

    <?php
    include "connect.php";
    $strSQL2 = "SELECT * FROM leave_tbl WHERE status = 'non approve'";
    $objQuery2 = mysqli_query($objCon,$strSQL2);


     ?>


    <thead>

      <tr>


            <th>ผู้ลา</th>

            <th>ประเภทการลา</th>

            <th>เหตุผล</th>

            <th>วันเริ่มลา</th>

            <th>วันสุดท้ายที่ลา</th>

            <th>เวลารวมที่ลา</th>

            <th>การอนุมัติ</th>

            <th>บันทึก</th>




      </tr>

    </thead>
    <?php
    while ($objResult2= mysqli_fetch_assoc($objQuery2))
  	{
      ?>

    <tbody>

      <tr>
      <form name="1" method="post" action="save_cancel_u.php?leave_id=<?php echo $objResult2["leave_id"];?>">

        <td><?php echo $objResult2['username'];?></td>

        <td><?php echo $objResult2['kind_leave'];?></td>

        <td><?php echo $objResult2['reason'];?></td>

        <td><?php echo $objResult2['strdate'];?></td>

        <td><?php echo $objResult2['lastdate'];?></td>

        <?php
        if($objResult3['kind_work']=="office")
        {
        //function changetimes($timeresult10){
        //$thistime = $timeresult;
        //$day = floor($thistime/3600/8.5);
        //$hour = floor($thistime/3600);
        //$T_minute = $thistime % 3600;

        //$minute = floor($T_minute / 60);
        //$second = $T_minute % 60;

        //$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

        //return $word2;



        $timeresult10 = $objResult2['summary_time'];
        $day = floor($timeresult10/3600/8.5);
        $hour = floor($timeresult10/3600);
        $T_minute = $timeresult10 % 3600;
        $minute = floor($T_minute / 60);
        ?>



        <td><?php echo "$day วัน หรือ $hour ชั่วโมง $minute นาที";?></td>

      <?php
      }else{

        //function changetimes($timeresult10){
        //$thistime = $timeresult;
        //$day = floor($thistime/3600/8.5);
        //$hour = floor($thistime/3600);
        //$T_minute = $thistime % 3600;

        //$minute = floor($T_minute / 60);
        //$second = $T_minute % 60;

        //$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

        //return $word2;



        $timeresult10 = $objResult2['summary_time'];
        $day = floor($timeresult10/3600/8.0);
        $hour = floor($timeresult10/3600);
        $T_minute = $timeresult10 % 3600;
        $minute = floor($T_minute / 60);
      ?>
          <td><?php echo "$day วัน หรือ $hour ชั่วโมง $minute นาที";?></td>

      <?php
      }
       ?>

        <td>	<div class="form-group">

      <select class="form-control" id="cancle" name="cancle">
      <option value="cancle">ยกเลิกคำขอลา</option>


      </select></td>

        <td><button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">update</button><td>

      </form>


       </tr>
    <?php
     }
       ?>






    </tbody>

  </table>
  <?php

  include 'connect.php';
 $strSQL = "UPDATE  SET leave_tbl";
  $strSQL .="status = '".$_POST["cancle"]."' ";

 $strSQL .="WHERE leave_id = '".$_GET ['leave_id']."'";
  $objQuery = mysqli_query($objCon,$strSQL);

   ?>





                        </div>
                    </div>
                <!-- Card Body -->
                <div class="card-body">

                </div>
              </div>
            </div>
            </div>
            </div>


            <!-- Pie Chart -->

          </div>
          </br></br>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">



            </div>


          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php 
      include ('footer.php');

     ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
