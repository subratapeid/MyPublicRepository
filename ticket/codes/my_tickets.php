<?php
session_start();
include '../include/connection.php';
$loggedInUserId = isset($_GET['userId']) ? $_GET['userId'] : null;

try {
    
    // Your database query
    $query = "SELECT *, 
    DATE_FORMAT(created_date, '%Y-%m-%d %h:%i %p') AS formatted_created_date,
    DATE_FORMAT(closed_date, '%Y-%m-%d %h:%i %p') AS formatted_close_date 
    FROM tickets 
    WHERE created_by_id = ?";
    
    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);
    
    // Bind the logged-in user ID from session to the placeholder
    // $stmt->bindParam(1, $loggedInUserId, PDO::PARAM_INT);
    $stmt->bindParam(1, $loggedInUserId, PDO::PARAM_STR);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch all rows
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return data in JSON format
    echo json_encode($rows);
} catch (PDOException $e) {
    // Handle database connection errors
    echo "Error: " . $e->getMessage();
}

?>
