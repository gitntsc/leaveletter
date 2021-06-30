<?php
session_start();
if($_SESSION['user_id'] == "")
{
  echo "Please Login!";
  header("location:index.php");
}
ini_set('display_errors', 0);
error_reporting(~0);

$strdate = null;

if(isset($_POST["strdate"]))
{
  $approve = $_POST["strdate"];
}
if(isset($_POST["lastdate"]))
{
  $approve = $_POST["lastdate"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php header("Cache-Control: public, max-age=60, s-maxage=60");?>

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
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-12">
                <div class="card-header py-12">
                <center>  <h6 class="m-0 font-weight-bold text-primary">ใบคำขอการลา</h6></center>
                </div>
                <!-- Card Header - Dropdown -->
                <div class="card shadow mb-12">
                  <div class="card-header py-3">
                    <div class="col-md-12">
                      <h6 class="m-0 font-weight-bold text-primary">รายการลาทั้งหมด</h6>
                      <div class="container">

                        <?php
                        $strSQL10 = "SELECT * FROM member order by username asc";
                        $objQuery10 = mysqli_query($objCon,$strSQL10);
                         ?>
                      <form name="frmSearch" method="post" action="<?=$_SERVER['SCRIPT_NAME'];?>">
                        <div class="form-group col-md-12">
                               <label for="district">เลือกรายชื่อเพื่อดูเวลาที่เหลือ</label>
                                 <select name="forname" id="forname" class="form-control">
                                   <option value="">-</option>

                                 <?php while($objResult10 = mysqli_fetch_assoc($objQuery10)): ?>
                                   <option value="<?=$objResult10['username']?>"><?=$objResult10['username']?></option>
                                   <?php endwhile; ?>
                               </select>
                           </div>
                           <center><div class="form-group col-md-4">
                                  <label for="district">เลือกรายชื่อเพื่อดูเวลาที่เหลือ</label>
                                    <select name="section" id="section" class="form-control">
                                      <option value="">เลือกแผนก</option>
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
                              </div></center>
                              <center><div class="form-group col-md-4">
                                     <label for="district">เลือกรายชื่อเพื่อดูเวลาที่เหลือ</label>
                                       <select name="company" id="company" class="form-control">
                                         <option value="">เลือกบริษัท</option>
                                         <option value="ntsc">NutritionSc</option>
                                         <option value="nt">Nutrition</option>
                                         <option value="nv">Nuevotec</option>
                                         <option value="ntr">Nutrin</option>


                                     </select>
                                 </div></center>
                        <center><label>วันที่เริ่ม</label>
                        <div class="col-4">
                          <input class="form-control" type="date" name="strdate" id="strdate">
                        </div></center>



                    <center><label>วันสุดท้าย</label>
                      <div class="col-4">
                        <input class="form-control" type="date" name="lastdate" id="lastdate">
                      </div></center>
                    </br>
                    <div>
                    <center>  <button type="submit" class="btn btn-success">search</button></Center>

                      </div>
                      <br>
                    </form>

                    <div class="table-responsive">

                    <table class="table table-striped table-hover table-bordered">

                          <thead>

                            <tr>



                                  <th>ชื่อ</th>

                                  <th>ฝ่าย</th>

                                  <th>วันลาลาป่วยที่เหลือ</th>

                                  <th>วันลากิจที่เหลือ</th>

                                  <th>วันลาพักผ่อนทั้งหมด</th>

                                  <th>วันลาพักผ่อนที่เหลือ</th>
                                  





                            </tr>

                          </thead>
                          <?php
                          $strSQL11 = "SELECT * FROM member where username = '".$_POST['forname']."' and username !=''";
                          $objQuery11 = mysqli_query($objCon,$strSQL11);

                          while ($objResult11= mysqli_fetch_assoc($objQuery11))
                          {
                            ?>
                            <td><?php echo $objResult11['username'];?></td>

                            <td><?php echo $objResult11['section'];?></td>


                            <?php
                            if($objResult11['kind_work']=='office')
                            {
                            $time = $objResult11['sicktime'];
                            $thistime = $time;
                            $day = floor($thistime/3600/8.5);
                            $hour = floor($thistime/3600);
                            $T_minute = $thistime % 3600;

                            $minute = floor($T_minute / 60);
                            $second = $T_minute % 60;

                            $sickword = " $day วัน หรือ $hour ชั่วโมง $minute นาที ";

                            }else{
                            $time = $objResult11['sicktime'];
                            $thistime = $time;
                            $day = floor($thistime/3600/8.0);
                            $hour = floor($thistime/3600);
                            $T_minute = $thistime % 3600;

                            $minute = floor($T_minute / 60);
                            $second = $T_minute % 60;

                            $sickword = " $day วัน หรือ $hour ชั่วโมง $minute นาที ";


                            }
                             ?>

                              <td><?php echo $sickword;?></td>
                              <?php
                              if($objResult11['kind_work']=='office')
                              {
                              $time = $objResult11['business_time'];
                              $thistime = $time;
                              $day = floor($thistime/3600/8.5);
                              $hour = floor($thistime/3600);
                              $T_minute = $thistime % 3600;

                              $minute = floor($T_minute / 60);
                              $second = $T_minute % 60;

                              $businessword = " $day วัน หรือ $hour ชั่วโมง $minute นาที ";

                            }else{
                              $time = $objResult11['business_time'];
                              $thistime = $time;
                              $day = floor($thistime/3600/8.0);
                              $hour = floor($thistime/3600);
                              $T_minute = $thistime % 3600;

                              $minute = floor($T_minute / 60);
                              $second = $T_minute % 60;

                              $businessword = " $day วัน หรือ $hour ชั่วโมง $minute นาที ";


                              }
                               ?>
                            <td><?php echo $businessword;?></td>
                            <?php
                            if($objResult11['kind_work']=='office')
                            {
                            $time = $objResult11['exvacation_time'];
                            $thistime = $time;
                            $day = floor($thistime/3600/8.5);
                            $hour = floor($thistime/3600);
                            $T_minute = $thistime % 3600;

                            $minute = floor($T_minute / 60);
                            $second = $T_minute % 60;

                            $exword = " $day วัน หรือ $hour ชั่วโมง $minute นาที ";

                            }else{
                            $time = $objResult11['exvacation_time'];
                            $thistime = $time;
                            $day = floor($thistime/3600/8.0);
                            $hour = floor($thistime/3600);
                            $T_minute = $thistime % 3600;

                            $minute = floor($T_minute / 60);
                            $second = $T_minute % 60;

                            $exword = " $day วัน หรือ $hour ชั่วโมง $minute นาที ";


                            }
                             ?>

                            <td><?php echo $exword;?></td>
                            
                            <?php
                            if($objResult11['kind_work']=='office')
                            {
                              $time = $objResult11['vacation_time'];
                              $thistime = $time;
                              $day = floor($thistime/3600/8.5);
                              $hour = floor($thistime/3600);
                              $T_minute = $thistime % 3600;
  
                              $minute = floor($T_minute / 60);
                              $second = $T_minute % 60;
  
                              $exvaction = " $day วัน หรือ $hour ชั่วโมง $minute นาที ";
  
                              }else{
                              $time = $objResult11['vacation_time'];
                              $thistime = $time;
                              $day = floor($thistime/3600/8.0);
                              $hour = floor($thistime/3600);
                              $T_minute = $thistime % 3600;
  
                              $minute = floor($T_minute / 60);
                              $second = $T_minute % 60;
  
                              $exvaction = " $day วัน หรือ $hour ชั่วโมง $minute นาที ";
                              }
                              
                             ?>
                           
                           <td><?php echo $exvaction;?></td>
                            <?php
                            }

                            ?>


                    </table>
                  </div>


  <?php


   ?>


  <div class="table-responsive">

  <table class="table table-striped table-hover table-bordered">


    <?php
    
    if($_POST['strdate']=="" && $_POST['lastdate']=="" && $_POST['forname']=="" && $_POST['section']=="" && $_POST['company']==""){
      $strNewOrder = $_GET['order']== 'DESC' ? 'ASC' : 'DESC';
      if($_GET['order']==""){
        $strNewOrder = 'DESC';
      }
      $col = $_GET['sort'];
      if($_GET['sort']==""){
        $col = 'strdate';
      }
    

     ?>


    <thead>

      <tr>

           

      <th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=kind_leave&order=<?php echo $strNewOrder;?>">ประเภทการลา</a></th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=username&order=<?php echo $strNewOrder;?>">ผู้ลา</a></th>

<th>เหตุผล</th>
<th>วันที่ลงข้อมูล</th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=strdate&order=<?php echo $strNewOrder;?>">วันเริ่มลา</th>

            <th>วันสุดท้ายที่ลา</th>

            <th>เวลารวมที่ลา</th>

            <th>เวลาที่เหลือ</th>

            <th>การอนุมัติ</th>

            <th>บันทึก</th>




      </tr>

    </thead>
    <?php
    include "connect.php";
    $strSQL2 = "SELECT * FROM leave_tbl where  status = 'approve' or status = 'non approve' order by ".$col." ".$strNewOrder."";
   //echo
     $objQuery2 = mysqli_query($objCon,$strSQL2);
 
    while ($objResult2= mysqli_fetch_assoc($objQuery2))
    {


      $_POST['username'] = $objResult2['username'];

      $strSQL5 = "SELECT * FROM member where username = '".$_POST['username']."'";
      $objQuery5 = mysqli_query($objCon,$strSQL5);
      $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);


      ?>

    <tbody>

      <tr>
      <form name="1" method="post" action="save_approve.php?leave_id=<?php echo $objResult2["leave_id"];?>">
        

        <td><?php echo $objResult2['kind_leave'];?></td>

          <td><?php echo $objResult2['username'];?></td>

        <td><?php echo $objResult2['reason'];?></td>

        <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['crt_time'];?></td>

        <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['strtime'];?></td>

        <td><?php echo $objResult2['lastdate'];?><br><?php echo $objResult2['lasttime'];?></td>

        <?php
        include "time_edit.php";
         ?>
    <?php
     }
       ?>






    </tbody>

  </table>



                        </div>
                    </div>
<?php
}elseif($_POST['strdate']=="" && $_POST['lastdate']=="" && $_POST['forname']=="" && $_POST['section']=="" && $_POST['company']!==""){
  $strNewOrder = $_GET['order']== 'DESC' ? 'ASC' : 'DESC';
  if($_GET['order']==""){
    $strNewOrder = 'DESC';
  }
  $col = $_GET['sort'];
  if($_GET['sort']==""){
    $col = 'strdate';
  }



   ?>


  <thead>

    <tr>



    <th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=kind_leave&order=<?php echo $strNewOrder;?>">ประเภทการลา</a></th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=username&order=<?php echo $strNewOrder;?>">ผู้ลา</a></th>

<th>เหตุผล</th>
<th>วันที่ลงข้อมูล</th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=strdate&order=<?php echo $strNewOrder;?>">วันเริ่มลา</th>

          <th>วันสุดท้ายที่ลา</th>

          <th>เวลารวมที่ลา</th>

          <th>เวลาที่เหลือ</th>

          <th>การอนุมัติ</th>

          <th>บันทึก</th>




    </tr>

  </thead>
  <?php
    include "connect.php";
    $strSQL2 = "SELECT * FROM leave_tbl Where company ='".$_POST['company']."' and status != 'cancle' order by ".$col." ".$strNewOrder."";
  //echo
    $objQuery2 = mysqli_query($objCon,$strSQL2);
  while ($objResult2= mysqli_fetch_assoc($objQuery2))
  {


    $_POST['username'] = $objResult2['username'];

    $strSQL5 = "SELECT * FROM member where username = '".$_POST['username']."'";
    $objQuery5 = mysqli_query($objCon,$strSQL5);
    $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);


    ?>

  <tbody>

    <tr>
    <form name="1" method="post" action="save_approve.php?leave_id=<?php echo $objResult2["leave_id"];?>">


      <td><?php echo $objResult2['kind_leave'];?></td>

        <td><?php echo $objResult2['username'];?></td>

      <td><?php echo $objResult2['reason'];?></td>

      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['crt_time'];?></td>

      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['strtime'];?></td>

      <td><?php echo $objResult2['lastdate'];?><br><?php echo $objResult2['lasttime'];?></td>

    <?php
    include "time_edit.php";
     ?>
  <?php
   }
     ?>






  </tbody>

</table>



                      </div>
                  </div>
<?php
}elseif($_POST['strdate']=="" && $_POST['lastdate']=="" && $_POST['forname']=="" && $_POST['section']!=="" && $_POST['company']==""){
  $strNewOrder = $_GET['order']== 'DESC' ? 'ASC' : 'DESC';
  if($_GET['order']==""){
    $strNewOrder = 'DESC';
  }
  $col = $_GET['sort'];
  if($_GET['sort']==""){
    $col = 'strdate';
  }


   ?>


  <thead>

    <tr>



    <th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=kind_leave&order=<?php echo $strNewOrder;?>">ประเภทการลา</a></th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=username&order=<?php echo $strNewOrder;?>">ผู้ลา</a></th>

<th>เหตุผล</th>
<th>วันที่ลงข้อมูล</th>
<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=strdate&order=<?php echo $strNewOrder;?>">วันเริ่มลา</th>

          <th>วันสุดท้ายที่ลา</th>

          <th>เวลารวมที่ลา</th>

          <th>เวลาที่เหลือ</th>

          <th>การอนุมัติ</th>

          <th>บันทึก</th>




    </tr>

  </thead>
  <?php
    include "connect.php";
    $strSQL2 = "SELECT * FROM leave_tbl Where section ='".$_POST['section']."' and status != 'cancle' order by ".$col." ".$strNewOrder."";
  //echo
    $objQuery2 = mysqli_query($objCon,$strSQL2);
  
  while ($objResult2= mysqli_fetch_assoc($objQuery2))
  {


    $_POST['username'] = $objResult2['username'];

    $strSQL5 = "SELECT * FROM member where username = '".$_POST['username']."'";
    $objQuery5 = mysqli_query($objCon,$strSQL5);
    $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);


    ?>

  <tbody>

    <tr>
    <form name="1" method="post" action="save_approve.php?leave_id=<?php echo $objResult2["leave_id"];?>">


      <td><?php echo $objResult2['kind_leave'];?></td>

        <td><?php echo $objResult2['username'];?></td>

      <td><?php echo $objResult2['reason'];?></td>
      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['crt_time'];?></td>

      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['strtime'];?></td>

        <td><?php echo $objResult2['lastdate'];?><br><?php echo $objResult2['lasttime'];?></td>

    <?php
    include "time_edit.php";
     ?>
  <?php
   }
     ?>






  </tbody>

