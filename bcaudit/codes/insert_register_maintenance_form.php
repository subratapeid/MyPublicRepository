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
    $progress = 4; // Assuming a new progress value for this form
    // $auditNumber = $_POST['auditNumber'] ?? '';

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

        // Insert query
        $sql = "INSERT INTO register_maintain (
            audit_number,
            transaction_register,
            transaction_register_remarks,
            account_opening_register,
            account_opening_register_remarks,
            complaint_register,
            complaint_register_remarks,
            visitor_register,
            visitor_register_remarks,
            cash_register,
            cash_register_remarks,
            audit_register,
            audit_register_remarks,
            service_register,
            service_register_remarks,
            inventory_register,
            inventory_register_remarks,
            loan_register,
            loan_register_remarks,
            customer_feedback_register,
            customer_feedback_register_remarks,
            compliance_register,
            compliance_register_remarks,
            staff_attendance_register,
            staff_attendance_register_remarks,
            training_register,
            training_register_remarks,
            shg_register,
            shg_register_remarks,
            settlement_register,
            settlement_register_remarks,
            target_achievement_register,
            target_achievement_register_remarks,
            entries_accuracy,
            entries_accuracy_remarks,
            transaction_entries_reliability,
            transaction_entries_reliability_remarks,
            txn_count_matching,
            txn_count_matching_remarks,
            additional_remarks_registers,
            created_by_id,
            created_date,
            last_updated_date
        ) VALUES (
            :auditNumber,
            :transactionRegister,
            :transactionRegisterRemarks,
            :accountOpeningRegister,
            :accountOpeningRegisterRemarks,
            :complaintRegister,
            :complaintRegisterRemarks,
            :visitorRegister,
            :visitorRegisterRemarks,
            :cashRegister,
            :cashRegisterRemarks,
            :auditRegister,
            :auditRegisterRemarks,
            :serviceRegister,
            :serviceRegisterRemarks,
            :inventoryRegister,
            :inventoryRegisterRemarks,
            :loanRegister,
            :loanRegisterRemarks,
            :customerFeedbackRegister,
            :customerFeedbackRegisterRemarks,
            :complianceRegister,
            :complianceRegisterRemarks,
            :staffAttendanceRegister,
            :staffAttendanceRegisterRemarks,
            :trainingRegister,
            :trainingRegisterRemarks,
            :shgRegister,
            :shgRegisterRemarks,
            :settlementRegister,
            :settlementRegisterRemarks,
            :targetAchievementRegister,
            :targetAchievementRegisterRemarks,
            :entriesAccuracy,
            :entriesAccuracyRemarks,
            :transactionEntriesReliability,
            :transactionEntriesReliabilityRemarks,
            :txnCountMatching,
            :txnCountMatchingRemarks,
            :additionalRemarksRegisters,
            :createdById,
            :createdDate,
            :updatedDate
        )";

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
        $stmt->bindParam(':createdById', $userId, PDO::PARAM_STR);
        $stmt->bindParam(':createdDate', $dbDatetime, PDO::PARAM_STR);
        $stmt->bindParam(':updatedDate', $dbDatetime, PDO::PARAM_STR);

        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            // Insert was successful
            $response['status'] = 'success';
            $response['message'] = 'Data inserted successfully!';

            // Update progress query
            $updateQuery = "UPDATE audit_list SET progress = :progress, last_updated_date = :updatedDate WHERE audit_number = :auditNumber";
            $stmtUpdate = $pdo->prepare($updateQuery);
            $stmtUpdate->bindParam(':progress', $progress);
            $stmtUpdate->bindParam(':auditNumber', $auditNumber);
            $stmtUpdate->bindParam(':updatedDate', $dbDatetime);

            $stmtUpdate->execute();
            if ($stmtUpdate->rowCount() > 0) {
                $pdo->commit();
                $response['update_status'] = 'success';
                $response['update_message'] = 'Progress updated successfully!';
            } else {
                $pdo->rollBack();
                $response['update_status'] = 'failure';
                $response['update_message'] = 'No rows updated for progress.';
            }
        } else {
            $pdo->rollBack();
            $response['status'] = 'error';
            $response['error'] = 'No data was inserted. Something went wrong.';
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
