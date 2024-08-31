<?php
include 'config.php';
        // Start session (if not already started)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // sanitizing input data
    $bcId = filter_input(INPUT_POST, 'bc_id', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
    // // Custom filtering to allow specific characters
    $bcId = preg_replace('/[^a-zA-Z0-9@.]/', '', $bcId);

if ($bcId === $_POST['bc_id']) {
    // Prepare the SQL statement to fetch BC ID from the database
    $stmt = $pdo->prepare('SELECT * FROM bc_details WHERE bc_id = ?');
    $stmt->execute([$bcId]);
    $user = $stmt->fetch();
    // Check if the user is found in the database
    if ($user) {
        // Set session variables
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_role'] = 'BC';
        $_SESSION['user_id'] = $user['bc_id'];
        $_SESSION['username'] = $user['bc_id'];

        // Prepare JSON response for Success
        $response = array(
            'status' => 'success',
            'message' => 'Login successful!',
            'redirect' => 'index.php'
        );
    } else {
        // Prepare JSON response for Error
        $response = array(
            'status' => 'error',
            'message' => 'BC details not found.'
        );
    } 
}else{
    // Handle invalid input
    $response = array(
        'status' => 'error',
        'message' => 'Entered Invalid BC ID.'
    );}
            // Send JSON response for Result
            header('Content-Type: application/json');
            echo json_encode($response);
        exit();
    // else condition if not a Post Request
}else{
    echo '<script>alert("You are Not Allowed To This Page"); window.location.href = "../index.php";</script>';
}
?>
