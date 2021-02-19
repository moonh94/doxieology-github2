

    <?php 
    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST['name']) && isset($_POST['email'])){
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        require_once = "PHPMailer/PHPMailer.php";
        require_once = "PHPMailer/SMTP.php";
        require_once = "PHPMailer/Exception.php";

        $mail = new PHPMailer(true); 

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "doxieology.mcafee@gmail.com";
        $mail->Password = "Cosprings123";
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";

        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress("doxieology.mcafee@gmail.com");
        $mail->Subject = ("$email ($subject)");
        $mail->Message = $message;

        if($mail->send()){ 
            $response = "Email is sent!";

        }
        else 
        {
            $status = "failed";
            $response = "Something went wrong: <br>" . $mail->ErrorInfo; 
        }
        exit(json_encode(arrary("status" => $status, "response" => $response)));
    
    }

    ?>