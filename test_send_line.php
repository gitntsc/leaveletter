<?php
 include 'connect.php';
 session_start();
date_default_timezone_set("Asia/Bangkok");
  $time2 = date('Y');
$time2;
$total = null;

include "connect.php";
echo	$strSQL = "SELECT * FROM leave_tbl WHERE username = '".$_SESSION['username']."' and kind_leave = 'ลากิจ'and strdate LIKE '%$time2%' and status = 'approve'";
$objQuery  = mysqli_query($objCon,$strSQL);
while ($objResult= mysqli_fetch_assoc($objQuery))
{
 $objResult['summary_time'];
$total = $objResult['summary_time']+$total;
$total;

}

$total;

      $strSQL5 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
      $objQuery5 = mysqli_query($objCon,$strSQL5);
      $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);

      $business_time = $objResult5['exbusiness_time'];


      $totals = $business_time - $total;
      echo $totals;

      echo $strSQL7 = "UPDATE member SET business_time = '".$totals."' WHERE username = '".$_SESSION['username']."'";
      $objQuery7 = mysqli_query($objCon,$strSQL7);
      echo	$strSQL = "SELECT * FROM leave_tbl WHERE username = '".$_SESSION['username']."' and kind_leave = 'ลาป่วย'and strdate LIKE '%$time2%' and status = 'approve'";
          $objQuery  = mysqli_query($objCon,$strSQL);
          while ($objResult= mysqli_fetch_assoc($objQuery))
          {
           $objResult['summary_time'];
          $total = $objResult['summary_time']+$total;
          $total;

          }

          $total;

                $strSQL5 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
                $objQuery5 = mysqli_query($objCon,$strSQL5);
                $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);

                $sicktime = $objResult5['exsicktime'];


                $totals = $sicktime - $total;
                echo $totals;

                echo $strSQL7 = "UPDATE member SET sicktime = '".$totals."' WHERE username = '".$_SESSION['username']."'";
                $objQuery7 = mysqli_query($objCon,$strSQL7);


        echo	$strSQL = "SELECT * FROM leave_tbl WHERE username = '".$_SESSION['username']."' and kind_leave = 'ลาพักผ่อน' and strdate LIKE '%$time2%' and status = 'approve'";
                    $objQuery  = mysqli_query($objCon,$strSQL);
                    while ($objResult= mysqli_fetch_assoc($objQuery))
                    {
                     $objResult['summary_time'];
                    $total = $objResult['summary_time']+$total;
                    $total;

                    }

                    $total;

                          $strSQL5 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
                          $objQuery5 = mysqli_query($objCon,$strSQL5);
                          $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);

                          $vacationtime = $objResult5['exvacation_time'];


                          $totals = $vacationtime - $total;
                          echo $totals;

                          echo $strSQL7 = "UPDATE member SET vacation_time = '".$totals."' WHERE username = '".$_SESSION['username']."'";
                          $objQuery7 = mysqli_query($objCon,$strSQL7);

?>