</table>



                      </div>
                  </div>
<?php
}elseif($_POST['strdate']=="" && $_POST['lastdate']=="" && $_POST['forname']!=="" && $_POST['section']=="" && $_POST['company']==""){
  $strNewOrder = $_GET['order']== 'DESC' ? 'ASC' : 'DESC';
  if($_GET['order']==""){
    $strNewOrder = 'DESC';
  }
  $col = $_GET['sort'];
  if($_GET['sort']==""){
    $col = 'strdate';
  }


   ?>


  <thead>

    <tr>



    <th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=kind_leave&order=<?php echo $strNewOrder;?>">ประเภทการลา</a></th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=username&order=<?php echo $strNewOrder;?>">ผู้ลา</a></th>

<th>เหตุผล</th>
<th>วันที่ลงข้อมูล</th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=strdate&order=<?php echo $strNewOrder;?>">วันเริ่มลา</th>

          <th>วันสุดท้ายที่ลา</th>

          <th>เวลารวมที่ลา</th>

          <th>เวลาที่เหลือ</th>

          <th>การอนุมัติ</th>

          <th>บันทึก</th>




    </tr>

  </thead>
  <?php
    include "connect.php";
    $strSQL2 = "SELECT * FROM leave_tbl Where username ='".$_POST['forname']."' and status != 'cancle' order by ".$col." ".$strNewOrder."";
  //echo
    $objQuery2 = mysqli_query($objCon,$strSQL2);
  
  while ($objResult2= mysqli_fetch_assoc($objQuery2))
  {


    $_POST['username'] = $objResult2['username'];

    $strSQL5 = "SELECT * FROM member where username = '".$_POST['username']."'";
    $objQuery5 = mysqli_query($objCon,$strSQL5);
    $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);


    ?>

  <tbody>

    <tr>
    <form name="1" method="post" action="save_approve.php?leave_id=<?php echo $objResult2["leave_id"];?>">


      <td><?php echo $objResult2['kind_leave'];?></td>

        <td><?php echo $objResult2['username'];?></td>

      <td><?php echo $objResult2['reason'];?></td>

      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['crt_time'];?></td>

      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['strtime'];?></td>

<td><?php echo $objResult2['lastdate'];?><br><?php echo $objResult2['lasttime'];?></td>

    <?php
    include "time_edit.php";
     ?>
  <?php
   }
     ?>






  </tbody>

