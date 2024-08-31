 <?php
    session_start();
    require_once('../config.php'); // Include the configuration file

    try {
    // SQL query to retrieve data (adjust as per your table structure)
    // $sql = "SELECT 
    //             ar.*,
    //             CONCAT(ud.user_first_name, ' ', ud.user_last_name) AS user_full_name,
    //             bd.bca_full_name,
    //             DATE_FORMAT(ar.created_date, '%d-%b-%Y') AS formatted_date
    //         FROM 
    //             audit_record_data ar
    //         JOIN 
    //             all_user_data ud ON ar.created_by_id = ud.user_id
    //         JOIN 
    //             all_bc_details bd ON ar.bca_id = bd.bca_id
    //         WHERE 
    //             ar.audit_number IS NOT NULL 
    //             AND ar.audit_number != ''";

    $sql = "SELECT 
    a.*,
    CONCAT(a.user_first_name, ' ', a.user_last_name) AS user_full_name,
    DATE_FORMAT(a.created_date, '%d-%b-%Y') AS formatted_date,
    CONCAT(b.user_first_name, ' ', b.user_last_name) AS created_by
FROM 
    all_user_data a
LEFT JOIN 
    all_user_data b ON a.created_by_id = b.user_id
 ";

    // Prepare and execute the query
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch all rows as an associative array
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output data as JSON
    if ($data) {
        echo json_encode($data);
    } else {
        echo json_encode([]);
    }

} catch (PDOException $e) {
    // Handle any errors
    echo "Connection failed: " . $e->getMessage();
}

unset($pdo); // Close the database connection


?>


