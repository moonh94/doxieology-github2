
 
 <?php 
 if (isset($_POST["submit"])) {
         $name = $_POST["name"];
         $email = $_POST["email"];
         $message = $_POST["message"];

         $mailTo = "hmmoon@hotmail.com";
         $headers = "From: ".$mailFrom; 

    mail($mailTo, $number, $email, $headers); 
    
    }
    ?>