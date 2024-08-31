<?php
// Database configuration
$host = 'localhost';
$dbname = 't_users';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Function to insert records from CSV file into the database table
function insertRecordsFromCSV($csvFile, $pdo) {
    $handle = fopen($csvFile, 'r');

    $response = array(); // Array to store response information

    if ($handle !== FALSE) {
        // Skip the header row
        fgetcsv($handle);

        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            $bc_id = $data[3];
            $bc_full_name = $data[4] . ' ' . $data[5] . ' ' . $data[7]; // Assuming the full name is composed of title, first name, and last name
            $upload_status = '';

            // Check if the record with the same BC ID/Agent Code number already exists
            $checkQuery = "SELECT COUNT(*) as count FROM bc_details WHERE bc_id = ?";
            $stmt = $pdo->prepare($checkQuery);
            $stmt->execute([$bc_id]);
            $count = $stmt->fetchColumn();

            if ($count == 0) {
                // Insert the record into the database
                $query = "INSERT INTO bc_details (po_id, po_name, card_id, bc_id, title, bc_first_name, bc_middle_name, bc_last_name, po_pin, city, pool_account_no, ifsc_code, bank, terminal_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute($data);
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
        $responseFile = __DIR__ . '/response/response.csv';
        $fp = fopen($responseFile, 'w');
        foreach ($response as $line) {
            fputcsv($fp, $line);
        }
        fclose($fp);

        // Provide download link to the user
        echo 'CSV file uploaded and records inserted successfully. <a href="codes/response/response.csv" download>Download Response</a>';
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