</table>



                      </div>
                  </div>
<?php
}elseif($_POST['strdate']!=="" && $_POST['lastdate']!=="" && $_POST['forname']=="" && $_POST['section']=="" && $_POST['company']==""){
  $strNewOrder = $_GET['order']== 'DESC' ? 'ASC' : 'DESC';
  if($_GET['order']==""){
    $strNewOrder = 'DESC';
  }
  $col = $_GET['sort'];
  if($_GET['sort']==""){
    $col = 'strdate';
  }



   ?>


  <thead>

    <tr>



    <th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=kind_leave&order=<?php echo $strNewOrder;?>">ประเภทการลา</a></th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=username&order=<?php echo $strNewOrder;?>">ผู้ลา</a></th>

<th>เหตุผล</th>
<th>วันเพิ่มข้อมูล</th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=strdate&order=<?php echo $strNewOrder;?>">วันเริ่มลา</th>

          <th>วันสุดท้ายที่ลา</th>

          <th>เวลารวมที่ลา</th>

          <th>เวลาที่เหลือ</th>

          <th>การอนุมัติ</th>

          <th>บันทึก</th>




    </tr>

  </thead>
  <?php
    include "connect.php";
    $strSQL2 = "SELECT * FROM leave_tbl Where strdate between  '".$_POST['strdate']."' and '".$_POST['lastdate']."' and status != 'cancle' order by ".$col." ".$strNewOrder."";
   //echo
     $objQuery2 = mysqli_query($objCon,$strSQL2);
  while ($objResult2= mysqli_fetch_assoc($objQuery2))
  {


    $_POST['username'] = $objResult2['username'];

    $strSQL5 = "SELECT * FROM member where username = '".$_POST['username']."'";
    $objQuery5 = mysqli_query($objCon,$strSQL5);
    $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);


    ?>

  <tbody>

    <tr>
    <form name="1" method="post" action="save_approve.php?leave_id=<?php echo $objResult2["leave_id"];?>">


      <td><?php echo $objResult2['kind_leave'];?></td>

        <td><?php echo $objResult2['username'];?></td>

      <td><?php echo $objResult2['reason'];?></td>

      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['crt_time'];?></td>

      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['strtime'];?></td>

        <td><?php echo $objResult2['lastdate'];?><br><?php echo $objResult2['lasttime'];?></td>

    <?php
    include "time_edit.php";
     ?>
  <?php
   }
     ?>






  </tbody>

