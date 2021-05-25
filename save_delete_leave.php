<?php

session_start();

date_default_timezone_set("Asia/Bangkok");
$time = date('Y-m-d H:i:s');
$_POST["time"] = $time;
$event = "save_delete_leave";
$_POST["event"] = $event;
$_POST['username'] = $_SESSION['username'];


include 'connect.php';
$strSQL = "DELETE FROM leave_tbl WHERE leave_id = '".$_GET['leave_id']."' ";
$objQuery = mysqli_query($objCon,$strSQL);

	$strSQL2 = "INSERT INTO log_file (username,event,times) VALUES ('".$_POST["username"]."','".$_POST["event"]."','".$_POST["time"]."')";
	$objQuery2 = mysqli_query($objCon,$strSQL2);



if($objQuery)
{
	?>

			<?php
	if($_SESSION["level"] == "admin"){

	 ?>
	 <script>
	 alert('บันทึกสำเร็จ');
	 location.href='admin_page.php';
	 </script>
	 <?php

}elseif($_SESSION["level"] == "hr"){
	?>

	<script>
	alert('บันทึกสำเร็จ');
	location.href='hr_page.php';
	</script>
	<?php

}elseif($_SESSION["level"] == "leader"){
	?>

	<script>
	alert('บันทึกสำเร็จ');
	location.href='leader_page.php';
	</script>
	<?php

}elseif($_SESSION["level"] == "user"){
	?>

	<script>
	alert('บันทึกสำเร็จ');
	location.href='user_page.php';
	</script>
	<?php
}else{
	header("location:index.php");
	echo "not success";
}
}





mysqli_close($objCon);
?>
