<?php
// Database connection configuration
include 'include/connection.php';

// Set content type to JSON
header('Content-Type: application/json');

// Check if ticketId is set
if (isset($_GET['ticketId'])) {
    $ticketId = $_GET['ticketId'];

    try {
        // Prepare SQL statement to fetch ticket status
        $sql = "SELECT status FROM tickets WHERE ticket_id = :ticketId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':ticketId', $ticketId, PDO::PARAM_INT);

        // Execute SQL statement
        if ($stmt->execute()) {
            $status = $stmt->fetchColumn();

            if ($status !== false) {
                // Return status as JSON
                echo json_encode(['status' => $status]);
            } else {
                // Ticket not found
                echo json_encode(['status' => 'not_found']);
            }
        } else {
            // SQL execution failed
            echo json_encode(['status' => 'error']);
        }
    } catch (PDOException $e) {
        // Exception handling
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    // TicketId not provided
    echo json_encode(['status' => 'missing_ticket_id']);
}
?>
