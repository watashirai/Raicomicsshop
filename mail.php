<?php
include("connect.php");
include("query.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Raicomicsshop\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\Raicomicsshop\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\Raicomicsshop\PHPMailer\src\SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'noreply.thebookhaven@gmail.com';
    $mail->Password   = 'glyt mguu ymqy noks';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;


    $mail->setFrom("$email", 'Rais Book Shop');
    $mail->addAddress("$email", '');

    $verificationCode = rand(10000, 99999);
    $sql = "UPDATE users SET verification_code = '$verificationCode' WHERE email = '$email'";
    mysqli_query($con, $sql);
    $verificationLink = "http://localhost/Raicomicsshop/verify.php?code=$verificationCode";

    $mail->isHTML(true);
    $mail->Subject = 'Confirm Your Rais Book Shop Journey - Unlock the Magic!';
    $mail->Body    = "Thank you for creating an account with Rais Book Shop! To ensure the security of your account, please verify your email address by clicking on the following link: <br> <b><a href='$verificationLink'>Verification Link</a></b> <br><br> If you did not create an account with Rais Book Shop, please ignore this email.<br><br>Thank you for choosing Rais Book Shop.";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo '<script>alert("Verification link sent to you email!");</script>';
    echo '<script>window.location.href = "landingpage.php";</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
