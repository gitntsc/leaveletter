<?php
session_start();
include "connect.php";
$strSQL = "SELECT * FROM member";
$objQuery = mysqli_query($objCon,$strSQL);




date_default_timezone_set("Asia/Bangkok");
	$time2 = date('Y-m-d');


?>
<?php
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

while ($objResult= mysqli_fetch_assoc($objQuery))
{
  $time1=$objResult['start_work'];


	$id = $objResult['user_id'];
	$username = $objResult['username'];
	echo $username."<br>";
 $kind_work = $objResult['kind_work'];
 $day1= date("d-m",strtotime($time1));

 $day4 = date("Y",strtotime($time1));

 $day2 = date("d-m",strtotime($time2));
 $day3 = date("Y",strtotime($time2));

echo $day3."<br>";
echo $day4."<br>";

$timediff = DateDiff("$time1","$time2");
 $timediffs = DateDiff("$time1","$day4-12-31");
$day5 = $day3 -1 ;

 $dayre = DateDiff("$time1","$day5-12-31");
 echo $dayre."<br>";
 echo $timediffs."<br>";

 $lastdayre = $dayre - $timediffs;
  echo $lastdayre."<br>";

if($kind_work=='office')
{
	if($day3==$day4)
	{
		if($timediffs>1 && $timediffs<61){
	 	 $vacation = (1*60*60*8.5);
	 }elseif($timediffs>61 && $timediffs<121){
	 	 $vacation = (2*60*60*8.5);
	 }elseif($timediffs>121 && $timediffs<181){
	 	 $vacation = (3*60*60*8.5);
	 }elseif($timediffs>181 && $timediffs<241){
	 	 $vacation = (4*60*60*8.5);
	 }elseif($timediffs>241 && $timediffs<301){
	 	 $vacation = (5*60*60*8.5);
	 }elseif($timediffs>301 && $timediffs<360){
	 	 $vacation = (6*60*60*8.5);
	  }else{
	  	$vacation = (6*60*60*8.5);
	  }
	}else{

			if($lastdayre>1460 && $lastdayre<2190)
			{
		 $vacation = (8*60*60*8.5);
			}elseif($lastdayre >2190 && $lastdayre <3650)
			{
			$vacation = (10*60*60*8.5);

			}elseif($lastdayre>3650)
			{
		 $vacation = (12*60*60*8.5);

			}else {
				$vacation = (6*60*60*8.5);
			}

}
$_POST['vacation'] = $vacation;
$_POST['user_id'] = $id;
$strSQL2 = "UPDATE member SET vacation_time = '".$_POST['vacation']."'WHERE user_id = '".$_POST['user_id']."'";
$objQuery2 = mysqli_query($objCon,$strSQL2);
$_POST['exvacation'] = $vacation;
 $strSQL6 = "UPDATE member SET exvacation_time = '".$_POST['exvacation']."'WHERE user_id = '".$_POST['user_id']."'";
$objQuery6 = mysqli_query($objCon,$strSQL6);
}else{
	if($day3==$day4)
	{
		if($timediff>1 && $timediff<61){
		 $vacation = (1*60*60*8);
		}elseif($timediff>61 && $timediff<121){
		 $vacation = (2*60*60*8);
		}elseif($timediff>121 && $timediff<181){
		 $vacation = (3*60*60*8);
		}elseif($timediff>181 && $timediff<241){
		 $vacation = (4*60*60*8);
		}elseif($timediff>241 && $timediff<301){
		 $vacation = (5*60*60*8);
		}elseif($timediff>301 && $timediff<360){
		 $vacation = (6*60*60*8);
		}else{
			$vacation = (6*60*60*8);
		}
	}else{

			if($lastdayre>1460 && $lastdayre<2190)
			{
		 $vacation = (8*60*60*8);
			}elseif($lastdayre>2190 && $lastdayre<3650)
			{
			$vacation = (10*60*60*8);

			}elseif($lastdayre>3650)
			{
		 $vacation = (12*60*60*8);

			}else {
				$vacation = (6*60*60*8);
			}

}
$_POST['vacation'] = $vacation;
$_POST['user_id'] = $id;
 $strSQL2 = "UPDATE member SET vacation_time = '".$_POST['vacation']."'WHERE user_id = '".$_POST['user_id']."'";
$objQuery2 = mysqli_query($objCon,$strSQL2);
$_POST['exvacation'] = $vacation;
 $strSQL6 = "UPDATE member SET exvacation_time = '".$_POST['exvacation']."'WHERE user_id = '".$_POST['user_id']."'";
$objQuery6 = mysqli_query($objCon,$strSQL6);
}
if($kind_work=='office'){
	$business_time = 3*60*60*8.5;

}else{

	$business_time = 3*60*60*8;

}
$_POST['business_time'] = $business_time;
 $strSQL3 = "UPDATE member SET business_time = '".$_POST['business_time']."'WHERE user_id = '".$_POST['user_id']."' ";
$objQuery3 = mysqli_query($objCon,$strSQL3);
$_POST['exbusiness_time'] = $business_time;
$strSQL5 = "UPDATE member SET exbusiness_time = '".$_POST['exbusiness_time']."'WHERE user_id = '".$_POST['user_id']."' ";
$objQuery3 = mysqli_query($objCon,$strSQL5);

if($kind_work=='office'){
	$sicktime = 30*60*60*8.5;
}else{
	$sicktime = 30*60*60*8;
}
$_POST['sicktime'] = $sicktime;
$_POST['exsicktime'] = $sicktime;
$strSQL4 = "UPDATE member SET sicktime = '".$_POST['sicktime']."' WHERE user_id = '".$_POST['user_id']."'";
$objQuery4 = mysqli_query($objCon,$strSQL4);
 $strSQL7 = "UPDATE member SET exsicktime = '".$_POST['exsicktime']."' WHERE user_id = '".$_POST['user_id']."'";
$objQuery7 = mysqli_query($objCon,$strSQL7);
}
if($objQuery2 && $objQuery3 && $objQuery4){
	echo "complete";
	mysqli_close($objCon);
}else{

echo "error";

}

 //

 //
 //





   //echo $vacation,"<br>";
  //echo $day1= date("d-m",strtotime($time1)),"<br>";
  //echo $day2 = date("d-m",strtotime($time2)),"<br>";
  //echo $day3 = date("yy",strtotime($time2)),"<br>";

  //$dayre = DateDiff("$day1-$day3","31-12-$day3");
  //echo $dayre;



?>
