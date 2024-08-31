<?php
session_start();
include 'verify_audit_session.php';
include 'config.php';
include 'common/getDateTime.php';

header('Content-Type: application/json');

$response = ['status' => '', 'error' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Convert the date time for photo name
    // function convertDateTime($dbDatetime) {
    //     $date = new DateTime($dbDatetime);
    //     return $date->format('d-M-Y_H-i-s');
    // }

    $dbDatetime = getDateTime(); // get real date and time from common function
    // $datetime = convertDateTime($dbDatetime);
    // Retrieve session variables
    $userId = $_SESSION['user_id'];
    $progress = 2; // Assuming a new progress value for this form

// Retrieve form data
$abeName = $_POST['abeName'] ?? '';
$abmName = $_POST['abmName'] ?? '';
$rmName = $_POST['rmName'] ?? '';
$zmName = $_POST['zmName'] ?? '';
$operatingHours = $_POST['operatingHours'] ?? '';
$operatingLocation = $_POST['operatingLocation'] ?? '';
$operatingLocationRemarks = $_POST['operatingLocationRemarks'] ?? '';
$trainingGiven = $_POST['trainingGiven'] ?? '';
$trainingRemarks = $_POST['trainingRemarks'] ?? '';
$businessExplore = $_POST['businessExplore'] ?? '';
$businessExploreRemarks = $_POST['businessExploreRemarks'] ?? '';
$targetSet = $_POST['targetSet'] ?? '';
$targetClear = $_POST['targetClear'] ?? '';
$targetDocumented = $_POST['targetDocumented'] ?? '';
$abeSupport = $_POST['abeSupport'] ?? '';
$bankSupport = $_POST['bankSupport'] ?? '';
$targetRemarks = $_POST['targetRemarks'] ?? '';
$onboardingFeePaid = $_POST['onboardingFeePaid'] ?? '';
$feeUnclear = $_POST['feeUnclear'] ?? '';
$feesDocumented = $_POST['feesDocumented'] ?? '';
$transactionModule = $_POST['transactionModule'] ?? '';
$onboardingRemarks = $_POST['onboardingRemarks'] ?? '';
$rmVisit = $_POST['rmVisit'] ?? '';
$rmVisitRemarks = $_POST['rmVisitRemarks'] ?? '';
$abmVisit = $_POST['abmVisit'] ?? '';
$abmVisitRemarks = $_POST['abmVisitRemarks'] ?? '';
$abeVisit = $_POST['abeVisit'] ?? '';
$abeVisitRemarks = $_POST['abeVisitRemarks'] ?? '';
$bankOfficialVisit = $_POST['bankOfficialVisit'] ?? '';
$bankOfficialVisitRemarks = $_POST['bankOfficialVisitRemarks'] ?? '';
$bcVisit = $_POST['bcVisit'] ?? '';
$bcVisitRemarks = $_POST['bcVisitRemarks'] ?? '';

    try{
        // Start a transaction
    $pdo->beginTransaction();
    
        // update progress query
        $updateQuery = "UPDATE audit_list SET progress = :progress, last_updated_date = :updatedDate WHERE audit_number = :auditNumber";
        $stmtUpdate = $pdo->prepare($updateQuery);
        // Bind parameters for the second query
        $stmtUpdate->bindParam(':progress', $progress);
        $stmtUpdate->bindParam(':auditNumber', $auditNumber);
        $stmtUpdate->bindParam(':updatedDate', $dbDatetime);


        $sql = "INSERT INTO operational_details (
            audit_number,
            abe_name,
            abm_name,
            rm_name,
            zm_name,
            operating_hours,
            designated_location,
            designated_location_remarks,
            training_given,
            training_remarks,
            business_explore,
            business_explore_remarks,
            target_set,
            target_clear,
            target_documented,
            abe_support,
            bank_support,
            target_remarks,
            onboarding_fee_paid,
            fee_unclear,
            fees_documented,
            fee_payment_mode,
            onboarding_remarks,
            rm_visit,
            rm_visit_remarks,
            abm_visit,
            abm_visit_remarks,
            abe_visit,
            abe_visit_remarks,
            bank_official_visit,
            bank_official_visit_remarks,
            bc_visit,
            bc_visit_remarks,
            created_by_id,
            created_date,
            last_updated_date
        ) VALUES (
            :auditNumber,
            :abeName,
            :abmName,
            :rmName,
            :zmName,
            :operatingHours,
            :operatingLocation,
            :operatingLocationRemarks,
            :trainingGiven,
            :trainingRemarks,
            :businessExplore,
            :businessExploreRemarks,
            :targetSet,
            :targetClear,
            :targetDocumented,
            :abeSupport,
            :bankSupport,
            :targetRemarks,
            :onboardingFeePaid,
            :feeUnclear,
            :feesDocumented,
            :transactionModule,
            :onboardingRemarks,
            :rmVisit,
            :rmVisitRemarks,
            :abmVisit,
            :abmVisitRemarks,
            :abeVisit,
            :abeVisitRemarks,
            :bankOfficialVisit,
            :bankOfficialVisitRemarks,
            :bcVisit,
            :bcVisitRemarks,
            :createdById,
            :createdDate,
            :updatedDate
        )";

        // Prepare the SQL statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters to the statement
        $stmt->bindParam(':auditNumber', $auditNumber, PDO::PARAM_STR);
        $stmt->bindParam(':abeName', $abeName, PDO::PARAM_STR);
        $stmt->bindParam(':abmName', $abmName, PDO::PARAM_STR);
        $stmt->bindParam(':rmName', $rmName, PDO::PARAM_STR);
        $stmt->bindParam(':zmName', $zmName, PDO::PARAM_STR);
        $stmt->bindParam(':operatingHours', $operatingHours, PDO::PARAM_STR);
        $stmt->bindParam(':operatingLocation', $operatingLocation, PDO::PARAM_STR);
        $stmt->bindParam(':operatingLocationRemarks', $operatingLocationRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':trainingGiven', $trainingGiven, PDO::PARAM_STR);
        $stmt->bindParam(':trainingRemarks', $trainingRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':businessExplore', $businessExplore, PDO::PARAM_STR);
        $stmt->bindParam(':businessExploreRemarks', $businessExploreRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':targetSet', $targetSet, PDO::PARAM_STR);
        $stmt->bindParam(':targetClear', $targetClear, PDO::PARAM_STR);
        $stmt->bindParam(':targetDocumented', $targetDocumented, PDO::PARAM_STR);
        $stmt->bindParam(':abeSupport', $abeSupport, PDO::PARAM_STR);
        $stmt->bindParam(':bankSupport', $bankSupport, PDO::PARAM_STR);
        $stmt->bindParam(':targetRemarks', $targetRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':onboardingFeePaid', $onboardingFeePaid, PDO::PARAM_STR);
        $stmt->bindParam(':feeUnclear', $feeUnclear, PDO::PARAM_STR);
        $stmt->bindParam(':feesDocumented', $feesDocumented, PDO::PARAM_STR);
        $stmt->bindParam(':transactionModule', $transactionModule, PDO::PARAM_STR);
        $stmt->bindParam(':onboardingRemarks', $onboardingRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':rmVisit', $rmVisit, PDO::PARAM_STR);
        $stmt->bindParam(':rmVisitRemarks', $rmVisitRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':abmVisit', $abmVisit, PDO::PARAM_STR);
        $stmt->bindParam(':abmVisitRemarks', $abmVisitRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':abeVisit', $abeVisit, PDO::PARAM_STR);
        $stmt->bindParam(':abeVisitRemarks', $abeVisitRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':bankOfficialVisit', $bankOfficialVisit, PDO::PARAM_STR);
        $stmt->bindParam(':bankOfficialVisitRemarks', $bankOfficialVisitRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':bcVisit', $bcVisit, PDO::PARAM_STR);
        $stmt->bindParam(':bcVisitRemarks', $bcVisitRemarks, PDO::PARAM_STR);
        $stmt->bindParam(':createdById', $userId, PDO::PARAM_STR);
        $stmt->bindParam(':createdDate', $dbDatetime, PDO::PARAM_STR);
        $stmt->bindParam(':updatedDate', $dbDatetime, PDO::PARAM_STR);

            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                // First query was successful
                $response['status'] = 'success';
                $response['message'] = 'Data Inserted successfully! Go to the next page';
                // Execute the second update query
                $stmtUpdate->execute();
        
                if ($stmtUpdate->rowCount() > 0) {
                    $pdo->commit();
                    $response['update_status'] = 'success';
                    $response['update_message'] = 'Data updated successfully!';
                } else {
                    $pdo->rollBack();
                    $response['update_status'] = 'failure';
                    $response['update_message'] = 'No rows updated.';
                }
                // second querry end
            } else {
                $pdo->rollBack();
                $response['status'] = 'error';
                $response['error'] = 'No data was inserted. Something went wrong.';
            }
            // first querry end
        } catch (PDOException $e) {
            $pdo->rollBack();
            $response['status'] = 'error';
            $response['error'] = 'Error: ' . $e->getMessage();
        }
    // } input data validation check end

    } else {
        $response['status'] = 'error';
        $response['error'] = 'Invalid request type.';
    }

    echo json_encode($response);
?>
