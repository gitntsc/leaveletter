<?php
session_start();
if($_SESSION['user_id'] == "")
{
  echo "Please Login!";
  header("location:index.php");
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
          <!-- Page Heading -->


          <!-- Content Row -->

          <!-- Content Row -->

         <div class="row">
           <?php
           $strSQL3 = "SELECT * FROM member WHERE username = '".$_SESSION['username']."'";
           $objQuery3 = mysqli_query($objCon,$strSQL3);
           $objResult3 = mysqli_fetch_array($objQuery3,MYSQLI_ASSOC);
           $leader1 = $objResult3['leader1'];
           $leader2 = $objResult3['leader2'];
            ?>

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-6">
              <div class="card shadow mb-12">
                <div class="card-header py-3">
                <center>  <h6 class="m-0 font-weight-bold text-primary">ใบคำขอการลา</h6></center>
                </div>
                <?php
                include "connect.php";
                echo $strSQL2 = "SELECT * FROM leave_tbl Where  leave_id ='".$_GET['leave_id']."'";
                $objQuery2 = mysqli_query($objCon,$strSQL2);
                $objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC);

                 ?>
                <!-- Card Header - Dropdown -->
                <div class="card shadow mb-12">
                  <div class="card-header py-3">
                    <div class="col-md-12">
                      <h6 class="m-0 font-weight-bold text-primary">ประเภทการลา</h6>
                      <form name="1" method="post" action="save_fullview_leave.php?leave_id=<?php echo $_GET["leave_id"];?>">

                      <?php

                      if($objResult2['kind_leave']=="ลากิจ")
                      {
                      ?>
                        <div class="radio" name="leave" id="leave">
                      <label><input type="radio" name="leave" id="leave" checked value="ลากิจ">ลากิจ</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="leave" id="leave" value="ลากิจไม่รับค่าจ้าง">ลากิจไม่รับค่าจ้าง</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="leave" id="leave" value="ลาป่วย">ลาป่วย</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="leave" id="leave" value="ลาพักผ่อน">ลาพักผ่อน</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="leave" id="leave" value="ลาคลอด">ลาคลอด</label>
                    </div>
                    <div class="radio disabled">
                      <label><input type="radio" name="leave" id="leave" value="ลาแต่งงาน">ลาแต่งงาน</label>
                    </div>
                    <?php
                  }elseif($objResult2['kind_leave']=="ลากิจไม่รับค่าจ้าง")
                  {
                  ?>
                  <div class="radio" name="leave" id="leave">
                <label><input type="radio" name="leave" id="leave" checked value="ลากิจ">ลากิจ</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="leave" id="leave" checked value="ลากิจไม่รับค่าจ้าง">ลากิจไม่รับค่าจ้าง</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="leave" id="leave" value="ลาป่วย">ลาป่วย</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="leave" id="leave" value="ลาพักผ่อน">ลาพักผ่อน</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="leave" id="leave" value="ลาคลอด">ลาคลอด</label>
              </div>
              <div class="radio disabled">
                <label><input type="radio" name="leave" id="leave" value="ลาแต่งงาน">ลาแต่งงาน</label>
              </div>
              <?php
            }elseif($objResult2['kind_leave']=="ลาป่วย")
            {
               ?>
               <div class="radio" name="leave" id="leave">
             <label><input type="radio" name="leave" id="leave" value="ลากิจ">ลากิจ</label>
           </div>
           <div class="radio">
             <label><input type="radio" name="leave" id="leave" value="ลากิจไม่รับค่าจ้าง">ลากิจไม่รับค่าจ้าง</label>
           </div>
           <div class="radio">
             <label><input type="radio" name="leave" id="leave" checked value="ลาป่วย">ลาป่วย</label>
           </div>
           <div class="radio">
             <label><input type="radio" name="leave" id="leave" value="ลาพักผ่อน">ลาพักผ่อน</label>
           </div>
           <div class="radio">
             <label><input type="radio" name="leave" id="leave" value="ลาคลอด">ลาคลอด</label>
           </div>
           <div class="radio disabled">
             <label><input type="radio" name="leave" id="leave" value="ลาแต่งงาน">ลาแต่งงาน</label>
           </div>
           <?php
         }elseif($objResult2['kind_leave']=="ลาพักผ่อน")
         {
            ?>
            <div class="radio" name="leave" id="leave">
          <label><input type="radio" name="leave" id="leave" value="ลากิจ">ลากิจ</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="leave" id="leave" value="ลากิจไม่รับค่าจ้าง">ลากิจไม่รับค่าจ้าง</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="leave" id="leave" value="ลาป่วย">ลาป่วย</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="leave" id="leave" checked value="ลาพักผ่อน">ลาพักผ่อน</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="leave" id="leave" value="ลาคลอด">ลาคลอด</label>
        </div>
        <div class="radio disabled">
          <label><input type="radio" name="leave" id="leave" value="ลาแต่งงาน">ลาแต่งงาน</label>
        </div>
        <?php
      }elseif($objResult2['kind_leave']=="ลาคลอด")
    {
         ?>
         <div class="radio" name="leave" id="leave">
       <label><input type="radio" name="leave" id="leave" value="ลากิจ">ลากิจ</label>
     </div>
     <div class="radio">
       <label><input type="radio" name="leave" id="leave" value="ลากิจไม่รับค่าจ้าง">ลากิจไม่รับค่าจ้าง</label>
     </div>
     <div class="radio">
       <label><input type="radio" name="leave" id="leave"  value="ลาป่วย">ลาป่วย</label>
     </div>
     <div class="radio">
       <label><input type="radio" name="leave" id="leave" value="ลาพักผ่อน">ลาพักผ่อน</label>
     </div>
     <div class="radio">
       <label><input type="radio" name="leave" id="leave" checked value="ลาคลอด">ลาคลอด</label>
     </div>
     <div class="radio disabled">
       <label><input type="radio" name="leave" id="leave" value="ลาแต่งงาน">ลาแต่งงาน</label>
     </div>
     <?php
   }elseif($objResult2['kind_leave']=="ลาแต่งงาน")
   {
      ?>
      <div class="radio" name="leave" id="leave">
    <label><input type="radio" name="leave" id="leave" value="ลากิจ">ลากิจ</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="leave" id="leave" value="ลากิจไม่รับค่าจ้าง">ลากิจไม่รับค่าจ้าง</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="leave" id="leave"  value="ลาป่วย">ลาป่วย</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="leave" id="leave" value="ลาพักผ่อน">ลาพักผ่อน</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="leave" id="leave" checked value="ลาคลอด">ลาคลอด</label>
  </div>
  <div class="radio disabled">
    <label><input type="radio" name="leave" id="leave" value="ลาแต่งงาน">ลาแต่งงาน</label>
  </div>
  <?php
}else{
   ?>
   <div class="radio" name="leave" id="leave">
 <label><input type="radio" name="leave" id="leave" value="ลากิจ">ลากิจ</label>
</div>
<div class="radio">
 <label><input type="radio" name="leave" id="leave" value="ลากิจไม่รับค่าจ้าง">ลากิจไม่รับค่าจ้าง</label>
</div>
<div class="radio">
 <label><input type="radio" name="leave" id="leave"  value="ลาป่วย">ลาป่วย</label>
</div>
<div class="radio">
 <label><input type="radio" name="leave" id="leave" value="ลาพักผ่อน">ลาพักผ่อน</label>
</div>
<div class="radio">
 <label><input type="radio" name="leave" id="leave"  value="ลาคลอด">ลาคลอด</label>
</div>
<div class="radio disabled">
 <label><input type="radio" name="leave" id="leave" checked value="ลาแต่งงาน">ลาแต่งงาน</label>
</div>
<?php
}
 ?>


                        <div class="form-group">

                        <lable>เหตุผล</lable>
                        <input type="text" class="form-control" value="<?php echo $objResult2["reason"];?>" id="reason" name="reason" />
                        </div>


                        <label>วันที่เริ่ม</label><br>

                        <div class="col-md-12">
                          <input class="form-control" type="date" name="strdate" id="strdate" value="<?php echo $objResult2['strdate']; ?>"><br>

                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                          <label for="strtime">Select Time</label>
                          <select class="form-control" name = "strtime" id="strtime">
                            <option value="<?php echo $objResult2['strtime'];?>"><?php echo $objResult2['strtime']; ?> น. </option>
                            <option value="00:00:00">00.00 น.</option>
                            <option value="08:00:00">08.00 น.</option>
                            <option value="08:30:00">08.30 น.</option>
                            <option value="09:00:00">09.00 น.</option>
                            <option value="09:30:00">09.30 น.</option>
                            <option value="10:00:00">10.00 น.</option>
                            <option value="10:30:00">10.30 น.</option>
                            <option value="11:00:00">11.00 น.</option>
                            <option value="11:30:00">11.30 น.</option>
                            <option value="12:00:00">12.00 น.</option>
                            <option value="13:00:00">13.00 น.</option>
                            <option value="13:30:00">13.30 น.</option>
                            <option value="14:00:00">14.00 น.</option>
                            <option value="14:30:00">14.30 น.</option>
                            <option value="15:00:00">15.00 น.</option>
                            <option value="15:30:00">15.30 น.</option>
                            <option value="16:00:00">16.00 น.</option>
                            <option value="16:30:00">16.30 น.</option>
                            <option value="17:00:00">17.00 น.</option>
                            <option value="17:30:00">17.30 น.</option>
                          </select>
                        </div>
                      </div>







                      <label>วันสุดท้าย</label><br>
                      <div class="col-md-12">
                        <input class="form-control" type="date" name="lastdate" id="lastdate" value="<?php echo $objResult2['lastdate']; ?>"><br>

                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                        <label for="lasttime">Select Time</label>
                        <select class="form-control" name = "lasttime" id="lasttime">
                          <option value="<?php echo $objResult2['lasttime'];?>"><?php echo $objResult2['lasttime']; ?> น. </option>
                          <option value="00:00:00">00.00 น.</option>
                          <option value="08:00:00">08.00 น.</option>
                          <option value="08:30:00">08.30 น.</option>
                          <option value="09:00:00">09.00 น.</option>
                          <option value="09:30:00">09.30 น.</option>
                          <option value="10:00:00">10.00 น.</option>
                          <option value="10:30:00">10.30 น.</option>
                          <option value="11:00:00">11.00 น.</option>
                          <option value="11:30:00">11.30 น.</option>
                          <option value="12:00:00">12.00 น.</option>
                          <option value="13:00:00">13.00 น.</option>
                          <option value="13:30:00">13.30 น.</option>
                          <option value="14:00:00">14.00 น.</option>
                          <option value="14:30:00">14.30 น.</option>
                          <option value="15:00:00">15.00 น.</option>
                          <option value="15:30:00">15.30 น.</option>
                          <option value="16:00:00">16.00 น.</option>
                          <option value="16:30:00">16.30 น.</option>
                          <option value="17:00:00">17.00 น.</option>
                          <option value="17:30:00">17.30 น.</option>
                        </select>
                      </div>
                      </div>

                        <div class="container">


                        <center>  <button type="submit" class="btn btn-success">submit</button></Center>


                        </form>





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

              <!-- Project Card Example -->
            <!--  <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>-->

              <!-- Color System -->
            <!--  <div class="row">
                <div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                      Primary
                      <div class="text-white-50 small">#4e73df</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                      Success
                      <div class="text-white-50 small">#1cc88a</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-info text-white shadow">
                    <div class="card-body">
                      Info
                      <div class="text-white-50 small">#36b9cc</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                      Warning
                      <div class="text-white-50 small">#f6c23e</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                      Danger
                      <div class="text-white-50 small">#e74a3b</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                      Secondary
                      <div class="text-white-50 small">#858796</div>
                    </div>
                  </div>
                </div>
              </div>-->

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->


              <!-- Approach -->


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
