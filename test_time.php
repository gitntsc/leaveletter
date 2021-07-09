<?php
function DateDiff($strDate1, $strDate2)
{
  return (strtotime($strDate2) - strtotime($strDate1)) /  (60 * 60 * 24);  // 1 day = 60*60*24
}
function TimeDiff($strTime1, $strTime2)
{
  return (strtotime($strTime2) - strtotime($strTime1)) /  (60 * 60); // 1 Hour =  60*60
}
function DateTimeDiff($strDateTime1, $strDateTime2)
{
  return (strtotime($strDateTime2) - strtotime($strDateTime1)) /  (60 * 60); // 1 Hour =  60*60
}
include "connect.php";
$_SESSION['username'] = 'weerayooth';
$strSQL10 = "SELECT * FROM member where username = '" . $_SESSION['username'] . "'";
$objQuery10 = mysqli_query($objCon, $strSQL10);
$objResult10 = mysqli_fetch_array($objQuery10, MYSQLI_ASSOC);


date_default_timezone_set("Asia/Bangkok");
$checkday = date('Y-m-d');
$time1 = $objResult10['start_work'];

$timediff = DateDiff("$time1", "$checkday");

$timediff;
$ct1 = $objResult10['ct1'];
$ct1;
$ct2 = $objResult10['ct2'];
$ct3 = $objResult10['ct3'];
$time10 = date("Y-m-d", strtotime("+1 year", strtotime($time1)));
$time11 = date('Y', strtotime($time10));
$time12 = date("$time11-12-31");

$timeresult = DateDiff("$time10", "$time12");

$timeresult;

$last_time = $timeresult + 365;
$last_time2 = floor($last_time);
$timeresult;
//	echo "$timediff > 365  and $timediff<$last_time";
if ($timediff > 365 && $timediff < $last_time) {
  if ($objResult10['kind_work'] == "office") {
    if ($objResult10['ct0'] == "1") {
      if ($timeresult > 1 && $timeresult < 61) {
        $_POST['exvacation_time'] = (1 * 60 * 60 * 8.5);
        echo    $strSQL30 = "UPDATE member SET exvacation_time = '" . $_POST['exvacation_time'] . "',ct0 = '0'";
        $objQuery30 = mysqli_query($objCon, $strSQL30);
      } elseif ($timeresult > 61 && $timeresult < 131) {
        $_POST['exvacation_time'] = (2 * 60 * 60 * 8.5);
        $strSQL30 = "UPDATE member SET exvacation_time = '" . $_POST['exvacation_time'] . "',ct0 = '0'";
        $objQuery30 = mysqli_query($objCon, $strSQL30);
      } elseif ($timeresult > 131 && $timeresult < 181) {
        $_POST['exvacation_time'] = (3 * 60 * 60 * 8.5);
        echo  $strSQL30 = "UPDATE member SET exvacation_time = '" . $_POST['exvacation_time'] . "',ct0 = '0'";
        $objQuery30 = mysqli_query($objCon, $strSQL30);
      } elseif ($timeresult > 181 && $timeresult < 241) {
        $_POST['exvacation_time'] = (4 * 60 * 60 * 8.5);
        echo  $strSQL30 = "UPDATE member SET exvacation_time = '" . $_POST['exvacation_time'] . "',ct0 = '0'";
        $objQuery30 = mysqli_query($objCon, $strSQL30);
      } elseif ($timeresult > 241 && $timeresult < 301) {
        $_POST['exvacation_time'] = (5 * 60 * 60 * 8.5);
        echo  $strSQL30 = "UPDATE member SET exvacation_time = '" . $_POST['exvacation_time'] . "',ct0 = '0'";
        $objQuery30 = mysqli_query($objCon, $strSQL30);
      } elseif ($timeresult > 301 && $timeresult < 360) {
        $_POST['exvacation_time'] = (6 * 60 * 60 * 8.5);
        echo  $strSQL30 = "UPDATE member SET exvacation_time = '" . $_POST['exvacation_time'] . "',ct0 = '0'";
        $objQuery30 = mysqli_query($objCon, $strSQL30);
      } else {
        $_POST['exvacation_time'] = (6 * 60 * 60 * 8.5);
        echo  $strSQL30 = "UPDATE member SET exvacation_time = '" . $_POST['exvacation_time'] . "',ct0 = '0'";
        $objQuery30 = mysqli_query($objCon, $strSQL30);
      }
    }
  }
}
