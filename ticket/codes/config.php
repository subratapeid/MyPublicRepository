<?php
// Database configuration
$host = 'localhost';
$dbname = 'shg_ticketing_portal';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
    // Handle connection error on the client side
    // echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
    // echo "<script>
    //     document.addEventListener('DOMContentLoaded', function() {
    //         Swal.fire({
    //             title: 'Connection Error',
    //             html: 'Failed to connect to the database. <br/> Please retry after sometime',
    //             icon: 'error',
    //             confirmButtonText: 'Retry'
    //         }).then(function() {
    //             // Redirect to an error page or take appropriate action
    //             window.location.reload();
    //         });
    //     });
    // </script>";
    // exit;
    // Handle connection error on the client side end

}
?>
