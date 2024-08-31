<?php
// Start the session
session_start();

if (isset($_POST['action']) && isset($_POST['bcaId']) && isset($_POST['bcaName'])) {
    // Sanitize input
    $action = filter_var($_POST['action'], FILTER_SANITIZE_STRING);
    $bcaId = filter_var($_POST['bcaId'], FILTER_SANITIZE_STRING);

    $bcaName = filter_var($_POST['bcaName'] ?? '', FILTER_SANITIZE_STRING);
    $state = filter_var($_POST['state'] ?? '', FILTER_SANITIZE_STRING);
    $location = filter_var($_POST['location'] ?? 'no', FILTER_SANITIZE_STRING);


        
    // Unset existing session variables
    unset($_SESSION['action']);
    unset($_SESSION['bcaId']);
    unset($_SESSION['bcaName']);
    unset($_SESSION['auditNumber']);
    unset($_SESSION['state']);
    unset($_SESSION['location']);

    if (isset($_POST['auditNumber'])){
    $auditNumber = filter_var($_POST['auditNumber'], FILTER_SANITIZE_STRING);
    $_SESSION['auditNumber'] = !empty($auditNumber) ? $auditNumber : '';
    }

    // Store new values in session
    $_SESSION['action'] = !empty($action) ? $action : '';
    $_SESSION['bcaId'] = !empty($bcaId) ? $bcaId : '';
    $_SESSION['bcaName'] = !empty($bcaName) ? $bcaName : '';
    $_SESSION['state'] = !empty($state) ? $state : '';
    $_SESSION['location'] = !empty($location) ? $location : '';

    // Return success response
    echo json_encode(['success' => true, 'message' => 'Session Data updated']);
    } else {
    // Return error response
    echo json_encode(['success' => false, 'message' => 'No Valid Data provided']);
    }
?>
