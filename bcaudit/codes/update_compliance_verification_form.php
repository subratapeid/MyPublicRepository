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
    $bcPointPlace = $_POST['bcPointPlace'] ?? '';
    $bcPointPlaceRemarks = $_POST['bcPointPlaceRemarks'] ?? '';
    $bcPointClean = $_POST['bcPointClean'] ?? '';
    $bcPointCleanRemarks = $_POST['bcPointCleanRemarks'] ?? '';
    $postersDisplayed = $_POST['postersDisplayed'] ?? '';
    $outdatedPosters = $_POST['outdatedPosters'] ?? '';
    $postersRemarks = $_POST['postersRemarks'] ?? '';
    $customerAlertDosDonts = $_POST['customerAlertDosDonts'] ?? '';
    $customerAlertDosDontsRemarks = $_POST['customerAlertDosDontsRemarks'] ?? '';
    $verificationCertificate = $_POST['verificationCertificate'] ?? '';
    $verificationCertificateRemarks = $_POST['verificationCertificateRemarks'] ?? '';
    $unauthorizedIndividuals = $_POST['unauthorizedIndividuals'] ?? '';
    $unauthorizedIndividualsRemarks = $_POST['unauthorizedIndividualsRemarks'] ?? '';
    $idCardUsage = $_POST['idCardUsage'] ?? '';
    $idCardUsageRemarks = $_POST['idCardUsageRemarks'] ?? '';
    $cloneFingerprint = $_POST['cloneFingerprint'] ?? '';
    $cloneFingerprintRemarks = $_POST['cloneFingerprintRemarks'] ?? '';
    $manualReceipts = $_POST['manualReceipts'] ?? '';
    $systemGeneratedReceipts = $_POST['systemGeneratedReceipts'] ?? '';
    $customerPassbooks = $_POST['customerPassbooks'] ?? '';
    $transactionSlips = $_POST['transactionSlips'] ?? '';
    $manualReceiptsRemarks = $_POST['manualReceiptsRemarks'] ?? '';
    $nonRelevantApplications = $_POST['nonRelevantApplications'] ?? '';
    $nonRelevantApplicationsRemarks = $_POST['nonRelevantApplicationsRemarks'] ?? '';
    $blockedAccounts = $_POST['blockedAccounts'] ?? '';
    $blockedAccountsRemarks = $_POST['blockedAccountsRemarks'] ?? '';

    try {
        // Start a transaction
        $pdo->beginTransaction();

        // Update query
        $sql = "UPDATE compliance_verification SET
            bc_point_place = :bcPointPlace,
            bc_point_place_remarks = :bcPointPlaceRemarks,
            bc_point_clean = :bcPointClean,
            bc_point_clean_remarks = :bcPointCleanRemarks,
            posters_displayed = :postersDisplayed,
            outdated_posters = :outdatedPosters,
            posters_remarks = :postersRemarks,
            customer_alert_dos_donts = :customerAlertDosDonts,
            customer_alert_dos_donts_remarks = :customerAlertDosDontsRemarks,
            verification_certificate = :verificationCertificate,
            verification_certificate_remarks = :verificationCertificateRemarks,
            unauthorized_individuals = :unauthorizedIndividuals,
            unauthorized_individuals_remarks = :unauthorizedIndividualsRemarks,
            id_card_usage = :idCardUsage,
            id_card_usage_remarks = :idCardUsageRemarks,
            clone_fingerprint = :cloneFingerprint,
            clone_fingerprint_remarks = :cloneFingerprintRemarks,
            manual_receipts = :manualReceipts,
            system_generated_receipts = :systemGeneratedReceipts,
            customer_passbooks = :customerPassbooks,
            transaction_slips = :transactionSlips,
            manual_receipts_remarks = :manualReceiptsRemarks,
            non_relevant_applications = :nonRelevantApplications,
            non_relevant_applications_remarks = :nonRelevantApplicationsRemarks,
            blocked_accounts = :blockedAccounts,
            blocked_accounts_remarks = :blockedAccountsRemarks,
            last_updated_by_id = :updatedBy,
            last_updated_date = :updatedDate
            WHERE audit_number = :auditNumber";

        // Prepare the SQL statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters to the statement
        $stmt->bindParam(':bcPointPlace', $bcPointPlace, PDO::PARAM_STR);
        $stmt->bindParam(':bcPointPlaceRemarks', $bcPointPlaceRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':bcPointClean', $bcPointClean, PDO::PARAM_STR);
        $stmt->bindParam(':bcPointCleanRemarks', $bcPointCleanRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':postersDisplayed', $postersDisplayed, PDO::PARAM_STR);
        $stmt->bindParam(':outdatedPosters', $outdatedPosters, PDO::PARAM_STR);
        $stmt->bindParam(':postersRemarks', $postersRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':customerAlertDosDonts', $customerAlertDosDonts, PDO::PARAM_STR);
        $stmt->bindParam(':customerAlertDosDontsRemarks', $customerAlertDosDontsRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':verificationCertificate', $verificationCertificate, PDO::PARAM_STR);
        $stmt->bindParam(':verificationCertificateRemarks', $verificationCertificateRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':unauthorizedIndividuals', $unauthorizedIndividuals, PDO::PARAM_STR);
        $stmt->bindParam(':unauthorizedIndividualsRemarks', $unauthorizedIndividualsRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':idCardUsage', $idCardUsage, PDO::PARAM_STR);
        $stmt->bindParam(':idCardUsageRemarks', $idCardUsageRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':cloneFingerprint', $cloneFingerprint, PDO::PARAM_STR);
        $stmt->bindParam(':cloneFingerprintRemarks', $cloneFingerprintRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':manualReceipts', $manualReceipts, PDO::PARAM_STR);
        $stmt->bindParam(':systemGeneratedReceipts', $systemGeneratedReceipts, PDO::PARAM_STR);
        $stmt->bindParam(':customerPassbooks', $customerPassbooks, PDO::PARAM_STR);
        $stmt->bindParam(':transactionSlips', $transactionSlips, PDO::PARAM_STR);
        $stmt->bindParam(':manualReceiptsRemarks', $manualReceiptsRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':nonRelevantApplications', $nonRelevantApplications, PDO::PARAM_STR);
        $stmt->bindParam(':nonRelevantApplicationsRemarks', $nonRelevantApplicationsRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':blockedAccounts', $blockedAccounts, PDO::PARAM_STR);
        $stmt->bindParam(':blockedAccountsRemarks', $blockedAccountsRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':auditNumber', $auditNumber, PDO::PARAM_STR);
        $stmt->bindParam(':updatedBy', $userId, PDO::PARAM_STR);
        $stmt->bindParam(':updatedDate', $dbDatetime, PDO::PARAM_STR);
        $stmt->execute();
        // Execute the statement
        if ($stmt->rowCount() > 0) {
            // Commit the transaction
            $pdo->commit();
            $response['status'] = 'success'; 
            $response['message'] = 'Data Updated Successfully';
        } else {
            throw new Exception("Failed to update data in the form_responses table");
        }

    } catch (Exception $e) {
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
