<?php
session_start();
require 'connection.php';

// Function to check if a user is logged in
function isLoggedIn() {
    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true;
}

// Function to check if a password change is required
function requiresPasswordChange() {
    return !isset($_SESSION['requires_password_change']) || $_SESSION['requires_password_change'] !== true;
}

// Function to get permissions for the logged-in user
function getUserPermissions() {
    global $pdo;
    $userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : 'Guest';
    $stmt = $pdo->prepare('SELECT permission_name FROM permissions WHERE id IN (SELECT permission_id FROM role_permissions WHERE role_id = (SELECT id FROM roles WHERE role_name = ?))');
    $stmt->execute([$userRole]);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

// // Function to check if the user has a specific permission
function hasPermission($requiredPermission) {
//     // Check if a password change is required
//     if (requiresPasswordChange()) {
//         // Redirect to the default landing page if a password change is not required
//         echo '<script>window.location.href = "dashboard.php";</script>';
//         exit;
//     }

//     // Check if the user has the required permission
    $userPermissions = getUserPermissions();
    return in_array($requiredPermission, $userPermissions);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <title>SHG Support- Ticketing Tool</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">

    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">

    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <script src="js/time_update.js"></script>

<!-- Bootstrap stylesheet cdn -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  
<!-- fontaewsome icon cdn -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- Material Design Icons (MDI) CDN -->
<link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">

<!-- loading Spinner  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/spin.js/2.3.2/spin.min.js"></script>
<!-- jquerry -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script> -->
<!-- bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Sweet allert CDN script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<style>
  /* Style for the loading spinner container */
  #loading {
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }
  #time {
  font-size: 18px;
}
</style>

  </head>
  <body>
  <div id="loading"></div>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <!-- <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="Integra Logo">
          <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="Integra Logo">
          <use xlink:href="assets/brand/coreui.svg#signet"></use>
        </svg>
      </div> -->

      <div class="sidebar-brand d-none d-md-flex">
    <!-- Full logo -->
    <img class="sidebar-brand-full" src="assets/logo.png" alt="Integra Logo Full" width="100" height="90%">
    
    <!-- Narrow logo -->
    <img class="sidebar-brand-narrow" src="assets/logo.png" alt="Integra Logo Narrow" width="100%" height="auto">
</div>


<!-- Sidebar Menu Start -->

      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
                <!-- Exicutive Menu -->
                <li class="nav-item"><a class="nav-link" href="dashboard.php">
                <i class="fas fa-tachometer-alt nav-icon"></i> Dashboard</a></li>

            <li class="nav-item"><a class="nav-link" href="change-default-password.php">
            <i class="fas fa-key icon me-2"></i> Change Password</a></li> 

      
       <!-- end of nav items  -->
      </ul>
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky">
        <div class="container-fluid">
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
          </button>
          <!-- <a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
              <use xlink:href="assets/brand/coreui.svg#full"></use>
            </svg></a> -->

            <a class="header-brand d-md-none" href="#">
    <img src="assets/logo (2).png" alt="Integra Logo" width="100" height="53">
</a>
<div class="d-md-flex align-items-center mx-auto">
        <p id="time" class="m-0 text-center d-md-block d-none"></p>
      </div>


          <!-- white space in top bar -->
          <ul class="header-nav ms-auto">
            <!-- <li class="nav-item position-relative mr-2">
              <a class="nav-link" href="#">
              <i class="fas fa-envelope top-icon"></i>
              <span class="badge badge-sm bg-danger position-absolute top-10 start-95 translate-middle">2
              </span>
            </a>
          </li>


            <li class="nav-item position-relative">
              <a class="nav-link" href="#">
                <i class="fas fa-bell top-icon"></i>
              <span class="badge badge-sm bg-danger position-absolute top-10 start-95 translate-middle">42
              </span>
            </a>
          </li> -->
        </ul>

          <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-md">
    <i class="fas fa-user avatar-icon"></i> <!-- Font Awesome icon -->
</div>
</a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold"> Account</div></div>
                  <a class="dropdown-item" href="#">
                <i class="fas fa-user-circle icon me-2"></i> Profile</a>
                
                <a class="dropdown-item" href="#">
                <i class="fas fa-key icon me-2"></i> Change Password</a>
                <div class="dropdown-divider"></div><a href="#" id="logoutLink" class="dropdown-item" >   
                <i class="fas fa-sign-out-alt icon me-2"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
        
      </header>
      <div class="body flex-grow-1 px-1">
        <div class="container-xlg">
            <!-- content area start -->



