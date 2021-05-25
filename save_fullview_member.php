<html>
<head>
<title>Update Data</title>
</head>
<body>
<?php
session_start();

include 'connect.php';
$strSQL = "UPDATE member SET ";
$strSQL .="username = '".$_POST["username"]."' ";
$strSQL .=",password= '".$_POST["password"]."' ";
$strSQL .=",sex= '".$_POST["gender"]."' ";
$strSQL .=",frontname = '".$_POST["gender2"]."' ";
$strSQL .=",start_work = '".$_POST["start_work"]."' ";
$strSQL .=",nameen = '".$_POST["nameen"]."' ";
$strSQL .=",nameth = '".$_POST["nameth"]."' ";
$strSQL .=",fname = '".$_POST["fname"]."' ";
$strSQL .=",grade = '".$_POST["grade"]."' ";
$strSQL .=",nationnality = '".$_POST["nationnality"]."' ";
$strSQL .=",section = '".$_POST["section"]."' ";
$strSQL .=",status = '".$_POST["status"]."' ";
$strSQL .=",surnameen = '".$_POST["surnameen"]."' ";
$strSQL .=",surnameth = '".$_POST["surnameth"]."' ";
$strSQL .=",kind_work = '".$_POST["kind_work"]."' ";
$strSQL .=",company = '".$_POST["company"]."' ";
$strSQL .=",email = '".$_POST["email"]."' ";
$strSQL .=",address = '".$_POST["address"]."' ";
$strSQL .="WHERE user_id = '".$_GET["user_id"]."' ";

$objQuery2 = mysqli_query($objCon,$strSQL);
if($objQuery2)
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
