<?php include 'permissions.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <title>SHG Support- Ticketing Tool</title>
    <link rel="apple-touch-icon" sizes="57x57" href="../../assets/favicon/apple-icon-57x57.png">

    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon/favicon-32x32.png">

    <link rel="manifest" href="../../assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="../../vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="../../css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="../../css/style.css" rel="stylesheet">
<!-- fontaewsome icon cdn -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- Spinner  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/spin.js/2.3.2/spin.min.js"></script>
<!-- jquerry -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/time_update.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  /* Style for the loading spinner container */
  #loader-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black */
    z-index: 9999; /* Ensure it appears on top of other elements */
}

#loading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 24px;
}
  /* #loading {
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  } */
  #time {
  font-size: 18px;
}

</style>

  </head>
  <body>

  <!-- loading spiner -->
  <div id="loader-overlay">
    <div id="loader">
    <div id="loading"></div>
    </div>
</div>
<script>  var spinner = new Spinner().spin();
  document.getElementById('loading').appendChild(spinner.el);
  // Hide the spinner once the page content is fully loaded
  window.addEventListener('load', function() {
    spinner.stop();
    hideLoader();
    document.getElementById('loading').style.display = 'none';
  });

  // ................another
  function showLoader() {
    // Display your loader here
    document.getElementById('loader-overlay').style.display = 'block';
}
showLoader();

// Function to hide loader
function hideLoader() {
    // Hide your loader here
    document.getElementById('loader-overlay').style.display = 'none';
}
</script>

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
      <?php if (hasPermission('Common')): ?>
                <!-- Exicutive Menu -->
                <li class="nav-item"><a class="nav-link" href="dashboard.php">
                <i class="fas fa-tachometer-alt nav-icon"></i> Dashboard</a></li>

            <li class="nav-item"><a class="nav-link" href="assigned-tickets.php">
            <i class="fas fa-briefcase nav-icon"></i> Assigned Tickets</a></li> 

       <!-- Common user menu -->
       <li class="nav-title">User's Ticket</li> 

       <?php endif; ?>
<?php if (hasPermission('BC Login')): ?>
        <li class="nav-item"><a class="nav-link" href="index.php">
        <i class="fas fa-receipt nav-icon"></i> Create Ticket</a></li>
<?php endif; ?>

<!-- <?php if (hasPermission('BC Login')): ?>
        <li class="nav-item"><a class="nav-link" href="create-a-ticket.php">
        <i class="fas fa-receipt nav-icon"></i> Create A Ticket</a></li>
<?php endif; ?> -->
<!-- for logedin user only -->
<?php if (!hasPermission('BC Login')): ?>
        <li class="nav-item"><a class="nav-link" href="create-ticket.php">
        <i class="fas fa-receipt nav-icon"></i> Create Ticket</a></li>
<?php endif; ?>

          <li class="nav-item"><a class="nav-link" href="my-tickets.php">
          <i class="fas fa-layer-group nav-icon"></i> My Tickets</a></li>

    <?php if (!isLoggedIn()): ?> 
    <li class="nav-item">
    <a class="nav-link" href="bc-login.php">
    <i class="fas fa-user-lock nav-icon"></i> BC Login
    </a> </li>
    <?php endif; ?>

    <?php if (hasPermission('Add BC Details')): ?>

          <li class="nav-title">Account Management</li>       
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#"> 
        <i class="fas fa-user-friends nav-icon"></i> BC Management</a>
          <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="buttons/buttons.html"><span class="nav-icon"></span> All Existing BC</a></li>
            <li class="nav-item"><a class="nav-link" href="buttons/button-group.html"><span class="nav-icon"></span> Create New BC</a></li>
          </ul>
        </li>
   <?php endif; ?>
  <?php if (hasPermission('Create User')): ?>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <i class="fas fa-users nav-icon"></i> User Management</a>
          <ul class="nav-group-items">
          <li class="nav-item"><a class="nav-link" href="create-user.php"><span class="nav-icon"></span> Create User</a></li>

            <li class="nav-item"><a class="nav-link" href="all-users.php"><span class="nav-icon"></span> All Users</a></li>

          </ul>
        </li>
        <?php endif; ?>
        <?php if (hasPermission('Admin') || hasPermission('Add Department') || hasPermission('Add Offices') || hasPermission('Add Issue Types')): ?>
        <li class="nav-title">Configuration</li> 
        <?php endif; ?>
    <?php if (hasPermission('Add Department')): ?>
        <li class="nav-item"><a class="nav-link" href="">
        <i class="fas fa-network-wired nav-icon"></i> Departments</a>
        </li>
  <?php endif; ?>
  <?php if (hasPermission('Add Offices')): ?>
        <li class="nav-item"><a class="nav-link" href="">
        <i class="fas fa-building nav-icon"></i> Offices</a></li>
  <?php endif; ?>
  <?php if (hasPermission('Add Issue Types')): ?>
        <li class="nav-item"><a class="nav-link" href="">
        <i class="fas fa-bug nav-icon"></i> Issue Types</a>
        </li>
  <?php endif; ?>
  <?php if (hasPermission('Admin')): ?>
        <li class="nav-item"><a class="nav-link" href="">
        <i class="far fa-envelope nav-icon"></i> Email Setup</a>
        </li>

        <li class="nav-item"><a class="nav-link" href="set-permissions.php">
        <i class="fas fa-users-cog nav-icon"></i> User Permission</a>
        </li>
  <?php endif; ?>     
        <!-- add here -->
        <!-- Alart Message -->
        <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> -->
       <!-- end of nav items  -->
      </ul>
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
  <header class="header header-sticky">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
        <svg class="icon icon-lg">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
        </svg>
      </button>

      <a class="header-brand d-md-none" href="#">
        <img src="assets/logo (2).png" alt="Integra Logo" width="100" height="53">
      </a>

      <div class="d-md-flex align-items-center mx-auto">
        <p id="time" class="m-0 text-center d-md-block d-none"></p>
      </div>
          <ul class="header-nav ms-3">
            <!-- <li class="nav-item position-relative mr-2">
              <a class="nav-link" href="#">
              <i class="fas fa-envelope top-icon"></i>
              <span class="badge badge-sm bg-danger position-absolute top-10 start-95 translate-middle">2
              </span>
            </a>
          </li> -->


            <li class="nav-item position-relative">
              <a class="nav-link" href="#">
                <i class="fas fa-bell top-icon"></i>
              <span class="badge badge-sm bg-danger position-absolute top-10 start-95 translate-middle">42
              </span>
            </a>
          </li>
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
                  
                    <?php if (hasPermission('Common')): ?>
                  <a class="dropdown-item" href="#">
                <i class="fas fa-user-circle icon me-2"></i> Profile</a>
                
                <a class="dropdown-item" href="#">
                <i class="fas fa-key icon me-2"></i> Change Password</a>
                <?php endif; ?>
                <?php if (isLoggedIn()): ?> 
                <div class="dropdown-divider"></div><a href="#" id="logoutLink" class="dropdown-item" >   
                <i class="fas fa-sign-out-alt icon me-2"></i> Logout</a>
                <?php endif; ?>
            <?php if (!isLoggedIn()): ?>
                <a class="dropdown-item" href="user-login.php">
                <i class="fas fa-unlock-alt icon me-2"></i> User Login</a>
            <?php endif; ?>
              </div>
            </li>
          </ul>
        </div>
        
      </header>
      
      <div class="body flex-grow-1 px-1">
        <div class="container-xlg">
          
        <!-- <div id="loading"></div> -->
            <!-- content area start -->



