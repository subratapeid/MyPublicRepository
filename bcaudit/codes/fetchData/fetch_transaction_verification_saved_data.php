<?php
session_start();
require_once('../config.php');
header('Content-Type: application/json');

$auditNumber = $_SESSION["auditNumber"];


// $data = [
//     'proc_trans' => 'Yes',
//     'remarks_proc_trans' => 'Processed transactions successfully.',
//     'proc_dep_with' => 'No',
//     'remarks_proc_dep_with' => 'Failed to process deposits.',
//     'delay_trans' => 'Yes',
//     'remarks_delay_trans' => 'Transactions delayed by 5 minutes.',
//     'acc_trans' => 'No',
//     'remarks_acc_trans' => 'Accounts not reconciled.',
//     'time_match' => 'Yes',
//     'remarks_time_match' => 'Timings matched accurately.',
//     'cust_ver' => 'Yes',
//     'remarks_cust_ver' => 'Customer verification completed.',
//     'bc_verify' => 'No',
//     'remarks_bc_verify' => 'BC verification pending.',
//     'sys_receipts' => 'Yes',
//     'remarks_sys_receipts' => 'System receipts generated.',
//     'cust_copy' => 'No',
//     'remarks_cust_copy' => 'Customer copy not provided.',
//     'presc_limits' => 'Yes',
//     'remarks_presc_limits' => 'Limits prescribed correctly.',
//     'auth_trans' => 'No',
//     'remarks_auth_trans' => 'Unauthorized transactions detected.',
//     'cash_handling' => 'Yes',
//     'remarks_cash_handling' => 'Cash handling compliant.',
//     'cash_discrep' => 'No',
//     'remarks_cash_discrep' => 'No cash discrepancies.',
//     'complaints' => 'Yes',
//     'remarks_complaints' => 'Customer complaints registered.',
//     'comp_policies' => 'No',
//     'remarks_comp_policies' => 'Company policies not followed.',
//     'reg_req' => 'Yes',
//     'remarks_reg_req' => 'Regulatory requirements met.',
//     'audit_trail' => 'No',
//     'remarks_audit_trail' => 'Audit trail incomplete.',
//     'comm_trans' => 'Yes',
//     'remarks_comm_trans' => 'Communication of transactions done.',
//     'tech_issues' => 'Yes',
//     'remarks_tech_ssues' => 'Communication of remarks_tech_ssues.',
// ];


try {
    $stmt = $pdo->prepare("SELECT * FROM transaction_verification WHERE audit_number = :auditNumber");
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
