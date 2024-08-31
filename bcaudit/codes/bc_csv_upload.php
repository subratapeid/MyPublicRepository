<?php
session_start();
require_once('config.php');


// Function to insert records from CSV file into the database table
function insertRecordsFromCSV($csvFile, $pdo) {
    $handle = fopen($csvFile, 'r');

    $response = array(); // Array to store response information

    if ($handle !== FALSE) {
        // Skip the header row
        fgetcsv($handle);

        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            $bc_id = $data[0];
            $bc_full_name = $data[1] . ' ' . $data[2] . ' ' . $data[3]; 
            $userId = $_SESSION["user_id"];
            // Check if the record with the same BC ID/Agent Code number already exists
            $checkQuery = "SELECT COUNT(*) as count FROM all_bc_details WHERE bca_id = ?";
            $stmt = $pdo->prepare($checkQuery);
            $stmt->execute([$bc_id]);
            $count = $stmt->fetchColumn();

            if ($count == 0) {
                // Insert the record into the database
                $query = "INSERT INTO all_bc_details (
                    bca_id, first_name, middle_name, last_name, bca_contact_no, 
                    bca_email_id, bc_point_name, transaction_module, village, location, 
                    district, state, pin, landmark, bca_bank, bca_bank_branch, bc_point_address, 
                    abe_name, abm_name, rm_name, zm_name, created_by_id
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($query);

                // bca_id	first_name	middle_name	last_name	bca_contact_no	bca_email_id	
                // bc_point_name	transaction_module	village	location	district	state	pin	landmark	bca_bank	
                // bca_bank_branch	bc_point_address	abe_name	abm_name	rm_name	zm_name

                // Ensure data array matches the number of placeholders
                $params = [
                    $data[0] ?? '', $data[1] ?? '', $data[2] ?? '', $data[3] ?? '', $data[4] ?? '', 
                    $data[5] ?? '', $data[6] ?? '', $data[7] ?? '', $data[8] ?? '', $data[9] ?? '', $data[10] ?? '', 
                    $data[11] ?? '', $data[12] ?? '', $data[13] ?? '', $data[14] ?? '', $data[15] ?? '', 
                    $data[16] ?? '', $data[17] ?? '', $data[18] ?? '', $data[19] ?? '', $data[20] ?? '', $userId ?? ''
                ];

                $stmt->execute($params);
                $upload_status = 'Inserted successfully';
            } else {
                // Skip insertion as the record already exists
                $upload_status = 'Already exists. Skipping insertion.';
            }

            // Add information to the response array
            $response[] = array($bc_id, $bc_full_name, $upload_status);
        }

        fclose($handle);
    }

    return $response;
}

// Function to upload a CSV file
function uploadCSVFile() {
    if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] == UPLOAD_ERR_OK) {
        $targetDir = __DIR__ . '/uploads/';
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $targetFile = $targetDir . basename($_FILES['csv_file']['name']);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['csv_file']['tmp_name'], $targetFile)) {
            return $targetFile;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Check if a CSV file is uploaded
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csvFile = uploadCSVFile();

    if ($csvFile !== false) {
        // Insert records from the uploaded CSV file
        $response = insertRecordsFromCSV($csvFile, $pdo);

        // Generate CSV response
        $responseDir = __DIR__ . '/response/';
        if (!file_exists($responseDir)) {
            mkdir($responseDir, 0777, true);
        }
        $responseFile = $responseDir . 'response.csv';
        $fp = fopen($responseFile, 'w');
        foreach ($response as $line) {
            fputcsv($fp, $line);
        }
        fclose($fp);

        // Provide download link to the user
        echo 'CSV file uploaded and records inserted successfully. <a href="codes/response/response.csv">Download Response</a>';
    } else {
        // Log error and display error message
        $errorMessage = 'Error uploading CSV file.';
        error_log($errorMessage);
        echo $errorMessage;
    }
}

// Close the database connection
$pdo = null;
?>
