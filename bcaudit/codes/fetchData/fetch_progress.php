<?php
require_once('../config.php');

// Set header for JSON response
header('Content-Type: application/json');

// Initialize response array
$response = ['success' => false, 'message' => ''];

// Check if both bcaId and auditNumber are provided in the query string
if (isset($_GET['bcaId']) || isset($_GET['auditNumber'])) {
    // Initialize data array
    $data = [];

    try {
    //     if (isset($_GET['bcaId'])) {

    //     $bcaId = $_GET['bcaId'];
    //     // Prepare and execute SQL query to fetch bca_name based on bcaId
    //     $query1 = "SELECT bca_full_name FROM all_bc_details WHERE bca_id = ?";
    //     $stmt1 = $pdo->prepare($query1);
    //     $stmt1->execute([$bcaId]);
    //     $bcaName = $stmt1->fetchColumn();
        
    //     if ($bcaName) {
    //         // $data['bcaName'] = $bcaName;
    //     } else{
    //     // $data['bcaName'] = "";
    //         $message = 'BCA data not found';
    //     }
    // }
    if (isset($_GET['auditNumber'])) {

        $auditNumber = $_GET['auditNumber'];
        // Prepare and execute SQL query to fetch progress based on auditNumber
        $query2 = "SELECT progress FROM audit_list WHERE audit_number = ?";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute([$auditNumber]);
        $progress = $stmt2->fetchColumn();
        
        if ($progress) {
            $data['progress'] = $progress;
        } else {
            $message = 'audit id not found';
            $data['progress'] = 0;
        }
    }
        // Check if data array is not empty
        if (!empty($data)) {
            $response = ['success' => true, 'data' => $data];
        } else {
            $response['message'] = $message;
        }
    } catch (Exception $e) {
        $response['message'] = 'Database error: ' . $e->getMessage();
    }
} else {
    $response['message'] = 'Missing bcaId or auditNumber';
}

// Output the response as JSON
echo json_encode($response);

$pdo = null;
?>
