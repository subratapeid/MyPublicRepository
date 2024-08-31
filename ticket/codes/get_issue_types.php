<?php
require_once('config.php');
try {
    // Prepare and execute the SQL query
    $stmt = $pdo->prepare("SELECT issue_id, issue_type FROM issue_type");
    $stmt->execute();

    // Fetch all rows as an associative array
    $issueTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the issue types as JSON
    echo json_encode($issueTypes);
} catch (PDOException $e) {
    // Handle database errors
    die("error: " . $e->getMessage());
}

?>