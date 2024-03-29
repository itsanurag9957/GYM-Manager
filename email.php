<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function isDeviceConnectedToInternet() {
    $output = [];
    $result = 0;
    exec("ping -n 1 google.com", $output, $result); // Use -n instead of -c for Windows
    return ($result === 0);
}





function sendemail($email, $otp){

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                      // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'anuragsutarxyz@gmail.com';                     // SMTP username
    $mail->Password   = 'nfqhuhxtcgoutdye';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
    //Recipients
    $mail->setFrom('anuragsutarxyz@gmail.com', 'Anurag');
    $mail->addAddress("$email", 'Prerna');     // Add a recipient
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test Email';
    $mail->Body    = "Thank You for registering with us.Your otp is :- $otp";
    
    $mail->send();
    echo "<head><script>alert('Email sent successfully on the registered email!!');</script></head>";
} catch (Exception $e) {
        echo "$e";
        echo "<head><script>alert('Please Connect to the Internet!!');</script></head>";
        return 200;
}
}

?>
