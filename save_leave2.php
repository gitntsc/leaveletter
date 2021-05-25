<?php
    session_start();
    include 'connect.php';
    $level=$_SESSION["level"];

    if(trim($_POST["strdate"]) == "")
  	{
  		echo "กรุณาใส่วันที่ด้วยครับ";
  		exit();
  	}
    if(trim($_POST["strtime"]) == "")
  	{
  		echo "Please input Start Time!";
  		exit();
  	}
    if(trim($_POST["lasttime"]) == "")
    {
      echo "Please input Last Time!";
      exit();
    }
    if(trim($_POST["strdate"]) == "")
  	{
  		echo "Please input Start Date!";
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
  $year = date('yy');
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
  if($business_time<=$total){


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
  <?php
}else{
  $_POST['summary_time'] = $summary;



    $strSQL = "INSERT INTO leave_tbl (kind_leave,reason,strdate,strtime,lastdate,lasttime,summary_time,username,leader1,leader2,status,approve_by,company,section,crt_time) VALUES ('".$_POST["leave"]."',
  '".$_POST["reason"]."','".$_POST["strdate"]."','".$_POST["strtime"]."','".$_POST["lastdate"]."','".$_POST["lasttime"]."','".$_POST["summary_time"]."','".$_POST["username"]."','".$_POST["leader1"]."','".$_POST["leader2"]."','".$_POST["status"]."'
  ,'".$_POST["approve_by"]."','".$company."','".$section."','".$_POST["crt_time"]."')";
  $objQuery = mysqli_query($objCon,$strSQL);

  date_default_timezone_set("Asia/Bangkok");
$time = date('Y-m-d H:i:s');
$_POST["time"] = $time;
$event = "Save_leave";
$_POST["event"] = $event;



$strSQL2 = "INSERT INTO log_file (username,event,times) VALUES ('".$_POST["username"]."','".$_POST["event"]."','".$_POST["time"]."')";
$objQuery2 = mysqli_query($objCon,$strSQL2);

$leader1 = $objResult3['leader1'];
$leader2 = $objResult3['leader2'];

$strSQL4 = "SELECT * FROM member where username = '".$leader1."'";
$objQuery4 = mysqli_query($objCon,$strSQL4);
$objResult4 = mysqli_fetch_array($objQuery4,MYSQLI_ASSOC);

$sendmail1 = $objResult4['email'];

 $strSQL5 = "SELECT * FROM member where username = '".$leader2."'";
  $objQuery5 = mysqli_query($objCon,$strSQL5);
  $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);




  $sendmail2 = $objResult5['email'];

  $from = $_SESSION['username'];
  $kind_leave = $_POST['leave'];
  $strdate = $_POST['strdate'];
  $lastdate = $_POST['lastdate'];
  $reason = $_POST['reason'];
  $crtdate = $time;


  $exmail = "From : $from <br>
  เรื่อง : $kind_leave วันที่ : $strdate ถึงวันที่ : $lastdate <br>
  เหตุผล : $reason <br>
  วันที่ยื่น : $time <br>
  อนุมัติคำขอลาได้ที่ : <a href='http://192.168.23.6/leaveletter'>คลิกที่นี่</a></br>";
