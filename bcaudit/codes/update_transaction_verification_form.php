<?php
session_start();
include 'verify_audit_session.php';
include 'config.php';
include 'common/getDateTime.php';

header('Content-Type: application/json');

$response = ['status' => '', 'error' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dbDatetime = getDateTime(); // Get real date and time from common function
    $userId = $_SESSION['user_id'];

// Retrieve form data
$procTrans = $_POST['procTrans'] ?? '';
$remarksProcTrans = $_POST['remarksProcTrans'] ?? '';
$procDepWith = $_POST['procDepWith'] ?? '';
$remarksProcDepWith = $_POST['remarksProcDepWith'] ?? '';
$delayTrans = $_POST['delayTrans'] ?? '';
$remarksDelayTrans = $_POST['remarksDelayTrans'] ?? '';
$accTrans = $_POST['accTrans'] ?? '';
$remarksAccTrans = $_POST['remarksAccTrans'] ?? '';
$timeMatch = $_POST['timeMatch'] ?? '';
$remarksTimeMatch = $_POST['remarksTimeMatch'] ?? '';
$custVer = $_POST['custVer'] ?? '';
$remarksCustVer = $_POST['remarksCustVer'] ?? '';
$bcVerify = $_POST['bcVerify'] ?? '';
$remarksBcVerify = $_POST['remarksBcVerify'] ?? '';
$sysReceipts = $_POST['sysReceipts'] ?? '';
$remarksSysReceipts = $_POST['remarksSysReceipts'] ?? '';
$custCopy = $_POST['custCopy'] ?? '';
$remarksCustCopy = $_POST['remarksCustCopy'] ?? '';
$prescLimits = $_POST['prescLimits'] ?? '';
$remarksPrescLimits = $_POST['remarksPrescLimits'] ?? '';
$authTrans = $_POST['authTrans'] ?? '';
$remarksAuthTrans = $_POST['remarksAuthTrans'] ?? '';
$cashHandling = $_POST['cashHandling'] ?? '';
$remarksCashHandling = $_POST['remarksCashHandling'] ?? '';
$cashDiscrep = $_POST['cashDiscrep'] ?? '';
$remarksCashDiscrep = $_POST['remarksCashDiscrep'] ?? '';
$complaints = $_POST['complaints'] ?? '';
$remarksComplaints = $_POST['remarksComplaints'] ?? '';
$compPolicies = $_POST['compPolicies'] ?? '';
$remarksCompPolicies = $_POST['remarksCompPolicies'] ?? '';
$regReq = $_POST['regReq'] ?? '';
$remarksRegReq = $_POST['remarksRegReq'] ?? '';
$auditTrail = $_POST['auditTrail'] ?? '';
$remarksAuditTrail = $_POST['remarksAuditTrail'] ?? '';
$commTrans = $_POST['commTrans'] ?? '';
$remarksCommTrans = $_POST['remarksCommTrans'] ?? '';
$techIssues = $_POST['techIssues'] ?? '';
$remarksTechIssues = $_POST['remarksTechIssues'] ?? '';

try {
    // Start a transaction
    $pdo->beginTransaction();

    // Update query
    $sql = "UPDATE transaction_verification SET
        proc_trans = :procTrans,
        remarks_proc_trans = :remarksProcTrans,
        proc_dep_with = :procDepWith,
        remarks_proc_dep_with = :remarksProcDepWith,
        delay_trans = :delayTrans,
        remarks_delay_trans = :remarksDelayTrans,
        acc_trans = :accTrans,
        remarks_acc_trans = :remarksAccTrans,
        time_match = :timeMatch,
        remarks_time_match = :remarksTimeMatch,
        cust_ver = :custVer,
        remarks_cust_ver = :remarksCustVer,
        bc_verify = :bcVerify,
        remarks_bc_verify = :remarksBcVerify,
        sys_receipts = :sysReceipts,
        remarks_sys_receipts = :remarksSysReceipts,
        cust_copy = :custCopy,
        remarks_cust_copy = :remarksCustCopy,
        presc_limits = :prescLimits,
        remarks_presc_limits = :remarksPrescLimits,
        auth_trans = :authTrans,
        remarks_auth_trans = :remarksAuthTrans,
        cash_handling = :cashHandling,
        remarks_cash_handling = :remarksCashHandling,
        cash_discrep = :cashDiscrep,
        remarks_cash_discrep = :remarksCashDiscrep,
        complaints = :complaints,
        remarks_complaints = :remarksComplaints,
        comp_policies = :compPolicies,
        remarks_comp_policies = :remarksCompPolicies,
        reg_req = :regReq,
        remarks_reg_req = :remarksRegReq,
        audit_trail = :auditTrail,
        remarks_audit_trail = :remarksAuditTrail,
        comm_trans = :commTrans,
        remarks_comm_trans = :remarksCommTrans,
        tech_issues = :techIssues,
        remarks_tech_issues = :remarksTechIssues,
        last_updated_by_id = :updatedBy,
        last_updated_date = :updatedDate
    WHERE audit_number = :auditNumber";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters to the statement
    $stmt->bindParam(':auditNumber', $auditNumber, PDO::PARAM_STR);
    $stmt->bindParam(':procTrans', $procTrans, PDO::PARAM_STR);
    $stmt->bindParam(':remarksProcTrans', $remarksProcTrans, PDO::PARAM_STR);
    $stmt->bindParam(':procDepWith', $procDepWith, PDO::PARAM_STR);
    $stmt->bindParam(':remarksProcDepWith', $remarksProcDepWith, PDO::PARAM_STR);
    $stmt->bindParam(':delayTrans', $delayTrans, PDO::PARAM_STR);
    $stmt->bindParam(':remarksDelayTrans', $remarksDelayTrans, PDO::PARAM_STR);
    $stmt->bindParam(':accTrans', $accTrans, PDO::PARAM_STR);
    $stmt->bindParam(':remarksAccTrans', $remarksAccTrans, PDO::PARAM_STR);
    $stmt->bindParam(':timeMatch', $timeMatch, PDO::PARAM_STR);
    $stmt->bindParam(':remarksTimeMatch', $remarksTimeMatch, PDO::PARAM_STR);
    $stmt->bindParam(':custVer', $custVer, PDO::PARAM_STR);
    $stmt->bindParam(':remarksCustVer', $remarksCustVer, PDO::PARAM_STR);
    $stmt->bindParam(':bcVerify', $bcVerify, PDO::PARAM_STR);
    $stmt->bindParam(':remarksBcVerify', $remarksBcVerify, PDO::PARAM_STR);
    $stmt->bindParam(':sysReceipts', $sysReceipts, PDO::PARAM_STR);
    $stmt->bindParam(':remarksSysReceipts', $remarksSysReceipts, PDO::PARAM_STR);
    $stmt->bindParam(':custCopy', $custCopy, PDO::PARAM_STR);
    $stmt->bindParam(':remarksCustCopy', $remarksCustCopy, PDO::PARAM_STR);
    $stmt->bindParam(':prescLimits', $prescLimits, PDO::PARAM_STR);
    $stmt->bindParam(':remarksPrescLimits', $remarksPrescLimits, PDO::PARAM_STR);
    $stmt->bindParam(':authTrans', $authTrans, PDO::PARAM_STR);
    $stmt->bindParam(':remarksAuthTrans', $remarksAuthTrans, PDO::PARAM_STR);
    $stmt->bindParam(':cashHandling', $cashHandling, PDO::PARAM_STR);
    $stmt->bindParam(':remarksCashHandling', $remarksCashHandling, PDO::PARAM_STR);
    $stmt->bindParam(':cashDiscrep', $cashDiscrep, PDO::PARAM_STR);
    $stmt->bindParam(':remarksCashDiscrep', $remarksCashDiscrep, PDO::PARAM_STR);
    $stmt->bindParam(':complaints', $complaints, PDO::PARAM_STR);
    $stmt->bindParam(':remarksComplaints', $remarksComplaints, PDO::PARAM_STR);
    $stmt->bindParam(':compPolicies', $compPolicies, PDO::PARAM_STR);
    $stmt->bindParam(':remarksCompPolicies', $remarksCompPolicies, PDO::PARAM_STR);
    $stmt->bindParam(':regReq', $regReq, PDO::PARAM_STR);
    $stmt->bindParam(':remarksRegReq', $remarksRegReq, PDO::PARAM_STR);
    $stmt->bindParam(':auditTrail', $auditTrail, PDO::PARAM_STR);
    $stmt->bindParam(':remarksAuditTrail', $remarksAuditTrail, PDO::PARAM_STR);
    $stmt->bindParam(':commTrans', $commTrans, PDO::PARAM_STR);
    $stmt->bindParam(':remarksCommTrans', $remarksCommTrans, PDO::PARAM_STR);
    $stmt->bindParam(':techIssues', $techIssues, PDO::PARAM_STR);
    $stmt->bindParam(':remarksTechIssues', $remarksTechIssues, PDO::PARAM_STR);

    $stmt->bindParam(':updatedBy', $userId, PDO::PARAM_STR);
    $stmt->bindParam(':updatedDate', $dbDatetime, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();
    
    // Check if any row was updated
    if ($stmt->rowCount() > 0) {
        // Commit the transaction
        $pdo->commit();
        $response['status'] = 'success';
        $response['message'] = 'Data updated Successfully';
    } else {
        // Rollback the transaction if no rows were updated
        $pdo->rollBack();
        $response['status'] = 'error';
        $response['error'] = 'No data was updated. Something went wrong.';
    }
} catch (PDOException $e) {
    // Rollback the transaction in case of an error
    $pdo->rollBack();
    $response['status'] = 'error';
    $response['error'] = $e->getMessage();
}

} else {
    $response['status'] = 'error';
    $response['error'] = 'Invalid request method';
}

echo json_encode($response);
?>
