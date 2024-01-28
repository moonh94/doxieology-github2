<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require './vendor/autoload.php';

// working code with honeypot before recaptcha
if (!empty($_POST['sweetnerPot'])) {
          // Honeypot field filled, possibly a bot
          die('Bot detected!');
      } else {
        if(isset($_POST['name']) && isset($_POST['email'])){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $subject = $_POST['subject'];
          $body = $_POST['body'];
        
        
          $mail = new PHPMailer();
          $mail->isSMTP(true);
          $mail->Host = "smtp.gmail.com";
          $mail->SMTPAuth = true;
          $mail->Username = "han.moon522@gmail.com";
          $mail->Password = "wvoqfrzrilnksutr";
          $mail->Port = 465;
          $mail->SMTPSecure = "ssl";
        
          $mail->isHTML(true);
        $mail->SetFrom($email, $name);
        $mail->addAddress("han.moon522@gmail.com");
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
      }



// Verify reCAPTCHA response
// $recaptchaSecretKey = '6LdCmF4pAAAAAAvpDAQk2N5c1R9Bk7vSQhLc4vJP'; // Replace with your reCAPTCHA secret key
// $captchaResponse = $_POST['g-recaptcha-response'];
// $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
// $data = array(
//     'secret' => $recaptchaSecretKey,
//     'response' => $captchaResponse
// );
// $options = array(
//     'http' => array(
//         'method' => 'POST',
//         'content' => http_build_query($data)
//     )
// );
// $context = stream_context_create($options);
// $response = file_get_contents($verifyUrl, false, $context);
// $result = json_decode($response, true);

// if ($result['success']) {
//     // reCAPTCHA verification succeeded, proceed with sending email
//     if (!empty($_POST['sweetnerPot'])) {
//         // Honeypot field filled, possibly a bot
//         die('Bot detected!');
//     } else {
//         if (isset($_POST['name']) && isset($_POST['email'])) {
//             $name = $_POST['name'];
//             $email = $_POST['email'];
//             $subject = $_POST['subject'];
//             $body = $_POST['body'];

//             $mail = new PHPMailer(true);
//             $mail->isSMTP(true);
//             $mail->Host = "smtp.gmail.com";
//             $mail->SMTPAuth = true;
//             $mail->Username = "han.moon522@gmail.com";
//             $mail->Password = "wvoqfrzrilnksutr";
//             $mail->Port = 465;
//             $mail->SMTPSecure = "ssl";

//             $mail->isHTML(true);
//             $mail->SetFrom($email, $name);
//             $mail->addAddress("han.moon522@gmail.com");
//             $mail->Subject = "$name ($email) ($subject)";
//             $mail->Body = $body;

//             if ($mail->send()) {
//                 $status = "success";
//                 $response = "Email is sent!";
//             } else {
//                 $status = "failed";
//                 $response = "Something is wrong: <br>" . $mail->ErrorInfo;
//             }
//             exit(json_encode(array("status" => $status, "response" => $response)));
//         }
//     }
// } else {
//     // reCAPTCHA verification failed
//     die('reCAPTCHA verification failed!');
// }
?>
