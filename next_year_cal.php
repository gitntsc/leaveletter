<?php
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

			$business_time = $objResult5['business_time'];


			$totals = $business_time - $total;
			echo $totals;

			echo $strSQL7 = "UPDATE member SET business_time = '".$totals."' WHERE username = '".$_SESSION['username']."'";
			$objQuery7 = mysqli_query($objCon,$strSQL7);



	  	//$objResult2['username'];
		 		//$objResult2['business_time']."<br>";
				//$total = $objResult2['business_time']-$total;

		  //$total."<br>";
		  //$strSQL4 = "UPDATE member SET business_time = '".$total."' WHERE username = '".$username."'";
			//$objQuery4 = mysqli_query($objCon,$strSQL4);

	  // $strSQL4 = "UPDATE member SET business_time = '".$total."' WHERE username = '".$username."'";    //$objQuery4 = mysqli_query($objCon,$strSQL4);




		 //$business_time = $objResult2['business_time'];
    //$total = $business_time - $summary_time;
    //$total."<br>";








 ?>
