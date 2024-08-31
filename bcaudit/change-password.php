<?php
include 'include/navbar.php';
include 'codes/config.php';


// Check if the user is logged in
if(isset($_SESSION['user_id'])) {
    // Get the user ID from the session
    $userId = $_SESSION['user_id'];
}


if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    echo '<script>window.location.href = "user-login.php"; </script>';
    exit;
}
?>

<div class="container mt-2 mb-3">
  <div class="card">
    <div class="card-header py-3 px-2">
      <h2 class="text-center">Change Account Password</h2>
    </div>

    <div class="card-body pb-5">

    <form class="row g-3 needs-validation d-flex justify-content-center" id="changePassword" action="" method="post" enctype="multipart/form-data" novalidate>
         <div class="col-md-6">
     <div class="">
            <label for="oldPassword" class="form-label">Current Password</label>
            <div class="input-group has-validation">
                <span class="input-group-text mdi mdi-key" id="inputGroupPrepend"></span>
                <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Enter Your Current Password" required>
                <div class="input-group-append">
                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Show Password"
                          onmousedown="showPassword('oldPassword')" onmouseup="hidePassword('oldPassword')" 
                          ontouchstart="showPassword('oldPassword')" ontouchend="hidePassword('oldPassword')">
                        <i class="fas fa-eye" id="toggleOldPassword"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="">
            <label for="newPassword" class="form-label">New Password</label>
            <div class="input-group has-validation">
                <span class="input-group-text mdi mdi-key-variant" id="inputGroupPrepend"></span>
                <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Enter New Password" required oninput="checkPasswordStrength()">
                <div class="input-group-append">
                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Show Password"
                          onmousedown="showPassword('newPassword')" onmouseup="hidePassword('newPassword')" 
                          ontouchstart="showPassword('newPassword')" ontouchend="hidePassword('newPassword')">
                        <i class="fas fa-eye" id="toggleNewPassword"></i>
                    </span>
                </div>
            </div>
            <div class="progress strength-meter">
                <div class="progress-bar" id="strengthBar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="strength-text">Strength: <span id="strengthStatus" class="strength-status"></span></div>
        </div>

        <div class="">
            <label for="confirmPassword" class="form-label">Confirm New Password</label>
            <div class="input-group has-validation">
                <span class="input-group-text mdi mdi-key-variant" id="inputGroupPrepend"></span>
                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Enter New Password again" required>
                <div class="input-group-append">
                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Show Password"
                          onmousedown="showPassword('confirmPassword')" onmouseup="hidePassword('confirmPassword')" 
                          ontouchstart="showPassword('confirmPassword')" ontouchend="hidePassword('confirmPassword')">
                        <i class="fas fa-eye" id="toggleConfirmPassword"></i>
                    </span>
                </div>
            </div>
        </div>
        </div>
        <style>
        .input-group-text {
            cursor: pointer;
        }
        .strength-meter {
            height: 5px;
            margin-top: 5px;
        }
        .strength-text {
            font-size: 0.9em;
            margin-top: 5px;
            font-weight: bold;
        }
    </style>
  <div class="col-12 d-flex justify-content-center pt-4 pb-4">
    <button class="btn btn-danger" type="submit">Change Password</button>
  </div>

</form>

        </div>
    </div>
</div>