if($objQuery)
{
  if($sendmail2 !== "")

  /**
  * This example shows making an SMTP connection with authentication.
  */
  //SMTP needs accurate times, and the PHP time zone MUST be set
  //This should be done in your php.ini, but this is how to do it if you don't have access to that
  date_default_timezone_set('Asia/Bangkok');
  require 'PHPMailer/PHPMailerAutoload.php';
  //Create a new PHPMailer instance
  $mail = new PHPMailer;
  $mail->CharSet = "utf-8";
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;
  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';
  //Set the hostname of the mail server
  $mail->Host = "192.168.22.3";
  //Set the SMTP port number - likely to be 25, 465 or 587
  $mail->Port = 25;
  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'none';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication
  $mail->Username = "leave.admin@ntmail.local";
  //Password to use for SMTP authentication
  $mail->Password = "Stepmail99";
  //Set who the message is to be sent from
  $mail->setFrom('leave.admin@ntmail.local', 'Leave admin');
  //Set who the message is to be sent to
  $mail->addAddress($sendmail1,$sendmail1);
  $mail->AddCC($sendmail2, $sendmail2);
  //Set the subject line
  $mail->Subject = 'แจ้งการอนุมัติการลา';
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
  $mail->msgHTML($exmail);
  //send the message, check for errors
  if (!$mail->send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
  include 'test_send_line5.php';
  }




}else{
  date_default_timezone_set('Asia/Bangkok');
  require 'PHPMailer/PHPMailerAutoload.php';
  //Create a new PHPMailer instance
  $mail = new PHPMailer;
  $mail->CharSet = "utf-8";
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;
  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';
  //Set the hostname of the mail server
  $mail->Host = "192.168.22.3";
  //Set the SMTP port number - likely to be 25, 465 or 587
  $mail->Port = 25;
  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'none';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication
  $mail->Username = "leave.admin@ntmail.local";
  //Password to use for SMTP authentication
  $mail->Password = "Stepmail99";
  //Set who the message is to be sent from
  $mail->setFrom('leave.admin@ntmail.local', 'Leave admin');
  //Set who the message is to be sent to
  $mail->addAddress($sendmail1,$sendmail1);

  //Set the subject line
  $mail->Subject = 'แจ้งการอนุมัติการลา';
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
  $mail->msgHTML("$exmail");
  //send the message, check for errors
  if (!$mail->send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
  include 'test_send_line5.php';
  }

}
if($objQuery2)
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
  location.href='leader_page.php';
  </script>
  <?php

}elseif($_SESSION["level"] == "hr"){
  ?>

  <script>
  alert('บันทึกสำเร็จ');
  location.href='hr_page.php';
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



}
}elseif($_POST['leave']=='ลาป่วย'){
  include "connect.php";
 echo	$strSQL = "SELECT * FROM leave_tbl WHERE username = '".$_SESSION['username']."' and kind_leave = 'ลาป่วย' and strdate LIKE '%$year%' ";
  $objQuery  = mysqli_query($objCon,$strSQL);
  while ($objResult= mysqli_fetch_assoc($objQuery))
  {
   $objResult['summary_time'];
  $total = $objResult['summary_time']+$total;
  $total;

  }
  $total = $total + $summary;
  if($sicktime<$total){

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
<?php
}else{
  $_POST['summary_time'] = $summary;



    $strSQL = "INSERT INTO leave_tbl (kind_leave,reason,strdate,strtime,lastdate,lasttime,summary_time,username,leader1,leader2,status,approve_by,company,section,crt_time) VALUES ('".$_POST["leave"]."',
  '".$_POST["reason"]."','".$_POST["strdate"]."','".$_POST["strtime"]."','".$_POST["lastdate"]."','".$_POST["lasttime"]."','".$_POST["summary_time"]."','".$_POST["username"]."','".$_POST["leader1"]."','".$_POST["leader2"]."','".$_POST["status"]."','".$_POST["approve_by"]."'
,'".$company."','".$section."','".$_POST["crt_time"]."')";
  $objQuery = mysqli_query($objCon,$strSQL);

  date_default_timezone_set("Asia/Bangkok");
$time = date('Y-m-d H:i:s');
$_POST["time"] = $time;
$event = "Save_leave";
$_POST["event"] = $event;



$strSQL2 = "INSERT INTO log_file (username,event,times) VALUES ('".$_POST["username"]."','".$_POST["event"]."','".$_POST["time"]."')";
$objQuery2 = mysqli_query($objCon,$strSQL2);

$leader1 = $objResult3['leader1'];
$leader2 = $objResult3['leader2'];

$strSQL4 = "SELECT * FROM member where username = '".$leader1."'";
$objQuery4 = mysqli_query($objCon,$strSQL4);
$objResult4 = mysqli_fetch_array($objQuery4,MYSQLI_ASSOC);

$sendmail1 = $objResult4['email'];

 $strSQL5 = "SELECT * FROM member where username = '".$leader2."'";
  $objQuery5 = mysqli_query($objCon,$strSQL5);
  $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);




  $sendmail2 = $objResult5['email'];

  $from = $_SESSION['username'];
  $kind_leave = $_POST['leave'];
  $strdate = $_POST['strdate'];
  $lastdate = $_POST['lastdate'];
  $reason = $_POST['reason'];
  $crtdate = $time;


  $exmail = "From : $from <br>
  เรื่อง : $kind_leave วันที่ : $strdate ถึงวันที่ : $lastdate <br>
  เหตุผล : $reason <br>
  วันที่ยื่น : $time <br>
  อนุมัติคำขอลาได้ที่ : <a href='http://192.168.23.6/leaveletter'>คลิกที่นี่</a></br>";
