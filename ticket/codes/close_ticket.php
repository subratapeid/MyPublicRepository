<?php
// Include database configuration
include 'config.php';
include "getDateTime.php";

// Set content type to JSON
header('Content-Type: application/json');

// Check if action is set and equal to 'close_ticket'
if (isset($_POST['ticket_id']) && isset($_POST['user_id'])) {
    try {
        $ticketId = $_POST['ticket_id'];
        $userId = $_POST['user_id'];
    // Call the getDateTime() function to fetch the current date and time
    $dateAndTime = getDateTime();
        // Update the ticket status to 'Closed' only if the current status is not 'Closed'
        $sqlUpdate = "UPDATE tickets SET status = 'Closed', closed_by = :userId, closed_date = :closedOn WHERE ticket_id = :ticketId AND status != 'Closed'";
        $stmtUpdate = $pdo->prepare($sqlUpdate);
        $stmtUpdate->bindParam(':ticketId', $ticketId, PDO::PARAM_STR);
        $stmtUpdate->bindParam(':userId', $userId, PDO::PARAM_STR);
        $stmtUpdate->bindParam(':closedOn', $dateAndTime, PDO::PARAM_STR);
        $stmtUpdate->execute();

        if ($stmtUpdate->rowCount() > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Ticket closed successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Ticket is already closed.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data.']);
}
?>
