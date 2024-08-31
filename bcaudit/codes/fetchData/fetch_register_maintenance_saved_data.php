<?php
session_start();
require_once('../config.php');
header('Content-Type: application/json');

$auditNumber = $_SESSION["auditNumber"];
// $data = [
//     'transaction_register' => 'Yes',
//     'transaction_register_remarks' => 'Transactions are up to date.',
    
//     'account_opening_register' => 'No',
//     'account_opening_register_remarks' => 'No new accounts this month.',
    
//     'complaint_register' => 'Yes',
//     'complaint_register_remarks' => '3 complaints resolved.',
    
//     'visitor_register' => 'Yes',
//     'visitor_register_remarks' => '10 visitors today.',
    
//     'cash_register' => 'Yes',
//     'cash_register_remarks' => 'Cash balance verified.',
    
//     'audit_register' => 'No',
//     'audit_register_remarks' => 'Pending audit for this quarter.',
    
//     'service_register' => 'Yes',
//     'service_register_remarks' => 'All services performed as scheduled.',
    
//     'inventory_register' => 'No',
//     'inventory_register_remarks' => 'Inventory audit pending.',
    
//     'loan_register' => 'Yes',
//     'loan_register_remarks' => '2 new loan applications processed.',
    
//     'customer_feedback_register' => 'Yes',
//     'customer_feedback_register_remarks' => 'Positive feedback received from 5 customers.',
    
//     'compliance_register' => 'Yes',
//     'compliance_register_remarks' => 'All compliance requirements met.',
    
//     'staff_attendance_register' => 'Yes',
//     'staff_attendance_register_remarks' => 'All staff present.',
    
//     'training_register' => 'No',
//     'training_register_remarks' => 'No training sessions this week.',
    
//     'shg_register' => 'Yes',
//     'shg_register_remarks' => '2 SHG meetings conducted.',
    
//     'settlement_register' => 'No',
//     'settlement_register_remarks' => 'Pending settlements.',
    
//     'target_achievement_register' => 'Yes',
//     'target_achievement_register_remarks' => 'Targets achieved for the month.',
    
//     'entries_accuracy' => 'Yes',
//     'entries_accuracy_remarks' => 'All entries are accurate.',
    
//     'transaction_entries_reliability' => 'No',
//     'transaction_entries_reliability_remarks' => 'Some discrepancies found.',
    
//     'txn_count_matching' => 'Yes',
//     'txn_count_matching_remarks' => 'Transaction counts match.',
    
//     'additional_remarks_registers' => 'Overall, operations are running smoothly.'
// ];


try {
    $stmt = $pdo->prepare("SELECT * FROM register_maintain WHERE audit_number = :auditNumber");
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