</table>

                      </div>
                  </div>
<?php
}elseif($_POST['strdate']!=="" && $_POST['lastdate']!=="" && $_POST['forname']=="" && $_POST['section']=="" && $_POST['company']!==""){
  $strNewOrder = $_GET['order']== 'DESC' ? 'ASC' : 'DESC';
  if($_GET['order']==""){
    $strNewOrder = 'DESC';
  }
  $col = $_GET['sort'];
  if($_GET['sort']==""){
    $col = 'strdate';
  }




   ?>


  <thead>

    <tr>



    <th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=kind_leave&order=<?php echo $strNewOrder;?>">ประเภทการลา</a></th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=username&order=<?php echo $strNewOrder;?>">ผู้ลา</a></th>

<th>เหตุผล</th>
<th>วันที่ลงข้อมูล</th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=strdate&order=<?php echo $strNewOrder;?>">วันเริ่มลา</th>

          <th>วันสุดท้ายที่ลา</th>

          <th>เวลารวมที่ลา</th>

          <th>เวลาที่เหลือ</th>

          <th>การอนุมัติ</th>

          <th>บันทึก</th>




    </tr>

  </thead>
  <?php
    include "connect.php";
    $strSQL2 = "SELECT * FROM leave_tbl Where company ='".$_POST['company']."' and strdate between '".$_POST['strdate']."' and '".$_POST['lastdate']."' and status != 'cancle' order by ".$col." ".$strNewOrder."";
   //echo
     $objQuery2 = mysqli_query($objCon,$strSQL2);
  while ($objResult2= mysqli_fetch_assoc($objQuery2))
  {


    $_POST['username'] = $objResult2['username'];

    $strSQL5 = "SELECT * FROM member where username = '".$_POST['username']."'";
    $objQuery5 = mysqli_query($objCon,$strSQL5);
    $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);


    ?>

  <tbody>

    <tr>
    <form name="1" method="post" action="save_approve.php?leave_id=<?php echo $objResult2["leave_id"];?>">


      <td><?php echo $objResult2['kind_leave'];?></td>

        <td><?php echo $objResult2['username'];?></td>

      <td><?php echo $objResult2['reason'];?></td>

      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['crt_time'];?></td>

      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['strtime'];?></td>

        <td><?php echo $objResult2['lastdate'];?><br><?php echo $objResult2['lasttime'];?></td>

    <?php
    include "time_edit.php";
     ?>
  <?php
   }
     ?>






  </tbody>

