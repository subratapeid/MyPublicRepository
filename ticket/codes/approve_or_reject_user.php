<?php
session_start();
// Include database configuration
include 'config.php';
include "getDateTime.php";

// Set content type to JSON
header('Content-Type: application/json');
$loggedInUserId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
//check whethere user is loggedin
if ($loggedInUserId){
// Check if action is set and equal to 'close_ticket'
if (isset($_POST['userId']) && isset($_POST['request'])) {

    try {
        $request = $_POST['request'];
        $userId = $_POST['userId'];
        // Call the getDateTime() function to fetch the current date and time
        $dateAndTime = getDateTime();
        $action ="";
        $message ="";
        
        // Determine action and message based on the request
        if ($request == "approve") {
            $action = "1";
            $message = "Approved";
            $status = "Active";
        } else if ($request == "reject") {
            $action = "2";
            $message = "Rejected";
            $status = "Inactive";
        } else {
            $action = "0";
            $message = "Pending";
            $status = "Inactive";
        }
        
        // Update the user status
        $sqlUpdate = "UPDATE users SET is_approved = :action, status = :status, approve_reject_by_id = :loggedinUserId, approve_reject_date = :date WHERE id = :userId AND is_approved = 0 ";
        $stmtUpdate = $pdo->prepare($sqlUpdate);
        $stmtUpdate->bindParam(':action', $action, PDO::PARAM_INT);
        $stmtUpdate->bindParam(':status', $status, PDO::PARAM_STR);
        $stmtUpdate->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmtUpdate->bindParam(':loggedinUserId', $loggedInUserId, PDO::PARAM_INT);
        $stmtUpdate->bindParam(':date', $dateAndTime, PDO::PARAM_STR);
        $stmtUpdate->execute();

        // Check if the update was successful
        if ($stmtUpdate->rowCount() > 0) {
            echo json_encode(['status' => 'success', 'message' => "Request $message successfully."]);
        } else {
            // If no rows were updated, check the current status
            $query = "SELECT * FROM users WHERE id = :userId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($row) {
                $currentStatusCode = $row['is_approved'];
                $currentStatus = "";
                if ($currentStatusCode==1){
                    $currentStatus = "Approved";
                } else if ($currentStatusCode==2){
                    $currentStatus = "Rejected";
                } else {
                    $currentStatus = "Pending";
                }
                // Check if the current status matches the action
                if ($currentStatusCode == $action) {
                    echo json_encode(['status' => 'error', 'message' => "Request is already $message."]);
                } else { 
                    echo json_encode(['status' => 'error', 'message' => "You can't $request this request. It is already $currentStatus"]);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'User not found.']);
            }
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid Request.']);
}
} else {
    echo json_encode(['status' => 'error', 'message' => 'You are not logged in.']);
}

?>
