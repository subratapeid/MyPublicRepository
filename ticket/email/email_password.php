<?php
require 'email_config.php';

// Set content type to JSON
header('Content-Type: application/json');

// Function to log data to a file
// function logData($data) {
//     $logFile = 'post_data_log.txt';
//     $logMessage = date('Y-m-d H:i:s') . ' - ' . print_r($data, true) . PHP_EOL;
//     file_put_contents($logFile, $logMessage, FILE_APPEND);
// }

// Form variables for insert into DB
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : 'NA';
    $email = isset($_POST['userEmail']) ? $_POST['userEmail'] : 'NA';
    $name = isset($_POST['name']) ? $_POST['name'] : 'NA';
    // Log the received data
    // logData($logData);

    // Create a new PHPMailer instance using the configuration function
    $mail = configureMailer();

    // Set email details
    $mail->addAddress($email);
    $mail->Subject = 'Password Reseted';
    $mail->IsHTML(true);

    $mailBody = "
    <html>
    <head>
        <style>
            /* Add your email styles here */
        </style>
    </head>
    <body>
        <p>Hello $name,</p>
        <p>Your Account Password Has Been Reseted:</p>
        <ul>
            <li><strong>User ID:</strong> $email</li>

            <li><strong>New Password:</strong> $newPassword</li>

            <li><strong>Portal Login Link:</strong> <a href='$domain/user-login.php'>Login Now</a></li>
        </ul>

        <p>Thanks and Regards,<br>Team Integra</p>
    </body>
    </html>
";

    // Set the email body
    $mail->Body = $mailBody;

    // Send email
    if ($mail->send()) {
        echo json_encode(['status' => 'success', 'emailmessage' => 'Email sent successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'emailmessage' => 'Failed to send email: ' . $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['status' => 'error', 'emailmessage' => 'Invalid form data.']);
}
?>
