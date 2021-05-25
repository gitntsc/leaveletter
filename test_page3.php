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
	echo $username = $objResult['username'];
	echo $kind_work = $objResult['kind_work'];
	 $timediff = DateDiff("2017-06-26","2020-09-20");

 $timediff = DateDiff("$time1","$time2")."<br>";

	 $day1= date("d-m",strtotime($time1));
	 $day2 = date("d-m",strtotime($time2));
	 $day3 = date("yy",strtotime($time2));
 $dayre = DateDiff("$day1-$day3","31-12-$day3");
if($kind_work=='office')
{
	if($timediff<730)
	{
		if($dayre>1 && $dayre<61){
	 	 $vacation = (1*60*60*8.5);
	  }elseif($dayre>61 && $dayre<121){
	 	 $vacation = (2*60*60*8.5);
	  }elseif($dayre>121 && $dayre<181){
	 	 $vacation = (3*60*60*8.5);
	  }elseif($dayre>181 && $dayre<241){
	 	 $vacation = (4*60*60*8.5);
	  }elseif($dayre>241 && $dayre<301){
	 	 $vacation = (5*60*60*8.5);
	  }elseif($dayre>301 && $dayre<360){
	 	 $vacation = (6*60*60*8.5);
	  }else{
	  	$vacation = (6*60*60*8.5);
	  }
	}elseif($timediff>730){

			if($timediff>1460 && $timediff<2190)
			{
		 $vacation = (8*60*60*8.5);
			}elseif($timediff>2190 && $timediff<3650)
			{
			$vacation = (10*60*60*8.5);

			}elseif($timediff>3650)
			{
		 $vacation = (12*60*60*8.5);

			}else {
				$vacation = (6*60*60*8.5);
			}

}
$_POST['vacation'] = $vacation;
$_POST['user_id'] = $id;
echo $strSQL2 = "UPDATE member SET vacation_time = '".$_POST['vacation']."'WHERE user_id = '".$_POST['user_id']."'";
$objQuery2 = mysqli_query($objCon,$strSQL2);
}else{
	if($timediff<730)
	{
		if($dayre>1 && $dayre<61){
		 $vacation = (1*60*60*8);
		}elseif($dayre>61 && $dayre<121){
		 $vacation = (2*60*60*8);
		}elseif($dayre>121 && $dayre<181){
		 $vacation = (3*60*60*8);
		}elseif($dayre>181 && $dayre<241){
		 $vacation = (4*60*60*8);
		}elseif($dayre>241 && $dayre<301){
		 $vacation = (5*60*60*8);
		}elseif($dayre>301 && $dayre<360){
		 $vacation = (6*60*60*8);
		}else{
			$vacation = (6*60*60*8);
		}
	}elseif($timediff>730){

			if($timediff>1460 && $timediff<2190)
			{
		 $vacation = (8*60*60*8);
			}elseif($timediff>2190 && $timediff<3650)
			{
			$vacation = (10*60*60*8);

			}elseif($timediff>3650)
			{
		 $vacation = (12*60*60*8);

			}else {
				$vacation = (6*60*60*8);
			}

}
$_POST['vacation'] = $vacation;
$_POST['user_id'] = $id;
echo $strSQL2 = "UPDATE member SET vacation_time = '".$_POST['vacation']."'WHERE user_id = '".$_POST['user_id']."'";
$objQuery2 = mysqli_query($objCon,$strSQL2);
}
if($kind_work=='office'){
	$business_time = 3*60*60*8.5;

}else{

	$business_time = 3*60*60*8;

}
$_POST['business_time'] = $business_time;
echo $strSQL3 = "UPDATE member SET business_time = '".$_POST['business_time']."'WHERE user_id = '".$_POST['user_id']."' ";
$objQuery3 = mysqli_query($objCon,$strSQL3);

if($kind_work=='office'){
	$sicktime = 30*60*60*8.5;
}else{
	$sicktime = 30*60*60*8;
}
$_POST['sicktime'] = $sicktime;
echo $strSQL4 = "UPDATE member SET sicktime = '".$_POST['sicktime']."' WHERE user_id = '".$_POST['user_id']."'";
$objQuery4 = mysqli_query($objCon,$strSQL4);
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
