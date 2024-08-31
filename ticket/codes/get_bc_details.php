<?php
// Include database connection file
include "config.php";

// Check if the user ID is provided in the request
if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];

    // Query the database to fetch user details based on the user ID
    $query = "SELECT b.*, 
    CONCAT(c.first_name, ' ', c.last_name) AS created_by_name,
    CONCAT(DATE_FORMAT(b.created_date, '%Y-%m-%d'), ' ', DATE_FORMAT(b.created_date, '%h:%i %p')) AS formatted_view_time
FROM bc_details b
LEFT JOIN users c ON b.created_by_id = c.id
WHERE b.id = ?";
    
    // Prepare the statement
    $stmt = $pdo->prepare($query);
    
    // Bind the parameter
    $stmt->bindParam(1, $userId);
    
    // Execute the query
    if ($stmt->execute()) {
        // Fetch user details
        $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    // Iterate through the user details and replace null or empty values with "No data"
    foreach ($userDetails as $key => $value) {
        if (empty($value)) {
            $userDetails[$key] = 'No Data Found';
        }
    }
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
