<?php
    session_start();
    include 'connect.php';
    $level=$_SESSION["level"];

    if(trim($_POST["strdate"]) == "0000-00-00")
  	{
  		echo "กรุณา ใส่วันที่ด้วยครับ!";
  		exit();
  	}
    if(trim($_POST["strdate"]) == "0001-01-01")
  	{
  		echo "กรุณา ใส่วันที่ด้วยครับ!";
  		exit();
  	}
    if(trim($_POST["strtime"]) == "")
  	{
  		echo "Please input Start Time!";
  		exit();
  	}
    if(trim($_POST["lasttime"]) == "0000-00-00")
    {
      echo "Please input Last Time!";
      exit();
    }
    if(trim($_POST["lasttime"]) == "0001-01-01")
    {
      echo "Please input Last Time!";
      exit();
    }
    if(trim($_POST["lastdate"]) == "")
  	{
  		echo "กรุณา ใส่วันที่ด้วยครับ!";
  		exit();
  	}


    date_default_timezone_set("Asia/Bangkok");

	$yearx = date("Y",strtotime($_POST["strdate"]));

  $time2 = date('Y-m-d');

  $crt_time = date('Y-m-d H:i:s');

  $yearz = date('Y',strtotime($time2));

  $yearz = $yearz+ 543;

  if(trim($yearx == $yearz)){
    echo "<script>alert('กรุณาใส่ปีเป็น ค.ศ.')</script>";
    echo "<script>window.history.back();</script>";
    exit();
  }




    $total = null;
    ini_set('display_errors', 0);
    error_reporting(~0);
    if(isset($_POST['total']))
    {
      $approve = $_POST['total'];
    }

    $_POST['username'] = $_SESSION['username'];

    $approve_by = "null";
    $_POST['approve_by'] = $approve_by;
    $status = "non approve";
    $_POST['status'] = $status;


    	 function DateDiff($strDate1,$strDate2)
    	 {
    				return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
    	 }
    	 function TimeDiff($strTime1,$strTime2)
    	 {
    				return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
    	 }
    	 function DateTimeDiff($strDateTime1,$strDateTime2)
    	 {
    				return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
    	 }


       $strSQL3 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
       $objQuery3 = mysqli_query($objCon,$strSQL3);
       $objResult3 = mysqli_fetch_array($objQuery3,MYSQLI_ASSOC);
       $_POST["leader1"] = $objResult3['leader1'];
       $_POST["leader2"] = $objResult3['leader2'];

     $summary = DateDiff($_POST['strdate'],$_POST['lastdate']);
     $summary2 = TimeDiff($_POST['strtime'],$_POST['lasttime']);
     if($summary2=="0")
     {
       if($objResult3['kind_work']=="office"){
         $summary2 = 9.5;

       }else{

         $summary2 = 9;
       }

     }




     if($summary>0){
        if($objResult3['kind_work']=="office"){
          $summary = $summary+1;
           $summary;
          $summary = $summary*8.5*60*60;
        }else{
          $summary = $summary+1;
           $summary;
          $summary = $summary*8.0*60*60;

        }

      }else{
        if($summary2>5){
          $summary2 = $summary2-1;
       $summary2."<br>";
        }
          $summary = $summary2*60*60;

      }
$business_time = $objResult3['business_time'];
$sicktime = $objResult3['sicktime'];
$vacationtime = $objResult3['vacation_time'];
 $business_time;
 $sicktime;
$vacationtime;
$company = $objResult3['company'];
$section = $objResult3['section'];


 echo $summary;
date_default_timezone_set("Asia/Bangkok");
  $time2 = date('Y-m-d');
  $crt_time = date('Y-m-d H:i:s');
  $_POST['crt_time'] = $crt_time;
  $year = date('Y');
$datetime = $_POST['strdate'];
list($years,$momth,$day) = explode("-",$datetime);
$years;

if($years==$year){
  if($_POST['leave']=='ลากิจ'){
  include "connect.php";
 echo	$strSQL = "SELECT * FROM leave_tbl WHERE username = '".$_SESSION['username']."' and kind_leave = 'ลากิจ'and strdate LIKE '%$year%'";
  $objQuery  = mysqli_query($objCon,$strSQL);
  while ($objResult= mysqli_fetch_assoc($objQuery))
  {
   $objResult['summary_time'];
  $total = $objResult['summary_time']+$total;
  $total;

  }
  $total = $total + $summary;
  if($business_time<$total){


  ?>
  <?php
if($_SESSION["level"] == "admin"){

?>
<script>
alert('เวลาไม่พอ');
location.href='admin_page.php';
</script>
<?php

}elseif($_SESSION["level"] == "leader"){
?>

<script>
alert('เวลาไม่พอ');
location.href='leader_page.php';
</script>
<?php

}elseif($_SESSION["level"] == "hr"){
?>

<script>
alert('เวลาไม่พอ');
location.href='hr_page.php';
</script>
<?php

}elseif($_SESSION["level"] == "user"){
?>

<script>
alert('เวลาไม่พอ');
location.href='user_page.php';
</script>
<?php
}else{
header("location:index.php");
echo "not success";
}
?>
