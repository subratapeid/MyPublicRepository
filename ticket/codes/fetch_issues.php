<?php
// Assuming you have a database connection established
include 'config.php'; // Include your database connection file here

// Function to fetch office locations based on the user role from the database
function fetchIssues($issueType) {
    global $pdo;
        // Query to fetch all office locations from your database
 $query = "SELECT issue FROM issues_list
        LEFT JOIN issue_type ON issues_list.issue_type_id = issue_type.issue_id 
        WHERE issue_type.issue_type = :issueType";

// Prepare the statement
$stmt = $pdo->prepare($query);

// Bind the parameter
$stmt->bindParam(':issueType', $issueType, PDO::PARAM_STR);

// Execute the statement
$stmt->execute();

// Fetch the results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $results;

    }

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $issueType = isset($_GET['issueType']) ? $_GET['issueType'] : '';
    // Fetch office locations based on the provided user role
    $issueList = fetchIssues($issueType);

    // Return the result as JSON
    header('Content-Type: application/json');
    echo json_encode($issueList);
} else {
    // Handle other request methods or invalid requests
    echo json_encode(['error' => 'Invalid request']);
}
?>
