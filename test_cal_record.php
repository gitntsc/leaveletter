<?php
date_default_timezone_set("Asia/Bangkok");
	$time2 = date('Y-m-d');






include "connect.php";
$strSQL = "SELECT * FROM member";
$objQuery = mysqli_query($objCon,$objQuery);

?>

<div class="table-responsive">

<table class="table table-striped table-hover table-bordered">
<thead>

 <tr>

       <th style="text-align:center">ID</th>

       <th style="text-align:center">Username</th>

       <th style="text-align:center">Password</th>

       <th style="text-align:center">บริษัท</th>

       <th style="text-align:center">ฝ่าย</th>

       <th style="text-align:center">ระดับ</th>

       <th style="text-align:center">ประเภทการทำงาน</th>









 </tr>

</thead>
<?php
while ($objResult= mysqli_fetch_assoc($objQuery))
{
 ?>


<tbody>

 <tr>

   <td style="text-align:center"><?php echo $objResult2['user_id'];?></td>

   <td style="text-align:center"><?php echo $objResult2['username'];?></td>

   <td style="text-align:center"><?php echo $objResult2['password'];?></td>

   <td style="text-align:center"><?php echo $objResult2['company'];?></td>

   <td style="text-align:center"><?php echo $objResult2['section'];?></td>

   <td style="text-align:center"><?php echo $objResult2['level'];?></td>

   <td style="text-align:center"><?php echo $objResult2['start_work'];?></td>






 </form>


  </tr>
<?php
}
  ?>


  if($dayre>1 && $dayre<61){
 	 $dayre = 1;
  }elseif($dayre>61 && $dayre<121){
 	 $dayre = 2;
  }elseif($dayre>121 && $dayre<181){
 	 $dayre = 3;
  }elseif($dayre>181 && $dayre<241){
 	 $dayre = 4;
  }elseif($dayre>241 && $dayre<301){
 	 $dayre = 5;
  }elseif($dayre>301 && $dayre<360){
 	 $dayre = 6;
  }else{
  	$dayre = 6;
  }
