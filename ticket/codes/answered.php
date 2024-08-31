<?php
include '../include/connection.php';

// Check if form is submitted
if (isset($_GET['ticketId']) && isset($_GET['replyBy']) && isset($_GET['ticketCreatedBy'])) {
    // Retrieve the parameters from the GET request
    $ticketId = $_GET['ticketId'];
    $replyBy = $_GET['replyBy'];
    $ticketCreatedBy = $_GET['ticketCreatedBy'];
    $status = "Answered";
    
    // Check if replyBy and ticketCreatedBy are not empty and not equal to 'NA'
    if (!empty($replyBy) && !empty($ticketCreatedBy) && $replyBy !== 'NA' && $ticketCreatedBy !== 'NA' && $replyBy !== $ticketCreatedBy) {

        // Prepare and execute SQL statement to select ticket details
        $sql = "SELECT * FROM tickets WHERE ticket_id = :ticketId";
        $stmt = $pdo->prepare($sql);
        // Bind parameters
        $stmt->bindParam(':ticketId', $ticketId, PDO::PARAM_INT);
        if ($stmt->execute()) {
            // Fetch ticket details
            $ticketDetails = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Check if ticket status is not already 'Answered'
            if ($ticketDetails['status'] !== $status && $ticketDetails['status'] !== 'Closed') {
                // Prepare SQL statement to update ticket status
                $sql = "UPDATE tickets SET status = :status WHERE ticket_id = :ticketId";
                $stmt = $pdo->prepare($sql);
                
                // Bind parameters
                $stmt->bindParam(':ticketId', $ticketId, PDO::PARAM_INT);
                $stmt->bindParam(':status', $status, PDO::PARAM_STR);

                // Execute SQL statement to update ticket status
                if ($stmt->execute()) {
                    $response = array('status' => 'success', 'message' => 'Ticket status updated as Answered.');
                } else {
                    $response = array('status' => 'error', 'message' => 'Database Connection Error.');
                }
            } else {
                $response = array('status' => 'error', 'message' => 'Ticket is already in Answered/Closed status.');
            } 
        } else {
            $response = array('status' => 'error', 'message' => 'Database Connection Error.');
        }
    }  else {
        $response = array('status' => 'error', 'message' => 'Both IDs are the same.');
    }  
} else {
    $response = array('status' => 'error', 'message' => 'Invalid data requested.');
}

// Set the content type to JSON
header('Content-Type: application/json');
// Echo the response as a JSON string
echo json_encode($response);

// Close statement and connection
$stmt = null;
$pdo = null;
?>
