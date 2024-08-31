<?php
// Function to count the total number of rows in the CSV file
function countRowsInCSV($csvFile) {
    $handle = fopen($csvFile, 'r');
    $rowCount = 0;

    if ($handle !== FALSE) {
        while (fgetcsv($handle, 1000, ',') !== FALSE) {
            $rowCount++;
        }

        fclose($handle);
    }

    return $rowCount;
}

// Function to upload a CSV file
function uploadCSVFile() {
    // Delete previous uploaded files
    $uploadDir = __DIR__ . '/uploads/';
    $files = glob($uploadDir . '*'); // Get all file names in the directory

    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file); // Delete the file
        }
    }

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
        // Count the total number of rows in the CSV file-
        $totalRows = countRowsInCSV($csvFile);

        // Return the row count as JSON
        echo json_encode(['totalRows' => $totalRows]);
    } else {
        // Log error and display error message
        $errorMessage = 'Error uploading CSV file.';
        error_log($errorMessage);
        echo json_encode(['error' => true, 'message' => $errorMessage]);
    }
}
?>
