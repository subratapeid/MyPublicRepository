<?php
require 'email_config.php';
include '../codes/config.php';

// Check if the ticket ID is provided in the URL
if (isset($_GET['ticket_id'])) {
    $ticketId = $_GET['ticket_id'];

    $query = "SELECT t.created_by_id, tr.message, tr.img_path, tr.date, t.status, t.ticket_email
              FROM tickets t
              JOIN ticket_reply tr ON t.ticket_id = tr.ticket_id
              WHERE t.ticket_id = :ticket_id
              ORDER BY tr.id DESC
              LIMIT 1";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':ticket_id', $ticketId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $viewImage = "";
    $message = $result['message'];
    $dateTime = $result['date'];
    $ticketEmail = $result['ticket_email'];
    
    // Check if the retrieved data has a non-empty image URL
    if (!empty($result['img_path'])) {
        // Construct the full image URL with the domain
        $fullImageUrl = $domain . "/" . $result['img_path'];
        $viewImage = "<a href='$fullImageUrl'>View Attached Image</a><br>";
    }

    // Close the database connection
    $pdo = null;

    // Create a new PHPMailer instance
    $mail = configureMailer();

    // Enable verbose debug output
    // $mail->SMTPDebug = 3;

    // Set email details
    $mail->addAddress($ticketEmail);  // Replace with the recipient's email
    $mail->Subject = 'New Reply On Ticket Id: ' . $ticketId;
    
    $mail->IsHTML(true); // Set the email content type to HTML

    $status = "Open"; // Replace with the actual status

    $mailBody = "
        <html>
        <head>
            <style>
                .card {
                    border: 1px solid #ccc;
                    border-radius: 8px;
                    padding: 16px;
                    margin: 16px;
                }

                button {
                    background-color: #4CAF50;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 5px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 2px;
                    cursor: pointer;
                }
            </style>
        </head>
        <body>
            <div class='card'>
                <p>Ticket ID: $ticketId</p>
                <p>Date Time: $dateTime</p>
                <p>Status: $status </p>
                
                <p>Message:- $message</p>
                <p>$viewImage</p>
                <p><a href='$domain/my_ticket.php?ticket_id=$ticketId'><button>View Ticket</button></a></p>
            </div>
        </body>
        </html>
    ";
    
    // Set the email body
    $mail->Body = $mailBody;

    // Send email
    if ($mail->send()) {
        echo "Email sent successfully.\n";

        // // Log the execution to a file
        // $logFile = 'reply_email_log.txt';
        // $logMessage = "Ticket ID: $ticketId, Timestamp: " . date('Y-m-d H:i:s') . "\n";

        // // Write data to the log file
        // file_put_contents($logFile, $logMessage, FILE_APPEND);
    } else {
        echo "Failed to send email: " . $mail->ErrorInfo . "\n";
    }
} else {
    echo "Error: Ticket ID not provided.\n";
}
?>
