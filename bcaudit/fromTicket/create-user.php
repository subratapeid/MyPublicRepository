<?php
$requiredPermission = 'Create User';
include 'include/navbar.php';
// Assuming the user's role is stored in a session variable
$userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : '';

function userRole($roleToCheck) {
  global $userRole;
  // Check if the user has the specified role
  return $userRole === $roleToCheck;
}
// Check if the user has the required permission
if (!hasPermission($requiredPermission)) {
   echo '<script>window.location.href = "user-login.php";</script>';
 // Redirect to an unauthorized page if the user doesn't have the required permission
    exit;
}
$userPermissions = getUserPermissions();
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Material Design Icons (MDI) CDN -->
<link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">

<!-- jQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JS CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container mt-2 mb-3">
  <div class="card">
<div class="card-header py-0 px-2">
      <h2 class="text-center">Create User</h2>
    </div>
<div class="card-body">

<form class="row g-3 needs-validation" action="" method="post" novalidate>
  <div class="col-xl-4 col-md-6">
    <label for="validationCustom01" class="form-label">First name</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="firstname" required>
  </div>
</div>
  <div class="col-xl-4 col-md-6">
    <label for="validationCustom02" class="form-label">Last name</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
            
    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="surname" required>
    </div>
  </div>

  <div class="col-xl-4 col-md-6">
    <label for="validationCustomUsername" class="form-label" >Email Id</label>
    
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="email" class="form-control" id="email" aria-describedby="inputGroupPrepend" name="email" placeholder="example@company.com" required>
      <div class="invalid-feedback">
        Please enter Employee email id.
      </div>
    </div>
  </div>
 <!-- Email Vaild only for organization -->
  <!-- <script>
    document.getElementById('email').addEventListener('input', function() {
      var emailInput = this.value.toLowerCase();
      var allowedDomains = ['integramicro.co.in', 'integra.com'];

      // Check if the entered email has one of the allowed domains
      if (allowedDomains.some(domain => emailInput.endsWith('@' + domain))) {
        this.setCustomValidity('');
        this.classList.remove('is-invalid');
      } else {
        this.setCustomValidity('Invalid email address. Please use an email from integramicro.co.in or integra.com.');
        this.classList.add('is-invalid');
      }
    });
  </script> -->

  <div class="col-xl-4 col-md-6">
    <label for="mobile" class="form-label">Phone Number</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-phone" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" pattern="\d*" id="pinInput" name="userMobile" placeholder="Enter 10 Digit Mobile No" title="Please enter 10-digit Mobile No" maxlength="10" minlength="10" required>
    <div class="invalid-feedback">
      Please provide a valid Mobile No.
    </div>
  </div>
  </div>
  
  <div class="col-xl-4 col-md-6">
    <label for="validationCustom04" class="form-label">User Role</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
    <select class="form-select" name="role" id="user_role" required>
      <option selected disabled value="">Choose...</option>
    <?php if (userRole('Admin')): ?>
      <option value="Admin">Admin</option>
    <?php endif; ?>
    <?php if (userRole('Admin') || userRole('Manager') || userRole('Supervisor')): ?>
      <option>HO</option>
      <?php endif; ?>
      <?php if (userRole('Admin') || userRole('HO') || userRole('Manager') || userRole('Supervisor')): ?>
      <option>RO</option>
      <?php endif; ?>

      <?php if (userRole('Admin') || userRole('HO') || userRole('RO') || userRole('Manager') || userRole('Supervisor')): ?>
      <option>IT</option>
      <?php endif; ?>

      <?php if (userRole('Admin') || userRole('Manager') || userRole('Supervisor')): ?>
      <option>Executive</option>
      <?php endif; ?>

      <?php if (userRole('Admin')): ?>
      <option>Manager</option>
      <?php endif; ?>

      <?php if (userRole('Admin') || userRole('Manager')): ?>
      <option>Supervisor</option>
      <?php endif; ?>
    </select>

    </div>
  </div>
  <div class="col-xl-4 col-md-6 department-fields generic style='hidden'">
    <label for="department" class="form-label">Department</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-briefcase-variant-outline" id="inputGroupPrepend"></span>
              <select class="form-select" name="depertment" id="department" required>
      <option selected disabled value="">Choose department</option>
      <option>Technical support</option>
      <option>Hardware</option>
      <option>Database</option>
      <option>Operational</option>
    </select>

  </div>
  </div>

  <div class="col-xl-4 col-md-6 department-fields ho-ro-it">
    <label for="location" class="form-label">Select Office Location</label> 
    <div class="input-group has-validation">
        <span class="input-group-text mdi mdi-city" id="inputGroupPrepend"></span>     
        <select class="form-select" name="office" id="location" required>
      <option selected disabled value="">Choose Location</option>
        </select>
    </div>
</div>

  <div class="col-12 d-flex justify-content-center pt-4 pb-4">
    <button class="btn btn-primary" type="submit">Create User</button>
  </div>
</form>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script>
// Function to fetch office locations based on the selected user role from the dropdown
function fetchOfficeLocations() {
  var selectedRole = document.getElementById("user_role").value;
    console.log(selectedRole);
  if (selectedRole == "Admin" || selectedRole == "Executive" || selectedRole == "Manager" || selectedRole == "Supervisor") {
        return; // Exit the function without making the AJAX call
    }
    // Fetch office locations
    $.ajax({
        url: 'codes/fetch_offices_code.php',
        method: 'GET',
        data: { userRole: selectedRole },
        success: function(response) {
            var dropdownMenu = document.getElementById("location");
            dropdownMenu.innerHTML = ""; // Clear previous options

                // Create and add the "Select Office" option
                var selectOfficeOption = document.createElement("option");
                selectOfficeOption.text = "Select Office";
                selectOfficeOption.disabled = true;
                selectOfficeOption.selected = true; // Select this option by default
                selectOfficeOption.value = ""; // Set value to empty string
                dropdownMenu.add(selectOfficeOption);
            
            // console.log(response);
            response.forEach(function(office) {
                // Create an option element for each office location
                var option = document.createElement("option");
                option.text = office.area;
                option.value = office.id;
                dropdownMenu.add(option);  
            });
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
        }
    });
}
// Event listener to detect changes in the user role dropdown
document.getElementById("user_role").addEventListener("change", fetchOfficeLocations);


