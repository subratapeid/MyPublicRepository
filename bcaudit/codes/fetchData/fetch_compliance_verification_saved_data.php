<?php
session_start();
require_once('../config.php');
header('Content-Type: application/json');

$auditNumber = $_SESSION["auditNumber"];

// $data = [
//     'bc_point_place' => 'Yes',
//     'bc_point_place_remarks' => 'Located at the entrance, very prominent.',
//     'bc_point_clean' => 'No',
//     'bc_point_clean_remarks' => 'Needs cleaning, a lot of dust and dirt.',
//     'posters_displayed' => 'Yes',
//     'outdated_posters' => 'No',
//     'posters_remarks' => 'All posters are up-to-date and properly displayed.',
//     'customer_alert_dos_donts' => 'Yes',
//     'customer_alert_dos_donts_remarks' => 'Clear and visible to customers.',
//     'verification_certificate' => 'No',
//     'verification_certificate_remarks' => 'Certificate is missing, needs to be updated.',
//     'unauthorized_individuals' => 'Yes',
//     'unauthorized_individuals_remarks' => 'Observed one unauthorized person handling transactions.',
//     'id_card_usage' => 'Yes',
//     'id_card_usage_remarks' => 'Valid ID card is being used by the BCA.',
//     'clone_fingerprint' => 'No',
//     'clone_fingerprint_remarks' => 'No evidence of clone fingerprint usage found.',
//     'manual_receipts' => 'Yes',
//     'system_generated_receipts' => 'No',
//     'customer_passbooks' => 'Yes',
//     'transaction_slips' => 'No',
//     'manual_receipts_remarks' => 'Some manual receipts were issued due to system issues.',
//     'non_relevant_applications' => 'Yes',
//     'non_relevant_applications_remarks' => 'Observed some non-relevant applications being used.',
//     'blocked_accounts' => 'No',
//     'blocked_accounts_remarks' => 'No blocked accounts were found.'
// ];


try {
    $stmt = $pdo->prepare("SELECT * FROM compliance_verification WHERE audit_number = :auditNumber");
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
