<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once './vendors/phpmailer/src/PHPMailer.php';
include_once './vendors/phpmailer/src/SMTP.php';
include_once './vendors/phpmailer/src/Exception.php';
include_once 'controller/emp_controller.php';

$id=101;
$emp_controller=new EmployeeController();
$result=$emp_controller->getEmployee($id);
try{
$mail = new PHPMailer(true);
// Server settings
//$mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = 'khaineshwewynn@gmail.com'; // YOUR gmail email
$mail->Password = 'lfyk hdtz dobk avrf'; // YOUR gmail password

// Sender and recipient settings
$mail->setFrom('khaineshwewynn@gmail.com', 'HMI');
$mail->addAddress($result['email'], $result['first_name']." ".$result['last_name']);
$mail->addReplyTo('khaineshwewynn@gmail.com', 'Sender Name'); 

$mail->IsHTML(true);
$mail->Subject = "Verification for EMP management system";
$mail->Body = 'Dear Steven, Hello. <b>Gmail</b> SMTP email body.';

$mail->send();
echo "success";
}
catch(Exception $e)
{
    echo $e->getMessage();
}







?>