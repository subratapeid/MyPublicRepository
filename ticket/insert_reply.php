<?php
include 'include/connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging statement
    var_dump($_POST);

    $message = $_POST['message'];
    $img_path = '';
    $userId = $_POST['userId'];
    $createdByAvatar = $_POST['createdByAvatar'];
    $ticketId = $_POST['ticketId'];
    $userFirstName = $_POST['userFirstName'];
    $userRole = $_POST['userRole'];
    $date = $_POST['date'];


    // Upload image if provided
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $img_path = $target_file;
    }

    // Prepare SQL statement
    $sql = "INSERT INTO ticket_reply (ticket_id, reply_by_id, reply_by_avatar, reply_by, user_role, message, img_path, date) VALUES (:ticketId, :userId, :createdByAvatar, :userFirstName, :userRole, :message, :imgPath, :date)";
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':ticketId', $ticketId, PDO::PARAM_INT);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':createdByAvatar', $createdByAvatar, PDO::PARAM_STR);
    $stmt->bindParam(':userFirstName', $userFirstName, PDO::PARAM_STR);
    $stmt->bindParam(':userRole', $userRole, PDO::PARAM_STR);
    $stmt->bindParam(':message', $message, PDO::PARAM_STR);
    $stmt->bindParam(':imgPath', $img_path, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);


    // Execute SQL statement
    if ($stmt->execute()) {
        echo "New record inserted successfully";
        // Get the ticket ID or any other necessary data

    } else {
        echo "Error: " . $sql . "<br>" . $stmt->errorInfo();  // Display detailed error
    }

    // Close statement and connection
    $stmt = null;
    $pdo = null;
}
?>
