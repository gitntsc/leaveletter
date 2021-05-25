<?php
	session_start();

date_default_timezone_set("Asia/Bangkok");
	$time = date('Y-m-d H:i:s');
	$_POST["time"] = $time;
	$event = "login";
	$_POST["event"] = $event;

	include 'connect.php';
	$strSQL2 = "INSERT INTO log_file (username,event,times) VALUES ('".$_POST["username"]."','".$_POST["event"]."','".$_POST["time"]."')";
	$objQuery2 = mysqli_query($objCon,$strSQL2);





    include 'connect.php';
		$strSQL = "SELECT * FROM member WHERE Username = '".mysqli_real_escape_string($objCon,$_POST['username'])."'
		and Password = '".mysqli_real_escape_string($objCon,$_POST['password'])."'";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

	if(!$objResult)
	{

		?><script>
		alert('Password Incorrect Please Try Again');
		location.href='index.php';

		</script>

<?php
	}
	else
	{
			setcookie("username",$_POST['username'],time()+3600*24*356);
			setcookie("password",$_POST['password'],time()+3600*24*356);
			header("location:index.php");


			$_SESSION["user_id"] = $objResult["user_id"];
			$_SESSION["username"] = $objResult["username"];
			$_SESSION["level"] = $objResult["level"];
			$_SESSION["company"] = $objResult["company"];
			$_SESSION["leader1"] = $objResult["leader1"];
			$_SESSION["leader2"] = $objResult["leader2"];


			$_SESSION["password"]=$objResult["password"];
			$_SESSION["section"]=$objResult["section"];


			session_write_close();

			if($objResult["level"] == "admin"){
				header("location:admin_page.php");
			}elseif($objResult["level"] == "leader"){
				header("location:leader_page.php");
			}elseif($objResult["level"] == "user"){
				header("location:user_page.php");
			}elseif($objResult["level"] == "hr"){
				header("location:hr_page.php");

			}else{
				header("location:index.php");
			}


			function DateDiff($strDate1,$strDate2)
			{
					 return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
			}
			function TimeDiff($strTime1,$strTime2)
			{
					 return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
			}
			function DateTimeDiff($strDateTime1,$strDateTime2)
			{
					 return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
			}
			date_default_timezone_set("Asia/Bangkok");
			$today = date('Y-m-d');
			$str_time = $objResult['start_work'];
			$dateresult = DateDiff("$str_time","$today");
			$dateresult2 = floor($dateresult);
			$dateresult2;
			if($dateresult2>120 && $dateresult2<365){
				if($objResult['kind_work']=="office"){
				$_POST['exsicktime'] = "918000";
				$_POST['exbusiness_time'] = "91800";
				$strSQL25 = "UPDATE member SET exsicktime ='".$_POST['exsicktime']."',exbusiness_time = '".$_POST['exbusiness_time']."'";
				$objQuery25 = mysqli_query($objCon,$strSQL25);
			}else {
				$_POST['exsicktime'] = "864000";
				$_POST['exbusiness_time'] = "86400";
				$strSQL25 = "UPDATE member SET exsicktime ='".$_POST['exsicktime']."',exbusiness_time = '".$_POST['exbusiness_time']."'";
				$objQuery25 = mysqli_query($objCon,$strSQL25);
			}

			}
				$time2 = date('Y');
			$time2;
			$total1 = null;
			$total2 = null;
			$total3 = null;
			$total14 = null;

			include "connect.php";
				$strSQL = "SELECT * FROM leave_tbl WHERE username = '".$_SESSION['username']."' and kind_leave = 'ลากิจ'and strdate LIKE '%$time2%' and status = 'approve'";
			$objQuery  = mysqli_query($objCon,$strSQL);
			while ($objResult= mysqli_fetch_assoc($objQuery))
			{
			 $objResult['summary_time'];
			$total1 = $objResult['summary_time']+$total1;
			$total1;

			}

			$total1;

			      $strSQL5 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
			      $objQuery5 = mysqli_query($objCon,$strSQL5);
			      $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);

			      $business_time = $objResult5['exbusiness_time'];


			      $totals1 = $business_time - $total1;
			       $totals1;

			      $strSQL7 = "UPDATE member SET business_time = '".$totals1."' WHERE username = '".$_SESSION['username']."'";
			      $objQuery7 = mysqli_query($objCon,$strSQL7);

					$strSQL14 = "SELECT * FROM leave_tbl where username = '".$_SESSION['username']."' and kind_leave = 'ลากิจไม่รับค่าจ้าง' and strdate LIKE '%$time2%' and status ='approve'";
					$objQuery14 = mysqli_query($objCon,$strSQL14);
					while ($objResult14= mysqli_fetch_assoc($objQuery14))
					{
					 $objResult14['summary_time'];
					$total14 = $objResult14['summary_time']+$total14;
					$total14;

					}
					$strSQL15 = "UPDATE member SET npbusiness_time = '".$total14."' WHERE username = '".$_SESSION['username']."'";
					$objQuery15 = mysqli_query($objCon,$strSQL15);





				 $strSQL13 = "SELECT * FROM leave_tbl WHERE username = '".$_SESSION['username']."' and kind_leave = 'ลาป่วย'and strdate LIKE '%$time2%' and status = 'approve'";
			      $objQuery13  = mysqli_query($objCon,$strSQL13);
			      while ($objResult13= mysqli_fetch_assoc($objQuery13))
			      {
			      $objResult13['summary_time'];
			      $total2 = $objResult13['summary_time']+$total2;
			      $total2;

			      }

			      $total2;

			            $strSQL5 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
			            $objQuery5 = mysqli_query($objCon,$strSQL5);
			            $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);

			            $sicktime = $objResult5['exsicktime'];


			            $totals2 = $sicktime - $total2;
			             $totals2;

			           $strSQL7 = "UPDATE member SET sicktime = '".$totals2."' WHERE username = '".$_SESSION['username']."'";
			            $objQuery7 = mysqli_query($objCon,$strSQL7);


			  	       $strSQL12 = "SELECT * FROM leave_tbl WHERE username = '".$_SESSION['username']."' and kind_leave = 'ลาพักผ่อน' and strdate LIKE '%$time2%' and status = 'approve'";
			             $objQuery12  = mysqli_query($objCon,$strSQL12);
			                while ($objResult12= mysqli_fetch_assoc($objQuery12))
			                {
			               $objResult12['summary_time'];
			                $total3 = $objResult12['summary_time']+$total3;
			                $total3;

			                }

			                $total3;

			                      $strSQL5 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
			                      $objQuery5 = mysqli_query($objCon,$strSQL5);
			                      $objResult5 = mysqli_fetch_array($objQuery5,MYSQLI_ASSOC);

			                      $vacationtime = $objResult5['exvacation_time'];

			                      $totals3 = $vacationtime - $total3;
			                     $totals3;

			                     $strSQL7 = "UPDATE member SET vacation_time = '".$totals3."' WHERE username = '".$_SESSION['username']."'";
			                      $objQuery7 = mysqli_query($objCon,$strSQL7);

								  include "connect.php";
								 $strSQL10 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
														$objQuery10 = mysqli_query($objCon,$strSQL10);
														$objResult10 = mysqli_fetch_array($objQuery10,MYSQLI_ASSOC);


														date_default_timezone_set("Asia/Bangkok");
														$checkday = date('Y-m-d');
														$time1 = $objResult10['start_work'];

														$timediff = DateDiff("$time1","$checkday");

												 $timediff;
														$ct1 = $objResult10['ct1'];
													 $ct1;
														$ct2 = $objResult10['ct2'];
														$ct3 = $objResult10['ct3'];
														$time10 = date ("Y-m-d", strtotime("+1 year", strtotime($time1)));
														$time11 = date('Y',strtotime($time10));
														$time12 = date("$time11-12-31");

														$timeresult = DateDiff("$time10","$time12");

														$timeresult;

														$last_time = $timeresult + 365;
														$last_time2 = floor($last_time);
														$timeresult;
													//	echo "$timediff > 365  and $timediff<$last_time";
												if($timediff>365 && $timediff<$last_time){
													if($objResult10['kind_work']=="office"){
														if($objResult10['ct0']=="1"){
															if($timeresult>1 && $timeresult<61){
																$_POST['exvacation_time'] = (1*60*60*8.5);
														echo		$strSQL30 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',ct0 = '0'";
																$objQuery30 = mysqli_query($objCon,$strSQL30);
															}elseif($timeresult>61 && $timeresult<131){
																$_POST['exvacation_time'] = (2*60*60*8.5);
																$strSQL30 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',ct0 = '0'";
																$objQuery30 = mysqli_query($objCon,$strSQL30);
															}elseif($timeresult>131 && $timeresult<181){
																$_POST['exvacation_time'] = (3*60*60*8.5);
															echo	$strSQL30 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',ct0 = '0'";
																$objQuery30 = mysqli_query($objCon,$strSQL30);

															}elseif($timeresult>181 && $timeresult<241){
																$_POST['exvacation_time'] = (4*60*60*8.5);
															echo	$strSQL30 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',ct0 = '0'";
																$objQuery30 = mysqli_query($objCon,$strSQL30);

															}elseif($timeresult>241 && $timeresult<301){
																$_POST['exvacation_time'] = (5*60*60*8.5);
															echo	$strSQL30 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',ct0 = '0'";
																$objQuery30 = mysqli_query($objCon,$strSQL30);
															}elseif($timeresult>301 && $timeresult<360){
																$_POST['exvacation_time'] = (6*60*60*8.5);
															echo	$strSQL30 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',ct0 = '0'";
																$objQuery30 = mysqli_query($objCon,$strSQL30);
															}else{
																$_POST['exvacation_time'] = (6*60*60*8.5);
															echo	$strSQL30 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',ct0 = '0'";
																$objQuery30 = mysqli_query($objCon,$strSQL30);
															}

														}
													}else{
															if($objResult10['ct0']=="1"){
																if($timeresult>1 && $timeresult<61){
																	$_POST['exvacation_time'] = (1*60*60*8);
																echo	$strSQL30 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',ct0 = '0'";
																	$objQuery30 = mysqli_query($objCon,$strSQL30);
																}elseif($timeresult>61 && $timeresult<131){
																	$_POST['exvacation_time'] = (2*60*60*8);
																echo	$strSQL30 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',ct0 = '0'";
																	$objQuery30 = mysqli_query($objCon,$strSQL30);
																}elseif($timeresult>131 && $timeresult<181){
																	$_POST['exvacation_time'] = (3*60*60*8);
																echo	$strSQL30 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',ct0 = '0'";
																	$objQuery30 = mysqli_query($objCon,$strSQL30);

																}elseif($timeresult>181 && $timeresult<241){
																	$_POST['exvacation_time'] = (4*60*60*8);
																echo	$strSQL30 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',ct0 = '0'";
																	$objQuery30 = mysqli_query($objCon,$strSQL30);

																}elseif($timeresult>241 && $timeresult<301){
																	$_POST['exvacation_time'] = (5*60*60*8);
																echo	$strSQL30 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',ct0 = '0'";
																	$objQuery30 = mysqli_query($objCon,$strSQL30);
																}elseif($timeresult>301 && $timeresult<360){
																	$_POST['exvacation_time'] = (6*60*60*8);
																echo	$strSQL30 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',ct0 = '0'";
																	$objQuery30 = mysqli_query($objCon,$strSQL30);
																}else{
																	$_POST['exvacation_time'] = (6*60*60*8);
																echo	$strSQL30 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',ct0 = '0'";
																	$objQuery30 = mysqli_query($objCon,$strSQL30);
																}

															}

						}


												}elseif($timediff>1460 && $timediff<2190){


																		$time3 = date('Y-m-d');
																		$day1 = date("m-d",strtotime($time1));
																		$day2 = date('Y',strtotime($time1));
																		$day3 = $day2+4;
																		$day3;
																		$day4 = "$day3-$day1";
																	 $day4;
																		if($time3>$day4)
																		{
																			if($objResult10['kind_work']=="office"){
																						if($ct1=="1"){
																				$_POST['exvacation_time'] =  $objResult10['exvacation_time']+61200;
																				$_POST['vacation_time'] = $objResult10['vacation_time']+61200;
																			echo	$strSQL11 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',vacation_time = '".$_POST['vacation_time']."' where username = '".$_SESSION['username']."'";
																				$objQuery11 = mysqli_query($objCon,$strSQL11);
																				$strSQL21 = "UPDATE member SET ct1 = '0' WHERE username = '".$_SESSION['username']."'";
																				$objQuery21 = mysqli_query($objCon,$strSQL21);
																				 }
																			}else{
																				if($ct1=="1"){
																				$_POST['exvacation_time'] = $objResult10['exvacation_time']+57600;
																				$_POST['vacation_time'] = $objResult10['vacation_time']+57600;
																			echo	$strSQL11 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',vacation_time = '".$_POST['vacation_time']."' where username = '".$_SESSION['username']."'";
																				$objQuery11 = mysqli_query($objCon,$strSQL11);
																				$strSQL21 = "UPDATE member SET ct1 = '0' WHERE username = '".$_SESSION['username']."'";
																				$objQuery21 = mysqli_query($objCon,$strSQL21);
																			}
																		}

																		}
														}elseif($timediff > 2190 && $timediff < 3650){
																		$time3 = date('Y-m-d');
																		$day1 = date("m-d",strtotime($time1));
																		$day2 = date('Y',strtotime($time1));
																		$day3 = $day2+6;
																		$day3;
																		$day4 = "$day3-$day1";
																	$day4;
																		if($time3>$day4)
																		{
																			if($objResult10['kind_work']=="office"){
																					if($ct2=="1"){
																						$exvacation_time =  $objResult10['exvacation_time']+61200;
																						$vacation_time = $objResult10['vacation_time']+61200;
																					 $exvacation_time;
																					 $vacation_time;
																			echo			 $strSQL11 = "UPDATE member SET exvacation_time = '".$exvacation_time."',vacation_time = '".$vacation_time."',ct2 = '0' where username = '".$_SESSION['username']."'";
																						$objQuery11 = mysqli_query($objCon,$strSQL11);
																		}
																			}else{
																				if($ct2=="1"){
																					$exvacation_time = $objResult10['exvacation_time']+57600;
																					$vacation_time = $objResult10['vacation_time']+57600;
																					 $exvacation_time;
																			echo		 $strSQL11 = "UPDATE member SET exvacation_time = '".$exvacation_time."',vacation_time = '".$vacation_time."',ct2 = '0' where username = '".$_SESSION['username']."'";
																					$objQuery11 = mysqli_query($objCon,$strSQL11);

																			}
																			}

																		}
														}elseif($timediff>3650){
															$time3 = date('Y-m-d');
																	$day1 = date("m-d",strtotime($time1));
																	$day2 = date('Y',strtotime($time1));
																	$day3 = $day2+10;
																	$day3;
																	$day4 = "$day3-$day1";
																	 $day4;
																	if($time3>$day4)
																	{
																		if($objResult10['kind_work']=="office"){
																			if($ct3=="1"){
																			$_POST['exvacation_time'] =  $objResult10['exvacation_time']+61200;
																			$_POST['vacation_time'] = $objResult10['vacation_time']+61200;
																	echo		$strSQL11 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',vacation_time = '".$_POST['vacation_time']."'  where username = '".$_SESSION['username']."'";
																			$objQuery11 = mysqli_query($objCon,$strSQL11);
																		echo	$strSQL21 = "UPDATE member SET ct3 = '0' WHERE username = '".$_SESSION['username']."'";
																			$objQuery21 = mysqli_query($objCon,$strSQL21);
																}
																		}else{
																			if($ct3=="1"){
																			$exvacation_time = $objResult10['exvacation_time']+57600;
																			$vaction_time = $objResult10['vacation_time']+57600;
																		echo	$strSQL11 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',vacation_time = '".$_POST['vacation_time']."'  where username = '".$_SESSION['username']."'";
																			$objQuery11 = mysqli_query($objCon,$strSQL11);
																		echo	$strSQL21 = "UPDATE member SET ct3 = '0' WHERE username = '".$_SESSION['username']."'";
																			$objQuery21 = mysqli_query($objCon,$strSQL21);
																		}
																		}

																	}
														}

	}

	mysqli_close($objCon);
?>
