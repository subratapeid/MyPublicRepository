<?php
// Assuming you have a database connection established
include 'config.php'; // Include your database connection file here

// Function to fetch office locations based on the PIN from the database
function fetchOfficeLocations($pin) {
    global $pdo;
    $locationTable = "pooffices";

    // Query to fetch all office locations from your database
    $query = "SELECT id, area FROM $locationTable WHERE Pincode = :pin";

    // Prepare the statement
    $stmt = $pdo->prepare($query);

    // Bind the PIN parameter to prevent SQL injection
    $stmt->bindParam(':pin', $pin, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Fetch the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['pin'])) {
        $pin = $_GET['pin'];

        // Fetch office locations
        $officeLocations = fetchOfficeLocations($pin);

        // Check if any results were found
        if (!empty($officeLocations)) {
            // Return the result as JSON
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'locations' => $officeLocations]);
        } else {
            // Return an error if no locations were found
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'No locations found for the entered PIN.']);
        }
    } else {
        // Handle missing PIN parameter
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'PIN code is required.']);
    }
} else {
    // Handle other request methods or invalid requests
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
