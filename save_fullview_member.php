<html>
<head>
<title>Update Data</title>
</head>
<body>
<?php
session_start();

include 'connect.php';
 $strSQL = "UPDATE member SET sex = '".$_POST['gender']."',frontname = '".$_POST['gender2']."',
start_work = '".$_POST["start_work"]."',nameen = '".$_POST["nameen"]."' ,nameth = '".$_POST["nameth"]."', fname = '".$_POST["fname"]."' ,grade = '".$_POST["grade"]."' ,
nationnality = '".$_POST["nationnality"]."',section = '".$_POST["section"]."' ,leader1 = '".$_POST["leader1"]."',leader2 = '".$_POST["leader2"]."' ,status = '".$_POST["status"]."' ,
surnameen = '".$_POST["surnameen"]."',surnameth = '".$_POST["surnameth"]."',kind_work = '".$_POST["kind_work"]."',company = '".$_POST["company"]."' ,email = '".$_POST["email"]."',
address = '".$_POST["address"]."' where user_id = '".$_GET["user_id"]."'";
$objQuery = mysqli_query($objCon,$strSQL);


if($objQuery)
{
	?>

			<?php
	if($_SESSION["level"] == "admin"){

	 ?>
	 <script>
	 alert('บันทึกสำเร็จ');
	 location.href='member.php';
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



</body>
</html>
