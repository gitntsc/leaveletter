<?php
session_start();
include 'connect.php';
echo $strSQL = "UPDATE  leave_tbl SET status = '".$_POST["approve"]."', approve_by = '".$_SESSION['username']."' WHERE leave_id = '".$_GET["leave_id"]."'";

$objQuery = mysqli_query($objCon,$strSQL);
if($objQuery)
{


$strSQL3 = "SELECT * FROM leave_tbl WHERE leave_id = '".$_GET["leave_id"]."'";
$objQuery3 = mysqli_query($objCon,$strSQL3);
$objResult3 = mysqli_fetch_array($objQuery3,MYSQLI_ASSOC);

$_POST['usernames'] = $objResult3['username'];

$strSQL2 = "SELECT * FROM  member WHERE username = '".$_POST['usernames']."'";
$objQuery2 = mysqli_query($objCon,$strSQL2);
$objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC);

date_default_timezone_set("Asia/Bangkok");
$time = date('Y-m-d H:i:s');
$_POST["time"] = $time;
$event = "save_approve";
$_POST["event"] = $event;
$_POST['username'] = $_SESSION['username'];

$strSQL8 = "INSERT INTO log_file (username,event,times) VALUES ('".$_POST["username"]."','".$_POST["event"]."','".$_POST["time"]."')";
$objQuery8 = mysqli_query($objCon,$strSQL8);




  if($objResult3['kind_leave']="ลากิจ")
  {
$objResult2['business_time'];
$Result1 = $objResult2['business_time'];
$objResult3['summary_time'];
$Result2 = $objResult3['summary_time'];
$Result3 = $Result1 - $Result2;
$_POST['business_time'] = $Result3;
 $strSQL4 = "UPDATE member SET business_time = '".$_POST["business_time"]."' WHERE username = '".$_POST['usernames']."'";
$objQuery4 = mysqli_query($objCon,$strSQL4);

}elseif($objResult3['kind_leave']="ลาพักร้อน")
{

$Result = $objResult2['vacation_time'] - $objResult3['summary_time'];
$_POST['exvacation_time'] = $Result;
$strSQL4 = "UPDATE member SET vacation_time = '".$_POST["vacation_time"]."' WHERE username = '".$_SESSION['usernamse']."'";
$objQuery4 = mysqli_query($objCon,$strSQL4);
}elseif($objResult3['kind_leave']="ลาป่วย")
{
 $Result = $objResult2['sicktime'] + $objResult3['summary_time'];
$_POST['exsicktime'] = $Result;
$strSQL5 = "UPDATE member SET sicktime = '".$_POST["sicktime"]."' WHERE username = '".$_SESSION['usernames']."'";
$objQuery5 = mysqli_query($objCon,$strSQL5);
 }

//}
?>

<?php

}
 ?>


<?php
if($objQuery)
{
 ?>

     <?php
  if($_SESSION["level"] == "admin"){

   ?>
   <script>
   alert('บันทึกสำเร็จ');
   location.href='admin_page.php';
   </script>
   <?php

}elseif($_SESSION["level"] == "leader"){
  ?>

  <script>
  alert('บันทึกสำเร็จ');
  location.href='approve_under.php';
  </script>
  <?php

}elseif($_SESSION["level"] == "hr"){
    ?>

    <script>
    alert('บันทึกสำเร็จ');
    location.href='approve_page.php';
    </script>
    <?php
}elseif($_SESSION["level"] == "user"){
  ?>

  <script>
  alert('บันทึกสำเร็จ');
  location.href='user_page.php';
  </script>
  <?php
}else{
 header("location:index.php");
 echo "not success";
}
}
?>
