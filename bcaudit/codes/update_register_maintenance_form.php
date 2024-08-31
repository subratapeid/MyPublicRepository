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
    $transactionRegister = $_POST['transactionRegister'] ?? '';
    $transactionRegisterRemarks = $_POST['transactionRegisterRemarks'] ?? '';
    $accountOpeningRegister = $_POST['accountOpeningRegister'] ?? '';
    $accountOpeningRegisterRemarks = $_POST['accountOpeningRegisterRemarks'] ?? '';
    $complaintRegister = $_POST['complaintRegister'] ?? '';
    $complaintRegisterRemarks = $_POST['complaintRegisterRemarks'] ?? '';
    $visitorRegister = $_POST['visitorRegister'] ?? '';
    $visitorRegisterRemarks = $_POST['visitorRegisterRemarks'] ?? '';
    $cashRegister = $_POST['cashRegister'] ?? '';
    $cashRegisterRemarks = $_POST['cashRegisterRemarks'] ?? '';
    $auditRegister = $_POST['auditRegister'] ?? '';
    $auditRegisterRemarks = $_POST['auditRegisterRemarks'] ?? '';
    $serviceRegister = $_POST['serviceRegister'] ?? '';
    $serviceRegisterRemarks = $_POST['serviceRegisterRemarks'] ?? '';
    $inventoryRegister = $_POST['inventoryRegister'] ?? '';
    $inventoryRegisterRemarks = $_POST['inventoryRegisterRemarks'] ?? '';
    $loanRegister = $_POST['loanRegister'] ?? '';
    $loanRegisterRemarks = $_POST['loanRegisterRemarks'] ?? '';
    $customerFeedbackRegister = $_POST['customerFeedbackRegister'] ?? '';
    $customerFeedbackRegisterRemarks = $_POST['customerFeedbackRegisterRemarks'] ?? '';
    $complianceRegister = $_POST['complianceRegister'] ?? '';
    $complianceRegisterRemarks = $_POST['complianceRegisterRemarks'] ?? '';
    $staffAttendanceRegister = $_POST['staffAttendanceRegister'] ?? '';
    $staffAttendanceRegisterRemarks = $_POST['staffAttendanceRegisterRemarks'] ?? '';
    $trainingRegister = $_POST['trainingRegister'] ?? '';
    $trainingRegisterRemarks = $_POST['trainingRegisterRemarks'] ?? '';
    $shgRegister = $_POST['shgRegister'] ?? '';
    $shgRegisterRemarks = $_POST['shgRegisterRemarks'] ?? '';
    $settlementRegister = $_POST['settlementRegister'] ?? '';
    $settlementRegisterRemarks = $_POST['settlementRegisterRemarks'] ?? '';
    $targetAchievementRegister = $_POST['targetAchievementRegister'] ?? '';
    $targetAchievementRegisterRemarks = $_POST['targetAchievementRegisterRemarks'] ?? '';
    $entriesAccuracy = $_POST['entriesAccuracy'] ?? '';
    $entriesAccuracyRemarks = $_POST['entriesAccuracyRemarks'] ?? '';
    $transactionEntriesReliability = $_POST['transactionEntriesReliability'] ?? '';
    $transactionEntriesReliabilityRemarks = $_POST['transactionEntriesReliabilityRemarks'] ?? '';
    $txnCountMatching = $_POST['txnCountMatching'] ?? '';
    $txnCountMatchingRemarks = $_POST['txnCountMatchingRemarks'] ?? '';
    $additionalRemarksRegisters = $_POST['additionalRemarksRegisters'] ?? '';

    try {
        // Start a transaction
        $pdo->beginTransaction();

        // Update query
        $sql = "UPDATE register_maintain SET
            transaction_register = :transactionRegister,
            transaction_register_remarks = :transactionRegisterRemarks,
            account_opening_register = :accountOpeningRegister,
            account_opening_register_remarks = :accountOpeningRegisterRemarks,
            complaint_register = :complaintRegister,
            complaint_register_remarks = :complaintRegisterRemarks,
            visitor_register = :visitorRegister,
            visitor_register_remarks = :visitorRegisterRemarks,
            cash_register = :cashRegister,
            cash_register_remarks = :cashRegisterRemarks,
            audit_register = :auditRegister,
            audit_register_remarks = :auditRegisterRemarks,
            service_register = :serviceRegister,
            service_register_remarks = :serviceRegisterRemarks,
            inventory_register = :inventoryRegister,
            inventory_register_remarks = :inventoryRegisterRemarks,
            loan_register = :loanRegister,
            loan_register_remarks = :loanRegisterRemarks,
            customer_feedback_register = :customerFeedbackRegister,
            customer_feedback_register_remarks = :customerFeedbackRegisterRemarks,
            compliance_register = :complianceRegister,
            compliance_register_remarks = :complianceRegisterRemarks,
            staff_attendance_register = :staffAttendanceRegister,
            staff_attendance_register_remarks = :staffAttendanceRegisterRemarks,
            training_register = :trainingRegister,
            training_register_remarks = :trainingRegisterRemarks,
            shg_register = :shgRegister,
            shg_register_remarks = :shgRegisterRemarks,
            settlement_register = :settlementRegister,
            settlement_register_remarks = :settlementRegisterRemarks,
            target_achievement_register = :targetAchievementRegister,
            target_achievement_register_remarks = :targetAchievementRegisterRemarks,
            entries_accuracy = :entriesAccuracy,
            entries_accuracy_remarks = :entriesAccuracyRemarks,
            transaction_entries_reliability = :transactionEntriesReliability,
            transaction_entries_reliability_remarks = :transactionEntriesReliabilityRemarks,
            txn_count_matching = :txnCountMatching,
            txn_count_matching_remarks = :txnCountMatchingRemarks,
            additional_remarks_registers = :additionalRemarksRegisters,
            last_updated_by_id = :updatedBy,
            last_updated_date = :updatedDate
        WHERE audit_number = :auditNumber";

        // Prepare the SQL statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters to the statement
        $stmt->bindParam(':auditNumber', $auditNumber, PDO::PARAM_STR);
        $stmt->bindParam(':transactionRegister', $transactionRegister, PDO::PARAM_STR);
        $stmt->bindParam(':transactionRegisterRemarks', $transactionRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':accountOpeningRegister', $accountOpeningRegister, PDO::PARAM_STR);
        $stmt->bindParam(':accountOpeningRegisterRemarks', $accountOpeningRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':complaintRegister', $complaintRegister, PDO::PARAM_STR);
        $stmt->bindParam(':complaintRegisterRemarks', $complaintRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':visitorRegister', $visitorRegister, PDO::PARAM_STR);
        $stmt->bindParam(':visitorRegisterRemarks', $visitorRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':cashRegister', $cashRegister, PDO::PARAM_STR);
        $stmt->bindParam(':cashRegisterRemarks', $cashRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':auditRegister', $auditRegister, PDO::PARAM_STR);
        $stmt->bindParam(':auditRegisterRemarks', $auditRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':serviceRegister', $serviceRegister, PDO::PARAM_STR);
        $stmt->bindParam(':serviceRegisterRemarks', $serviceRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':inventoryRegister', $inventoryRegister, PDO::PARAM_STR);
        $stmt->bindParam(':inventoryRegisterRemarks', $inventoryRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':loanRegister', $loanRegister, PDO::PARAM_STR);
        $stmt->bindParam(':loanRegisterRemarks', $loanRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':customerFeedbackRegister', $customerFeedbackRegister, PDO::PARAM_STR);
        $stmt->bindParam(':customerFeedbackRegisterRemarks', $customerFeedbackRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':complianceRegister', $complianceRegister, PDO::PARAM_STR);
        $stmt->bindParam(':complianceRegisterRemarks', $complianceRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':staffAttendanceRegister', $staffAttendanceRegister, PDO::PARAM_STR);
        $stmt->bindParam(':staffAttendanceRegisterRemarks', $staffAttendanceRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':trainingRegister', $trainingRegister, PDO::PARAM_STR);
        $stmt->bindParam(':trainingRegisterRemarks', $trainingRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':shgRegister', $shgRegister, PDO::PARAM_STR);
        $stmt->bindParam(':shgRegisterRemarks', $shgRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':settlementRegister', $settlementRegister, PDO::PARAM_STR);
        $stmt->bindParam(':settlementRegisterRemarks', $settlementRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':targetAchievementRegister', $targetAchievementRegister, PDO::PARAM_STR);
        $stmt->bindParam(':targetAchievementRegisterRemarks', $targetAchievementRegisterRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':entriesAccuracy', $entriesAccuracy, PDO::PARAM_STR);
        $stmt->bindParam(':entriesAccuracyRemarks', $entriesAccuracyRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':transactionEntriesReliability', $transactionEntriesReliability, PDO::PARAM_STR);
        $stmt->bindParam(':transactionEntriesReliabilityRemarks', $transactionEntriesReliabilityRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':txnCountMatching', $txnCountMatching, PDO::PARAM_STR);
        $stmt->bindParam(':txnCountMatchingRemarks', $txnCountMatchingRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':additionalRemarksRegisters', $additionalRemarksRegisters, PDO::PARAM_STR);
        $stmt->bindParam(':updatedBy', $userId, PDO::PARAM_STR);
        $stmt->bindParam(':updatedDate', $dbDatetime, PDO::PARAM_STR);

        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            // Update was successful
            $response['status'] = 'success';
            $response['message'] = 'Data updated successfully!';
            $pdo->commit();
        } else {
            $pdo->rollBack();
            $response['status'] = 'error';
            $response['error'] = 'No data was updated. Something went wrong.';
        }
    } catch (PDOException $e) {
        $pdo->rollBack();
        $response['status'] = 'error';
        $response['error'] = 'Error: ' . $e->getMessage();
    }
} else {
    $response['status'] = 'error';
    $response['error'] = 'Invalid request type.';
}

echo json_encode($response);
?>