if($objQuery)
{
  if($sendmail2 !== "")

  /**
  * This example shows making an SMTP connection with authentication.
  */
  //SMTP needs accurate times, and the PHP time zone MUST be set
  //This should be done in your php.ini, but this is how to do it if you don't have access to that
  date_default_timezone_set('Asia/Bangkok');
  require 'PHPMailer/PHPMailerAutoload.php';
  //Create a new PHPMailer instance
  $mail = new PHPMailer;
  $mail->CharSet = "utf-8";
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;
  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';
  //Set the hostname of the mail server
  $mail->Host = "192.168.22.3";
  //Set the SMTP port number - likely to be 25, 465 or 587
  $mail->Port = 25;
  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'none';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication
  $mail->Username = "leave.admin@ntmail.local";
  //Password to use for SMTP authentication
  $mail->Password = "Stepmail99";
  //Set who the message is to be sent from
  $mail->setFrom('leave.admin@ntmail.local', 'Leave admin');
  //Set who the message is to be sent to
  $mail->addAddress($sendmail1,$sendmail1);
  $mail->AddCC($sendmail2, $sendmail2);
  //Set the subject line
  $mail->Subject = 'แจ้งการอนุมัติการลา';
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
  $mail->msgHTML($exmail);
  //send the message, check for errors
  if (!$mail->send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
  include 'test_send_line5.php';
  }




}else{
  date_default_timezone_set('Asia/Bangkok');
  require 'PHPMailer/PHPMailerAutoload.php';
  //Create a new PHPMailer instance
  $mail = new PHPMailer;
  $mail->CharSet = "utf-8";
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;
  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';
  //Set the hostname of the mail server
  $mail->Host = "192.168.22.3";
  //Set the SMTP port number - likely to be 25, 465 or 587
  $mail->Port = 25;
  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'none';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication
  $mail->Username = "leave.admin@ntmail.local";
  //Password to use for SMTP authentication
  $mail->Password = "Stepmail99";
  //Set who the message is to be sent from
  $mail->setFrom('leave.admin@ntmail.local', 'Leave admin');
  //Set who the message is to be sent to
  $mail->addAddress($sendmail1,$sendmail1);

  //Set the subject line
  $mail->Subject = 'แจ้งการอนุมัติการลา';
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
  $mail->msgHTML("$exmail");
  //send the message, check for errors
  if (!$mail->send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
  include 'test_send_line5.php';
  }

}
if($objQuery2)
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
  location.href='leader_page.php';
  </script>
  <?php

}elseif($_SESSION["level"] == "hr"){
  ?>

  <script>
  alert('บันทึกสำเร็จ');
  location.href='hr_page.php';
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



}

}elseif($_POST['leave']=='ลาพักร้อน'){
  $strSQL13 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
  $objQuery13 = mysqli_query($objCon,$strSQL13);
  $objResult13 = mysqli_fetch_array($objQuery13,MYSQLI_ASSOC);
  $vacation_time = $objResult13['vacation_time'];
  include "connect.php";
 echo	$strSQL = "SELECT * FROM leave_tbl WHERE username = '".$_SESSION['username']."' and kind_leave = 'ลาพักผ่อน' and strdate LIKE '%$year%'";
  $objQuery  = mysqli_query($objCon,$strSQL);
  while ($objResult= mysqli_fetch_assoc($objQuery))
  {
   $objResult['summary_time'];
  $total = $objResult['summary_time']+$total;
  echo $total;

  }
    $total2 = $total + $summary;
  if($vacation_time < $total2){

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
<?php
}else{
  $_POST['summary_time'] = $summary;



  $strSQL = "INSERT INTO leave_tbl (kind_leave,reason,strdate,strtime,lastdate,lasttime,summary_time,username,leader1,leader2,status,approve_by,company,section,crt_time) VALUES ('".$_POST["leave"]."',
  '".$_POST["reason"]."','".$_POST["strdate"]."','".$_POST["strtime"]."','".$_POST["lastdate"]."','".$_POST["lasttime"]."','".$_POST["summary_time"]."','".$_POST["username"]."','".$_POST["leader1"]."','".$_POST["leader2"]."','".$_POST["status"]."','".$_POST["approve_by"]."'
,'".$company."','".$section."','".$_POST["crt_time"]."')";
  $objQuery = mysqli_query($objCon,$strSQL);

  date_default_timezone_set("Asia/Bangkok");
$time = date('Y-m-d H:i:s');
$_POST["time"] = $time;
$event = "Save_leave";
$_POST["event"] = $event;



$strSQL2 = "INSERT INTO log_file (username,event,times) VALUES ('".$_POST["username"]."','".$_POST["event"]."','".$_POST["time"]."')";
$objQuery2 = mysqli_query($objCon,$strSQL2);

$leader1 = $objResult3['leader1'];
$leader2 = $objResult3['leader2'];

$strSQL4 = "SELECT * FROM member where username = '".$leader1."'";
$objQuery4 = mysqli_query($objCon,$strSQL4);
$objResult4 = mysqli_fetch_array($objQuery4,MYSQLI_ASSOC);

$sendmail1 = $objResult4['email'];

 $strSQL5 = "SELECT * FROM member where username = '".$leader2."'";
  $objQuery5 = mysqli_query($objCon,$strSQL5);
  $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);




  $sendmail2 = $objResult5['email'];

  $from = $_SESSION['username'];
  $kind_leave = $_POST['leave'];
  $strdate = $_POST['strdate'];
  $lastdate = $_POST['lastdate'];
  $reason = $_POST['reason'];
  $crtdate = $time;


  $exmail = "From : $from <br>
  เรื่อง : $kind_leave วันที่ : $strdate ถึงวันที่ : $lastdate <br>
  เหตุผล : $reason <br>
  วันที่ยื่น : $time <br>
  อนุมัติคำขอลาได้ที่ : <a href='http://192.168.23.6/leaveletter'>คลิกที่นี่</a></br>";
