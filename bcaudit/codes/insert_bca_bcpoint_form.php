<?php
session_start();
include 'verify_audit_session.php';
require_once('config.php');
include 'common/getDateTime.php';
header('Content-Type: application/json');

// Function to generate new audit number
// function generateAuditNumber($pdo) {
//     try {
//         $stmt = $pdo->query("SELECT audit_number FROM audit_list ORDER BY audit_number DESC LIMIT 1");
//         $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
//         if ($result) {
//             $currentAuditNumber = $result['audit_number'];
//             $currentNumber = intval(substr($currentAuditNumber, 3));
//             $newNumber = $currentNumber + 1;
//         } else {
//             $newNumber = 1;
//         }

//         $newAuditNumber = 'AUD' . $newNumber;
//         return $newAuditNumber;

//     } catch (PDOException $e) {
//         return json_encode([
//             "success" => false,
//             "error" => "Error generating audit number:  " . $e->getMessage()
//         ]);
//         exit();
//     }
// }

function generateAuditNumber($pdo) {
    try {
        $stmt = $pdo->query("SELECT audit_number FROM audit_list ORDER BY audit_number DESC LIMIT 1");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            $currentAuditNumber = $result['audit_number'];
            $currentNumber = intval(substr($currentAuditNumber, 3));
            $newNumber = $currentNumber + 1;
        } else {
            $newNumber = 11;
        }

        $newAuditNumber = 'INT' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        return $newAuditNumber;

    } catch (PDOException $e) {
        return json_encode([
            "success" => false,
            "error" => "Error generating audit number: " . $e->getMessage()
        ]);
        exit();
    }
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userId = $_SESSION['user_id'];
    $bcaId = $_SESSION['bcaId'];
    $bcaName = $_SESSION['bcaName'];
    $progress = 1; // Initial progress
    $status = 'inprogress'; // Initial status

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
// $bcaPhotoBase64 = isset($_POST['bcaPhoto']) ? $_POST['bcaPhoto'] : '';
// $bcPointPhotoBase64 = isset($_POST['bcPointPhoto']) ? $_POST['bcPointPhoto'] : '';
// $bcSignaturePhotoBase64 = isset($_POST['bcSignaturePhoto']) ? $_POST['bcSignaturePhoto'] : ''; // Assuming this is where you store base64 encoded image data
// $bcStampPhotoBase64 = isset($_POST['bcStampPhoto']) ? $_POST['bcStampPhoto'] : ''; // Assuming this is where you store base64 encoded image data

    // Convert the date time for photo name
    function convertDateTime($dbDatetime) {
        $date = new DateTime($dbDatetime);
        return $date->format('d-M-Y_H-i-s');
    }

    // Mandatory check for photos 
    if (empty($_POST['bcaPhoto']) || empty($_POST['bcPointPhoto']) || empty($_POST['bcSignaturePhoto'])) {
        echo json_encode(['success' => false, 'error' => 'Both BCA, BC Point photo and signature are required.']);
        exit();
    }

    // Process new audit number
    $newAuditNumber = generateAuditNumber($pdo); // Generate audit number
    if (strpos($newAuditNumber, "Error") !== false) {
        echo $newAuditNumber;
        exit();
    }
    
    $dbDatetime = getDateTime(); // get real date and time from common function
    $datetime = convertDateTime($dbDatetime);
    // Handle bca captured photo process
    $bcaPhotoPath = '';
    if (isset($_POST['bcaPhoto']) && !empty($_POST['bcaPhoto'])) {
        $bcaPhoto = $_POST['bcaPhoto'];
        $photoData1 = base64_decode($bcaPhoto);
        $bcaPhotoNewName = 'BcaPhoto_' . $bcaId . '_' . $newAuditNumber . '_' . $datetime . '.png';
        $bcaPhotoPath = 'uploads/' . $bcaPhotoNewName;

        if (!file_put_contents($bcaPhotoPath, $photoData1)) {
            echo json_encode(['success' => false, 'message' => 'Failed to upload BCA photograph.']);
            exit();
        }
    }

    // Handle bc Point captured photo process
    $bcPointPhotoPath = '';
    if (isset($_POST['bcPointPhoto']) && !empty($_POST['bcPointPhoto'])) {
        $bcPointPhoto = $_POST['bcPointPhoto'];
        $photoData2 = base64_decode($bcPointPhoto);
        $bcPointPhotoNewName = 'BcPointPhoto_' . $bcaId . '_' . $newAuditNumber . '_' . $datetime . '.png';
        $bcPointPhotoPath = 'uploads/' . $bcPointPhotoNewName;

        if (!file_put_contents($bcPointPhotoPath, $photoData2)) {
            echo json_encode(['success' => false, 'error' => 'Failed to upload BC Point photograph.']);
            exit();
        }
    }

        // Handle bca signature photo process
        $bcaSignaturePath = '';
        if (isset($_POST['bcSignaturePhoto']) && !empty($_POST['bcSignaturePhoto'])) {
            $bcaSignature = $_POST['bcSignaturePhoto'];
            $photoData3 = base64_decode($bcaSignature);
            $bcaSignatureNewName = 'BcaSignature_' . $bcaId . '_' . $newAuditNumber . '_' . $datetime . '.png';
            $bcaSignaturePath = 'uploads/' . $bcaSignatureNewName;
    
            if (!file_put_contents($bcaSignaturePath, $photoData3)) {
                echo json_encode(['success' => false, 'error' => 'Failed to upload BCA Signature.']);
                exit();
            }
        }

            // Handle bc Stamp captured photo process
    $bcStampPhotoPath = '';
    if (isset($_POST['bcStampPhoto']) && !empty($_POST['bcStampPhoto'])) {
        $bcStampPhoto = $_POST['bcStampPhoto'];
        $photoData4 = base64_decode($bcStampPhoto);
        $bcStampPhotoNewName = 'BcStampPhoto' . $bcaId . '_' . $newAuditNumber . '_' . $datetime . '.png';
        $bcStampPhotoPath = 'uploads/' . $bcStampPhotoNewName;

        if (!file_put_contents($bcStampPhotoPath, $photoData4)) {
            echo json_encode(['success' => false, 'error' => 'Failed to upload BC Stamp photograph.']);
            exit();
        }
    }

    try {
        // Begin a transaction
        $pdo->beginTransaction();
        // Proceed with insertion only if both photos are processed
        $insertQuery = "INSERT INTO bca_and_bcpoint_details 
                        (bca_id, 
                        bca_name, 
                        audit_number, 
                        bc_point_name,

                        bca_contact_no, 
                        bca_email_id, 
                        transaction_module,
                        village,

                        location,
                        district,
                        state,
                        pin,

                        landmark,
                        bca_bank,
                        bca_bank_branch, 
                        bc_point_address,

                        bca_photo_url, 
                        bc_point_photo_url, 
                        bca_signature_url,
                        bc_stamp_url,

                        created_by_id,  
                        created_date,
                        last_updated_date) 
                    VALUES 
                        (:bcaId, 
                        :bcaName, 
                        :auditNumber, 
                        :bcPointName, 
                        
                        :contactNo, 
                        :emailID, 
                        :transactionModule,
                        :village,

                        :location,
                        :district,
                        :state,
                        :pin,

                        :landmark,
                        :bcaBank,
                        :bcaBankBranch, 
                        :bcaPointAddress, 
                        
                        :bcaPhotoUrl, 
                        :bcPointPhotoUrl,
                        :bcaSignaturePath,
                        :bcStampPhotoPath, 

                        :createdById, 
                        :createdDate,
                        :lastUpdated)";

        $stmt = $pdo->prepare($insertQuery);
        $stmt->bindParam(':bcaId', $bcaId, PDO::PARAM_STR);
        $stmt->bindParam(':bcaName', $_POST['bcaFullName'], PDO::PARAM_STR);
        $stmt->bindParam(':auditNumber', $newAuditNumber, PDO::PARAM_STR);
        $stmt->bindParam(':bcPointName', $_POST['bcPointName'], PDO::PARAM_STR);

        $stmt->bindParam(':contactNo', $_POST['contactNo'], PDO::PARAM_STR);
        $stmt->bindParam(':emailID', $_POST['emailID'], PDO::PARAM_STR);
        $stmt->bindParam(':transactionModule', $transactionModule, PDO::PARAM_STR);
        $stmt->bindParam(':village', $village, PDO::PARAM_STR);

        $stmt->bindParam(':location', $location, PDO::PARAM_STR);
        $stmt->bindParam(':district', $district, PDO::PARAM_STR);
        $stmt->bindParam(':state', $state, PDO::PARAM_STR);
        $stmt->bindParam(':pin', $pinCode, PDO::PARAM_STR);

        $stmt->bindParam(':landmark', $landmark, PDO::PARAM_STR);
        $stmt->bindParam(':bcaBank', $bcaBank, PDO::PARAM_STR);
        $stmt->bindParam(':bcaBankBranch', $_POST['bcaBankBranch'], PDO::PARAM_STR);
        $stmt->bindParam(':bcaPointAddress', $_POST['bcaPointAddress'], PDO::PARAM_STR);

        $stmt->bindParam(':bcaPhotoUrl', $bcaPhotoPath, PDO::PARAM_STR);
        $stmt->bindParam(':bcPointPhotoUrl', $bcPointPhotoPath, PDO::PARAM_STR);
        $stmt->bindParam(':bcaSignaturePath', $bcaSignaturePath, PDO::PARAM_STR);
        $stmt->bindParam(':bcStampPhotoPath', $bcStampPhotoPath, PDO::PARAM_STR);

        $stmt->bindParam(':createdById', $userId, PDO::PARAM_STR);
        $stmt->bindParam(':createdDate', $dbDatetime, PDO::PARAM_STR);
        $stmt->bindParam(':lastUpdated', $dbDatetime, PDO::PARAM_STR);

        // Execute SQL statement
        $insertSuccess = $stmt->execute();

        // Second insert query for audit_list
            $insertQuery2 = "INSERT INTO audit_list 
            (audit_number, 
            progress, 
            status,
            created_by_id,

            created_date,
            last_updated_date) 
        VALUES 
            (:auditNumber, 
            :progress, 
            :status,
            :createdById,

            :createdDate,
            :lastUpdated)";

        $stmt2 = $pdo->prepare($insertQuery2);
        $stmt2->bindParam(':auditNumber', $newAuditNumber, PDO::PARAM_STR);
        $stmt2->bindParam(':progress', $progress, PDO::PARAM_INT);
        $stmt2->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt2->bindParam(':createdById', $userId, PDO::PARAM_STR);

        $stmt2->bindParam(':createdDate', $dbDatetime, PDO::PARAM_STR);
        $stmt2->bindParam(':lastUpdated', $dbDatetime, PDO::PARAM_STR);

        // Execute the second insert query
        $stmt2->execute();

        // Commit the transaction
        $pdo->commit();
        if ($insertSuccess) {
            $_SESSION['auditNumber'] = $newAuditNumber; // Store audit number in session
            echo json_encode([
                "success" => true,
                "auditNumber" => $newAuditNumber
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "error" => "Error: Could not update record."
            ]);
        }

    } catch (PDOException $e) {
        $pdo->rollBack();
        echo json_encode([
            "success" => false,
            "error" => "Error: " . $e->getMessage()
        ]);
        exit();
    }

} else {
    // Handle invalid request method
    echo json_encode([
        "success" => false,
        "error" => "Invalid request method."
    ]);
    exit();
}
$pdo = null;
?>
