<?php
$requiredPermission = 'Create User';
include '../include/permissions.php';

function userRole($roleToCheck) {
    global $userRole;
    // Check if the user has the specified role
    return $userRole === $roleToCheck;
}

// Check if the user has the required permission
if (!hasPermission($requiredPermission)) {
    echo '<script>window.location.href = "user-login.php";</script>';
    // Redirect to an unauthorized page if the user doesn't have the required permission
    exit;
}

$userPermissions = getUserPermissions();
include '../include/connection.php';

if (isset($_SESSION['user_id'])) {
    try {
        // Your database query
        $query = "SELECT u.*, CONCAT(c.first_name, ' ', c.last_name) AS approve_reject_by_name
                  FROM users u
                  LEFT JOIN users c ON u.approve_reject_by_id = c.id";
        
        // Prepare the SQL statement
        $stmt = $pdo->prepare($query);
        
        // Execute the query
        $stmt->execute();
        
        // Fetch all rows
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Return data in JSON format
        echo json_encode($rows);
    } catch (PDOException $e) {
        // Handle database connection errors
        echo "Error: " . $e->getMessage();
    }
} else {
    // Handle the case where the user ID is not set in the session
    echo "User ID is not set in the session.";
}
?>
