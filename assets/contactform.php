

<?php
    if (isset($_POST["submit"])) {
         $name = $_POST["name"];
         $number = $_POST["number"];
         $email = $_POST["email"];
         $message = $_POST["message"];

         $mailTo = "hmmoon@hotmail.com";
         $headers = "From: ".$mailFrom;
         $txt= "You have an email from ".$name.".\n\n".$message; 

    mail($mailTo, $number, $email, $txt, $headers); 
    header("Location: index.php?mailsend");
    
    }

?> 