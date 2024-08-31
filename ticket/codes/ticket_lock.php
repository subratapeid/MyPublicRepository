<?php
// Include database configuration
// include 'config.php';

// // Include session management
// include 'session.php';

// // Debugging: Print received POST data
// file_put_contents('debug.txt', print_r($_POST, true));

// // Get user ID from session
// $userId = $_SESSION['user_id'] ?? null;
// $ticketId = $_POST['ticket_id'] ?? null;  // Corrected variable name to match AJAX request

// // Check if user ID and ticket ID exist
// if ($userId !== null && $ticketId !== null) {
//     try {
//         // Update user ID into ticket locked by and add 5 seconds to the current time
//         $sql = "UPDATE tickets SET locked_by = :userId, locked_time = DATE_ADD(NOW(), INTERVAL 5 SECOND) WHERE ticket_id = :ticketId";
//         $stmt = $pdo->prepare($sql);

//         // Bind parameters
//         $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
//         $stmt->bindParam(':ticketId', $ticketId, PDO::PARAM_STR);
        
//         if ($stmt->execute()) {
//             echo json_encode(['status' => 'success', 'message' => 'Last seen updated']);
//         } else {
//             echo json_encode(['status' => 'error', 'message' => 'Error updating last seen']);
//         }
//     } catch (PDOException $e) {
//         echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
//     }
// } else {
//     echo json_encode(['status' => 'error', 'message' => 'User ID or Ticket ID not provided']);
// }
?>
<?php
// Database configuration
// $host = 'localhost';
// $dbname = 't_users';
// $username = 'root';
// $password = '';

// // Set content type to JSON
// header('Content-Type: application/json');

// try {
//     // Create a new PDO instance
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

//     // Get user ID from session (Assuming session is started elsewhere in your code)
//     $userId = $_POST['user_id'] ?? null;
//     $ticketId = $_POST['ticket_id'] ?? null;

//     // Check if user ID and ticket ID are provided
//     if ($userId && $ticketId) {
//         // Update the ticket's locked_by and locked_time fields
//         // $sql = "UPDATE tickets SET locked_by = :userId, locked_time = DATE_ADD(NOW(), INTERVAL 5 SECOND) WHERE ticket_id = :ticketId";
//         $sql = "UPDATE tickets SET locked_by = :userId, locked_time = DATE_ADD(NOW(), INTERVAL 5 SECOND) WHERE ticket_id = :ticketId AND (locked_by = 'NO' OR locked_by = :userId)";
//         $stmt = $pdo->prepare($sql);
//         $stmt = $pdo->prepare($sql);

//         // Bind parameters
//         $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
//         $stmt->bindParam(':ticketId', $ticketId, PDO::PARAM_STR);

//         if ($stmt->execute()) {
//             echo json_encode(['status' => 'success', 'message' => 'Ticket locked successfully']);
//         } else {
//             echo json_encode(['status' => 'error', 'message' => 'Failed to lock the ticket']);
//         }
//     } else {
//         echo json_encode(['status' => 'error', 'message' => 'User ID or Ticket ID is missing']);
//     }
// } catch (PDOException $e) {
//     echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
// }

?>

<?php
// Include database connection configuration
require_once 'config.php';  // Replace 'path_to_connection.php' with the actual path to your connection.php file

// Set content type to JSON
header('Content-Type: application/json');

// $response = (['status' => 'error', 'message' => 'An error occurred']);

try {
    // Get user ID from POST data
    $userId = $_POST['user_id'] ?? null;
    $ticketId = $_POST['ticket_id'] ?? null;

    // Check if user ID and ticket ID are provided
    if ($userId && $ticketId) {
        // Update the ticket's locked_by and locked_time fields
        $sql = "UPDATE tickets SET locked_by = :userId, locked_time = DATE_ADD(NOW(), INTERVAL 5 SECOND) WHERE ticket_id = :ticketId AND (locked_by = 'NO' OR locked_by = :userId)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
        $stmt->bindParam(':ticketId', $ticketId, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $response = (['status' => 'success', 'message' => 'Ticket locked successfully']);
        } else {
            $response = (['status' => 'error', 'message' => 'Failed to lock the ticket']);
        }
    } else {
        $response = (['status' => 'error', 'message' => 'User ID or Ticket ID is missing']);
    }
} catch (PDOException $e) {
    // Database error handling from connection.php
    $response = (['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}

// Output the response as JSON
echo json_encode($response);
?>