if($objQuery)
{
  if($sendmail2 !== "")

  /**
  * This example shows making an SMTP connection with authentication.
  */
  //SMTP needs accurate times, and the PHP time zone MUST be set
  //This should be done in your php.ini, but this is how to do it if you don't have access to that
  date_default_timezone_set('Asia/Bangkok');
  require 'PHPMailer/PHPMailerAutoload.php';
  //Create a new PHPMailer instance
  $mail = new PHPMailer;
  $mail->CharSet = "utf-8";
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;
  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';
  //Set the hostname of the mail server
  $mail->Host = "192.168.22.3";
  //Set the SMTP port number - likely to be 25, 465 or 587
  $mail->Port = 25;
  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'none';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication
  $mail->Username = "leave.admin@ntmail.local";
  //Password to use for SMTP authentication
  $mail->Password = "Stepmail99";
  //Set who the message is to be sent from
  $mail->setFrom('leave.admin@ntmail.local', 'Leave admin');
  //Set who the message is to be sent to
  $mail->addAddress($sendmail1,$sendmail1);
  $mail->AddCC($sendmail2, $sendmail2);
  //Set the subject line
  $mail->Subject = 'แจ้งการอนุมัติการลา';
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
  $mail->msgHTML($exmail);
  //send the message, check for errors
  if (!$mail->send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
  include 'test_send_line5.php';
  }




}else{
  date_default_timezone_set('Asia/Bangkok');
  require 'PHPMailer/PHPMailerAutoload.php';
  //Create a new PHPMailer instance
  $mail = new PHPMailer;
  $mail->CharSet = "utf-8";
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;
  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';
  //Set the hostname of the mail server
  $mail->Host = "192.168.22.3";
  //Set the SMTP port number - likely to be 25, 465 or 587
  $mail->Port = 25;
  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'none';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication
  $mail->Username = "leave.admin@ntmail.local";
  //Password to use for SMTP authentication
  $mail->Password = "Stepmail99";
  //Set who the message is to be sent from
  $mail->setFrom('leave.admin@ntmail.local', 'Leave admin');
  //Set who the message is to be sent to
  $mail->addAddress($sendmail1,$sendmail1);

  //Set the subject line
  $mail->Subject = 'แจ้งการอนุมัติการลา';
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
  $mail->msgHTML("$exmail");
  //send the message, check for errors
  if (!$mail->send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
 include 'test_send_line5.php';
  }

}
if($objQuery2)
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
  location.href='leader_page.php';
  </script>
  <?php

}elseif($_SESSION["level"] == "hr"){
  ?>

  <script>
  alert('บันทึกสำเร็จ');
  location.href='hr_page.php';
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



}
}else{
  $_POST['summary_time'] = $summary;

    include "connect.php";
    $strSQL = "INSERT INTO leave_tbl (kind_leave,reason,strdate,strtime,lastdate,lasttime,summary_time,username,leader1,leader2,status,approve_by,company,section,crt_time) VALUES ('".$_POST["leave"]."',
    '".$_POST["reason"]."','".$_POST["strdate"]."','".$_POST["strtime"]."','".$_POST["lastdate"]."','".$_POST["lasttime"]."','".$_POST["summary_time"]."','".$_POST["username"]."','".$_POST["leader1"]."','".$_POST["leader2"]."','".$_POST["status"]."','".$_POST["approve_by"]."'
  ,'".$company."','".$section."','".$_POST["crt_time"]."')";
    $objQuery = mysqli_query($objCon,$strSQL);

  date_default_timezone_set("Asia/Bangkok");
  $time = date('Y-m-d H:i:s');
  $_POST["time"] = $time;
  $event = "Save_leave";
  $_POST["event"] = $event;



  $strSQL2 = "INSERT INTO log_file (username,event,times) VALUES ('".$_POST["username"]."','".$_POST["event"]."','".$_POST["time"]."')";
  $objQuery2 = mysqli_query($objCon,$strSQL2);

  $leader1 = $objResult3['leader1'];
  $leader2 = $objResult3['leader2'];

  $strSQL4 = "SELECT * FROM member where username = '".$leader1."'";
  $objQuery4 = mysqli_query($objCon,$strSQL4);
  $objResult4 = mysqli_fetch_array($objQuery4,MYSQLI_ASSOC);

  $sendmail1 = $objResult4['email'];

   $strSQL5 = "SELECT * FROM member where username = '".$leader2."'";
    $objQuery5 = mysqli_query($objCon,$strSQL5);
    $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);




    $sendmail2 = $objResult5['email'];

    $from = $_SESSION['username'];
    $kind_leave = $_POST['leave'];
    $strdate = $_POST['strdate'];
    $lastdate = $_POST['lastdate'];
    $reason = $_POST['reason'];
    $crtdate = $time;


    $exmail = "From : $from <br>
    เรื่อง : $kind_leave วันที่ : $strdate ถึงวันที่ : $lastdate <br>
    เหตุผล : $reason <br>
    วันที่ยื่น : $time <br>
    อนุมัติคำขอลาได้ที่ : <a href='http://192.168.23.6/leaveletter'>คลิกที่นี่</a></br>";
  if($objQuery)
  {
    if($sendmail2 !== "")

    /**
    * This example shows making an SMTP connection with authentication.
    */
    //SMTP needs accurate times, and the PHP time zone MUST be set
    //This should be done in your php.ini, but this is how to do it if you don't have access to that
    date_default_timezone_set('Asia/Bangkok');
    require 'PHPMailer/PHPMailerAutoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    $mail->CharSet = "utf-8";
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host = "192.168.22.3";
    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port = 25;
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'none';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication
    $mail->Username = "leave.admin@ntmail.local";
    //Password to use for SMTP authentication
    $mail->Password = "Stepmail99";
    //Set who the message is to be sent from
    $mail->setFrom('leave.admin@ntmail.local', 'Leave admin');
    //Set who the message is to be sent to
    $mail->addAddress($sendmail1,$sendmail1);
    $mail->AddCC($sendmail2, $sendmail2);
    //Set the subject line
    $mail->Subject = 'แจ้งการอนุมัติการลา';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
    $mail->msgHTML($exmail);
    //send the message, check for errors
    if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
    include 'test_send_line5.php';
    }




  }else{
    date_default_timezone_set('Asia/Bangkok');
    require 'PHPMailer/PHPMailerAutoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    $mail->CharSet = "utf-8";
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host = "192.168.22.3";
    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port = 25;
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'none';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication
    $mail->Username = "leave.admin@ntmail.local";
    //Password to use for SMTP authentication
    $mail->Password = "Stepmail99";
    //Set who the message is to be sent from
    $mail->setFrom('leave.admin@ntmail.local', 'Leave admin');
    //Set who the message is to be sent to
    $mail->addAddress($sendmail1,$sendmail1);

    //Set the subject line
    $mail->Subject = 'แจ้งการอนุมัติการลา';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
    $mail->msgHTML("$exmail");
    //send the message, check for errors
    if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
   include 'test_send_line5.php';
    }

  }
  if($objQuery2)
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
    location.href='leader_page.php';
    </script>
    <?php

  }elseif($_SESSION["level"] == "hr"){
    ?>

    <script>
    alert('บันทึกสำเร็จ');
    location.href='hr_page.php';
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



  }

