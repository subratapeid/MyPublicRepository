<?php
session_start();
include 'verify_audit_session.php';
include 'config.php';
include 'common/getDateTime.php';

header('Content-Type: application/json');

$response = ['status' => '', 'error' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Convert the date time for photo name
    function convertDateTime($dbDatetime) {
        $date = new DateTime($dbDatetime);
        return $date->format('d-M-Y_H-i-s');
    }

    $dbDatetime = getDateTime(); // get real date and time from common function
    $datetime = convertDateTime($dbDatetime);
    // Retrieve session variables
    $userId = $_SESSION['user_id'];
    $progress = 3; // Assuming a new progress value for this form

 // Retrieve data from POST request using null coalescing operator
 $laptopDesktop = $_POST['laptopDesktop'] ?? '';
 $laptopDesktopRemarks = $_POST['laptopDesktopRemarks'] ?? '';
 
 $printer = $_POST['printer'] ?? '';
 $printerRemarks = $_POST['printerRemarks'] ?? '';
 
 $scanner = $_POST['scanner'] ?? '';
 $scannerRemarks = $_POST['scannerRemarks'] ?? '';
 
 $biometric = $_POST['biometric'] ?? '';
 $biometricRemarks = $_POST['biometricRemarks'] ?? '';
 
 $posTerminal = $_POST['posTerminal'] ?? '';
 $posTerminalRemarks = $_POST['posTerminalRemarks'] ?? '';
 
 $internetRouter = $_POST['internetRouter'] ?? '';
 $internetRouterRemarks = $_POST['internetRouterRemarks'] ?? '';
 
 $ups = $_POST['ups'] ?? '';
 $upsRemarks = $_POST['upsRemarks'] ?? '';
 
 $cctvCamera = $_POST['cctvCamera'] ?? '';
 $cctvCameraRemarks = $_POST['cctvCameraRemarks'] ?? '';
 
 $mobileTablet = $_POST['mobileTablet'] ?? '';
 $mobileTabletRemarks = $_POST['mobileTabletRemarks'] ?? '';
 
 $countingMachine = $_POST['countingMachine'] ?? '';
 $countingMachineRemarks = $_POST['countingMachineRemarks'] ?? '';
 
 $cardReader = $_POST['cardReader'] ?? '';
 $cardReaderRemarks = $_POST['cardReaderRemarks'] ?? '';
 
 $externalHDD = $_POST['externalHDD'] ?? '';
 $externalHDDRemarks = $_POST['externalHDDRemarks'] ?? '';
 
 $photocopier = $_POST['photocopier'] ?? '';
 $photocopierRemarks = $_POST['photocopierRemarks'] ?? '';
 
 $otherDevices = $_POST['otherDevices'] ?? '';
 
 $remarks = $_POST['remarks'] ?? '';

// Mandatory check for photos 
if (empty($_POST['hardwarePhoto'])) {
    echo json_encode(['success' => false, 'error' => 'Hardwares Photo is required.']);
    exit();
}

// Handle hardware captured photo process
$hardwarePhotoPath = '';
if (isset($_POST['hardwarePhoto']) && !empty($_POST['hardwarePhoto'])) {
    $hardwarePhoto = $_POST['hardwarePhoto'];
    $photoData1 = base64_decode($hardwarePhoto);
    $hardwarePhotoNewName = 'HardwarePhoto_'. $auditNumber . '_' . $datetime . '.png';
    $hardwarePhotoPath = 'uploads/' . $hardwarePhotoNewName;

    if (!file_put_contents($hardwarePhotoPath, $photoData1)) {
        echo json_encode(['success' => false, 'message' => 'Failed to upload hardware photograph.']);
        exit();
    }
}

     // Check if the audit record belongs to the logged-in user
    // $stmt = $pdo->prepare("SELECT user_id FROM audit_record_data WHERE audit_number = :auditNumber");
    // $stmt->bindParam(':auditNumber', $auditNumber, PDO::PARAM_STR);
    // $stmt->execute();
    // $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // if ($result && $result['user_id'] == $loggedInUserId) { close the bracket below

    // Validate required fields one by one
    // if (empty($operatingHours)) {
    //     $response['status'] = 'error';
    //     $response['error'] = 'Please fill in the Operating Hours field.';
    // } else {
        // Prepare SQL query to update the existing table
        // SQL Insert Query
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


            // Prepare the SQL statement with named placeholders
    $sql = "INSERT INTO hardware_infrastructure (
        audit_number, laptop_desktop, laptop_desktop_remarks, printer, printer_remarks, 
        scanner, scanner_remarks, biometric, biometric_remarks, 
        pos_terminal, pos_terminal_remarks, internet_router, internet_router_remarks, 
        ups, ups_remarks, cctv_camera, cctv_camera_remarks, 
        mobile_tablet, mobile_tablet_remarks, counting_machine, counting_machine_remarks, 
        card_reader, card_reader_remarks, external_hdd, external_hdd_remarks, 
        photocopier, photocopier_remarks, other_devices, hardware_photo_path, hardware_remarks, created_by_id, created_date, last_updated_date) 
        VALUES (
        :auditNumber, :laptopDesktop, :laptopDesktopRemarks, :printer, :printerRemarks, 
        :scanner, :scannerRemarks, :biometric, :biometricRemarks, 
        :posTerminal, :posTerminalRemarks, :internetRouter, :internetRouterRemarks, 
        :ups, :upsRemarks, :cctvCamera, :cctvCameraRemarks, 
        :mobileTablet, :mobileTabletRemarks, :countingMachine, :countingMachineRemarks, 
        :cardReader, :cardReaderRemarks, :externalHDD, :externalHDDRemarks, 
        :photocopier, :photocopierRemarks, :otherDevices, :hardwarePhotoPath, :remarks, :createdById, :createdDate, :updatedDate)";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters to the statement
    $stmt->bindParam(':auditNumber', $auditNumber, PDO::PARAM_STR);
    $stmt->bindParam(':laptopDesktop', $laptopDesktop, PDO::PARAM_STR);
    $stmt->bindParam(':laptopDesktopRemarks', $laptopDesktopRemarks, PDO::PARAM_STR);
    $stmt->bindParam(':printer', $printer, PDO::PARAM_STR);
    $stmt->bindParam(':printerRemarks', $printerRemarks, PDO::PARAM_STR);
    $stmt->bindParam(':scanner', $scanner, PDO::PARAM_STR);
    $stmt->bindParam(':scannerRemarks', $scannerRemarks, PDO::PARAM_STR);
    $stmt->bindParam(':biometric', $biometric, PDO::PARAM_STR);
    $stmt->bindParam(':biometricRemarks', $biometricRemarks, PDO::PARAM_STR);
    $stmt->bindParam(':posTerminal', $posTerminal, PDO::PARAM_STR);
    $stmt->bindParam(':posTerminalRemarks', $posTerminalRemarks, PDO::PARAM_STR);
    $stmt->bindParam(':internetRouter', $internetRouter, PDO::PARAM_STR);
    $stmt->bindParam(':internetRouterRemarks', $internetRouterRemarks, PDO::PARAM_STR);
    $stmt->bindParam(':ups', $ups, PDO::PARAM_STR);
    $stmt->bindParam(':upsRemarks', $upsRemarks, PDO::PARAM_STR);
    $stmt->bindParam(':cctvCamera', $cctvCamera, PDO::PARAM_STR);
    $stmt->bindParam(':cctvCameraRemarks', $cctvCameraRemarks, PDO::PARAM_STR);
    $stmt->bindParam(':mobileTablet', $mobileTablet, PDO::PARAM_STR);
    $stmt->bindParam(':mobileTabletRemarks', $mobileTabletRemarks, PDO::PARAM_STR);
    $stmt->bindParam(':countingMachine', $countingMachine, PDO::PARAM_STR);
    $stmt->bindParam(':countingMachineRemarks', $countingMachineRemarks, PDO::PARAM_STR);
    $stmt->bindParam(':cardReader', $cardReader, PDO::PARAM_STR);
    $stmt->bindParam(':cardReaderRemarks', $cardReaderRemarks, PDO::PARAM_STR);
    $stmt->bindParam(':externalHDD', $externalHDD, PDO::PARAM_STR);
    $stmt->bindParam(':externalHDDRemarks', $externalHDDRemarks, PDO::PARAM_STR);
    $stmt->bindParam(':photocopier', $photocopier, PDO::PARAM_STR);
    $stmt->bindParam(':photocopierRemarks', $photocopierRemarks, PDO::PARAM_STR);
    $stmt->bindParam(':otherDevices', $otherDevices, PDO::PARAM_STR);
    $stmt->bindParam(':hardwarePhotoPath', $hardwarePhotoPath, PDO::PARAM_STR);
    $stmt->bindParam(':remarks', $remarks, PDO::PARAM_STR);
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
                } else {
                    $pdo->rollBack();
                }
                // second querry end
            } else {
                $pdo->rollBack();
                throw new PDOException("Error Inserting form data");
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
