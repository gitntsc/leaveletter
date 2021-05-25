date_default_timezone_set('Asia/Bangkok');
require 'PHPMailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
$mail->CharSet = "utf-8";
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "192.168.22.3";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'none';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "leave.admin@ntmail.local";
//Password to use for SMTP authentication
$mail->Password = "Stepmail99";
//Set who the message is to be sent from
$mail->setFrom('leave.admin@ntmail.local', 'Leave admin');
//Set who the message is to be sent to
$mail->addAddress($sendmail1,$sendmail1);

//Set the subject line
$mail->Subject = 'แจ้งการอนุมัติการลา';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
$mail->msgHTML("$exmail");
