<?php
require 'email_config.php';
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
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : 'NA';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : 'NA';
    $email = isset($_POST['email']) ? $_POST['email'] : 'NA';
    $userMobile = isset($_POST['userMobile']) ? $_POST['userMobile'] : 'NA';
    $role = isset($_POST['role']) ? $_POST['role'] : '';
    $department = isset($_POST['department']) ? trim($_POST['department']) : 'NA';
    $pin = isset($_POST['pin']) ? trim($_POST['pin']) : 'NA';
    $location = isset($_POST['office']) ? trim($_POST['office']) : 'NA';
    $password = 12345; // Default password is '12345'

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
$mail = configureMailer();
$mail->addAddress($email);  // Replace with the recipient's email
$mail->Subject = 'User Account Created';
$mail->IsHTML(true); // Set the email content type to HTML

// Compose email body
$mailBody = "
    <html>
    <head>

    </head>
    <body>
        <p>Hello $firstName $lastName,</p>
        <p>User Profile has been created with the following details:</p>
        <ul>
            <li><strong>Email:</strong> $email</li>
            <li><strong>Phone Number:</strong> $userMobile</li>
            <li><strong>User Role:</strong> $role</li>
            <li><strong>Department:</strong> $department</li>
            <li><strong>Office PIN:</strong> $pin</li>
            <li><strong>Office Location:</strong> $location</li>
        </ul>
        <p><strong>Your Login Details:-</p>
        <ul>
        <li><strong>Email/User ID:</strong> $email</li>
            <li><strong>Default Password:</strong> $password</li>
            <li><strong>Login URL:</strong> $domain/user-login.php</li>
            <p><a href='$domain/user-login.php'><button>Login Here</button></a></p>
        </ul>

        <p>Thanks and Regards.
        Integra Technical Support</p>
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
