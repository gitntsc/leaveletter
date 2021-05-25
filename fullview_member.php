<?php
if($_SESSION['user_id'] == "")
{
  echo "Please Login!";
  header("location:index.php");
}
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
                                    <?php
                                    include "connect.php";
                                    $strSQL2 = "SELECT * FROM member WHERE user_id = '".$_GET['user_id']."'";
                                    $objQuery2 = mysqli_query($objCon,$strSQL2);
                                    $objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC);

                                      ?>
                                    <?php
                                    if($objResult2['level']='admin'){
                                     ?>
                                    <div class="col-md-9 register-right">

                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <h3 class="register-heading">สำหรับ User</h3>
                                                <form name="1" method="post" action="save_fullview_member.php?user_id=<?php echo $_GET["user_id"];?>">

                                                <div class="row register-form">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" value="<?php echo $objResult2['user_id'];?>" id="user_id" name="user_id" />
                                                        </div>
                                                  
                                                        <div class="form-group">
                                                            <div class="maxl">
                                                              <label> เพศ </label>
                                                              <?php

                                                              if($objResult2['sex']=="male")
                                                              {
                                                                ?>
                                                                <label class="radio inline">
                                                                    <input type="radio" name="gender" value="male" checked>
                                                                    <span> Male </span>
                                                                </label>
                                                                <label class="radio inline">
                                                                    <input type="radio" name="gender" value="female">
                                                                    <span>Female </span>
                                                                </label>
                                                            <?php
                                                          }else{

                                                              ?>
                                                              <label class="radio inline">
                                                                  <input type="radio" name="gender" value="male" >
                                                                  <span> Male </span>
                                                              </label>
                                                              <label class="radio inline">
                                                                  <input type="radio" name="gender" value="female" checked>
                                                                  <span>Female </span>
                                                              </label>

                                                              <?php
                                                            }

                                                               ?>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="maxl">
                                                              <?php

                                                              if($objResult2['frontname']=='นาย'){
                                                               ?>
                                                              <label> คำนำหน้า </label>
                                                                <label class="radio inline">
                                                                    <input type="radio" name="gender2" value="นาย" checked>
                                                                    <span>นาย</span>
                                                                </label>
                                                                <label class="radio inline">
                                                                    <input type="radio" name="gender2" value="นางสาว">
                                                                    <span>นางสาว</span>
                                                                </label>
                                                                <label class="radio inline">
                                                                    <input type="radio" name="gender2" value="นาง">
                                                                    <span>นาง</span>
                                                                </label>
                                                              <?php
                                                            }elseif($objResult2['frontname']=='นางสาว'){
                                                               ?>
                                                               <label> คำนำหน้า </label>
                                                                 <label class="radio inline">
                                                                     <input type="radio" name="gender2" value="นาย" >
                                                                     <span>นาย</span>
                                                                 </label>
                                                                 <label class="radio inline">
                                                                     <input type="radio" name="gender2" value="นางสาว" checked>
                                                                     <span>นางสาว</span>
                                                                 </label>
                                                                 <label class="radio inline">
                                                                     <input type="radio" name="gender2" value="นาง">
                                                                     <span>นาง</span>
                                                                 </label>
                                                              <?php
                                                            }else{
                                                               ?>
                                                               <label> คำนำหน้า </label>
                                                                 <label class="radio inline">
                                                                     <input type="radio" name="gender2" value="นาย" >
                                                                     <span>นาย</span>
                                                                 </label>
                                                                 <label class="radio inline">
                                                                     <input type="radio" name="gender2" value="นางสาว" >
                                                                     <span>นางสาว</span>
                                                                 </label>
                                                                 <label class="radio inline">
                                                                     <input type="radio" name="gender2" value="นาง" checked>
                                                                     <span>นาง</span>
                                                                 </label>
                                                                 <?php
                                                               }
                                                                  ?>

                                                            </div>

                                                            <div class="form-group">

                                                          <label>Start Date Work</label>
                                                          <input name="start_work" type="date" id="start_work" value="<?php echo $objResult2['start_work'];?>">
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" value="<?php echo $objResult2['nameen'];?>" name="nameen" id="nameen" />
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" value="<?php echo $objResult2['nameth'];?>" name="nameth" id="nameth" />
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" value="<?php echo $objResult2['fname'];?>" name="fname" id="fname" />
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="grade" id="grade">
                                                                <option value="<?php echo $objResult2['grade'];?>"  selected ><?php echo $objResult2['grade'];?></option>
                                                                <option value="ป.6">ประถมศึกษา6</option>
                                                                <option value="ม.3">มัธยมศึกษา3</option>
                                                                <option value="ม.6">มัธยมศึกษา6</option>
                                                                <option value="ป.ตรี">ปริญญาตรี</option>
                                                                <option value="ป.โท">ปริญญาโท</option>
                                                                <option value="ป.เอก">ปริญญาเอก</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" value="<?php echo $objResult2['nationnality'];?>" name="nationnality" id="nationnality" />
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="section" id="section">
                                                                  <option value="<?php echo $objResult2['section'];?>"><?php echo $objResult2['section'];?></option>
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
                                                                  <option value="ti">IT</option>
                                                                  <option value="hr">Hr</option>
                                                                  <option value="cs">CS</option>
                                                                  <option value="lab">LAB</option>
                                                                  <option value="wh">Warehouse</option>
                                                                  <option value="dl">Delivery</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" value="<?php echo $objResult2['email'];?>" name="email" id="email" />
                                                        </div>

                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" value="<?php echo $objResult2['surnameen'];?>" name="surnameen" id="surnameen" />
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" value="<?php echo $objResult2['surnameth'];?>" name="surnameth" id="surnameth" />
                                                        </div>

                                                        <div class="form-group">
                                                            <select class="form-control" name="kind_work" id="kind_work">
                                                                <option value="<?php echo $objResult2['kind_work'];?>"  selected><?php echo $objResult2['kind_work'];?></option>
                                                                <option value="officer">Officer</option>
                                                                <option value="factory">Factory</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="company" id="company">
                                                              <option value="<?php echo $objResult2['company'];?>"  selected ><?php echo $objResult2['company'];?></option>
                                                                <option value="ntsc">NutritionSc</option>
                                                                <option value="nt">Nutrition</option>
                                                                <option value="nv">Nuevotec</option>
                                                                <option value="ntr">Nutrin</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name = status id=status>
                                                                <option value="<?php echo $objResult2['status'];?>"  selected ><?php echo $objResult2['status'];?></option>
                                                                <option value="yes">ทำงาน</option>
                                                                <option value="no">ลาออก</option>

                                                            </select>

                                                      </div>

                                                </div>
                                                <div class="col-md-12">
                                                  <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text">ที่อยู่</span>
                                                  </div>
                                                  <input type="text" class="form-control" value="<?php echo $objResult2['address'];?>" name="address" id="address" />
                                                </div>
                                              </div>
                                                <div class="col-md-9">
                                                  <input type="submit" class="btnRegister"  value="บันทึก"/>
                                                </div>
                                              </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                          <?php
                        }else{
                           ?>
                           <div class="col-md-9 register-right">

                               <div class="tab-content" id="myTabContent">
                                   <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                       <h3 class="register-heading">สำหรับ User</h3>
                                       <form name="1" method="post" action="save_fullview_member.php?user_id=<?php echo $_GET["user_id"];?>">

                                       <div class="row register-form">
                                           <div class="col-md-12">
                                               <div class="form-group">
                                                   <input type="text" class="form-control" value="<?php echo $objResult2['user_id'];?>" id="user_id" name="user_id" />
                                               </div>


                                               <div class="form-group">
                                                   <div class="maxl">
                                                     <label> เพศ </label>
                                                     <?php

                                                     if($objResult2['sex']=="male")
                                                     {
                                                       ?>
                                                       <label class="radio inline">
                                                           <input type="radio" name="gender" value="male" checked>
                                                           <span> Male </span>
                                                       </label>
                                                       <label class="radio inline">
                                                           <input type="radio" name="gender" value="female">
                                                           <span>Female </span>
                                                       </label>
                                                   <?php
                                                 }else{

                                                     ?>
                                                     <label class="radio inline">
                                                         <input type="radio" name="gender" value="male" >
                                                         <span> Male </span>
                                                     </label>
                                                     <label class="radio inline">
                                                         <input type="radio" name="gender" value="female" checked>
                                                         <span>Female </span>
                                                     </label>

                                                     <?php
                                                   }

                                                      ?>

                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <div class="maxl">
                                                     <?php

                                                     if($objResult2['frontname']=='นาย'){
                                                      ?>
                                                     <label> คำนำหน้า </label>
                                                       <label class="radio inline">
                                                           <input type="radio" name="gender2" value="นาย" checked>
                                                           <span>นาย</span>
                                                       </label>
                                                       <label class="radio inline">
                                                           <input type="radio" name="gender2" value="นางสาว">
                                                           <span>นางสาว</span>
                                                       </label>
                                                       <label class="radio inline">
                                                           <input type="radio" name="gender2" value="นาง">
                                                           <span>นาง</span>
                                                       </label>
                                                     <?php
                                                   }elseif($objResult2['frontname']=='นางสาว'){
                                                      ?>
                                                      <label> คำนำหน้า </label>
                                                        <label class="radio inline">
                                                            <input type="radio" name="gender2" value="นาย" >
                                                            <span>นาย</span>
                                                        </label>
                                                        <label class="radio inline">
                                                            <input type="radio" name="gender2" value="นางสาว" checked>
                                                            <span>นางสาว</span>
                                                        </label>
                                                        <label class="radio inline">
                                                            <input type="radio" name="gender2" value="นาง">
                                                            <span>นาง</span>
                                                        </label>
                                                     <?php
                                                   }else{
                                                      ?>
                                                      <label> คำนำหน้า </label>
                                                        <label class="radio inline">
                                                            <input type="radio" name="gender2" value="นาย" >
                                                            <span>นาย</span>
                                                        </label>
                                                        <label class="radio inline">
                                                            <input type="radio" name="gender2" value="นางสาว" >
                                                            <span>นางสาว</span>
                                                        </label>
                                                        <label class="radio inline">
                                                            <input type="radio" name="gender2" value="นาง" checked>
                                                            <span>นาง</span>
                                                        </label>
                                                        <?php
                                                      }
                                                         ?>

                                                   </div>

                                                   <div class="form-group">

                                                 <label>Start Date Work</label>
                                                 <input name="start_work" type="date" id="start_work" value="<?php echo $objResult2['start_work'];?>">
                                               </div>
                                               </div>
                                           </div>
                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <input type="text" class="form-control" value="<?php echo $objResult2['nameen'];?>" name="nameen" id="nameen" />
                                               </div>
                                               <div class="form-group">
                                                   <input type="text" class="form-control" value="<?php echo $objResult2['nameth'];?>" name="nameth" id="nameth" />
                                               </div>
                                               <div class="form-group">
                                                   <input type="text" class="form-control" value="<?php echo $objResult2['fname'];?>" name="fname" id="fname" />
                                               </div>
                                               <div class="form-group">
                                                   <select class="form-control" name="grade" id="grade">
                                                       <option value="<?php echo $objResult2['grade'];?>"  selected ><?php echo $objResult2['grade'];?></option>
                                                       <option value="ป.6">ประถมศึกษา6</option>
                                                       <option value="ม.3">มัธยมศึกษา3</option>
                                                       <option value="ม.6">มัธยมศึกษา6</option>
                                                       <option value="ป.ตรี">ปริญญาตรี</option>
                                                       <option value="ป.โท">ปริญญาโท</option>
                                                       <option value="ป.เอก">ปริญญาเอก</option>
                                                   </select>
                                               </div>
                                               <div class="form-group">
                                                   <input type="text" class="form-control" value="<?php echo $objResult2['nationnality'];?>" name="nationnality" id="nationnality" />
                                               </div>
                                               <div class="form-group">
                                                   <select class="form-control" name="section" id="section">
                                                         <option value="<?php echo $objResult2['section'];?>"><?php echo $objResult2['section'];?></option>
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
                                                         <option value="ti">IT</option>
                                                         <option value="hr">Hr</option>
                                                         <option value="cs">CS</option>
                                                         <option value="lab">LAB</option>
                                                         <option value="wh">Warehouse</option>
                                                         <option value="dl">Delivery</option>

                                                   </select>
                                               </div>
                                               <div class="form-group">
                                                   <input type="email" class="form-control" value="<?php echo $objResult2['email'];?>" name="email" id="email" />
                                               </div>

                                           </div>


                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <input type="text" class="form-control" value="<?php echo $objResult2['surnameen'];?>" name="surnameen" id="surnameen" />
                                               </div>
                                               <div class="form-group">
                                                   <input type="text" class="form-control" value="<?php echo $objResult2['surnameth'];?>" name="surnameth" id="surnameth" />
                                               </div>

                                               <div class="form-group">
                                                   <select class="form-control" name="kind_work" id="kind_work">
                                                       <option value="<?php echo $objResult2['kind_work'];?>"  selected><?php echo $objResult2['kind_work'];?></option>
                                                       <option value="officer">Officer</option>
                                                       <option value="factory">Factory</option>

                                                   </select>
                                               </div>
                                               <div class="form-group">
                                                   <select class="form-control" name="company" id="company">
                                                     <option value="<?php echo $objResult2['company'];?>"  selected ><?php echo $objResult2['company'];?></option>
                                                       <option value="ntsc">NutritionSc</option>
                                                       <option value="nt">Nutrition</option>
                                                       <option value="nv">Nuevotec</option>
                                                       <option value="ntr">Nutrin</option>

                                                   </select>
                                               </div>
                                               <div class="form-group">
                                                   <select class="form-control" name = status id=status>
                                                       <option value="<?php echo $objResult2['status'];?>"  selected ><?php echo $objResult2['status'];?></option>
                                                       <option value="yes">ทำงาน</option>
                                                       <option value="no">ลาออก</option>

                                                   </select>

                                             </div>

                                       </div>
                                       <div class="col-md-12">
                                         <div class="input-group">
                                         <div class="input-group-prepend">
                                           <span class="input-group-text">ที่อยู่</span>
                                         </div>
                                         <input type="text" class="form-control" value="<?php echo $objResult2['address'];?>" name="address" id="address" />
                                       </div>
                                     </div>
                                       <div class="col-md-9">
                                         <input type="submit" class="btnRegister"  value="บันทึก"/>
                                       </div>
                                     </form>
                               </div>
                           </div>
                       </div>

                   </div>
                   <?php
                 }
                    ?>

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
