<?php
include 'include/connection.php';

// Set content type to JSON
header('Content-Type: application/json');

// Check if ticketId is set
if (isset($_GET['ticketId'])) {
    $ticketId = $_GET['ticketId'];

    try {
        // Prepare SQL statement
        $sql = "SELECT * FROM ticket_reply WHERE ticket_id = :ticketId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':ticketId', $ticketId, PDO::PARAM_INT);

        // Execute SQL statement
        if ($stmt->execute()) {
            $replies = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Return replies as JSON
            echo json_encode($replies);
        } else {
            echo json_encode(['error' => 'Failed to execute SQL']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'ticketId is not set']);
}
?>
