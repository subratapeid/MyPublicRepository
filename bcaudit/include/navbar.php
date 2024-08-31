<?php session_start(); // Start session if not already started 
     include "include/security.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" sizes="64x64" href="assets/favicon/logo.jpg">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Material Design Icons (MDI) CDN -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <title><?php echo isset($pageTitle) ? $pageTitle : "BCA Audit Management Portal"; ?></title>
    <link rel="stylesheet" href="/bcaudit/assets/css/style.css" />

<!-- //////////////////////////////////////////////////////////////////// -->
  </head>
  <body>
    <!-- loader start -->
  <div id="loading-overlay" class="loading-overlay" style="display: none;">
    <div class="loader">
    <!-- <div class="text">Please wait</div> -->
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
    <div class="loading-text" id="loadingText">--Please wait--</div>
  </div>
  <!-- Loader end -->

 <!-- User menu Popup -->
 <div class="user_menu" id="userMenu">

<?php if (isLoggedIn()): ?> 
  <div class="user_menu_header">
      <img src="/bcaudit/assets/images/profile.jpg" alt="Profile" />

      <div>
          <strong><?php echo($_SESSION['user_first_name']); ?></strong>
          <br>
          <small><?php echo($_SESSION['email_id']); ?></small>
      </div>

  </div>

  <div class="user_menu_content">
      <div class="user_menu_item"><a class="user_menu_link" href="">
        <i class="fas fa-user icon me-2"></i> Profile</a>
      </div>
        
      <div class="user_menu_item"><a class="user_menu_link" href="change-password.php">
        <i class="fas fa-key icon me-2"></i> Change Password</a>
      </div>
 </div>

  <div class="user_menu_footer" id="logout_button"><i class="bx bx-lock-open mr-1"></i> Logout
  </div>
  <?php endif; ?>

  <?php if (!isLoggedIn()): ?> 
    <div class="user_menu_footer" id="login_button">
  <a href="/bcaudit/user-login.php"><i class="bx bx-lock-open"></i> login</a> 
  </div>
  <?php endif; ?>

</div>
<!-- user popup end -->

    <!-- navbar -->
    <nav class="navbar">
      <div class="sm logo_item">
        <!-- menu open close icon -->
        <div class="menu-icon" id="sidebarOpen">
          <div></div>
          <div></div>
          <div></div>
      </div>

        <img src="/bcaudit/assets/images/logo.png" alt="" id="logo">
        <span id="logoName">Integra Micro System</span>
      </div>
      <span id="dateTime"></span>
        <!-- Search bar -->
      <!-- <div class="search_bar">
        <input type="text" placeholder="Search" />
      </div> -->

      <div class="sm navbar_content">
        
        <!-- Search icon -->
        <!-- <i class="fa-solid fa-magnifying-glass searchIcon"></i> -->

        <i class='bx bx-sun' id="darkLight"></i>
        <!-- <i class="fa-solid fa-bell"></i> -->
        <img src="/bcaudit/assets/images/profile.jpg" alt="" class="profile" id="userImage" />
      </div>
    </nav>

   
    <!-- sidebar -->
    <nav class="sidebar closed hoverable">
      <div class="menu_content">
        <ul class="menu_items">
          <!-- start -->
    <?php if (isLoggedIn()): ?> 
          <li class="item">
            <!-- <a href="/bcaudit/index.php" class="nav_link"> -->
            <a href="/bcaudit/" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-home-alt"></i>
              </span>
              <span class="navlink">Dashboard</span>
            <a>
          </li>

          <li class="item">
            <a href="/bcaudit/audit-list.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bxs-notepad"></i>
              </span>
              <span class="navlink">Audit List</span>
            </a>
          </li>
          <!-- end -->
          <!--navlink with submenu user management -->
          <li class="item">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="mdi mdi-account-group"></i>
              </span>
              <span class="navlink">User Management</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>

            <ul class="menu_items submenu">
              <a href="all-users.php" class="nav_link sublink">All Users List</a>
              <a href="create-user.php" class="nav_link sublink">Create New User</a>
              <a href="approve-user.php" class="nav_link sublink">Approve User</a>
              <a href="user-bulk-upload.php" class="nav_link sublink">Bulk Upload</a>
            </ul>
          </li>
          <!-- end -->
           <!--navlink with submenu bc management -->
          <li class="item">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="mdi mdi-account-multiple"></i>
              </span>
              <span class="navlink">BCA Management</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>

            <ul class="menu_items submenu">
              <a href="bca-list.php" class="nav_link sublink">All BCA List</a>
              <a href="create-bca.php" class="nav_link sublink">Create New BCA</a>
              <a href="approve-bca.php" class="nav_link sublink">Approve BCA</a>
              <a href="bca-bulk-upload.php" class="nav_link sublink">Bulk Upload</a>
            </ul>
          </li>
          <!-- end -->
        </ul>
        <?php endif; ?>

        <?php if (!isLoggedIn()): ?> 
        <ul class="menu_items">
          <!-- <div class="menu_title "></div> -->

          <!-- Start -->
          <!-- <li class="item">
            <a href="download-audit-report.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bxs-download"></i>
              </span>
              <span class="navlink">Download Report</span>
            </a>
          </li> -->
          <!-- End -->
          <li class="item">
            <a href="/bcaudit/user-login.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-lock-open"></i>
              </span>
              <span class="navlink">Login</span>
            </a>
          </li>
        </ul>
        <?php endif; ?>

        <!-- Sidebar Open / Close -->
        <div class="bottom_content">
          <div class="bottom expand_sidebar">
            <span> Expand</span>
            <i class='bx bx-log-in' ></i>
          </div>
          <div class="bottom collapse_sidebar">
            <span> Collapse</span>
            <i class='bx bx-log-out'></i>
          </div>
        </div>
      </div>
    </nav>
    <!-- Start main contentainer -->
    <div class="main">


