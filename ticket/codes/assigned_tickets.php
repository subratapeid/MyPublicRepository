<?php
session_start();
include 'config.php';

try {
    $loggedInUserId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    $stmtUserDetails = $pdo->prepare('SELECT office_id, role, department FROM users WHERE id = ?');
    $stmtUserDetails->execute([$loggedInUserId]);
    $userData = $stmtUserDetails->fetch(PDO::FETCH_ASSOC);

    if ($userData && isset($userData['office_id'], $userData['role'], $userData['department'])) {
        $userOfficeId = $userData['office_id'];
        $userRole = $userData['role'];
        $userDepartment = $userData['department'];

        if ($userRole === 'Supervisor' || $userRole === 'Executive') {

        $sql = 'SELECT t.*, DATE_FORMAT(t.created_date, "%Y-%m-%d %h:%i %p") AS formatted_created_date,
        DATE_FORMAT(t.closed_date, "%Y-%m-%d %h:%i %p") AS formatted_close_date FROM tickets t 
        JOIN issue_type it ON t.issue_id = it.issue_id 
        JOIN users u ON it.department_id = u.department_id WHERE u.id =' .$loggedInUserId . ' AND t.created_by_id != ' . $loggedInUserId;
        }
        // If user role is from feld
        elseif ($userRole === 'IT') {
            $sql = 'SELECT t.*, DATE_FORMAT(t.created_date, "%Y-%m-%d %h:%i %p") AS formatted_created_date,
            DATE_FORMAT(t.closed_date, "%Y-%m-%d %h:%i %p") AS formatted_close_date FROM tickets t 
            LEFT JOIN pooffices po ON po.po_id = t.office_id
            WHERE t.office_id ='. $userOfficeId . ' AND t.created_by_id != ' . $loggedInUserId. ' AND t.created_by_role = "BC"';

        } elseif ($userRole === 'PO') {
            $sql = 'SELECT t.*, DATE_FORMAT(t.created_date, "%Y-%m-%d %h:%i %p") AS formatted_created_date,
            DATE_FORMAT(t.closed_date, "%Y-%m-%d %h:%i %p") AS formatted_close_date FROM tickets t 
            LEFT JOIN pooffices po ON po.po_id = t.office_id
            WHERE t.office_id ='. $userOfficeId . ' AND t.created_by_id != ' . $loggedInUserId. ' AND t.created_by_role = "BC"';

        }
        else if ($userRole === 'RO') {
            $sql = 'SELECT t.*, DATE_FORMAT(t.created_date, "%Y-%m-%d %h:%i %p") AS formatted_created_date,
            DATE_FORMAT(t.closed_date, "%Y-%m-%d %h:%i %p") AS formatted_close_date FROM tickets t 
            LEFT JOIN pooffices po ON po.po_id = t.office_id
            LEFT JOIN rooffices ro ON ro.ro_id = po.roid
            WHERE ro.ro_id = ' . $userOfficeId . ' AND t.created_by_id != ' . $loggedInUserId. ' AND t.created_by_role = "BC"';

            // $sql .= ' LEFT JOIN pooffices po ON po.po_id = t.office_id';
            // $sql .= ' LEFT JOIN rooffices ro ON ro.id = po.roid';
            // $sql .= ' WHERE ro.ro_id = :office_id';
        }
        elseif ($userRole === 'HO') {
            $sql = 'SELECT t.*, DATE_FORMAT(t.created_date, "%Y-%m-%d %h:%i %p") AS formatted_created_date,
            DATE_FORMAT(t.closed_date, "%Y-%m-%d %h:%i %p") AS formatted_close_date FROM tickets t 
            LEFT JOIN pooffices po ON po.po_id = t.office_id
            LEFT JOIN rooffices ro ON ro.ro_id = po.roid 
            LEFT JOIN hooffices ho ON ho.ho_id = ro.hoid 
            WHERE ho.ho_id ='. $userOfficeId . ' AND t.created_by_id != ' . $loggedInUserId. ' AND t.created_by_role = "BC"';

        }  elseif ($userRole === 'Manager' || $userRole === 'Admin') {
          $sql = 'SELECT t.*, DATE_FORMAT(t.created_date, "%Y-%m-%d %h:%i %p") AS formatted_created_date,
          DATE_FORMAT(t.closed_date, "%Y-%m-%d %h:%i %p") AS formatted_close_date FROM tickets t';
        }

        // Prepare the SQL statement
        $stmt = $pdo->prepare($sql);

        // Bind the parameters based on user role
        // if ($userRole === 'RO' || $userRole === 'IT' || $userRole === 'HO') {
        //     $stmt->bindParam(':office_id', $userOfficeId);
        // }

        // Execute the query
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return or process the result
        echo json_encode($result);
    } else {
        // when data couldn't be fetched
        echo json_encode(['errors' => 'Unable to fetch user data.']);
    }
} catch (PDOException $e) {
    // Log the detailed error message instead of displaying it
    error_log('Connection failed: ' . $e->getMessage());
    echo json_encode(['errors' => 'An unexpected error occurred.']);
}
?>
