<?php
require_once('config.php');

// Generate group id
function generateUniqueSerialNumber($conn) {
    // Get the last GID from the database
    $getLastSerialQuery = "SELECT MAX(ticket_id) AS last_serial FROM tickets";
    $result = $conn->query($getLastSerialQuery);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastSerialNumber = $row["last_serial"];
        // Increment the last serial number for uniqueness
        $serialNumber = $lastSerialNumber + 1;
    } else {
        // If no existing records, start with a default value
        $serialNumber = 10000;
    }

    return $serialNumber;
}
    // form variables for insert into DB

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        // $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : 'NA';
        $issueType = isset($_POST['issueType']) ? $_POST['issueType'] : 'NA';
        $userMobile = isset($_POST['mobile']) ? $_POST['mobile'] : 'NA';
        $email = isset($_POST['email']) ? $_POST['email'] : 'NA';
        $media = isset($_POST['media']) ? $_POST['media'] : 'NA';
        $remarks = isset($_POST['remarks']) ? $_POST['remarks'] : 'NA';
        $department = isset($_POST['depertment']) ? $_POST['depertment'] : 'NA';
        $pin = isset($_POST['pin']) ? $_POST['pin'] : 'NA';
        $office = isset($_POST['office']) ? $_POST['office'] : 'NA';
        $status = Open;
    
        // Check if the ticket id already exists
        $stmtCheckEmail = $pdo->prepare("SELECT COUNT(*) FROM users WHERE ticket_id = :ticket_id");
        $stmtCheckTicket->bindParam(':ticket_id', $email, PDO::PARAM_STR);
        $stmtCheckTicket->execute();
        $ticketCount = $stmtCheckTicket->fetchColumn();
    
        if ($ticketCount > 0) {
            // Email already exists, handle accordingly
            $errorMessage = 'Entered Email Already Exists.';
            echo json_encode(['error' => $errorMessage]);
            error_log('Error: ' . $errorMessage, 3, $logFilePath);
        } else {
            // Generate a unique username using the first name and two random digits
            do {
                $randomDigits = str_pad(mt_rand(1, 99), 2, '0', STR_PAD_LEFT);
                $username = strtolower($firstName . $randomDigits);
    
                // Check if the username already exists
                $stmtCheckUsername = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
                $stmtCheckUsername->bindParam(':username', $username, PDO::PARAM_STR);
                $stmtCheckUsername->execute();
                $usernameCount = $stmtCheckUsername->fetchColumn();
            } while ($usernameCount > 0);
    
            if ($usernameCount > 0) {
                // Username already exists, handle accordingly
                $errorMessage = 'Username already exists.';
                echo json_encode(['error' => $errorMessage]);
                error_log('Error: ' . $errorMessage, 3, $logFilePath);
            } else {
                // Insert data into the database
                $query = "INSERT INTO users (created_by, username, email, mobile, role, depertment, pin, office, status)
                          VALUES (:createdBy, :username, :email, :userMobile, :role, :department, :pin, :office, :status)";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':createdBy', $createdBy, PDO::PARAM_STR);
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':userMobile', $userMobile, PDO::PARAM_STR);
                $stmt->bindParam(':role', $role, PDO::PARAM_STR);
                $stmt->bindParam(':department', $department, PDO::PARAM_STR);
                $stmt->bindParam(':pin', $pin, PDO::PARAM_STR);
                $stmt->bindParam(':office', $office, PDO::PARAM_STR);
                $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    
                // Use a try-catch block to catch any exceptions
                try {
                    $success = $stmt->execute();
    
                    if ($success) {
                        $successMessage = 'User created successfully.';
                        echo json_encode(['success' => true]);
                        error_log('Success: ' . $successMessage, 3, $logFilePath);
                    } else {
                        $errorMessage = 'An error occurred while processing the request.';
                        echo json_encode(['error' => $errorMessage]);
                        error_log('Error: ' . $errorMessage, 3, $logFilePath);
                    }
                } catch (PDOException $e) {
                    // Log the error to the specified file
                    $errorMessage = 'An error occurred while processing the request: ' . $e->getMessage();
                    echo json_encode(['error' => $errorMessage]);
                    error_log('Error: ' . $errorMessage, 3, $logFilePath);
                }
            }
        }
    } else {
        $errorMessage = 'Invalid request';
        echo json_encode(['error' => $errorMessage]);
        error_log('Error: ' . $errorMessage, 3, $logFilePath);
    }
// group id generate completed
$conn->close();
?>