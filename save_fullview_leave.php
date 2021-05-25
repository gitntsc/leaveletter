<html>
<head>
<title>Update Data</title>
</head>
<body>
<?php
session_start();
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
$summary = DateDiff($_POST['strdate'],$_POST['lastdate']);
$summary2 = TimeDiff($_POST['strtime'],$_POST['lasttime']);

include 'connect.php';
$strSQL3 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
$objQuery3 = mysqli_query($objCon,$strSQL3);
$objResult3 = mysqli_fetch_array($objQuery3,MYSQLI_ASSOC);

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






$_POST["summary_time"] = $summary;


include 'connect.php';
echo $strSQL = "UPDATE leave_tbl SET kind_leave  = '".$_POST["leave"]."',reason  = '".$_POST["reason"]."' ,strdate =  '".$_POST["strdate"]."',
lastdate = '".$_POST["lastdate"]."',summary_time = '".$_POST["summary_time"]."' WHERE leave_id  = '".$_GET["leave_id"]."' ";



$objQuery = mysqli_query($objCon,$strSQL);


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

</body>
</html>