</table>



                      </div>
                  </div>
<?php
}elseif($_POST['strdate']=="" && $_POST['lastdate']=="" && $_POST['forname']=="" && $_POST['section']!=="" && $_POST['company']!==""){
  $strNewOrder = $_GET['order']== 'DESC' ? 'ASC' : 'DESC';
  if($_GET['order']==""){
    $strNewOrder = 'DESC';
  }
  $col = $_GET['sort'];
  if($_GET['sort']==""){
    $col = 'strdate';
  }




   ?>


  <thead>

    <tr>



    <th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=kind_leave&order=<?php echo $strNewOrder;?>">ประเภทการลา</a></th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=username&order=<?php echo $strNewOrder;?>">ผู้ลา</a></th>

<th>เหตุผล</th>
<th>วันที่ลงข้อมูล</th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=strdate&order=<?php echo $strNewOrder;?>">วันเริ่มลา</th>

          <th>วันสุดท้ายที่ลา</th>

          <th>เวลารวมที่ลา</th>

          <th>เวลาที่เหลือ</th>

          <th>การอนุมัติ</th>

          <th>บันทึก</th>




    </tr>

  </thead>
  <?php
    include "connect.php";
    $strSQL2 = "SELECT * FROM leave_tbl Where section = '".$_POST['section']."' and company = '".$_POST['company']."'  and status != 'cancle' order by ".$col." ".$strNewOrder."";
   //echo
     $objQuery2 = mysqli_query($objCon,$strSQL2);
  while ($objResult2= mysqli_fetch_assoc($objQuery2))
  {


    $_POST['username'] = $objResult2['username'];

    $strSQL5 = "SELECT * FROM member where username = '".$_POST['username']."'";
    $objQuery5 = mysqli_query($objCon,$strSQL5);
    $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);


    ?>

  <tbody>

    <tr>
    <form name="1" method="post" action="save_approve.php?leave_id=<?php echo $objResult2["leave_id"];?>">


      <td><?php echo $objResult2['kind_leave'];?></td>

        <td><?php echo $objResult2['username'];?></td>

      <td><?php echo $objResult2['reason'];?></td>

      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['crt_time'];?></td>

      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['strtime'];?></td>

        <td><?php echo $objResult2['lastdate'];?><br><?php echo $objResult2['lasttime'];?></td>

    <?php
    include "time_edit.php";
     ?>
  <?php
   }
     ?>






  </tbody>

