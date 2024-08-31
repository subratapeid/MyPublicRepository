<?php
session_start();
include 'verify_audit_session.php'; // Include session verification
require_once('config.php'); // Include database configuration
include 'common/getDateTime.php';
header('Content-Type: application/json');

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_SESSION['user_id'], $_SESSION['bcaId'], $_SESSION['auditNumber'])) {
        echo json_encode([
            "success" => false,
            "error" => "Session data missing"
        ]);
        exit();
    }

    // Convert the date time for photo name
    function convertDateTime($dbDatetime) {
        $date = new DateTime($dbDatetime);
        return $date->format('d-M-Y_H-i-s');
    }

    $userId = $_SESSION['user_id'];
    $bcaId = $_SESSION['bcaId'];
    $newAuditNumber = $_SESSION['auditNumber'];

       // Retrieve values from $_POST using ternary operators
$bcaFullName = isset($_POST['bcaFullName']) ? $_POST['bcaFullName'] : '';
$contactNo = isset($_POST['contactNo']) ? $_POST['contactNo'] : '';
$emailID = isset($_POST['emailID']) ? $_POST['emailID'] : '';
$bcPointName = isset($_POST['bcPointName']) ? $_POST['bcPointName'] : '';
$transactionModule = isset($_POST['transactionModule']) ? $_POST['transactionModule'] : '';
$state = isset($_POST['state']) ? $_POST['state'] : '';
$district = isset($_POST['district']) ? $_POST['district'] : '';
$pinCode = isset($_POST['pinCode']) ? $_POST['pinCode'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$village = isset($_POST['village']) ? $_POST['village'] : '';
$landmark = isset($_POST['landmark']) ? $_POST['landmark'] : '';
$gpsCoordinates = isset($_POST['gpsCoordinates']) ? $_POST['gpsCoordinates'] : '';
$bcaBank = isset($_POST['bcaBank']) ? $_POST['bcaBank'] : '';
$bcaBankBranch = isset($_POST['bcaBankBranch']) ? $_POST['bcaBankBranch'] : '';
$bcaPointAddress = isset($_POST['bcaPointAddress']) ? $_POST['bcaPointAddress'] : '';
$bcaPhotoBase64 = isset($_POST['bcaPhoto']) ? $_POST['bcaPhoto'] : '';
$bcPointPhotoBase64 = isset($_POST['bcPointPhoto']) ? $_POST['bcPointPhoto'] : '';
$bcSignaturePhotoBase64 = isset($_POST['bcSignaturePhoto']) ? $_POST['bcSignaturePhoto'] : '';
$bcStampPhotoBase64 = isset($_POST['bcStampPhoto']) ? $_POST['bcStampPhoto'] : '';

    $dbDatetime = getDateTime(); // get real date and time from common function
    $datetime = convertDateTime($dbDatetime); 



    // Initialize array to hold update fields and parameters
    $updateFields = [];
    $params = [':auditNumber' => $newAuditNumber];

    try {
        // Handle bca captured photo process
        if (isset($_POST['bcaPhoto']) && !empty($_POST['bcaPhoto'])) {
            $bcaPhoto = $_POST['bcaPhoto'];
            $photoData1 = base64_decode($bcaPhoto);
            $bcaPhotoNewName = 'BcaPhoto_' . $bcaFullName . '_' . $newAuditNumber . '_' . $datetime . '.png';
            $bcaPhotoPath = 'uploads/' . $bcaPhotoNewName;

            if (file_put_contents($bcaPhotoPath, $photoData1)) {
                $updateFields[] = 'bca_photo_url = :photo_path1';
                $params[':photo_path1'] = $bcaPhotoPath;

                // Delete old bca photo if exists
                $oldPhotoStmt1 = $pdo->prepare("SELECT bca_photo_url FROM bca_and_bcpoint_details WHERE audit_number = :auditNumber");
                $oldPhotoStmt1->execute([':auditNumber' => $newAuditNumber]);
                $oldPhoto1 = $oldPhotoStmt1->fetch(PDO::FETCH_ASSOC)['bca_photo_url'];
                if ($oldPhoto1 && file_exists($oldPhoto1)) {
                    unlink($oldPhoto1);
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to upload first captured photograph.']);
                exit();
            }
        }

        // Handle bc Point captured photo process
        if (isset($_POST['bcPointPhoto']) && !empty($_POST['bcPointPhoto'])) {
            $bcPointPhoto = $_POST['bcPointPhoto'];
            $photoData2 = base64_decode($bcPointPhoto);
            $bcPointPhotoNewName = 'BcPointPhoto_' . $bcaFullName . '_' . $newAuditNumber . '_' . $datetime . '.png';
            $bcPointPhotoPath = 'uploads/' . $bcPointPhotoNewName;

            if (file_put_contents($bcPointPhotoPath, $photoData2)) {
                $updateFields[] = 'bc_point_photo_url = :photo_path2';
                $params[':photo_path2'] = $bcPointPhotoPath;

                // Delete old bcpoint photo if exists
                $oldPhotoStmt2 = $pdo->prepare("SELECT bc_point_photo_url FROM bca_and_bcpoint_details WHERE audit_number = :auditNumber");
                $oldPhotoStmt2->execute([':auditNumber' => $newAuditNumber]);
                $oldPhoto2 = $oldPhotoStmt2->fetch(PDO::FETCH_ASSOC)['bc_point_photo_url'];
                if ($oldPhoto2 && file_exists($oldPhoto2)) {
                    unlink($oldPhoto2);
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to upload second captured photograph.']);
                exit();
            }
        }

                // Handle bc Signature photo process
                if (isset($_POST['bcSignaturePhoto']) && !empty($_POST['bcSignaturePhoto'])) {
                    $bcSignaturePhoto = $_POST['bcSignaturePhoto'];
                    $bcSignaturePhotoBase64 = base64_decode($bcSignaturePhoto);
                    $bcSignaturePhotoNewName = 'BcSignaturePhoto_' . $bcaFullName . '_' . $newAuditNumber . '_' . $datetime . '.png';
                    $bcSignaturePhotoPath = 'uploads/' . $bcSignaturePhotoNewName;
        
                    if (file_put_contents($bcSignaturePhotoPath, $bcSignaturePhotoBase64)) {
                        $updateFields[] = 'bca_signature_url = :photo_path3';
                        $params[':photo_path3'] = $bcSignaturePhotoPath;
        
                        // Delete old bcpoint photo if exists
                        $oldPhotoStmt3 = $pdo->prepare("SELECT bca_signature_url FROM bca_and_bcpoint_details WHERE audit_number = :auditNumber");
                        $oldPhotoStmt3->execute([':auditNumber' => $newAuditNumber]);
                        $oldPhoto3 = $oldPhotoStmt3->fetch(PDO::FETCH_ASSOC)['bca_signature_url'];
                        if ($oldPhoto3 && file_exists($oldPhoto3)) {
                            unlink($oldPhoto3);
                        }
                    } else {
                        echo json_encode(['success' => false, 'error' => 'Failed to upload bca signature.']);
                        exit();
                    }
                }

                // Handle bc stamp photo process
                if (isset($_POST['bcStampPhoto']) && !empty($_POST['bcStampPhoto'])) {
                    $bcStampPhoto = $_POST['bcStampPhoto'];
                    $bcStampPhotoBase64 = base64_decode($bcStampPhoto);
                    $bcStampPhotoNewName = 'BcStampPhoto_' . $bcaFullName . '_' . $newAuditNumber . '_' . $datetime . '.png';
                    $bcStampPhotoPath = 'uploads/' . $bcStampPhotoNewName;
        
                    if (file_put_contents($bcStampPhotoPath, $bcStampPhotoBase64)) {
                        $updateFields[] = 'bc_stamp_url = :bcStampPhotoPath';
                        $params[':bcStampPhotoPath'] = $bcStampPhotoPath;
        
                        // Delete old bcpoint photo if exists
                        $oldPhotoStmt4 = $pdo->prepare("SELECT bc_stamp_url FROM bca_and_bcpoint_details WHERE audit_number = :auditNumber");
                        $oldPhotoStmt4->execute([':auditNumber' => $newAuditNumber]);
                        $oldPhoto4 = $oldPhotoStmt4->fetch(PDO::FETCH_ASSOC)['bc_stamp_url'];
                        if ($oldPhoto4 && file_exists($oldPhoto4)) {
                            unlink($oldPhoto4);
                        }
                    } else {
                        echo json_encode(['success' => false, 'error' => 'Failed to upload bca signature.']);
                        exit();
                    }
                }

        // Update query for captured photos
        if (!empty($updateFields)) {
            $sql = "UPDATE bca_and_bcpoint_details SET " . implode(', ', $updateFields) . " WHERE audit_number = :auditNumber";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
        }

        // Update normal input field data
        $updateQuery = "UPDATE bca_and_bcpoint_details 
                        SET bca_name = :bcaName,
                            bc_point_name = :bcPointName,
                            bca_contact_no = :contactNo,
                            bca_email_id = :emailID,

                            transaction_module = :transactionModule,
                            village = :village,
                            location = :location,
                            district = :district,

                            state = :state,
                            pin = :pin,
                            landmark = :landmark,
                            bca_bank = :bcaBank,

                            bca_bank_branch = :bcaBankBranch,
                            bc_point_address = :bcaPointAddress,

                            last_updated_by_id = :lastupdatedById,
                            last_updated_date = :lastUpdatedDate
                        WHERE audit_number = :auditNumber";

        $stmt = $pdo->prepare($updateQuery);
        $stmt->bindParam(':bcaName', $bcaFullName, PDO::PARAM_STR);
        $stmt->bindParam(':bcPointName', $bcPointName, PDO::PARAM_STR);
        $stmt->bindParam(':contactNo', $contactNo, PDO::PARAM_STR);
        $stmt->bindParam(':emailID', $emailID, PDO::PARAM_STR);

        $stmt->bindParam(':transactionModule', $transactionModule, PDO::PARAM_STR);
        $stmt->bindParam(':village', $village, PDO::PARAM_STR);
        $stmt->bindParam(':location', $location, PDO::PARAM_STR);
        $stmt->bindParam(':district', $district, PDO::PARAM_STR);

        $stmt->bindParam(':state', $state, PDO::PARAM_STR);
        $stmt->bindParam(':pin', $pinCode, PDO::PARAM_STR);
        $stmt->bindParam(':landmark', $landmark, PDO::PARAM_STR);
        $stmt->bindParam(':bcaBank', $bcaBank, PDO::PARAM_STR);

        $stmt->bindParam(':bcaBankBranch', $bcaBankBranch, PDO::PARAM_STR);
        $stmt->bindParam(':bcaPointAddress', $bcaPointAddress, PDO::PARAM_STR);
        $stmt->bindParam(':lastupdatedById', $userId, PDO::PARAM_STR);
        $stmt->bindParam(':lastUpdatedDate', $dbDatetime, PDO::PARAM_STR);
        $stmt->bindParam(':auditNumber', $auditNumber, PDO::PARAM_STR);

        $updateSuccess = $stmt->execute();
        if ($updateSuccess) {
            echo json_encode([
                "success" => true,
                "message" => "Record updated successfully"
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "error" => "Error: Could not update record."
            ]);
        }
    } catch (PDOException $e) {
        echo json_encode([
            "success" => false,
            "error" => "Error: " . $e->geterror()
        ]);
    }
} else {
    echo json_encode([
        "success" => false,
        "error" => "Invalid request method."
    ]);
}

$pdo = null;
?>
