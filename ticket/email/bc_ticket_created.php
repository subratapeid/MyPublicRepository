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
    $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : 'NA';
    $issueType = isset($_POST['issueType']) ? $_POST['issueType'] : 'NA';
    $userMobile = isset($_POST['mobile']) ? $_POST['mobile'] : 'NA';
    $email = isset($_POST['emailId']) ? $_POST['emailId'] : 'NA';
    $remarks = isset($_POST['remarks']) ? $_POST['remarks'] : 'NA';
    $department = isset($_POST['department']) ? $_POST['department'] : 'NA'; 
    $ticketId = isset($_POST['ticketId']) ? $_POST['ticketId'] : 'NA';

    // Log the received data
    // logData($logData);

    // Create a new PHPMailer instance using the configuration function
    $mail = configureMailer();

    // Set email details
    $mail->addAddress($email);
    $mail->Subject = 'New Ticket Created';
    $mail->IsHTML(true);

    $mailBody = "
    <html>
    <head>
        <style>
            /* Add your email styles here */
        </style>
    </head>
    <body>
        <p>Hello $fullName,</p>
        <p>A new ticket has been created with the following details:</p>
        <ul>
            <li><strong>Ticket ID:</strong> $ticketId</li>
            <li><strong>Phone Number:</strong> $userMobile</li>
            <li><strong>Issue Type:</strong> $issueType</li>
            <li><strong>Issue Details:</strong> $remarks</li>
        </ul>
        <p><strong>View and Reply on Your Ticket:</strong></p>
        <ul>
            <li><strong>View Ticket Link:</strong> <a href='$domain/my_ticket.php?ticket_id=$ticketId'>View Ticket</a></li>
        </ul>

        <p>Thanks and Regards,<br>Team Integra</p>
    </body>
    </html>
";

    // Set the email body
    $mail->Body = $mailBody;

    // Send email
    if ($mail->send()) {
        echo json_encode(['status' => 'success', 'message' => 'Email sent successfully.', 'ticketId' => $ticketId]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send email: ' . $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid form data.']);
}
?>
