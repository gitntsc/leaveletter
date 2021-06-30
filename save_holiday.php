<?php
session_start();
include "connect.php";
$username = $_SESSION['username'];
$section = $_SESSION['section'];
$strSQL = "INSERT INTO holiday (holi_name,holi_str,holi_end,notice,username,section) values ('".$_POST['holi_name']."','".$_POST['holi_str']."','".$_POST['holi_end']."'
,'".$_POST['notice']."','".$username."','".$section."')";
$objQuery = mysqli_query($objCon,$strSQL);
if($objQuery){
    echo "<script>alert('บันทึกสำเร็จ')</script>";
    echo "<script>window.location.href='holiday.php'</script>";
}else{
    echo "<script>alert('พบข้อผิดพลาด')</script>";
    echo "<script>window.location.href='holiday.php'</script>";
}

?>