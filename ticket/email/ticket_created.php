<?php
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Set content type to JSON
header('Content-Type: application/json');

// Function to log data to a file
// function logData($data)
// {
//     $logFile = 'log.txt';
//     $logMessage = date('Y-m-d H:i:s') . ' - ' . print_r($data, true) . PHP_EOL;
//     file_put_contents($logFile, $logMessage, FILE_APPEND);
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : 'NA';
    $email = isset($_POST['email']) ? $_POST['email'] : 'NA';
    $userMobile = isset($_POST['userMobile']) ? $_POST['userMobile'] : 'NA';
    $issueType = isset($_POST['issueType']) ? trim($_POST['issueType']) : 'NA';
    $issueDetails = isset($_POST['issueDetails']) ? trim($_POST['issueDetails']) : 'NA';

    // // Log the received data
    // $logData = [
    //     'firstName' => $firstName,
    //     'lastName' => $lastName,
    //     'email' => $email,
    //     'userMobile' => $userMobile,
    //     'role' => $role,
    //     'department' => $department,
    //     'pin' => $pin,
    //     'location' => $location,
    // ];

    // logData($logData);

    // Create a new PHPMailer instance
    $mail = new PHPMailer();

// Set mailer to use SMTP
$mail->isSMTP();

// Specify SMTP credentials
$mail->Host       = 'smtp.zoho.in';  // Replace with your SMTP host
$mail->SMTPAuth   = true;
$mail->Username   = 'subratap@integramicro.co.in';  // Replace with your email
// Email App password
// $mail->Password   = 'ZX5cnbWMUYjB';  
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;

// Set email details
$mail->setFrom('subratap@integramicro.co.in', 'Integra Ticketing portal');  // Replace with your email and name
$mail->addAddress($email);  // Replace with the recipient's email
$mail->Subject = 'New User Created';
$mail->IsHTML(true); // Set the email content type to HTML

// Compose email body
$mailBody = "
    <html>
    <head>
        <style>
            /* Add your email styles here */
        </style>
    </head>
    <body>
        <p>Hello $fullName,</p>
        <p>New Ticket has been created with the following details:</p>
        <ul>
            <li><strong>Ticket ID:</strong> $ticketId</li>
            <li><strong>Phone Number:</strong> $userMobile</li>
            <li><strong>Issue Type:</strong> $issueType</li>
            <li><strong>Issue Details:</strong> $issueDetails</li>
        </ul>
        <p><strong>View and Reply on Your Ticket:-</p>
        <ul>
            <li><strong>View Ticket Link:</strong> http://10.10.10.13/ticket/user-login.php</li>
            <p><a href='http://10.10.10.13/ticket/user-login.php'><button>View Ticket</button></a></p>
        </ul>

        <p>Thanks and Regards.
        Team Integra</p>
    </body>
    </html>
";

// Set the email body
$mail->Body = $mailBody;

    // Send email
    if ($mail->send()) {
        echo json_encode(['status' => 'success', 'message' => 'Email sent successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send email: ' . $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid form data.']);
}
?>
