<?php
session_start();
require_once('../config.php');
header('Content-Type: application/json');

$bcaId = $_SESSION["bcaId"];


try {
    // Fetch data
    $stmt = $pdo->prepare("SELECT *, CONCAT(first_name, CASE WHEN middle_name <> '' THEN CONCAT(' ', middle_name) ELSE '' END,
        CASE WHEN middle_name <> '' AND last_name <> '' THEN CONCAT(' ', last_name) ELSE CONCAT(' ', last_name) END)
        AS bca_name FROM all_bc_details WHERE bca_id = :bcaId");
    $stmt->execute(['bcaId' => $bcaId]);
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
