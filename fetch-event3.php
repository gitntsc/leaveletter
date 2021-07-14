<?php
session_start();
    require_once "db.php";

    $json = array();
    $sqlQuery = "SELECT * FROM leave_tbl where status !='cancle' and username = '".$_SESSION['username']."' or (leader1 = '".$_SESSION['username']."' or leader2 = 
    '".$_SESSION['username']."' )";
    mysqli_set_charset($conn, "utf8");

    $result = mysqli_query($conn, $sqlQuery);
    /*$eventArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($eventArray, $row);
    }
    mysqli_free_result($result);*/
    $num = mysqli_num_rows($result);
    for ($e=1; $e<=$num; $e++) {
      $data = mysqli_fetch_assoc($result);
      $data['lastdate'] = date("Y-m-d", strtotime("+1 day", strtotime($data['lastdate'])));
      if($data['status']=='approve'){
      $data_return[] = array(
    		'id'   => $data['leave_id'],
    		'title'   => $data['kind_leave']."\r".$data['username']."\r".$data['reason'],
     		'start'   => $data['strdate'],
    		'end'   => $data['lastdate'],
    		'allDay' => true,
        'textColor' => "#000000",
    		'backgroundColor' => "#cae3cc",
    		'borderColor' => "#f7d07a",

    		/*'dataEvent' => $val,
    		/*'dataEventDetail' => $data_detail,
    		/*'roomTitle' => $data_room->room_title,
    		/*'subjectTitle' => $data_subject->vis_name,*/
    	);
    }else{
      $data_return[] = array(
        'id'   => $data['leave_id'],
        'title'   => $data['kind_leave']."\r".$data['username']."\r".$data['reason'],
        'start'   => $data['strdate'],
        'end'   => $data['lastdate'],
        'allDay' => true,
        'textColor' => "#000000",
        'backgroundColor' => "#FF9933",
        'borderColor' => "#f7d07a",

        /*'dataEvent' => $val,
        /*'dataEventDetail' => $data_detail,
        /*'roomTitle' => $data_room->room_title,
        /*'subjectTitle' => $data_subject->vis_name,*/
      );

    }

}
require_once "db.php";

$json = array();
$sqlQuery2 = "SELECT * FROM holiday";
mysqli_set_charset($conn, "utf8");

$result2 = mysqli_query($conn, $sqlQuery2);
/*$eventArray = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($eventArray, $row);
}
mysqli_free_result($result);*/
$num = mysqli_num_rows($result2);
for ($i=1; $i<=$num; $i++) {
  $data = mysqli_fetch_assoc($result2);
  $data['holi_end'] = date("Y-m-d", strtotime("+1 day", strtotime($data['holi_end'])));

  $data_return[] = array(
    'id'   => $data['holi_id'],
    'title'   => $data['holi_name']."\r",
     'start'   => $data['holi_str'],
    'end'   => $data['holi_end'],
    'allDay' => true,
    'textColor' => "#ffffff",
    'backgroundColor' => "#D30000",
    'borderColor' => "#f7d07a",

    /*'dataEvent' => $val,
    /*'dataEventDetail' => $data_detail,
    /*'roomTitle' => $data_room->room_title,
    /*'subjectTitle' => $data_subject->vis_name,*/
  );


}

    
    mysqli_close($conn);
    echo json_encode($data_return, JSON_UNESCAPED_UNICODE);
?>
