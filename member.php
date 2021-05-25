<?php
session_start();
header("Cache-Control: max-age=0; no-cache; no-store; must-revalidate");
$ddlselect = null;
ini_set('display_errors', 0);
error_reporting(~0);
if(isset($_POST["ddlselect"]))
{
  $ddlselect = $_POST["ddlselect"];
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
  <link rel="stylesheet" href="styles2.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

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
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-12">
                <div class="card-header py-3">
                <center>  <h6 class="m-0 font-weight-bold text-primary">รายชื่อสมาชิกทั้งหมด</h6></center>
                </div>
                <!-- Card Header - Dropdown -->
                <div class="card shadow mb-12">
                  <div class="card-header py-3">
                    <div class="col-md-12">
                      <div class="container">
                        <form name="frmSearch" method="post" action="<?=$_SERVER['SCRIPT_NAME'];?>">
                        <div class="search_wrap search_wrap_3">
              			<div class="search_box">
              				<input type="text" class="input" name="ddlselect" id="ddlselect" placeholder="ค้นหารายชื่อ">
              				<div class="btn btn_common">
              					<i class="fas fa-search"></i>
                      </form>
              				</div>
              			</div>
              		</div>



                   <?php
                   if($_POST['ddlselect']==""){
                      include "connect.php";
                   $strSQL2 = "SELECT * FROM member";
                      $objQuery2 = mysqli_query($objCon,$strSQL2);


                       ?>

                       <div class="table-responsive">

                       <table class="table table-striped table-hover table-bordered">
                      <thead>

                        <tr>

                              <th style="text-align:center">ID</th>

                              <th style="text-align:center">Username</th>

                            

                              <th style="text-align:center">บริษัท</th>

                              <th style="text-align:center">ฝ่าย</th>

                              <th style="text-align:center">ระดับ</th>

                              <th style="text-align:center">ประเภทการทำงาน</th>

                              <th style="text-align:center">แก้ไข</th>







                        </tr>

                      </thead>
                      <?php
                      while ($objResult2= mysqli_fetch_assoc($objQuery2))
                    	{
                        ?>


                      <tbody>

                        <tr>

                          <td style="text-align:center"><?php echo $objResult2['user_id'];?></td>

                          <td style="text-align:center"><?php echo $objResult2['username'];?></td>



                          <td style="text-align:center"><?php echo $objResult2['company'];?></td>

                          <td style="text-align:center"><?php echo $objResult2['section'];?></td>

                          <td style="text-align:center"><?php echo $objResult2['level'];?></td>

                          <td style="text-align:center"><?php echo $objResult2['kind_work'];?></td>



                        <td align="center"><a href="fullview_member.php?user_id=<?php echo $objResult2["user_id"];?>">Edit</a></td>






                         </tr>
                      <?php
                       }
                         ?>






                      </tbody>

                    </table>
                    <?php
                  }else{
                    include "connect.php";
               $strSQL2 = "SELECT * FROM member where username LIKE '%".$_POST["ddlselect"]."%'";
                    $objQuery2 = mysqli_query($objCon,$strSQL2);


                     ?>

                     <div class="table-responsive">

                     <table class="table table-striped table-hover table-bordered">
                    <thead>

                      <tr>

                            <th style="text-align:center">ID</th>

                            <th style="text-align:center">Username</th>

                            <th style="text-align:center">Password</th>

                            <th style="text-align:center">บริษัท</th>

                            <th style="text-align:center">ฝ่าย</th>

                            <th style="text-align:center">ระดับ</th>

                            <th style="text-align:center">ประเภทการทำงาน</th>

                            <th style="text-align:center">แก้ไข</th>







                      </tr>

                    </thead>
                    <?php
                    while ($objResult2= mysqli_fetch_assoc($objQuery2))
                    {
                      ?>


                    <tbody>

                      <tr>

                        <td style="text-align:center"><?php echo $objResult2['user_id'];?></td>

                        <td style="text-align:center"><?php echo $objResult2['username'];?></td>

                        <td style="text-align:center"><?php echo $objResult2['password'];?></td>

                        <td style="text-align:center"><?php echo $objResult2['company'];?></td>

                        <td style="text-align:center"><?php echo $objResult2['section'];?></td>

                        <td style="text-align:center"><?php echo $objResult2['level'];?></td>

                        <td style="text-align:center"><?php echo $objResult2['kind_work'];?></td>



                      <td align="center"><a href="fullview_member.php?user_id=<?php echo $objResult2["user_id"];?>">Edit</a></td>






                       </tr>
                    <?php
                     }
                       ?>






                    </tbody>

                  </table>
                  <?php


                }


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
