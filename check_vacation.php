<?php
include ("connect.php");
                                                        $strSQL10 = "SELECT * FROM member";
														$objQuery10 = mysqli_query($objCon,$strSQL10);
														
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
                                                        while ($objResult10= mysqli_fetch_assoc($objQuery10))
                                                        {
                                                        date_default_timezone_set("Asia/Bangkok");
														$checkday = date('Y-m-d');
														$time1 = $objResult10['start_work'];
														echo $checkday;
														echo $time1;
														$timediff = DateDiff("$time1","$checkday");
														echo $timediff;

                                                        $val_vacation1 = '244800';
                                                        $val_vacation2 = '230400';
                                                        $val_vacation3 = '306000';
                                                        $val_vacation4 = '288000';
                                                        $val_vacation5 = '367200';
                                                        $val_vacation6 = '345600';
                                                        $val_vacation7 = '183600';
                                                        $val_vacation8 = '172800';

                                                       

                                                        if($timediff>365 && $timediff<1460){

                                                            if($objResult10['kind_work']=="office"){
                                                                echo $strSQL11 = "UPDATE member SET exvacation_time='".$val_vacation7."' where username = '".$objResult10['username']."'";
                                                                 $objQuery11=mysqli_query($objCon,$strSQL11);
 
                                                             }else{
                                                                 echo  $strSQL11 = "UPDATE member SET exvacation_time='".$val_vacation8."' where username = '".$objResult10['username']."'";
                                                                 $objQuery11=mysqli_query($objCon,$strSQL11);
               
 
 
 
                                                             }
                                                       
                                                       
                                                         } elseif($timediff>1460 && $timediff<2190){
                                                            if($objResult10['kind_work']=="office"){
                                                               echo $strSQL11 = "UPDATE member SET exvacation_time='".$val_vacation1."' where username = '".$objResult10['username']."'";
                                                                $objQuery11=mysqli_query($objCon,$strSQL11);

                                                            }else{
                                                                echo  $strSQL11 = "UPDATE member SET exvacation_time='".$val_vacation2."' where username = '".$objResult10['username']."'";
                                                                $objQuery11=mysqli_query($objCon,$strSQL11);
              



                                                            }
                                                        }elseif($timediff > 2190 && $timediff < 3650){
                                                            if($objResult10['kind_work']=="office"){
                                                                echo  $strSQL11 = "UPDATE member SET exvacation_time='".$val_vacation3."'where username = '".$objResult10['username']."'";
                                                                $objQuery11=mysqli_query($objCon,$strSQL11);

                                                            }else{
                                                                echo  $strSQL11 = "UPDATE member SET exvacation_time='".$val_vacation4."' where username = '".$objResult10['username']."'";
                                                                $objQuery11=mysqli_query($objCon,$strSQL11);
                                                            }
                                                        }elseif($timediff > 3650){
                                                            if($objResult10['kind_work']=="office"){
                                                                echo  $strSQL11 = "UPDATE member SET exvacation_time='".$val_vacation5."' where username = '".$objResult10['username']."'";
                                                                $objQuery11=mysqli_query($objCon,$strSQL11);

                                                            }else{
                                                                echo  $strSQL11 = "UPDATE member SET exvacation_time='".$val_vacation6."' where username = '".$objResult10['username']."'";
                                                                $objQuery11=mysqli_query($objCon,$strSQL11);

                                                        }
                                                    }
                                                }
?>