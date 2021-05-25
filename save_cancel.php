<?php
session_start();
include "connect.php";
$strSQL = "SELECT * FROM leave_tbl where username = '".$_SESSION['username']."'";
$objQuery =  mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

$summary_time1 = $objResult['summary_time'];
echo $summary_time1."<br>";

$summary_time = $summary_time1-$summary_time1;
echo $summary_time."<br>";

$strSQL5 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
$objQuery5 = mysqli_query($objCon,$strSQL5);
$objResult = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);


$strSQL4 = "UPDATE leave_tbl SET status = '".$_POST['cancle']."' WHERE leave_id = '".$_GET['leave_id']."'";
$objQuery4 = mysqli_query($objCon,$strSQL4);


$strSQL2 = "SELECT * FROM leave_tbl where username = '".$_SESSION['username']."'";
$objQuery2 =  mysqli_query($objCon,$strSQL2);
$objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC);

$_POST['usernames'] =  $objResult2['username'];

$_POST['usernames'];


//$strSQL3 = "UPDATE leave_tbl SET summary_time = '".$summary_time."' WHERE leave_id = '".$_GET ['leave_id']."'";
//$objQuery3 = mysqli_query($objCon,$strSQL3);

if($objResult['kind_leave']="ลากิจ")
{
  $summary_time2 = $objResult['business_time'];
  $summary_time3 = $summary_time2 + $summary_time1;
  echo $summary_time3;

  $strSQL6  = "UPDATE member SET business_time = '".$summary_time3."' WHERE username = '".$_POST['usernames']."'";
  $objQuery6 = mysqli_query($objCon,$strSQL6);

}elseif($objResult['kind_leave']="ลาพักร้อน")

{
  $summary_time2 = $objResult['business_time'];
  $summary_time3 = $summary_time2 + $summary_time1;
  echo $summary_time3;

  $strSQL6  = "UPDATE member SET vacation_time = '".$summary_time3."' WHERE username = '".$_POST['usernames']."'";
  $objQuery6 = mysqli_query($objCon,$strSQL6);

}elseif($objQuery['kind_leave']="ลาป่วย"){

$summary_time2 = $objResult['business_time'];
$summary_time3 = $summary_time2 + $summary_time1;
echo $summary_time3;

$strSQL6  = "UPDATE member SET business_time = '".$summary_time3."' WHERE username = '".$_POST['usernames']."'";
$objQuery6 = mysqli_query($objCon,$strSQL6);
}
 ?>
 <?php
 if($objQuery6)
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

 }elseif($_SESSION["level"] == "hr"){
   ?>

   <script>
   alert('บันทึกสำเร็จ');
   location.href='hr_page.php';
   </script>
   <?php

 }elseif($_SESSION["level"] == "leader"){
   ?>

   <script>
   alert('บันทึกสำเร็จ');
   location.href='leader_page.php';
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





mysqli_close($objCon);
?>
