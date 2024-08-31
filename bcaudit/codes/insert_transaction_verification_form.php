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
    $progress = 6; // Assuming a new progress value for this form

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

    // Insert query
    $sql = "INSERT INTO transaction_verification (
        audit_number,
        proc_trans,
        remarks_proc_trans,
        proc_dep_with,
        remarks_proc_dep_with,
        delay_trans,
        remarks_delay_trans,
        acc_trans,
        remarks_acc_trans,
        time_match,
        remarks_time_match,
        cust_ver,
        remarks_cust_ver,
        bc_verify,
        remarks_bc_verify,
        sys_receipts,
        remarks_sys_receipts,
        cust_copy,
        remarks_cust_copy,
        presc_limits,
        remarks_presc_limits,
        auth_trans,
        remarks_auth_trans,
        cash_handling,
        remarks_cash_handling,
        cash_discrep,
        remarks_cash_discrep,
        complaints,
        remarks_complaints,
        comp_policies,
        remarks_comp_policies,
        reg_req,
        remarks_reg_req,
        audit_trail,
        remarks_audit_trail,
        comm_trans,
        remarks_comm_trans,
        tech_issues,
        remarks_tech_issues,
        created_by_id,
        created_date,
        last_updated_date
    ) VALUES (
        :auditNumber,
        :procTrans,
        :remarksProcTrans,
        :procDepWith,
        :remarksProcDepWith,
        :delayTrans,
        :remarksDelayTrans,
        :accTrans,
        :remarksAccTrans,
        :timeMatch,
        :remarksTimeMatch,
        :custVer,
        :remarksCustVer,
        :bcVerify,
        :remarksBcVerify,
        :sysReceipts,
        :remarksSysReceipts,
        :custCopy,
        :remarksCustCopy,
        :prescLimits,
        :remarksPrescLimits,
        :authTrans,
        :remarksAuthTrans,
        :cashHandling,
        :remarksCashHandling,
        :cashDiscrep,
        :remarksCashDiscrep,
        :complaints,
        :remarksComplaints,
        :compPolicies,
        :remarksCompPolicies,
        :regReq,
        :remarksRegReq,
        :auditTrail,
        :remarksAuditTrail,
        :commTrans,
        :remarksCommTrans,
        :techIssues,
        :remarksTechIssues,
        :createdById,
        :createdDate,
        :updatedDate
    )";

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

    $stmt->bindParam(':createdById', $userId, PDO::PARAM_STR);
    $stmt->bindParam(':createdDate', $dbDatetime, PDO::PARAM_STR);
    $stmt->bindParam(':updatedDate', $dbDatetime, PDO::PARAM_STR);

    $stmt->execute();
    if ($stmt->rowCount() > 0) {
       
        // Update progress query
        $updateQuery = "UPDATE audit_list SET progress = :progress, last_updated_date = :updatedDate WHERE audit_number = :auditNumber";
        $stmtUpdate = $pdo->prepare($updateQuery);
        $stmtUpdate->bindParam(':progress', $progress);
        $stmtUpdate->bindParam(':auditNumber', $auditNumber);
        $stmtUpdate->bindParam(':updatedDate', $dbDatetime);

        $stmtUpdate->execute();
        if ($stmtUpdate->rowCount() < 1) {
            $pdo->rollBack();
            $response['status'] = 'error';
            $response['error'] = 'No rows updated for progress.';
        } else{
            $pdo->commit();
            $response['status'] = 'success';
            $response['message'] = 'Data inserted Successfully';

        }

    } else {
        $pdo->rollBack();
        $response['status'] = 'error';
        $response['error'] = 'No data was inserted. Something went wrong.';
    }

    } catch (PDOException $e) {
        // Rollback the transaction if something went wrong
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
