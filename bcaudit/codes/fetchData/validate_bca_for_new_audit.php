<?php
require_once('../config.php');

// Set header for JSON response
header('Content-Type: application/json');

if (isset($_GET['bca_id'])) {
    $bcaId = $_GET['bca_id'];
    
    // Prepare and execute the SQL statement
    $sql = "SELECT *, CONCAT(first_name, CASE WHEN middle_name <> '' THEN CONCAT(' ', middle_name) ELSE '' END,
        CASE WHEN middle_name <> '' AND last_name <> '' THEN CONCAT(' ', last_name) ELSE CONCAT(' ', last_name) END)
        AS bca_name FROM all_bc_details WHERE bca_id = :bcaId";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt) {
        $stmt->bindParam(':bcaId', $bcaId, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo json_encode(['success' => true, 'data' => $result]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No data found']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to prepare statement']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No bca_id provided']);
}

$pdo = null;
?>
