<?php
include '../config.php';
// Set content type to JSON
header('Content-Type: application/json');

// Dummy data simulating database records
$auditors = [];
// Fetch input fields data (conclusion and recommendations)
$stmt = $pdo->prepare("SELECT CONCAT(user_first_name,' ', user_last_name) as name, emp_id as empId FROM all_user_data
WHERE user_role = 'auditor'");
$stmt->execute();
$auditors = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output the data as JSON
echo json_encode($auditors);
?>
