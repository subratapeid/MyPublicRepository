<?php
include 'config.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // sanitizing username
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
    // // Custom filtering to allow specific characters
    $username = preg_replace('/[^a-zA-Z0-9@.]/', '', $username);
    $password = $_POST['password'];

    // matching the entered username and filtered username
if ($username === $_POST['username']) {

    $stmt = $pdo->prepare('SELECT id, username, is_approved, status, role, password FROM users WHERE email = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user) {
        // Verify the entered password against the stored hash
        if (password_verify($password, $user['password'])) {
            // check whethere the account is approved
            if($user['is_approved']==1){
            //check whethere account is active
            if($user['status']=="Active"){
        //store session after successfull match
        // (password_verify($user['password'], $password)){}
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['is_logged_in'] = true;
        // Prepare JSON response for Success
        $response = array(
            'status' => 'success',
            'message' => 'Login successful!',
            'redirect' => 'dashboard.php'
        );
        if ($password === '12345') {
            $_SESSION['requires_password_change'] = true;
            // Prepare JSON response for password change
        $response = array(
            'status' => 'success',
            'message' => 'Please Change Default Password!',
            'redirect' => 'change-default-password.php'
        );
            // echo json_encode(['status' => 'success', 'role' => $user['role'], 'requires_password_change' => true]);
        } else {
            $_SESSION['requires_password_change'] = false;
            $response = array(
                'status' => 'success',
                'message' => 'Password change not required',
                'redirect' => 'dashboard.php'
            );
            // echo json_encode(['status' => 'success', 'role' => $user['role'], 'requires_password_change' => false]);
        }
        // else for status statement
    }else{
        $response = array(
            'status' => 'error',
            'message' => 'Your Account is ' . $user['status']. '. Please Contact Admin',
            'redirect' => '#'
        );
    }
            // else for is_approved statement
    }else{
        $response = array(
            'status' => 'error',
            'message' => 'Account Approval is Pending. Please Try After Sometime',
            'redirect' => '#'
        );
    }
        // user and password not matched else condition
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Incorrect Password',
            'redirect' => '#'
        );
        // echo json_encode(['status' => 'error']);
    } 
// else condition for if user not found
}else{
        $response = array(
            'status' => 'error',
            'message' => 'User ID Not Found',
            'redirect' => '#'
        );
    }
    // else condition for filtering username
} else{
    $response = array(
        'status' => 'error',
        'message' => 'Entered UserID is Invalid',
        'redirect' => '#'
    );
    }
    // Send JSON response for Result
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
    // else condition if not a Post Request
}else{
    echo '<script>alert("You are Not Allowed To This Page"); window.location.href = "../index.php";</script>';
}
?>