mysqli_close($objCon);
}else{
  $_POST['summary_time'] = $summary;

    include "connect.php";
    $strSQL = "INSERT INTO leave_tbl (kind_leave,reason,strdate,strtime,lastdate,lasttime,summary_time,username,leader1,leader2,status,approve_by,company,section,crt_time) VALUES ('".$_POST["leave"]."',
    '".$_POST["reason"]."','".$_POST["strdate"]."','".$_POST["strtime"]."','".$_POST["lastdate"]."','".$_POST["lasttime"]."','".$_POST["summary_time"]."','".$_POST["username"]."','".$_POST["leader1"]."','".$_POST["leader2"]."','".$_POST["status"]."','".$_POST["approve_by"]."'
  ,'".$company."','".$section."','".$_POST["crt_time"]."')";
    $objQuery = mysqli_query($objCon,$strSQL);

  date_default_timezone_set("Asia/Bangkok");
  $time = date('Y-m-d H:i:s');
  $_POST["time"] = $time;
  $event = "Save_leave";
  $_POST["event"] = $event;



  $strSQL2 = "INSERT INTO log_file (username,event,times) VALUES ('".$_POST["username"]."','".$_POST["event"]."','".$_POST["time"]."')";
  $objQuery2 = mysqli_query($objCon,$strSQL2);

  $leader1 = $objResult3['leader1'];
  $leader2 = $objResult3['leader2'];

  $strSQL4 = "SELECT * FROM member where username = '".$leader1."'";
  $objQuery4 = mysqli_query($objCon,$strSQL4);
  $objResult4 = mysqli_fetch_array($objQuery4,MYSQLI_ASSOC);

  $sendmail1 = $objResult4['email'];

   $strSQL5 = "SELECT * FROM member where username = '".$leader2."'";
    $objQuery5 = mysqli_query($objCon,$strSQL5);
    $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);




    $sendmail2 = $objResult5['email'];

    $from = $_SESSION['username'];
    $kind_leave = $_POST['leave'];
    $strdate = $_POST['strdate'];
    $lastdate = $_POST['lastdate'];
    $reason = $_POST['reason'];
    $crtdate = $time;


    $exmail = "From : $from <br>
    เรื่อง : $kind_leave วันที่ : $strdate ถึงวันที่ : $lastdate <br>
    เหตุผล : $reason <br>
    วันที่ยื่น : $time <br>
    อนุมัติคำขอลาได้ที่ : <a href='http://192.168.23.6/leaveletter'>คลิกที่นี่</a></br>";
  if($objQuery)
  {
    if($sendmail2 !== "")

    /**
    * This example shows making an SMTP connection with authentication.
    */
    //SMTP needs accurate times, and the PHP time zone MUST be set
    //This should be done in your php.ini, but this is how to do it if you don't have access to that
    date_default_timezone_set('Asia/Bangkok');
    require 'PHPMailer/PHPMailerAutoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    $mail->CharSet = "utf-8";
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host = "192.168.22.3";
    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port = 25;
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'none';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication
    $mail->Username = "leave.admin@ntmail.local";
    //Password to use for SMTP authentication
    $mail->Password = "Stepmail99";
    //Set who the message is to be sent from
    $mail->setFrom('leave.admin@ntmail.local', 'Leave admin');
    //Set who the message is to be sent to
    $mail->addAddress($sendmail1,$sendmail1);
    $mail->AddCC($sendmail2, $sendmail2);
    //Set the subject line
    $mail->Subject = 'แจ้งการอนุมัติการลา';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
    $mail->msgHTML($exmail);
    //send the message, check for errors
    if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
    include 'test_send_line5.php';
    }




  }else{
    date_default_timezone_set('Asia/Bangkok');
    require 'PHPMailer/PHPMailerAutoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    $mail->CharSet = "utf-8";
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host = "192.168.22.3";
    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port = 25;
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'none';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication
    $mail->Username = "leave.admin@ntmail.local";
    //Password to use for SMTP authentication
    $mail->Password = "Stepmail99";
    //Set who the message is to be sent from
    $mail->setFrom('leave.admin@ntmail.local', 'Leave admin');
    //Set who the message is to be sent to
    $mail->addAddress($sendmail1,$sendmail1);

    //Set the subject line
    $mail->Subject = 'แจ้งการอนุมัติการลา';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
    $mail->msgHTML("$exmail");
    //send the message, check for errors
    if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
   include 'test_send_line5.php';
    }

  }
  if($objQuery2)
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
    location.href='leader_page.php';
    </script>
    <?php

  }elseif($_SESSION["level"] == "hr"){
    ?>

    <script>
    alert('บันทึกสำเร็จ');
    location.href='hr_page.php';
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

  }


?>
