<?php
// Assuming you have a database connection established
include 'config.php'; // Include your database connection file here

// Function to fetch office locations based on the PIN from the database
function fetchBank() {
    global $pdo;
    $table = "bank_names";

    // Query to fetch all office locations from your database
    $query = "SELECT id, bank_symbol, bank_name FROM $table";

    // Prepare the statement
    $stmt = $pdo->prepare($query);

    // Execute the statement
    $stmt->execute();

    // Fetch the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        // Fetch office locations
        $banks = fetchBank();

        // Check if any results were found
        if (!empty($banks)) {
            // Return the result as JSON
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'banks' => $banks]);
        } else {
            // Return an error if no locations were found
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'No banks found']);
        }
} else {
    // Handle other request methods or invalid requests
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
