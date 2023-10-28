<?php
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;


$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                    // Send using SMTP
    $mail->Host = 'smtp.gmail.com';     // Set the SMTP server to send through
    $mail->SMTPAuth = true;             // Enable SMTP authentication
    $mail->Username = 'siddhant@72dragons.com'; // SMTP username
    $mail->Password = 'Cannes2019';    // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 465;                 // 465 TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    $mail->setFrom('siddhant@72dragons.com', "hello");
    $mail->addAddress('dhanush@72dragons.com', 'Dhanush..');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Subject';
    $mail->Body = 'This is the email body text';

    // Send the email
    $mail->send();
    echo 'Email has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
