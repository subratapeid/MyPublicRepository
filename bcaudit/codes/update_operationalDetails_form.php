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

 $sql = "UPDATE operational_details SET
            abe_name = :abeName,
            abm_name = :abmName,
            rm_name = :rmName,
            zm_name = :zmName,
            operating_hours = :operatingHours,
            designated_location = :operatingLocation,
            designated_location_remarks = :operatingLocationRemarks,
            training_given = :trainingGiven,
            training_remarks = :trainingRemarks,
            business_explore = :businessExplore,
            business_explore_remarks = :businessExploreRemarks,
            target_set = :targetSet,
            target_clear = :targetClear,
            target_documented = :targetDocumented,
            abe_support = :abeSupport,
            bank_support = :bankSupport,
            target_remarks = :targetRemarks,
            onboarding_fee_paid = :onboardingFeePaid,
            fee_unclear = :feeUnclear,
            fees_documented = :feesDocumented,
            fee_payment_mode = :transactionModule,
            onboarding_remarks = :onboardingRemarks,
            rm_visit = :rmVisit,
            rm_visit_remarks = :rmVisitRemarks,
            abm_visit = :abmVisit,
            abm_visit_remarks = :abmVisitRemarks,
            abe_visit = :abeVisit,
            abe_visit_remarks = :abeVisitRemarks,
            bank_official_visit = :bankOfficialVisit,
            bank_official_visit_remarks = :bankOfficialVisitRemarks,
            bc_visit = :bcVisit,
            bc_visit_remarks = :bcVisitRemarks,
            last_updated_by_id = :lastUpdatedBy,
            last_updated_date = :updatedDate
        WHERE audit_number = :auditNumber";

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
$stmt->bindParam(':lastUpdatedBy', $userId, PDO::PARAM_STR);
$stmt->bindParam(':updatedDate', $dbDatetime, PDO::PARAM_STR);

$stmt->execute();
    if ($stmt->rowCount() > 0) {
        $response['status'] = 'success';
        $response['message'] = 'Data Updated successfully! Go to the next page';
    } else {
        $response['status'] = 'error';
        $response['error'] = 'No data was inserted. Something went wrong.';
    }
    
    unset($pdo);

    } catch (PDOException $e) {
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
