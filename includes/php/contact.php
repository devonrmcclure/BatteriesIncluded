<?php

  $to = "devon.r.mcclure@gmail.com";
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

print_r($_POST);


mail("devon.r.mcclure@gmail.com", $subject, $message)
?>