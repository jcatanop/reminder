<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
 
function mailer ( $to , $subject , $body , $mailUsername , $mailPassword , $mailHost ){
  
  $mail = new PHPMailer(true);
  try {
  //  $mail->SMTPDebug = 4;  // Enable this line to see the output for debugging purposes
    $mail->isSMTP();
    $mail->Host = $mailHost;  // SMTP Host
    $mail->SMTPAuth = true;
    $mail->Username = $mailUsername;  // SMTP user
    $mail->Password = $mailPassword;  // SMTP Password
    $mail->SMTPSecure = 'ssl';   
    $mail->Port = 465;                // Puerto SMTP

    $mail->From = $mailUsername;
    $mail->FromName = 'yor-name';
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
//  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
  } catch (Exception $e) {
    echo "Mailer Error: ", $mail->ErrorInfo ;
  }
}