</table>



                      </div>
                  </div>
<?php
}elseif($_POST['strdate']!=="" && $_POST['lastdate']!=="" && $_POST['forname']!=="" && $_POST['section']=="" && $_POST['company']==""){
  $strNewOrder = $_GET['order']== 'DESC' ? 'ASC' : 'DESC';
  if($_GET['order']==""){
    $strNewOrder = 'DESC';
  }
  $col = $_GET['sort'];
  if($_GET['sort']==""){
    $col = 'strdate';
  }


   ?>


  <thead>

    <tr>



    <th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=kind_leave&order=<?php echo $strNewOrder;?>">ประเภทการลา</a></th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=username&order=<?php echo $strNewOrder;?>">ผู้ลา</a></th>

<th>เหตุผล</th>
<th>วันที่ลงข้อมูล</th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=strdate&order=<?php echo $strNewOrder;?>">วันเริ่มลา</th>

          <th>วันสุดท้ายที่ลา</th>

          <th>เวลารวมที่ลา</th>

          <th>เวลาที่เหลือ</th>

          <th>การอนุมัติ</th>

          <th>บันทึก</th>




    </tr>

  </thead>
  <?php
    include "connect.php";
    $strSQL2 = "SELECT * FROM leave_tbl Where username ='".$_POST['forname']."' and strdate between '".$_POST['strdate']."' and '".$_POST['lastdate']."' and status != 'cancle' order by ".$col." ".$strNewOrder."";
   //echo
     $objQuery2 = mysqli_query($objCon,$strSQL2);
   
   
  while ($objResult2= mysqli_fetch_assoc($objQuery2))
  {


    $_POST['username'] = $objResult2['username'];

    $strSQL5 = "SELECT * FROM member where username = '".$_POST['username']."'";
    $objQuery5 = mysqli_query($objCon,$strSQL5);
    $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);


    ?>

  <tbody>

    <tr>
    <form name="1" method="post" action="save_approve.php?leave_id=<?php echo $objResult2["leave_id"];?>">


      <td><?php echo $objResult2['kind_leave'];?></td>

        <td><?php echo $objResult2['username'];?></td>

      <td><?php echo $objResult2['reason'];?></td>

      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['crt_time'];?></td>

      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['strtime'];?></td>

        <td><?php echo $objResult2['lastdate'];?><br><?php echo $objResult2['lasttime'];?></td>

    <?php
    include "time_edit.php";
     ?>
  <?php
   }
     ?>






  </tbody>

