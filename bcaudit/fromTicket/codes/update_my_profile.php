<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : 'NA';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : 'NA';
    $userMobile = isset($_POST['userMobile']) ? $_POST['userMobile'] : 'NA';
    $loggedInUserId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $img_path = '';

    // Upload image if provided
    if (isset($_FILES['userImg']) && $_FILES['userImg']['error'] == 0) {
        $target_dir = "../uploads/userAvatar/";
        $img_path_folder = "uploads/userAvatar/";
        $target_file = $target_dir . basename($_FILES["userImg"]["name"]);
        $file_name = basename($_FILES["userImg"]["name"]); // Extract just the filename
    }
    
    if (file_exists($target_file)) {
        // File already exists
        $img_path = $img_path_folder . $file_name; // Store only the filename
    } else {
        // File does not exist, so upload it
        if (move_uploaded_file($_FILES["userImg"]["tmp_name"], $target_file)) {
            $img_path = $img_path_folder . $file_name; // Store only the filename
        }
    }

    // Insert data into the database
    $query = "UPDATE users 
    SET first_name = :firstName, last_name = :lastName, mobile = :userMobile, img_url = :img_path
    WHERE id = :userId";

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $stmt->bindParam(':userMobile', $userMobile, PDO::PARAM_STR);
            $stmt->bindParam(':userId', $loggedInUserId, PDO::PARAM_STR);
            $stmt->bindParam(':img_path', $img_path, PDO::PARAM_STR);

            // Use a try-catch block to catch any exceptions
            try {
                $success = $stmt->execute();

                if ($success) {
                    $successMessage = 'Profile Update successfully.';
                    echo json_encode(['success' => true]);
                } else {
                    $errorMessage = 'An error occurred while processing the request.';
                    echo json_encode(['error' => $errorMessage]);
                }
            } catch (PDOException $e) {
                // Log the error to the specified file
                $errorMessage = 'An error occurred while processing the request: ' . $e->getMessage();
                echo json_encode(['error' => $errorMessage]);
            }
    
} else {
    $errorMessage = 'Invalid request';
    echo json_encode(['error' => $errorMessage]);
}
?>
