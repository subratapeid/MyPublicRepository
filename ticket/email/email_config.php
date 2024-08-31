<?php
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$domain = "localhost/ticket";

function configureMailer() {
    $mail = new PHPMailer();

    // Set mailer to use SMTP
    $mail->isSMTP();

    // Specify SMTP credentials
    $mail->Host       = 'smtp.zoho.in';  // Replace with your SMTP host
    $mail->SMTPAuth   = true;
    $mail->Username   = '';  // your email
    $mail->Password   = '';  // your email app password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Set default sender details
    $mail->setFrom('subratap@integramicro.co.in', 'Integra Ticketing portal');

    // Return the configured mailer instance
    return $mail;
}
?>
