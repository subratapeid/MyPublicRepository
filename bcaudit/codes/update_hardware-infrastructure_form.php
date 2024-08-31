<?php
session_start();
include 'verify_audit_session.php';
include 'config.php';
include 'common/getDateTime.php';

header('Content-Type: application/json');

$response = ['status' => '', 'error' => '', 'message' => ''];

try {
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

        // Initialize array to hold update fields and parameters
        $updateFields = [];
        $params = [':auditNumber' => $auditNumber];

        // Handle hardware captured photo process
        if (isset($_POST['hardwarePhoto']) && !empty($_POST['hardwarePhoto'])) {
            $hardwarePhoto = $_POST['hardwarePhoto'];
            $photoData1 = base64_decode($hardwarePhoto);
            $hardwarePhotoNewName = 'HardwarePhoto_' . $auditNumber . '_' . $datetime . '.png';
            $hardwarePhotoPath = 'uploads/' . $hardwarePhotoNewName;

            if (!file_put_contents($hardwarePhotoPath, $photoData1)) {
                throw new Exception('Failed to upload hardware photograph.');
            }

            $updateFields[] = 'hardware_photo_path = :hardwarePhotoPath';
            $params[':hardwarePhotoPath'] = $hardwarePhotoPath;

            // Delete old hardware photo if exists
            $oldPhotoStmt1 = $pdo->prepare("SELECT hardware_photo_path FROM hardware_infrastructure WHERE audit_number = :auditNumber");
            $oldPhotoStmt1->execute([':auditNumber' => $auditNumber]);
            $oldPhoto1 = $oldPhotoStmt1->fetch(PDO::FETCH_ASSOC)['hardware_photo_path'];
            if ($oldPhoto1 && file_exists($oldPhoto1)) {
                unlink($oldPhoto1);
            }
        }

        // Update query for captured photos
        if (!empty($updateFields)) {
            $sql = "UPDATE hardware_infrastructure SET " . implode(', ', $updateFields) . " WHERE audit_number = :auditNumber";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
        }

        $sql = "UPDATE hardware_infrastructure SET 
            laptop_desktop = :laptopDesktop, 
            laptop_desktop_remarks = :laptopDesktopRemarks, 
            printer = :printer, 
            printer_remarks = :printerRemarks, 
            scanner = :scanner, 
            scanner_remarks = :scannerRemarks, 
            biometric = :biometric, 
            biometric_remarks = :biometricRemarks, 
            pos_terminal = :posTerminal, 
            pos_terminal_remarks = :posTerminalRemarks, 
            internet_router = :internetRouter, 
            internet_router_remarks = :internetRouterRemarks, 
            ups = :ups, 
            ups_remarks = :upsRemarks, 
            cctv_camera = :cctvCamera, 
            cctv_camera_remarks = :cctvCameraRemarks, 
            mobile_tablet = :mobileTablet, 
            mobile_tablet_remarks = :mobileTabletRemarks, 
            counting_machine = :countingMachine, 
            counting_machine_remarks = :countingMachineRemarks, 
            card_reader = :cardReader, 
            card_reader_remarks = :cardReaderRemarks, 
            external_hdd = :externalHDD, 
            external_hdd_remarks = :externalHDDRemarks, 
            photocopier = :photocopier, 
            photocopier_remarks = :photocopierRemarks, 
            other_devices = :otherDevices, 
            hardware_remarks = :remarks,
            last_updated_by_id = :lastUpdatedBy,
            last_updated_date = :updatedDate
        WHERE audit_number = :auditNumber";

        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters to the statement
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
        $stmt->bindParam(':remarks', $remarks, PDO::PARAM_STR);
        $stmt->bindParam(':lastUpdatedBy', $userId, PDO::PARAM_STR);
        $stmt->bindParam(':updatedDate', $dbDatetime, PDO::PARAM_STR);
        $stmt->bindParam(':auditNumber', $auditNumber, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $response['status'] = 'success';
            $response['message'] = 'Data Updated successfully! Go to the next page';
        } else {
            throw new Exception('Failed to update data. Please try again.');
        }
    } else {
        throw new Exception('Invalid request method.');
    }
} catch (PDOException $e) {
    $response['status'] = 'error';
    $response['error'] = 'Database error: ' . $e->getMessage();
} catch (Exception $e) {
    $response['status'] = 'error';
    $response['error'] = 'General error: ' . $e->getMessage();
}

echo json_encode($response);
?>
