<?php
include ('connect.php');
$_SESSION['username']="penpak";
echo $strSQL10 = "SELECT * FROM member where username = '".$_SESSION['username']."'";
														$objQuery10 = mysqli_query($objCon,$strSQL10);
														$objResult10 = mysqli_fetch_array($objQuery10,MYSQLI_ASSOC);
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
														$checkday = date('Y-m-d');
														$time1 = $objResult10['start_work'];
                             

														$timediff = DateDiff("$time1","$checkday");
														 $timediff;
														$ct1 = $objResult10['ct1'];
													
														$ct2 = $objResult10['ct2'];
														$ct3 = $objResult10['ct3'];
                            $time3 = date('Y-m-d');
                            $time1;
                            $day1 = date("m-d",strtotime($time1));//วันที่
                            $day2 = date('Y',strtotime($time1));//ปี
                            $day3 = $day2+4;
                            $day3;
                            $day4 = "$day3-$day1";
                            $day4;
                            echo $time3."<br>";
                            echo $day4;
                            if($timediff>1460 && $timediff<2190 || $time3==$day4){


                             
                              
                                if($objResult10['kind_work']=="office"){
                                      if($ct1=="1"){
                                  $_POST['exvacation_time'] =  $objResult10['exvacation_time']+61200;
                                  $_POST['vacation_time'] = $objResult10['vacation_time']+61200;
                                  $strSQL11 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',vacation_time = '".$_POST['vacation_time']."' where username = '".$_SESSION['username']."'";
                                  $objQuery11 = mysqli_query($objCon,$strSQL11);
                                  $strSQL21 = "UPDATE member SET ct1 = '0' WHERE username = '".$_SESSION['username']."'";
                                  $objQuery21 = mysqli_query($objCon,$strSQL21);
                                   }
                                }else{
                                  if($ct1=="1"){
                                  $exvacation_time = $objResult10['exvacation_time']+57600;
                                  $vaction_time = $objResult10['vacation_time']+57600;
                                  $strSQL11 = "UPDATE member SET exvacation_time = '".$_POST['exvacation_time']."',vacation_time = '".$_POST['vacation_time']."' where username = '".$_SESSION['username']."'";
                                  $objQuery11 = mysqli_query($objCon,$strSQL11);
                                  $strSQL21 = "UPDATE member SET ct1 = '0' WHERE username = '".$_SESSION['username']."'";
                                  $objQuery21 = mysqli_query($objCon,$strSQL21);
                                }
                              }
                            
                          }
?>