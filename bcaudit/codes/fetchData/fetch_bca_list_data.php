 <?php
    session_start();
    require_once('../config.php'); // Include the configuration file

    try {

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
    ab.*,
    CONCAT(
        ab.first_name, 
        CASE 
            WHEN ab.middle_name <> '' THEN CONCAT(' ', ab.middle_name) 
            ELSE '' 
        END,
        CASE 
            WHEN ab.middle_name <> '' AND ab.last_name <> '' THEN CONCAT(' ', ab.last_name) 
            ELSE CONCAT(' ', ab.last_name) 
        END
    ) AS bca_name,
    DATE_FORMAT(ab.created_date, '%d-%b-%Y') AS formatted_date,
    CONCAT(
        aud.user_first_name, 
        CASE 
            WHEN aud.user_last_name <> '' THEN CONCAT(' ', aud.user_last_name) 
            ELSE '' 
        END
    ) AS user_full_name
FROM 
    all_bc_details ab
JOIN 
    all_user_data aud 
ON 
    ab.created_by_id = aud.user_id";


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


