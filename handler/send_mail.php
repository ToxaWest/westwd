<?php
  $name = stripslashes(trim($_POST['name']));
  $email = stripslashes(trim($_POST['email']));
  $message = stripslashes(trim($_POST['message']));
  $subject = 'Отыв';
  $emailTo = 'west@westwd.kl.com.ua'; //Сюда введите Ваш email
  $body = "Name: $name \n\nEmail: $email \n\nComments:\n $message";
  $headers = 'From: <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
  mail($emailTo, $subject, $body, $headers);
  $emailSent = true;
?>
