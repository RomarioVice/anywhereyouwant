<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from       = "Romario_12395@mail.ru";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "tls://smtp.mail.ru"; // Amazon SES server, note "tls://" protocol
$mail->Port       =  465;                    // set the SMTP port
$mail->Username   = "Romario_12395@mail.ru";  // SMTP  username
$mail->Password   = "o6zlhibhlm";  // SMTP password
$mail->SetFrom($from, 'Romka Vice');
$mail->AddReplyTo($from,'Romka Vice');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send();   
}
?>
