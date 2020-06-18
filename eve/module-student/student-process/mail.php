<?php

// @POL PLEASE READ THE README FOR MAIL SERVER SETUP;
require '../../../phpmailer/PHPMailerAutoload.php';
function sendmail($email,$generatekey,$firstname,$middlename,$lastname,$date,$purpose){

  $mail = new PHPMailer();
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->SMTPSecure = 'ssl';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = '465';
  $mail->isHTML();
  $mail->Username = 'evebyotso@gmail.com';
  $mail->Password = 'eve-otso20';
  $mail->setFrom('no-reply@eve-otso.org', 'EVE-OTSO');
  $mail->Subject = 'EVE REGISTRATION';
  $mail->Body = "Hello ".$firstname." ".$lastname.", you have registered for a visit at ".$date.". With the purpose of '".$purpose."', please present this CODE on your visit. '".$generatekey."'.";
  $mail->AddAddress($email);

  $mail->Send();



}





 ?>
