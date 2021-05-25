<?php
session_start();
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
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/register.css" rel="stylesheet">
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

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-12">
                <!-- Card Header - Dropdown -->
                <div class="container register">
                                <div class="row">
                                    <div class="col-md-3 register-left">
                                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                                        <h3>ข้อมูลผู้ใช้งาน</h3>
                                        <p>กรุณากรอกข้อมูลให้ถูกต้อง และครบถ้วน</p>

                                    </div>
                                    <div class="col-md-9 register-right">

                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <h3 class="register-heading">สำหรับ User</h3>
                                                <div class="row register-form">
                                                    <div class="col-md-12">
                                                      <form name="form1" method="post" action="save_register.php">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="รหัสพนักงาน *" id="user_id" name="user_id" />
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="maxl">
                                                              <label> เพศ </label>
                                                                <label class="radio inline">
                                                                    <input type="radio" name="sex" value="male" checked>
                                                                    <span> Male </span>
                                                                </label>
                                                                <label class="radio inline">
                                                                    <input type="radio" name="sex" value="female">
                                                                    <span>Female </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="maxl">
                                                              <label> คำนำหน้า </label>
                                                                <label class="radio inline">
                                                                    <input type="radio" name="frontname" value="นาย" checked>
                                                                    <span>นาย</span>
                                                                </label>
                                                                <label class="radio inline">
                                                                    <input type="radio" name="frontname" value="นางสาว">
                                                                    <span>นางสาว</span>
                                                                </label>
                                                                <label class="radio inline">
                                                                    <input type="radio" name="frontname" value="นาง">
                                                                    <span>นาง</span>
                                                                </label>
                                                            </div>
                                                              <div class="form-group">

                                                            <label>Birthday</label>
                                                            <input name="birthday" type="date" id="birthday" placeholder="เลือกวันที่วันเกิด">
                                                          </div>
                                                          <div class="form-group">

                                                        <label>Start Date Work</label>
                                                        <input name="start_work" type="date" id="start_work" placeholder="เลือกวันที่เริ่มงาน">
                                                      </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Name *" name="nameen" id="nameen" />
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="ชื่อ(ภาษาไทย) *" name="nameth" id="nameth" />
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="ชื่อเล่น *" name="fname" id="fname" />
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="grade" id="grade">
                                                                <option class="hidden"  selected disabled>การศึกษา</option>
                                                                <option value="ป.6">ประถมศึกษาปีที่6</option>
                                                                <option value="ม.3">มัธยมศึกษาปีที่3</option>
                                                                <option value="ปวช">ปวช</option>
                                                                <option value="ปวส">ปวส</option>
                                                                <option value="ม.6">มัธยมศึกษาปีที่6</option>

                                                                <option value="ป.ตรี">ปริญญาตรี</option>
                                                                <option value="ป.โท">ปริญญาโท</option>
                                                                <option value="ป.เอก">ปริญญเอก</option>


                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="สัญชาติ *" name="nationnality" id="nationnality" />
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="section" id="section">
                                                                <option class="hidden"  selected disabled>เลือกแผนก</option>
                                                                <option value="ac">Account</option>
                                                                <option value="fi">Finance</option>
                                                                <option value="pc">Purchase</option>
                                                                <option value="sp">Shipping</option>
                                                                <option value="mg">Manage</option>
                                                                <option value="mkt">Marketing</option>
                                                                <option value="tech">Tech</option>
                                                                <option value="sale">Sale</option>
                                                                <option value="pd">Product</option>
                                                                <option value="qa">QA</option>
                                                                <option value="qc">QC</option>
                                                                <option value="ti">Ti</option>
                                                                <option value="rd">Rd</option>
                                                                <option value="it">IT</option>
                                                                <option value="hr">Hr</option>
                                                                <option value="cs">CS</option>
                                                                <option value="lab">LAB</option>
                                                                <option value="wh">Warehouse</option>
                                                                <option value="dl">Delivery</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="เลขประจำตัวประชาชน*" name="people_member" id="people_member" />
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="ผู้อนุมัติคนที่1*" name="leader1" id="leader1" />
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Surename *" name="surnameen" id="surnameen" />
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="นามสกุล(ภาษาไทย) *" name="surnameth" id="surnameth" />
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="level_job" id="level_job">
                                                                <option class="hidden"  selected disabled>ระดับตำแหน่ง</option>
                                                                <option value="เจ้าหน้าที่">เจ้าหน้าที่</option>
                                                                <option value="หัวหน้า">หัวหน้า</option>
                                                                <option value="รองผู้จัดการ">รองผู้จัดการ</option>
                                                                <option value="ผู้จัดการ">ผู้จัดการ</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="kind_work" id="kind_work">
                                                                <option class="hidden"  selected disabled>ประเภทพนักงาน</option>
                                                                <option value="office">Office</option>
                                                                <option value="factory">Factory</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="company" id="company">
                                                                <option class="hidden"  selected disabled>บริษัท</option>
                                                                <option value="ntsc">NutritionSc</option>
                                                                <option value="nt">Nutrition</option>
                                                                <option value="nv">Nuevotec</option>
                                                                <option value="ntr">Nutrin</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="level" id="level">
                                                                <option class="hidden"  selected disabled>ระดับงาน</option>
                                                                <option value="admin">Admin</option>
                                                                <option value="hr">HR</option>
                                                                <option value="leader">Leader</option>
                                                                <option value="user">User</option>


                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" placeholder="Email*" name="email" id="email" />
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="ผู้อนุมัติคนที่2*" name="leader2" id="leader2" />
                                                        </div>

                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                    <select class="form-control" name="status" id="status">
                                                        <option class="hidden"  selected disabled>สถานะการทำงาน</option>
                                                        <option value="ทำงาน">ทำงาน</option>
                                                        <option value="ลาออก">ลาออก</option>



                                                    </select>
                                                </div>
                                              </div>
                                                <div class="col-md-12">
                                                  <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text">ที่อยู่</span>
                                                  </div>
                                                  <textarea class="form-control" aria-label="With textarea" name="address" id="address"></textarea>
                                                </div>
                                              </div>
                                                <div class="col-md-9">
                                                  <input type="submit" class="btnRegister"  value="Register"/>
                                                </div>
                                          </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                <!-- Card Body -->
                <div class="card-body">

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


              <!-- Color System -->


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
