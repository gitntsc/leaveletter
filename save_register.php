<?php
    session_start();
    include 'connect.php';


    if(trim($_POST["user_id"]) == "")
  	{
  		echo "Please input User ID!";
  		exit();
  	}




	if(trim($_POST["nameen"]) == "")
	{
		echo "Please input Name!";
		exit();
	}
	if(trim($_POST["surnameen"]) == "")
	{
		echo "Please input Surname!";
		exit();
	}
  if(trim($_POST["nameth"]) == "")
	{
		echo "Please input Surname!";
		exit();
	}
  if(trim($_POST["surnameth"]) == "")
	{
		echo "Please input Surname!";
		exit();
	}
	if(trim($_POST["fname"]) == "")
	{
		echo "Please input Fname!";
		exit();
	}

	if(trim($_POST["company"]) == "")
	{
		echo "Please input level!";
		exit();
	}
  if(trim($_POST["section"]) == "")
  {
    echo "Please input level!";
    exit();
  }
  if(trim($_POST["level"]) == "")
  {
    echo "Please input level!";
    exit();
  }

  if($_POST['kind_work']=="office")
  {
  $exbusiness_time = "0";
  $_POST["exbusiness_time"] = $exbusiness_time;
  $business_time  = "0";
  $_POST['business_time'] = $business_time;


  $exsick_time = "0";
  $_POST['exsicktime'] = $exsick_time;
  $sick_time = "0";
  $_POST['sicktime'] = $sick_time;

  $exvacation_time = "0";
  $_POST['exvacation_time'] = $exvacation_time;
  $vacation_time = "0";
  $_POST['vacation_time'] = $vacation_time;
}else{
  $exbusiness_time = "0";
  $_POST["exbusiness_time"] = $exbusiness_time;
  $business_time  = "0";
  $_POST['business_time'] = $business_time;


  $exsick_time = "0";
  $_POST['exsicktime'] = $exsick_time;
  $sick_time = "0";
  $_POST['sicktime'] = $sick_time;

  $exvacation_time = "0";
  $_POST['exvacation_time'] = $exvacation_time;
  $vacation_time = "0";
  $_POST['vacation_time'] = $vacation_time;
}
$_POST['pr1'] = 1;
$_POST['ct0'] = 1;
$_POST['ct1'] = 1;
$_POST['ct2'] = 1;
$_POST['ct3'] = 1;





	echo $strSQL = "SELECT * FROM member WHERE user_id = '".trim($_POST['user_id'])."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if($objResult)
	{
			echo "ID already exists!";
	}
	else
	{

	 echo  $strSQL = "INSERT INTO member (user_id,frontname,nameth,surnameth,nameen,surnameen,fname,level_job,grade,birthday,sex,nationnality,section,
      people_member,kind_work,start_work,level,company,leader1,leader2,email,status,address,exbusiness_time,exvacation_time,exsicktime,vacation_time,sicktime,business_time,pr1,ct0,ct1,ct2,ct3) VALUES ('".$_POST["user_id"]."',
	'".$_POST["frontname"]."','".$_POST["nameth"]."','".$_POST["surnameth"]."','".$_POST["nameen"]."','".$_POST["surnameen"]."','".$_POST["fname"]."','".$_POST["level_job"]."','".$_POST["grade"]."'
  ,'".$_POST["birthday"]."','".$_POST["sex"]."','".$_POST["nationnality"]."','".$_POST["section"]."','".$_POST["people_member"]."','".$_POST["kind_work"]."','".$_POST["start_work"]."','".$_POST["level"]."',
'".$_POST["company"]."','".$_POST["leader1"]."','".$_POST["leader2"]."','".$_POST["email"]."','".$_POST["status"]."','".$_POST["address"]."','".$_POST["exbusiness_time"]."','".$_POST["exvacation_time"]."','".$_POST["exsicktime"]."'
 ,'".$_POST["vacation_time"]."','".$_POST["sicktime"]."','".$_POST["business_time"]."','".$_POST['pr1']."','".$_POST['ct0']."','".$_POST['ct1']."','".$_POST['ct2']."','".$_POST['ct3']."')";
		$objQuery = mysqli_query($objCon,$strSQL);

		date_default_timezone_set("Asia/Bangkok");
	$time = date('Y-m-d H:i:s');
	$_POST["time"] = $time;
	$event = "register";
	$_POST["event"] = $event;
  $_POST['username'] = $_SESSION['username'];




	$strSQL2 = "INSERT INTO log_file (username,event,times) VALUES ('".$_POST["username"]."','".$_POST["event"]."','".$_POST["time"]."')";
	$objQuery2 = mysqli_query($objCon,$strSQL2);
}
if($objQuery2)
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
