<?php 
    $pageTitle="User Login";
    include 'include/navbar.php'; 
?>
<style>
    
    .login-container {
        background-color: #fdfdfd;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 6px 1px rgba(0, 0, 0);
        width: 500px;
        max-width: 100%;
        margin: 30px auto;
        text-align: center;
        position: relative;
        justify-content: center;
    }
    .login-container h2 {
        margin-bottom: 20px;
        color: #333;
    }

    .form-group input {
        width: calc(100% - 20px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }
    .form-group input:focus {
        outline: none;
        border-color: #007bff;
    }
    .form-group button {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }
    .form-group button:hover {
        background-color: #0056b3;
    }
.form-group{
    margin-bottom: 35px;
}

</style>
<div class="login-container">
    <h2>User Login</h2>
    <form id="loginForm" action="#" method="post">
        <div class="form-group">
            <input type="text" class="lowercase-input no-space" name="email" placeholder="Email id" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <button id="loginButton" type="submit">Login</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // form submission logic
    $('#loginForm').submit(function (e) {
        e.preventDefault();
        // Disable the submit button and show the spinner
        startLoading();

        // Store the form reference
        var $form = $(this);
        
        // AJAX request
        $.ajax({
            type: 'POST',
            url: 'codes/user_login_code.php',
            data: $form.serialize(), // Use the stored form reference
            dataType: 'json',
            success: function (response) {
                // Handle the JSON response from the server
                if (response.status === 'success') {
                    stopLoading();
                    window.location.href = response.redirect;
                } else {
                    alert(response.message);
                    stopLoading();
                }
            },
            error: function (error) {
                stopLoading();
                console.log('Error:', error);
            }
        });
    });

    // Function to start loading (show spinner, disable button, etc.)
    function startLoading() {
        $('#loginButton').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
    }

    // Function to stop loading (enable button, hide spinner, etc.)
    function stopLoading() {
        $('#loginButton').prop('disabled', false).html('Login');
    }
});
</script>

<?php include 'include/footer.php'; ?>