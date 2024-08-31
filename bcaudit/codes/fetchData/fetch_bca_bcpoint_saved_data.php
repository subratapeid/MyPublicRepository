<?php
session_start();
require_once('../config.php');
header('Content-Type: application/json');

$auditNumber = $_SESSION["auditNumber"];


try {
    // Fetch data
    $stmt = $pdo->prepare("SELECT * FROM bca_and_bcpoint_details WHERE audit_number = :auditNumber");
    $stmt->execute(['auditNumber' => $auditNumber]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        echo json_encode(['success' => true, 'data' => $row]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No data found']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
unset($pdo);

?>
