<?php
    session_start();
    include 'connect.php';

    $level=$_SESSION["level"];

    if(trim($_POST["strdate"]) == "0000-00-00")
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
    if(trim($_POST["strdate"]) == "")
  	{
  		echo "Please input Start Date!";
  		exit();
  	}
    if(trim($_POST["username"]) == "")
  	{
  		echo "Please input Username!";
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



  $objResult18['name'];

    $total = null;
    ini_set('display_errors', 0);
    error_reporting(~0);
    if(isset($_POST['total']))
    {
      $approve = $_POST['total'];
    }

  

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


       $strSQL3 = "SELECT * FROM member where username = '".$_POST['username']."'";
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
$exbusiness_time = $objResult3['exbusiness_time'];
$exvacation_time = $objResult3['exvacation_time'];
$exsicktime = $objResult3['exsicktime'];
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
  $strSQL = "SELECT * FROM leave_tbl WHERE username = '".$_POST['username']."' and kind_leave = 'ลากิจ'and status = 'approve' and strdate LIKE '%$year%'";
  $objQuery  = mysqli_query($objCon,$strSQL);
  while ($objResult= mysqli_fetch_assoc($objQuery))
  {
   $objResult['summary_time'];
  $total = $objResult['summary_time']+$total;
  $total;

  }
  $totals = $total + $summary;
  if($exbusiness_time<$totals){


  ?>
  <?php
if($_SESSION["level"] == "admin"){

?>
<script>
alert('เวลาไม่พอ');
location.href='leave_data_user.php';
</script>
<?php

}elseif($_SESSION["level"] == "leader"){
?>

<script>
alert('เวลาไม่พอ');
location.href='leave_data_user.php';
</script>
<?php

}elseif($_SESSION["level"] == "hr"){
?>

<script>
alert('เวลาไม่พอ');
location.href='leave_data_user.php';
</script>
<?php

}elseif($_SESSION["level"] == "user"){
?>

<script>
alert('เวลาไม่พอ');
location.href='leave_data_user.php';
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



echo $strSQL2 = "INSERT INTO log_file (username,event,times) VALUES ('".$_POST["username"]."','".$_POST["event"]."','".$_POST["time"]."')";
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


if($objQuery2)
{
  ?>

      <?php
  if($_SESSION["level"] == "admin"){

   ?>
   <script>
   alert('บันทึกสำเร็จ');
   location.href='leave_data_user.php';
   </script>
   <?php

}elseif($_SESSION["level"] == "leader"){
  ?>

  <script>
  alert('บันทึกสำเร็จ');
  location.href='leave_data_user.php';
  
  </script>
<?php
}elseif($_SESSION["level"] == "hr"){
  ?>

  <script>
  alert('บันทึกสำเร็จ');
  location.href='leave_data_user.php';
  </script>
  <?php

}elseif($_SESSION["level"] == "user"){
  ?>

  <script>
  alert('บันทึกสำเร็จ');
  location.href='leave_data_user.php';
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
 echo	$strSQL = "SELECT * FROM leave_tbl WHERE username = '".$_POST['username']."' and kind_leave = 'ลาป่วย' and status = 'approve' and strdate LIKE '%$year%' ";
  $objQuery  = mysqli_query($objCon,$strSQL);
  while ($objResult= mysqli_fetch_assoc($objQuery))
  {
   $objResult['summary_time'];
  $total = $objResult['summary_time']+$total;
  $total;

  }
  $totals = $total + $summary;
  if($exsicktime<$totals){

    ?>
    <?php
if($_SESSION["level"] == "admin"){

 ?>
 <script>
 alert('เวลาไม่พอ');
 location.href='leave_data_user.php';
 </script>
 <?php

}elseif($_SESSION["level"] == "leader"){
?>

<script>
alert('เวลาไม่พอ');
location.href='leave_data_user.php';
</script>
<?php

}elseif($_SESSION["level"] == "hr"){
?>

<script>
alert('เวลาไม่พอ');
location.href='leave_data_user.php';
</script>
<?php

}elseif($_SESSION["level"] == "user"){
?>

<script>
alert('เวลาไม่พอ');
location.href='leave_data_user.php';
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

 
if($objQuery2)
{
  ?>

      <?php
  if($_SESSION["level"] == "admin"){

   ?>
   <script>
   alert('บันทึกสำเร็จ');
   location.href='leave_data_user.php';
   </script>
   <?php

}elseif($_SESSION["level"] == "leader"){
  ?>

  <script>
  alert('บันทึกสำเร็จ');
  location.href='leave_data_user.php';
  </script>
  <?php

}elseif($_SESSION["level"] == "hr"){
  ?>

  <script>
  alert('บันทึกสำเร็จ');
  location.href='leave_data_user.php';
  </script>
  <?php

}elseif($_SESSION["level"] == "user"){
  ?>

  <script>
  alert('บันทึกสำเร็จ');
  location.href='leave_data_user.php';
  </script>
  <?php
}else{
  header("location:index.php");
  echo "not success";
}
}



}

}elseif($_POST['leave']=='ลาพักผ่อน'){


 echo	$strSQL = "SELECT * FROM leave_tbl WHERE username = '".$_POST['username']."' and kind_leave = 'ลาพักผ่อน' and status = 'approve' and strdate LIKE '%$year%'";
  $objQuery  = mysqli_query($objCon,$strSQL);
  while ($objResult= mysqli_fetch_assoc($objQuery))
  {
   $objResult['summary_time'];
  $total = $objResult['summary_time']+$total;
  echo $total;

  }
  $totals = $total + $summary;
  if($exvacation_time<$totals){

    ?>
    <?php
if($_SESSION["level"] == "admin"){

 ?>
 <script>
 alert('เวลาไม่พอ');
 location.href='leave_data_user.php';
 </script>
 <?php

}elseif($_SESSION["level"] == "leader"){
?>

<script>
alert('เวลาไม่พอ');
location.href='leave_data_user.php';
</script>
<?php

}elseif($_SESSION["level"] == "hr"){
?>

<script>
alert('เวลาไม่พอ');
location.href='leave_data_user.php';
</script>
<?php

}elseif($_SESSION["level"] == "user"){
?>

<script>
alert('เวลาไม่พอ');
location.href='leave_data_user.php';
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



 echo $strSQL = "INSERT INTO leave_tbl (kind_leave,reason,strdate,strtime,lastdate,lasttime,summary_time,username,leader1,leader2,status,approve_by,company,section,crt_time) VALUES ('".$_POST["leave"]."',
  '".$_POST["reason"]."','".$_POST["strdate"]."','".$_POST["strtime"]."','".$_POST["lastdate"]."','".$_POST["lasttime"]."','".$_POST["summary_time"]."','".$_POST["username"]."','".$_POST["leader1"]."','".$_POST["leader2"]."','".$_POST["status"]."','".$_POST["approve_by"]."'
,'".$company."','".$section."','".$_POST["crt_time"]."')";
  $objQuery = mysqli_query($objCon,$strSQL);

  date_default_timezone_set("Asia/Bangkok");
$time = date('Y-m-d H:i:s');
$_POST["time"] = $time;
$event = "Save_leave";
$_POST["event"] = $event;



echo $strSQL2 = "INSERT INTO log_file (username,event,times) VALUES ('".$_POST["username"]."','".$_POST["event"]."','".$_POST["time"]."')";
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

if($objQuery2)
{
  ?>

      <?php
  if($_SESSION["level"] == "admin"){

   ?>
   <script>
   alert('บันทึกสำเร็จ');
   location.href='leave_data_userphp';
   </script>
   <?php

}elseif($_SESSION["level"] == "leader"){
  ?>

  <script>
  alert('บันทึกสำเร็จ');
  location.href='leave_data_user.php';
  </script>
  <?php

}elseif($_SESSION["level"] == "hr"){
  ?>

  <script>
  alert('บันทึกสำเร็จ');
  location.href='leave_data_user.php';
  </script>
  <?php

}elseif($_SESSION["level"] == "user"){
  ?>

  <script>
  alert('บันทึกสำเร็จ');
  location.href='leave_data_user.php';
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

if($objQuery2)
  {
    ?>

        <?php
    if($_SESSION["level"] == "admin"){

     ?>
     <script>
     alert('บันทึกสำเร็จ');
     location.href='leave_data_user.php';
     </script>
     <?php

  }elseif($_SESSION["level"] == "leader"){
    ?>

    <script>
    alert('บันทึกสำเร็จ');
    location.href='leave_data_user.php';
    </script>
    <?php

  }elseif($_SESSION["level"] == "hr"){
    ?>

    <script>
    alert('บันทึกสำเร็จ');
    location.href='leave_data_user.php';
    </script>
    <?php

  }elseif($_SESSION["level"] == "user"){
    ?>

    <script>
    alert('บันทึกสำเร็จ');
    location.href='leave_data_user.php';
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

if($objQuery2)
  {
    ?>

        <?php
    if($_SESSION["level"] == "admin"){

     ?>
     <script>
     alert('บันทึกสำเร็จ');
     location.href='leave_data_user.php';
     </script>
     <?php

  }elseif($_SESSION["level"] == "leader"){
    ?>

    <script>
    alert('บันทึกสำเร็จ');
    location.href='leave_data_user.php';
    </script>
    <?php

  }elseif($_SESSION["level"] == "hr"){
    ?>

    <script>
    alert('บันทึกสำเร็จ');
    location.href='leave_data_user.php';
    </script>
    <?php

  }elseif($_SESSION["level"] == "user"){
    ?>

    <script>
    alert('บันทึกสำเร็จ');
    location.href='leave_data_user.php';
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
