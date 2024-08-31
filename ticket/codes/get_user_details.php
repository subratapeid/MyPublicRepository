<?php
// Include database connection file
include "config.php";

// Check if the user ID is provided in the request
if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];

    // Query the database to fetch user details based on the user ID
    $query = "SELECT u.*, 
    CONCAT(c.first_name, ' ', c.last_name) AS created_by_name,
    CONCAT(DATE_FORMAT(u.created_on, '%Y-%m-%d'), ' ', DATE_FORMAT(u.created_on, '%h:%i %p')) AS formatted_view_time
    FROM users u
    LEFT JOIN users c ON u.created_by_id = c.id
    WHERE u.id = ?";
    
    // Prepare the statement
    $stmt = $pdo->prepare($query);
    
    // Bind the parameter
    $stmt->bindParam(1, $userId);
    
    // Execute the query
    if ($stmt->execute()) {
        // Fetch user details
        $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        // Return user details as JSON response
        echo json_encode($userDetails);
    } else {
        // Handle database error
        http_response_code(500);
        echo json_encode(array('error' => 'Database error'));
    }
} else {
    // Handle case when user ID is not provided
    http_response_code(400);
    echo json_encode(array('error' => 'User ID not provided'));
}
?>
