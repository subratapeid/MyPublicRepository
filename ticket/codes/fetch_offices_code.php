<?php
// Assuming you have a database connection established
include 'config.php'; // Include your database connection file here

// Function to fetch office locations based on the user role from the database
function fetchOfficeLocations($role) {
    global $pdo;
    $locationTable="";
    if ($role=="HO"){
        $locationTable="hooffices";
    } else if($role=="RO"){
        $locationTable="rooffices";
    } else if($role=="IT"){
        $locationTable="pooffices";
    }
        // Query to fetch all office locations from your database
        $query = "SELECT id, area FROM $locationTable";

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
    $role = isset($_GET['userRole']) ? $_GET['userRole'] : '';
    // Fetch office locations based on the provided user role
    $officeLocations = fetchOfficeLocations($role);

    // Return the result as JSON
    header('Content-Type: application/json');
    echo json_encode($officeLocations);
} else {
    // Handle other request methods or invalid requests
    echo json_encode(['error' => 'Invalid request']);
}
?>
