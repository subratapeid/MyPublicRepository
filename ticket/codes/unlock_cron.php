<?php
// Include database configuration
include 'config.php';
// Debugging: Log received POST data
file_put_contents('debug.txt', print_r($_POST, true));
try {
    // Function to update the user status
    function updateStatus() {
        global $pdo; // Access the $pdo object from the global scope

        // Prepare and execute the SQL query to update the user status
        $sql = "UPDATE tickets SET locked_by = 'NO' WHERE locked_by != 'NO' AND locked_time < NOW()";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Check if any rows were affected by the update operation
        $rowsAffected = $stmt->rowCount();

        if ($rowsAffected > 0) {
            echo "Status updated successfully. Rows affected: " . $rowsAffected . PHP_EOL;
        } else {
            echo "No rows updated. The condition may not have been met." . PHP_EOL;
        }
    }

    // Execute the updateStatus function
    updateStatus();

} catch (PDOException $e) {
    // Handle PDO exceptions and display error message
    echo "PDO Exception: " . $e->getMessage() . PHP_EOL;
} catch (Exception $e) {
    // Handle other exceptions and display error message
    echo "Exception: " . $e->getMessage() . PHP_EOL;
}
?>
