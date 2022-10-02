<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require './vendor/autoload.php';

if(isset($_POST['name']) && isset($_POST['email'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $body = $_POST['body'];


  $mail = new PHPMailer();
  $mail->isSMTP(true);
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "doxieology2019@gmail.com";
  $mail->Password = "sbvpowyjvtphbqnm";
  $mail->Port = 465;
  $mail->SMTPSecure = "ssl";

  $mail->isHTML(true);
$mail->SetFrom($email, $name);
$mail->addAddress("doxieology2019@gmail.com");
$mail->Subject = ("$name ($email) ($subject)");
$mail->Body = $body;
if($mail->send()){
  $status = "success";
  $response = "Email is sent!";
}
else {
  $status = "failed";
  $response = "Something is wrong: <br>" . $mail->ErrorInfo;
}
  exit(json_encode(array("status" => $status, "response" => $response)));
}
?>