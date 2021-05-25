<?php

define('LINE_API',"https://notify-api.line.me/api/notify");
$token2 = "QDrULtRQWeCyeO2Gked5Rso3kyLoTheNt4GFNiuI2D4"; //ใส่Token ที่copy เอาไว้
$str2 = ."From : $from
เรื่อง : $kind_leave วันที่ : $strdate ถึงวันที่ : $lastdate
เหตุผล : $reason
วันที่ยื่น : $time
อนุมัติคำขอลาได้ที่ : http://192.168.22.5'>คลิกที่นี่";; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

$res2 = notify_message2($str2,$token2);
print_r($res2);
function notify_message2($message,$token){
 $queryData = array('message' => $message);
 $queryData = http_build_query($queryData,'','&');
 $headerOptions = array(
         'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                      ."Authorization: Bearer ".$token2."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
         ),
 );
 $context = stream_context_create($headerOptions);
 $result = file_get_contents(LINE_API,FALSE,$context);
 $res2 = json_decode($result);
 return $res2;
}

//https://havespirit.blogspot.com/2017/02/line-notify-php.html
//https://medium.com/@nattaponsirikamonnet/%E0%B8%A1%E0%B8%B2%E0%B8%A5%E0%B8%AD%E0%B8%87-line-notify-%E0%B8%81%E0%B8%B1%E0%B8%99%E0%B9%80%E0%B8%96%E0%B8%AD%E0%B8%B0-%E0%B8%9E%E0%B8%B7%E0%B9%89%E0%B8%99%E0%B8%90%E0%B8%B2%E0%B8%99-65a7fc83d97f
?>
