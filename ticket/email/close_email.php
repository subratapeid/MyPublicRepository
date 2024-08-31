<?php
require 'email_config.php';

include '../codes/config.php';

// Set content type to JSON
header('Content-Type: application/json');

// Check if ticket_id is set
if (isset($_POST['ticket_id'])) {
    $ticketId = $_POST['ticket_id'];

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

    $pdo = null;

    // Create a new PHPMailer instance
    $mail = configureMailer();

    // Enable verbose debug output
    // $mail->SMTPDebug = 3;
    $mail->addAddress($ticketEmail);  // Replace with the recipient's email
    $mail->Subject = 'Ticket Status For Ticket Id: ' . $ticketId;
    $mail->IsHTML(true); // Set the email content type to HTML

    $status = "Closed"; // Replace with the actual status

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
                <p>Status: $status </p>
                <p>Status Changed On: $dateTime</p>
                <p>Message:- Your Ticket Has Been Closed As the Issue Resolved By Us </p>

                <p><a href='$domain/my_ticket.php?ticket_id=$ticketId'><button>View Ticket</button></a></p>
            </div>
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
    echo json_encode(['status' => 'error', 'message' => 'Invalid data.']);
}
?>
