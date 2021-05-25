<?php

	session_start();
	date_default_timezone_set("Asia/Bangkok");
		$time = date('Y-m-d H:i:s');
		$_POST["time"] = $time;
		$event = "logout";
		$_POST["event"] = $event;
		$_POST["username"] = $_SESSION["username"];


		include 'connect.php';
		$strSQL = "INSERT INTO log_file (username,event,times) VALUES ('".$_POST["username"]."','".$_POST["event"]."','".$_POST["time"]."')";
		$objQuery = mysqli_query($objCon,$strSQL);

	session_destroy();
	header("location:index.php");
?>
