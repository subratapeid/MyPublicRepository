<?php
if (isset($_SESSION['user_id'])) {
include "config.php";
// Check if the session variables are set to avoid errors
$userRole = isset($_SESSION["user_role"]) ? $_SESSION["user_role"] : "";
$userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : "";

$tableName = "";
$columnName = "";

// Check user role and set table and column names accordingly
if ($userRole == "BC") {
    $tableName = "bc_details";
    $columnName = "bc_id";
} else {
    $tableName = "users";
    $columnName = "id";
}

// Prepare and execute the SQL query
$selectQuery = "SELECT * FROM $tableName WHERE $columnName = :userId";
$selectStmt = $pdo->prepare($selectQuery);

// Bind the parameter and execute the statement
$selectStmt->bindParam(':userId', $userId, PDO::PARAM_STR);
$selectStmt->execute();

// Fetch the data
$userData = $selectStmt->fetch(PDO::FETCH_ASSOC);

// foreach ($userData as $key => $value) {
//     echo "$key: $value<br>";
// }
$usersName ="";
$usersFirstName ="";
$userAvatar ="";

if ($userRole == "BC") {
    $usersName = $userData['bc_first_name'].' '.$userData['bc_last_name'];
    $usersFirstName = $userData['bc_first_name'];
    $usersEmail = $userData['bc_temp_email'];
    $userAvatar = 'assets/img/avatars/user.jpg';
} else {
    $usersName = $userData['first_name'].' '.$userData['last_name'];
    $usersFirstName = $userData['first_name'];
    $usersEmail = $userData['email'];
    $userAvatar = $userData['img_url'] ? $userData['img_url'] : 'assets/img/avatars/nouser.png';
}
}

?>