</table>



                      </div>
                  </div>
<?php
}else{
  $strNewOrder = $_GET['order']== 'DESC' ? 'ASC' : 'DESC';
  if($_GET['order']==""){
    $strNewOrder = 'DESC';
  }
  $col = $_GET['sort'];
  if($_GET['sort']==""){
    $col = 'strdate';
  }

   ?>


  <thead>

    <tr>




    <th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=kind_leave&order=<?php echo $strNewOrder;?>">ประเภทการลา</a></th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=username&order=<?php echo $strNewOrder;?>">ผู้ลา</a></th>

<th>เหตุผล</th>
<th>วันที่ลงข้อมูล</th>

<th><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=strdate&order=<?php echo $strNewOrder;?>">วันเริ่มลา</th>

      <th>วันสุดท้ายที่ลา</th>

      <th>เวลารวมที่ลา</th>

      <th>เวลาที่เหลือ</th>

      <th>การอนุมัติ</th>

      <th>บันทึก</th>




    </tr>

  </thead>
  <?php
   $strSQL2 = "SELECT * FROM leave_tbl WHERE username = '".$_POST['forname']."' and company = '".$_POST['company']."' and section ='".$_POST['section']."'
   and strdate between  '".$_POST['strdate']."' and '".$_POST['lastdate']."'    and status != 'cancle' order by ".$col." ".$strNewOrder." ";
    $objQuery2 = mysqli_query($objCon,$strSQL2);
  
  
  while ($objResult2= mysqli_fetch_assoc($objQuery2))
  {


    $_POST['username'] = $objResult2['username'];

    $strSQL5 = "SELECT * FROM member where username = '".$_POST['username']."'";
    $objQuery5 = mysqli_query($objCon,$strSQL5);
    $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);


    ?>

  <tbody>

    <tr>
    <form name="1" method="post" action="save_approve.php?leave_id=<?php echo $objResult2["leave_id"];?>">


      <td><?php echo $objResult2['kind_leave'];?></td>

        <td><?php echo $objResult2['username'];?></td>

      <td><?php echo $objResult2['reason'];?></td>
      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['crt_time'];?></td>

      <td><?php echo $objResult2['strdate'];?><br><?php echo $objResult2['strtime'];?></td>

      <td><?php echo $objResult2['lastdate'];?><br><?php echo $objResult2['lasttime'];?></td>

    <?php
    include "time_edit.php";
     ?>
  <?php
   }
     ?>
</tbody>

</table>


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
