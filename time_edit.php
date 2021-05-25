<?php
if($objResult5['kind_work']=="office" && $objResult2['kind_leave']=="ลากิจ")
{

//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult10 = $objResult2['summary_time'];


$day = floor($timeresult10/3600/8.5);

$hour = floor($timeresult10/3600);
$T_minute = $timeresult10 % 3600;
$minute = floor($T_minute / 60);

//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult9 = $objResult5['business_time'];
$day2 = floor($timeresult9/3600/8.5);
$hour2 = floor($timeresult9/3600);
$T_minute2 = $timeresult9 % 3600;
$minute2 = floor($T_minute / 60);
?>
<td><?php echo "$day วัน หรือ $hour ชั่วโมง $minute นาที";?></td>
<td><?php echo "$day2 วัน หรือ $hour2 ชั่วโมง $minute2 นาที";?></td>




<?php
}elseif($objResult5['kind_work']=='factory' && $objResult2['kind_leave']=="ลากิจ"){


//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult10 = $objResult2['summary_time'];
$day = floor($timeresult10/3600/8.0);
$hour = floor($timeresult10/3600);
$T_minute = $timeresult10 % 3600;
$minute = floor($T_minute / 60);
//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult9 = $objResult5['business_time'];
$day2 = floor($timeresult9/3600/8.0);
$hour2 = floor($timeresult9/3600);
$T_minute2 = $timeresult9 % 3600;
$minute2 = floor($T_minute / 60);
?>
  <td><?php echo "$day วัน หรือ $hour ชั่วโมง $minute นาที";?></td>
  <td><?php echo "$day2 วัน หรือ $hour2 ชั่วโมง $minute2 นาที";?></td>

<?php
}elseif($objResult5['kind_work']=="office" && $objResult2['kind_leave']=="ลาป่วย"){
//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult10 = $objResult2['summary_time'];
$day = floor($timeresult10/3600/8.5);
$hour = floor($timeresult10/3600);
$T_minute = $timeresult10 % 3600;
$minute = floor($T_minute / 60);

//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult9 = $objResult5['sicktime'];
$day2 = floor($timeresult9/3600/8.5);
$hour2 = floor($timeresult9/3600);
$T_minute2 = $timeresult9 % 3600;
$minute2 = floor($T_minute / 60);
?>
<td><?php echo "$day วัน หรือ $hour ชั่วโมง $minute นาที";?></td>
<td><?php echo "$day2 วัน หรือ $hour2 ชั่วโมง $minute2 นาที";?></td>

<?php
}elseif($objResult5['kind_work']=="factory" && $objResult2['kind_leave']=="ลาป่วย"){
//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult10 = $objResult2['summary_time'];
$day = floor($timeresult10/3600/8.0);
$hour = floor($timeresult10/3600);
$T_minute = $timeresult10 % 3600;
$minute = floor($T_minute / 60);

//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult9 = $objResult5['sicktime'];
$day2 = floor($timeresult9/3600/8.0);
$hour2 = floor($timeresult9/3600);
$T_minute2 = $timeresult9 % 3600;
$minute2 = floor($T_minute / 60);
?>
<td><?php echo "$day วัน หรือ $hour ชั่วโมง $minute นาที";?></td>
<td><?php echo "$day2 วัน หรือ $hour2 ชั่วโมง $minute2 นาที";?></td>

<?php
}elseif($objResult5['kind_work']=="office" && $objResult2['kind_leave']=="ลาพักผ่อน"){

//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult10 = $objResult2['summary_time'];
$day = floor($timeresult10/3600/8.5);
$hour = floor($timeresult10/3600);
$T_minute = $timeresult10 % 3600;
$minute = floor($T_minute / 60);

//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult9 = $objResult5['vacation_time'];
$day2 = floor($timeresult9/3600/8.5);
$hour2 = floor($timeresult9/3600);
$T_minute2 = $timeresult9 % 3600;
$minute2 = floor($T_minute / 60);
?>
<td><?php echo "$day วัน หรือ $hour ชั่วโมง $minute นาที";?></td>
<td><?php echo "$day2 วัน หรือ $hour2 ชั่วโมง $minute2 นาที";?></td>
<?php

}elseif($objResult5['kind_work']=="factory" && $objResult2['kind_leave']=="ลาพักผ่อน")
{
//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult10 = $objResult2['summary_time'];
$day = floor($timeresult10/3600/8.0);
$hour = floor($timeresult10/3600);
$T_minute = $timeresult10 % 3600;
$minute = floor($T_minute / 60);

//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult9 = $objResult5['vacation_time'];
$day2 = floor($timeresult9/3600/8.0);
$hour2 = floor($timeresult9/3600);
$T_minute2 = $timeresult9 % 3600;
$minute2 = floor($T_minute / 60);
?>
<td><?php echo "$day วัน หรือ $hour ชั่วโมง $minute นาที";?></td>
<td><?php echo "$day2 วัน หรือ $hour2 ชั่วโมง $minute2 นาที";?></td>
<?php

}elseif($objResult5['kind_work']=="office" && $objResult2['kind_leave']=="ลากิจไม่รับค่าจ้าง")
{
//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult10 = $objResult2['summary_time'];
$day = floor($timeresult10/3600/8.5);
$hour = floor($timeresult10/3600);
$T_minute = $timeresult10 % 3600;
$minute = floor($T_minute / 60);

//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult9 = $objResult5['npbusiness_time'];
$day2 = floor($timeresult9/3600/8.0);
$hour2 = floor($timeresult9/3600);
$T_minute2 = $timeresult9 % 3600;
$minute2 = floor($T_minute / 60);
?>
<td><?php echo "$day วัน หรือ $hour ชั่วโมง $minute นาที";?></td>
<td><?php echo "$day2 วัน หรือ $hour2 ชั่วโมง $minute2 นาที";?></td>
<?php

}elseif($objResult5['kind_work']=="factory" && $objResult2['kind_leave']=="ลากิจไม่รับค่าจ้าง")
{
//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult10 = $objResult2['summary_time'];
$day = floor($timeresult10/3600/8.0);
$hour = floor($timeresult10/3600);
$T_minute = $timeresult10 % 3600;
$minute = floor($T_minute / 60);

//function changetimes($timeresult10){
//$thistime = $timeresult;
//$day = floor($thistime/3600/8.5);
//$hour = floor($thistime/3600);
//$T_minute = $thistime % 3600;

//$minute = floor($T_minute / 60);
//$second = $T_minute % 60;

//$word2 = " $day วัน หรือ $hour ชั่วโมง $minute นาที";

//return $word2;



$timeresult9 = $objResult5['npbusiness_time'];
$day2 = floor($timeresult9/3600/8.0);
$hour2 = floor($timeresult9/3600);
$T_minute2 = $timeresult9 % 3600;
$minute2 = floor($T_minute / 60);
?>
<td><?php echo "$day วัน หรือ $hour ชั่วโมง $minute นาที";?></td>
<td></td>
<?php

}
?>

<?php


if($objResult2['status']=="approve"){
?>
<td><label><?php echo $objResult2['status']?></label><td>

</tr>
<?php
}else{
?>
<td>	<div class="form-group">

<select class="form-control" id="approve" name="approve">
<option value="approve">อนุมัติ</option>
<option value="non_approve">ไม่อนุมัติ</option>

</select></td>

<td><button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">บันทึก</button><td>

<?php
}
?>
</form>


</tr>
