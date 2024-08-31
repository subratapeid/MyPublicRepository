<?php
session_start();
require_once('../config.php');
header('Content-Type: application/json');

$auditNumber = $_SESSION["auditNumber"];


try {
    $stmt = $pdo->prepare("SELECT * FROM operational_details WHERE audit_number = :auditNumber");
    $stmt->execute(['auditNumber' => $auditNumber]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        echo json_encode(['success' => true, 'data' => $data]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No data found']);
    }

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
unset($pdo);

?>
