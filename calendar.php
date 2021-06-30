<?php
session_start();
if($_SESSION['user_id'] == "")
{
  echo "Please Login!";
  header("location:index.php");
}

error_reporting(0);

?>
<html>
<head>
	<link rel="stylesheet" href="fullcalendar/fullcalendar.min.css"/>
	<script src="fullcalendar/lib/jquery.min.js"></script>
	<script src="fullcalendar/lib/moment.min.js"></script>
	<script src="fullcalendar/fullcalendar.min.js"></script>
</head>
<input
    action="action"
    onclick="window.history.go(-1); return false;"
    type="submit"
    value="Back"
/>

<?php
if($_SESSION['level']=='hr'){
include 'calendar2.php';
}elseif($_SESSION['level']=='admin'){
    include 'calendar2.php';
}elseif($_SESSION['level']=='leader'){
include 'calendar3.php';
}else{
    include 'calendar4.php';
}
 ?>

</html>
