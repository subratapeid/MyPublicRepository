<?php
include 'include/navbar.php';
// Check if the user logedin
   if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    echo '<script>window.location.href = "index.php";</script>'; // Redirect to another page
    exit();
}
?>
<link rel="stylesheet" href="css/user_login_page.css">
    <body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <div class="row row justify-content-center">
                <div class="col-lg-7 col-xl-5 col-md-10 mt-3 pt-2 mb-3 pb-2">
                    <div class="form-container">
                        <div class="form-icon"><i class="fa fa-user"></i></div>
                        <h3 class="title">User Login</h3>
            <form id="loginForm" class="form-horizontal">
            <div class="form-group">
    <label for="username">Username:</label>
    <input class="form-control" type="text" id="username" name="username" placeholder="Enter Email Id" required><br><br>
</div>
<div class="form-group">
    <label for="password">Password:</label>
    <input class="form-control" type="password" id="password" name="password" placeholder="Enter Your Password" required><br><br>
</div>
    <!-- <button type="submit" value="Login" class="btn btn-default">Login</button> -->
    <button type="submit" id="submitBtn" class="btn btn-default">
        <span class="spinner-border spinner-border-sm d-none" id="spinner" role="status" aria-hidden="true"></span>
        Login
    </button>
</form>
        </div>
    </div>
</div>
<script src="js/user_login.js"></script>
</body>
<?php include 'include/footer.php'; ?>
