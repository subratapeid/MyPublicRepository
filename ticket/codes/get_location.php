<?php
// Assuming you have a database connection established
include 'config.php';
// Include your database connection code here
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $pincode = isset($_GET['pincode']) ? $_GET['pincode'] : '';

    // Query to fetch location based on the PIN code from your database
    $query = "SELECT Area FROM rooffices WHERE Pincode = :pincode
    UNION
    SELECT Area FROM pooffices WHERE Pincode = :pincode
    UNION
    SELECT Area FROM hooffices WHERE Pincode = :pincode";

    // Prepare the statement
    $stmt = $pdo->prepare($query);

    // Bind parameters
    $stmt->bindParam(':pincode', $pincode, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the result as JSON
    header('Content-Type: application/json');
    echo json_encode($result);
} else {
    // Handle other request methods or invalid requests
    echo json_encode(['error' => 'Invalid request']);
}

?>
