<?php
session_start();
include 'connect.php';

$strSQL = "SELECT * FROM member WHERE kind_work = 'officer'";
$objQuery = mysqli_query($objCon,$strSQL);

while($objResult= mysqli_fetch_assoc($objQuery)){
    $user_id = $objResult['user_id'];
echo $strSQL2 = "UPDATE member SET  kind_work = 'office' WHERE user_id = '".$user_id."'";
    $objQuery2 = mysqli_query($objCon,$strSQL2);

}

?>