// Field Visibility Controll
$(document).ready(function () {
    // Initial setup
    updateFieldsVisibility();

    // Handle change event on the user role select
    $('#user_role').change(function () {
        // Reset the values of hidden fields
        resetHiddenFields();

        // Update field visibility
        updateFieldsVisibility();
    });

    function updateFieldsVisibility() {
        var selectedRole = $('#user_role').val();

        // Hide all department-related fields
        $('.department-fields').hide();

        // Show/hide fields based on the selected role
        if (selectedRole === 'HO' || selectedRole === 'RO' || selectedRole === 'IT') {
            // If HO, RO, or IT is selected, show the relevant fields
            $('.department-fields.ho-ro-it').show();
        } else if(selectedRole !== 'Admin') {
            // If any other role is selected, show the generic department field
            $('.department-fields.generic').show();
        }
    }


    function resetHiddenFields() {
        // Reset the values of hidden fields
        $('.department-fields').find('select, input').val('');
    }

    function areFieldsValid() {
        var allFields = $('.needs-validation :input');
        var areFieldsValid = true;

        allFields.each(function () {
            // Check if the field is valid only if it's not hidden
            if (!$(this).is(':hidden') && !this.checkValidity()) {
                areFieldsValid = false;
                return false; // Exit the loop if any field is not valid
            }
        });

        return areFieldsValid;
    }

    // Handle form submission
    $('form').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission
        // Get the submit button
        var submitButton = $(this).find('button[type="submit"]');

        // Disable the button and show spinner
        submitButton.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Creating...');

        // Check if visible required fields are empty
        if (!areVisibleRequiredFieldsFilled()) {
            // Enable the button and hide spinner
            submitButton.prop('disabled', false).html('Create User');
            // Show an alert or handle the case where visible required fields are empty
            alert('Please fill in all required fields.');
            return;
        }

        // Check if all fields are valid
        if (!areFieldsValid()) {
            // Enable the button and hide spinner
            submitButton.prop('disabled', false).html('Create User');
            alert('Please Enter Valid Data');
            return;
        }
        
        // Serialize form data
        var dropdown = document.getElementById('location');
        var selectedOffice = dropdown.options[dropdown.selectedIndex];
        var formData = $(this).serialize();
        formData += '&officeName=' + encodeURIComponent(selectedOffice.text);
        // Perform AJAX request only if visible required fields are not empty
        $.ajax({
            url: 'codes/create_user.php', // Replace with the actual backend script URL
            type: 'POST',
            data: formData, // Serialize form data
            dataType: 'json', // Expect JSON response from the server
            success: function (response) {
                // Check the response from the server
                if (response.success) {
                    // Send another AJAX request for email here
                    $.ajax({
                        url: 'email/user_created.php', // Replace with the actual email script URL
                        type: 'POST',
                        data: formData, // Pass the same form data to the email request
                        dataType: 'json',
                        success: function (emailResponse) {
                            // Enable the button and hide spinner on success of the email request
                            submitButton.prop('disabled', false).html('Create User');

                            // Check the response from the email server
                            if (emailResponse.status === 'success') {
                                // Show success SweetAlert popup for the email request
                                Swal.fire({
                                    icon: 'success',
                                    title: 'User Created Successfully!',
                                    text: 'Email sent successfully: ' + emailResponse.message,
                                    showConfirmButton: true,
                                    
                                });

                                // Reset the form on success
                                $('form')[0].reset();
                            } else {
                                // Show error SweetAlert popup for the email request
                                Swal.fire({
                                    icon: 'warning', // Change to 'warning' icon for email not sent
                                    title: 'User Created Successfully!',
                                    text: 'Unable To Send Email Notification',
                                    showConfirmButton: true,
                                });
                                $('form')[0].reset();
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            // Enable the button and hide spinner on error of the email request
                            submitButton.prop('disabled', false).html('Create User');

                            // Handle errors for the email request
                            console.error('Error in email AJAX request:', textStatus, errorThrown);

                            // Show error SweetAlert popup for the email request
                            Swal.fire({
                                icon: 'warning',
                                title: 'User Created',
                                text: 'An error occurred in the email request.',
                            });

                            // Reset the form on error
                            $('form')[0].reset();
                        }
                    });
                } else {
                    // Enable the button and hide spinner on error in the first request
                    submitButton.prop('disabled', false).html('Create User');

                    // Show error SweetAlert popup for the first request
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: response.error ? response.error : 'An unknown error occurred (1)',
                    });


                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Enable the button and hide spinner on error in the first request
                submitButton.prop('disabled', false).html('Create User');

                // Parse the error response if it's in JSON format
                try {
                    var errorMessage = JSON.parse(jqXHR.responseText).error;
                } catch (e) {
                    var errorMessage = 'An unknown error occurred (1)';
                }

                // Show error SweetAlert popup for the first request
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: errorMessage,
                });

                // Reset the form on error
                $('form')[0].reset();
            }
        });
    });

    // Function to check if visible required fields are filled
    function areVisibleRequiredFieldsFilled() {
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
});
</script>

<script src="js/form.js"></script>

<?php include 'include/footer.php'; ?>

