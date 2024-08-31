<?php
// Database connection configuration
// $host = 'localhost';
// $db   = 'shg_ticketing_portal';
// $user = 'root';
// $pass = '';
// $charset = 'utf8mb4';

// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
// $options = [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES   => false,
// ];

// try {
//     $pdo = new PDO($dsn, $user, $pass, $options);
// // } catch (\PDOException $e) {
//     // throw new \PDOException($e->getMessage(), (int)$e->getCode());
// } catch (Exception $e) {
//     // Handle connection error on the client side
//     echo "<script>
//         Swal.fire({
//             title: 'Connection Error',
//             html: 'Failed to connect to the database. <br/> Please retry',
//             icon: 'error'
//         }).then(function() {
//             // Redirect to an error page or take appropriate action
//             window.location.reload();
//         });
//     </script>";
//     exit; // Stop execution to prevent further errors
// }


// Database connection configuration
$host = 'localhost';
$db   = 'shg_ticketing_portal';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (Exception $e) {
    // Handle connection error on the client side
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Connection Error',
                html: 'Failed to connect to the database. <br/> Please retry after sometime',
                icon: 'error',
                confirmButtonText: 'Retry'
            }).then(function() {
                // Redirect to an error page or take appropriate action
                window.location.reload();
            });
        });
    </script>";
    exit; // Stop execution to prevent further errors
}
?>
