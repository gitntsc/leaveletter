<?php

date_default_timezone_set("Asia/Bangkok");
  $time2 = date('Y');
$time2;
$total1 = null;
$total2 = null;
$total3 = null;
$_SESSION['username'] = 'nopporn';

include "connect.php";
 	$strSQL = "SELECT * FROM leave_tbl WHERE username = '".$_SESSION['username']."' and kind_leave = 'ลากิจ'and strdate LIKE '%$time2%' and status = 'approve'";
$objQuery  = mysqli_query($objCon,$strSQL);
while ($objResult= mysqli_fetch_assoc($objQuery))
{
$objResult['summary_time'];
$total1 = $objResult['summary_time']+$total1;
$total1;

}

$total1;

      $strSQL5 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
      $objQuery5 = mysqli_query($objCon,$strSQL5);
      $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);

      $business_time = $objResult5['exbusiness_time'];


      $totals1 = $business_time - $total1;
       $totals1;

      $strSQL7 = "UPDATE member SET business_time = '".$totals1."' WHERE username = '".$_SESSION['username']."'";
      $objQuery7 = mysqli_query($objCon,$strSQL7);






 $strSQL13 = "SELECT * FROM leave_tbl WHERE username = '".$_SESSION['username']."' and kind_leave = 'ลาป่วย'and strdate LIKE '%$time2%' and status = 'approve'";
      $objQuery13  = mysqli_query($objCon,$strSQL13);
      while ($objResult13= mysqli_fetch_assoc($objQuery13))
      {
     $objResult13['summary_time'];
      $total2 = $objResult13['summary_time']+$total2;
      $total2;

      }

      $total2;

            $strSQL5 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
            $objQuery5 = mysqli_query($objCon,$strSQL5);
            $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);

            $sicktime = $objResult5['exsicktime'];


            $totals2 = $sicktime - $total2;
             $totals2;

           $strSQL7 = "UPDATE member SET sicktime = '".$totals2."' WHERE username = '".$_SESSION['username']."'";
            $objQuery7 = mysqli_query($objCon,$strSQL7);


  	       $strSQL12 = "SELECT * FROM leave_tbl WHERE username = '".$_SESSION['username']."' and kind_leave = 'ลาพักผ่อน' and strdate LIKE '%$time2%' and status = 'approve'";
             $objQuery12  = mysqli_query($objCon,$strSQL12);
                while ($objResult12= mysqli_fetch_assoc($objQuery12))
                {
               $objResult['summary_time'];
                $total3 = $objResult12['summary_time']+$total3;
                $total3;

                }

                $total3;

                      $strSQL5 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
                      $objQuery5 = mysqli_query($objCon,$strSQL5);
                      $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);

                      $vacationtime = $objResult5['exvacation_time'];


                      $totals3 = $vacationtime - $total3;
                     $totals3;

                     $strSQL7 = "UPDATE member SET vacation_time = '".$totals3."' WHERE username = '".$_SESSION['username']."'";
                      $objQuery7 = mysqli_query($objCon,$strSQL7);






 ?>