<script src="js/form.js"></script>
<?php include 'include/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
  // Password show hide feature
        function showPassword(fieldId) {
            var field = document.getElementById(fieldId);
            var icon = document.getElementById('toggle' + fieldId.charAt(0).toUpperCase() + fieldId.slice(1));
            field.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }

        function hidePassword(fieldId) {
            var field = document.getElementById(fieldId);
            var icon = document.getElementById('toggle' + fieldId.charAt(0).toUpperCase() + fieldId.slice(1));
            field.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
// password strength test
        function checkPasswordStrength() {
            var password = document.getElementById('newPassword').value;
            var strengthBar = document.getElementById('strengthBar');
            var strengthStatus = document.getElementById('strengthStatus');
            var strength = 0;

            // Check the length of the password
            if (password.length >= 8) strength += 1;
            // Check for lowercase letters
            if (/[a-z]/.test(password)) strength += 1;
            // Check for uppercase letters
            if (/[A-Z]/.test(password)) strength += 1;
            // Check for numbers
            if (/[0-9]/.test(password)) strength += 1;
            // Check for special characters
            if (/[\W]/.test(password)) strength += 1;

            var strengthPercent = (strength / 5) * 100;
            strengthBar.style.width = strengthPercent + '%';
            strengthBar.setAttribute('aria-valuenow', strengthPercent);

            var strengthLabel = '';
            var strengthClass = '';
            var textColor = '';

    if (strengthPercent >= 1) {
      if (strengthPercent <= 20) {
    strengthLabel = 'Very Weak';
    strengthClass = 'bg-danger';
    textColor = 'text-danger';
  } else if (strengthPercent <= 40) { 
    strengthLabel = 'Weak';
    strengthClass = 'bg-warning';
    textColor = 'text-warning';
  }   else if (strengthPercent <= 60) { 
    strengthLabel = 'Medium';
    strengthClass = 'bg-info';
    textColor = 'text-info';
  } else if (strengthPercent <= 80) {
    strengthLabel = 'Strong';
    strengthClass = 'bg-primary';
    textColor = 'text-primary';
  } else {
    strengthLabel = 'Very Strong';
    strengthClass = 'bg-success';
    textColor = 'text-success';
  }
} else {
    strengthLabel = 'NA';
    strengthClass = 'bg-secondary';
    textColor = 'text-dark';
  }

strengthBar.className = 'progress-bar ' + strengthClass;
strengthStatus.textContent = strengthLabel;
strengthStatus.className = 'strength-status ' + textColor;
window.strengthPercent = strengthPercent;
}

//form Handling function
$(document).ready(function() {
    // Handle form submission
    $('form').submit(function (e) {
        e.preventDefault();
        var submitButton = $(this).find('button[type="submit"]');
        // Disable the button and show spinner
        submitButton.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please Wait...');

        // Check if required fields are empty
        if (!areRequiredFieldsFilled()) {
            // Enable the button and hide spinner
            submitButton.prop('disabled', false).html('Change Password');
            // Show an alert or handle the case where visible required fields are empty
            alert('Please fill in all required fields.');
            return;
        }
       // Serialize form data
        var formData = new FormData($("#changePassword")[0]);
        console.log(strengthPercent);

        // Append additional data
        formData.append('strength', strengthPercent);
        // Perform AJAX request only if required fields are not empty
        $.ajax({
            url: 'codes/user/change_old_password.php',
            type: 'POST',
            data: formData,
            dataType: 'json', // JSON response from the server
            processData: false,
            contentType: false,
            success: function (response) {
                // Check the response from the server
                if (response.status === 'success') {
                    submitButton.prop('disabled', false).html('Change Password');
                     // Show success SweetAlert popup for the first request
                     Swal.fire({
                        icon: 'success',
                        title: 'Congratulations!',
                        text: response.message ? response.message : error,
                    }).then(() => {
                        window.location.href = 'logout.php';
                        });
                } else {
                    // Enable the button and hide spinner on error in the first request
                    submitButton.prop('disabled', false).html('Change Password');

                    // Show error SweetAlert popup for the first request
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: response.message ? response.message : error,
                    });


                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Enable the button and hide spinner on error in the first request
                submitButton.prop('disabled', false).html('Change Password');

                // Parse the error response if it's in JSON format
                try {
    errorMessage = JSON.parse(jqXHR.responseText).error;
} catch (error) {
    errorMessage = "An error occurred, but the response couldn't be parsed.";
    console.error("Error parsing JSON:", error);
}

// Log the error message for debugging
console.log("Error Message:", errorMessage);

                // Show error SweetAlert popup for the first request
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: errorMessage,
                });

            }
        });
    });
 // Function to check if required fields are filled
function areRequiredFieldsFilled() {
    var visibleRequiredFields = $('.needs-validation :input:visible[required]');
    var areFieldsFilled = true;

    visibleRequiredFields.each(function () {
        if (!$(this).val()) {
            areFieldsFilled = false;
            return false; // Exit the loop if any field is empty
        }
    });

    return areFieldsFilled;
}

// Function to validate password fields
function passwordValidation() {
    var newPassword = $('#newPassword').val();
    var confirmPassword = $('#confirmPassword').val();
    var oldPassword = $('#oldPassword').val();
    var strengthPercent = getStrengthPercent(newPassword); // Assuming you have a function to calculate strength

    var passwordValidation = true;

    if (areRequiredFieldsFilled()) {
        // Check if the new password matches the confirm password
        if (newPassword !== confirmPassword) {
            $('#confirmPassword').addClass('is-invalid');
            passwordValidation = false;
            alert('Passwords do not match.');
        } else {
            $('#confirmPassword').removeClass('is-invalid');
        }

        // Check if the new password strength is above 80%
        if (strengthPercent < 80) {
            $('#newPassword').addClass('is-invalid');
            passwordValidation = false;
        } else {
            $('#newPassword').removeClass('is-invalid');
        }

        // Check if the old password and new password are the same
        if (oldPassword === newPassword) {
            $('#newPassword').addClass('is-invalid');
            passwordValidation = false;
        } else {
            $('#newPassword').removeClass('is-invalid');
        }
    }

    return passwordValidation;
}
    function resetFields() {
    // Reset specific fields to their default or empty values
    $('#issueType').val('');
    $('#media').val('');
    $('#remarks').val('');
    $('#issues').val('');

}
});
</script>

