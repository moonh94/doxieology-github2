

    <?php 
    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST['name']) && isset($_POST['email'])){
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        require_once = "PHPMailer/PHPMailer.php";
        require_once = "PHPMailer/SMTIP.php";
        require_once = "PHPMailer/Exception.php";

        $mail new PHPMailer(); 

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "doxieology.mcafee@gmail.com";
        $mail->Password +"Cosprings123";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress("doxieology.mcafee@gmail.com");
        $mail->Subject = ("$email ($subject)");
        $mail->Body = $body;

        if($mail->send()){
            $status = "success";
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