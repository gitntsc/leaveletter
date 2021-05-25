<?php
include "connect.php";
session_start();
$total = null;
$year = '2020';
$_POST['strdate'] = '2020-12-12';
$_POST['lastdate'] = '2020-12-25';
$_POST['strtime']  = '00:00:00';
$_POST['lasttime'] = '00:00:00';

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
  $total = $total + $summary;
if($vacation_time < $total){
  echo "fuck";

}else{
  echo "no";
}
  ?>
