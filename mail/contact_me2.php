<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use /PHPMailer-master/src/PHPMailer;
use /PHPMailer-master/src/SMTP;
use /PHPMailer-master/src/Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'gs.pateltutoring@gmail.com';                     // SMTP username
    $mail->Password   = 'sp12212001';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('gs.pateltutoring@gmail.com', 'Mailer');
    $mail->addAddress('sohanpatel1221@gmail.com', 'Joe User');     // Add a recipient
    $mail->addAddress('');               // Name is optional
    $mail->addReplyTo('sohanpatel1221@gmail.com', 'Information');
    $mail->addCC('');
    $mail->addBCC('');

    // Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>