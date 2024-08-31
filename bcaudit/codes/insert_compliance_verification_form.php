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
    $progress = 5; // Assuming a new progress value for this form

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

        // Insert query
        $sql = "INSERT INTO compliance_verification (
            audit_number,
            bc_point_place,
            bc_point_place_remarks,
            bc_point_clean,
            bc_point_clean_remarks,
            posters_displayed,
            outdated_posters,
            posters_remarks,
            customer_alert_dos_donts,
            customer_alert_dos_donts_remarks,
            verification_certificate,
            verification_certificate_remarks,
            unauthorized_individuals,
            unauthorized_individuals_remarks,
            id_card_usage,
            id_card_usage_remarks,
            clone_fingerprint,
            clone_fingerprint_remarks,
            manual_receipts,
            system_generated_receipts,
            customer_passbooks,
            transaction_slips,
            manual_receipts_remarks,
            non_relevant_applications,
            non_relevant_applications_remarks,
            blocked_accounts,
            blocked_accounts_remarks,
            created_by_id,
            created_date,
            last_updated_date
        ) VALUES (
            :auditNumber,
            :bcPointPlace,
            :bcPointPlaceRemarks,
            :bcPointClean,
            :bcPointCleanRemarks,
            :postersDisplayed,
            :outdatedPosters,
            :postersRemarks,
            :customerAlertDosDonts,
            :customerAlertDosDontsRemarks,
            :verificationCertificate,
            :verificationCertificateRemarks,
            :unauthorizedIndividuals,
            :unauthorizedIndividualsRemarks,
            :idCardUsage,
            :idCardUsageRemarks,
            :cloneFingerprint,
            :cloneFingerprintRemarks,
            :manualReceipts,
            :systemGeneratedReceipts,
            :customerPassbooks,
            :transactionSlips,
            :manualReceiptsRemarks,
            :nonRelevantApplications,
            :nonRelevantApplicationsRemarks,
            :blockedAccounts,
            :blockedAccountsRemarks,
            :createdById,
            :createdDate,
            :updatedDate
        )";

        // Prepare the SQL statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters to the statement
        $stmt->bindParam(':auditNumber', $auditNumber, PDO::PARAM_STR);
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
