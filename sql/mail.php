<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class mail {
    public function sendVerificationEmail($recipientEmail, $recipientName, $verificationCode) {

        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'icsiap22e@gmail.com';
            $mail->Password   = 'sojz cfxk qcel nnms';  
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // Recipients
            $mail->setFrom('icsiap22e@gmail.com', 'ICS WORK');
            $mail->addAddress($recipientEmail, $recipientName);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to my Website';
            $mail->Body    = 'Hello <b>' . $recipientName . '</b>,<br>Your verification code is: <b>' . $verificationCode . '</b>';

            $mail->send();
            echo 'Verification email has been sent.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
