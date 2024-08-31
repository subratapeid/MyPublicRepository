<?php
session_start();
require_once('config.php');
header('Content-Type: application/json');
$auditNumber = $_SESSION["auditNumber"];

// $equipmentId = isset($_GET['equipmentId']) ? intval($_GET['equipmentId']) : null;

if (!$auditNumber) {
    echo json_encode(['success' => false, 'message' => 'Invalid audit number']);
    exit();
}

try {
    // Fetch data
    // $stmt = $pdo->prepare("SELECT * FROM audit_record_data WHERE audit_number = :auditNumber");
    // $stmt->execute(['auditNumber' => $auditNumber]);
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // if ($row) {
    //     // Transform data if necessary
    //     $response = [
    //         'equipment' => explode(',', $row['equipment_available']),
    //         'photo_url' => $row['equipment_photo'],
    //         'remarks' => $row['equipment_remarks'],
    //         'power_backup' => $row['power_backup'],
    //         'internet_connection' => $row['internet_connection'],
    //         'additional_comments' => $row['equipments_additional_comments']
    //     ];

        $data = array(
            "laptop_desktop" => "Yes",
            "laptop_desktop_remarks" => "Remarks for laptop or desktop.",
            "printer" => "No",
            "printer_remarks" => "Remarks for printer.",
            "scanner" => "Yes",
            "scanner_remarks" => "Remarks for scanner.",
            "biometric" => "No",
            "biometric_remarks" => "Remarks for biometric.",
            "pos_terminal" => "Yes",
            "pos_terminal_remarks" => "Remarks for POS terminal.",
            "internet_router" => "No",
            "internet_router_remarks" => "Remarks for internet router.",
            "ups" => "Yes",
            "ups_remarks" => "Remarks for UPS.",
            "cctv_camera" => "No",
            "cctv_camera_remarks" => "Remarks for CCTV camera.",
            "mobile_tablet" => "Yes",
            "mobile_tablet_remarks" => "Remarks for mobile or tablet.",
            "counting_machine" => "No",
            "counting_machine_remarks" => "Remarks for counting machine.",
            "card_reader" => "Yes",
            "card_reader_remarks" => "Remarks for card reader.",
            "external_hdd" => "No",
            "external_hdd_remarks" => "Remarks for external HDD.",
            "photocopier" => "Yes",
            "photocopier_remarks" => "Remarks for photocopier.",
            "other_devices" => "Other devices information.",
            "remarks" => "General remarks for hardware.",
            "hardware_photo" => "base64-image-string"
        );        

        echo json_encode(['success' => true, 'data' => $data]);
    // } else {
    //     echo json_encode(['success' => false, 'message' => 'No data found']);
    // }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
unset($pdo);
?>
