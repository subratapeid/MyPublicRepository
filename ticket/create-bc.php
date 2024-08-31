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
      <h2 class="text-center">Create a New BC</h2>
    </div>
<div class="card-body">

<form class="row g-3 needs-validation" action="" method="post" novalidate>

<div class="col-xl-4 col-md-6">
    <label for="title" class="form-label">Title</label> 
    <div class="input-group has-validation">
        <span class="input-group-text mdi mdi-account-check" id="inputGroupPrepend"></span>     
        <select class="form-select" name="title" id="title" required>
      <option selected disabled value="">Setect Title</option>
      <option value="Mr.">Mr.</option>
      <option value="Ms.">Ms.</option>
      <option value="Mrs.">Mrs.</option>
        </select>
    </div>
</div>
    
  <div class="col-xl-4 col-md-6">
    <label for="firstName" class="form-label">First name</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="firstname" required>
  </div>
</div>
  <div class="col-xl-4 col-md-6">
    <label for="lastName" class="form-label">Last name</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
            
    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="surname" required>
    </div>
  </div>

  <div class="col-xl-4 col-md-6">
    <label for="bcId" class="form-label">BC ID</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account-circle" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="bcId" id="bcId" placeholder="Enter BC Id" required>
  </div>
</div>

<div class="col-xl-4 col-md-6">
    <label for="cardId" class="form-label">Card ID</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-credit-card" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="cardId" id="cardId" placeholder="Enter Card Id" required>
  </div>
</div>

<div class="col-xl-4 col-md-6">
    <label for="terminalId" class="form-label">Terminal ID</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-deskphone" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="terminalId" id="terminalId" placeholder="Enter Terminal Id" required>
  </div>
</div>

<div class="col-xl-4 col-md-6 department-fields ho-ro-it">
    <label for="bank" class="form-label">Bank Name</label> 
    <div class="input-group has-validation">
        <span class="input-group-text mdi mdi-bank" id="inputGroupPrepend"></span>     
        <select class="form-select" name="bank" id="bank" required>
      <option selected disabled value="">Select Bank</option>
        </select>
    </div>
</div>

<div class="col-xl-4 col-md-6">
    <label for="ifscCode" class="form-label">IFSC Code</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-keyboard-close" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="ifscCode" id="ifscCode" placeholder="Enter IFSC Code" required>
  </div>
</div>

<div class="col-xl-4 col-md-6">
    <label for="poolAccountNo" class="form-label">Pool Account No</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-bank" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="poolAccountNo" id="poolAccountNo" placeholder="Enter Pool Account No" required>
  </div>
</div>

<div class="col-xl-4 col-md-6">
    <label for="poPin" class="form-label">Project Office PIN</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-map-marker-radius" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="poPin" id="poPin" placeholder="Enter Project Office PIN" required>
  </div>
</div>

<div class="col-xl-4 col-md-6 department-fields ho-ro-it">
    <label for="poOffice" class="form-label">Project Office</label> 
    <div class="input-group has-validation">
        <span class="input-group-text mdi mdi-city" id="inputGroupPrepend"></span>     
        <input type="text" class="form-control" name="poOffice" id="poOffice" required readonly>
        <input type="text" class="form-control" name="poId" id="poId" required hidden>
    </div>
</div>

<div class="col-xl-4 col-md-6 department-fields ho-ro-it">
    <label for="city" class="form-label">Location</label> 
    <div class="input-group has-validation">
        <span class="input-group-text mdi mdi-map-marker-circle" id="inputGroupPrepend"></span>     
        <select class="form-select" name="city" id="city" required>
      <option selected disabled value="">Select Location</option>
        </select>
    </div>
</div>

<div class="col-xl-4 col-md-6">
    <label for="email" class="form-label" >Email Id (optional)</label>
    <div class="input-group has-validation">
      <span class="input-group-text mdi mdi-email" id="inputGroupPrepend"></span>
      <input type="email" class="form-control" id="email" aria-describedby="inputGroupPrepend" name="email" placeholder="example@gmail.com">
      <div class="invalid-feedback">
        Please Bc email id.
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-md-6">
    <label for="mobile" class="form-label">Phone Number (optional)</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-phone" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" pattern="\d*" id="pinInput" name="userMobile" placeholder="Enter 10 Digit Mobile No" title="Please enter 10-digit Mobile No" maxlength="10" minlength="10" required>
    <div class="invalid-feedback">
      Please provide a valid Mobile No.
    </div>
  </div>
  </div>

  <div class="col-12 d-flex justify-content-center pt-4 pb-4">
    <button class="btn btn-primary" type="submit">Create BC</button>
  </div>
</form>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<!-- <script>
    function getLocation() {
    var pincode = document.getElementById('pincode').value;

    if (pincode.length === 6) {
        //URL to get location PHP script
        var url = 'codes/get_location.php?pincode=' + pincode;

        // Make a GET request using fetch
        fetch(url)
            .then(response => response.json())
            .then(data => {
                // Successful response
                document.getElementById('location').value = data.Area;
                document.getElementById('error-message').innerHTML = '';
            })
            .catch(error => {
                // Error handling
                document.getElementById('error-message').innerHTML = 'Error fetching location. Please try again.';
            });
    } else {
        document.getElementById('error-message').innerHTML = 'Pincode should be 6 digits.';
    }
}
</script> -->

<script>
$(document).ready(function () {

    // Handle change event on the user role select
    $('#user_role').change(function () {
        // Reset the values of hidden fields
        resetHiddenFields();

        // Update field visibilit
    });

// fetchLocationdocument.getElementById('poPin').addEventListener('blur', function() {
//     const poPin = this.value.trim();
    
//     if (poPin === '') {
//         showError('Please enter a valid Project Office PIN.');
//         return;
//     }

   
// });

function fetchOfficeName(poPin) {
    // Assuming you have an endpoint that returns the office name based on PIN
    fetch(`codes/fetch_po_offices.php?pin=${poPin}`)
        .then(response => response.json())
        .then(data => {
            if (data.success && data.locations[0].area) {
                document.getElementById('poOffice').value = data.locations[0].area;
                document.getElementById('poId').value = data.locations[0].id;
            } else {
                showError('Office name not found for the entered PIN.');
                document.getElementById('poOffice').value = '';
            }
        })
        .catch(error => {
            showError('An error occurred while fetching the office name.');
            console.error('Error fetching office name:', error);
        });
}

function fetchLocationsByPin(poPin) {
    // Replace with your actual 3rd party API endpoint
    fetch(`https://api.postalpincode.in/pincode/${poPin}`)
        .then(response => response.json())
        .then(data => {
            const citySelect = document.getElementById('city');
            citySelect.innerHTML = '<option selected disabled value="">Select Location</option>'; // Clear existing options
            console.log(data[0]);
            
            if (data[0].Status === 'Success' && data[0].PostOffice.length > 0) {
                data[0].PostOffice.forEach(location => {
                    const option = document.createElement('option');
                    option.value = location.Name;
                    option.textContent = location.Name;
                    citySelect.appendChild(option);
                });
            } else {
                showError('No locations found for the entered PIN.');
            }
        })
        .catch(error => {
            showError('An error occurred while fetching locations.');
            console.error('Error fetching locations:', error);
        });
}

function fetchBank() {
    // Replace with your actual 3rd party API endpoint
    fetch(`codes/fetch_bank_names.php`)
        .then(response => response.json())
        .then(data => {
            const citySelect = document.getElementById('bank');
            citySelect.innerHTML = '<option selected disabled value="">Select Bank</option>'; // Clear existing options
            console.log(data);
            
            if (data.success && data.banks.length > 0) {
                data.banks.forEach(bank => {
                    const option = document.createElement('option');
                    option.value = bank.bank_name;
                    option.textContent = bank.bank_name;
                    citySelect.appendChild(option);
                });
            } else {
                showError('Banks data not found.');
            }
        })
        .catch(error => {
            showError('An error occurred while fetching bank data.');
            console.error('Error fetching banks data:', error);
        });
}
fetchBank();
function showError(message) {
    // Assuming you have a place to show error messages
    alert(message); // You can replace this with a more user-friendly display, like a toast or modal
}

    // Handle input event on the pincode field
    $('#poPin').on('input', function () {
        // Check if the entered value is a 6-digit pin
        var pinValue = $(this).val();
        if (pinValue.length === 6 && /^\d+$/.test(pinValue)) {
            // Fetch location dynamically using AJAX
             // Fetch Office Name from the database
            fetchOfficeName(pinValue);
            // Fetch locations based on PIN using 3rd party API
            fetchLocationsByPin(pinValue);
        }
    });

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
            submitButton.prop('disabled', false).html('Create BC');
            // Show an alert or handle the case where visible required fields are empty
            alert('Please fill in all required fields.');
            return;
        }

        // Check if all fields are valid
        if (!areFieldsValid()) {
            // Enable the button and hide spinner
            submitButton.prop('disabled', false).html('Create BC');
            alert('Please Enter Valid Data');
            return;
        }

        // Serialize form data
        var formData = $(this).serialize();
        // Perform AJAX request only if visible required fields are not empty
        $.ajax({
            url: 'codes/create_bc.php', // Replace with the actual backend script URL
            type: 'POST',
            data: formData, // Serialize form data
            dataType: 'json', // Expect JSON response from the server
            success: function (response) {
                // Check the response from the server
                if (response.success) {
                    
                    Swal.fire({
                                    icon: 'success',
                                    title: 'BC Created Successfully!',
                                    // text: 'Email sent successfully: ' + emailResponse.message,
                                    showConfirmButton: true,
                                    
                                });
                    // // Send another AJAX request for email here
                    // $.ajax({
                    //     url: 'email/bc_created.php', // Replace with the actual email script URL
                    //     type: 'POST',
                    //     data: formData, // Pass the same form data to the email request
                    //     dataType: 'json',
                    //     success: function (emailResponse) {
                    //         // Enable the button and hide spinner on success of the email request
                    //         submitButton.prop('disabled', false).html('Create User');

                    //         // Check the response from the email server
                    //         if (emailResponse.status === 'success') {
                    //             // Show success SweetAlert popup for the email request
                    //             Swal.fire({
                    //                 icon: 'success',
                    //                 title: 'BC Created Successfully!',
                    //                 text: 'Email sent successfully: ' + emailResponse.message,
                    //                 showConfirmButton: true,
                                    
                    //             });

                    //             // Reset the form on success
                    //             $('form')[0].reset();
                    //         } else {
                    //             // Show error SweetAlert popup for the email request
                    //             Swal.fire({
                    //                 icon: 'warning', // Change to 'warning' icon for email not sent
                    //                 title: 'BC Created Successfully!',
                    //                 // text: 'Unable To Send Email Notification',
                    //                 showConfirmButton: true,
                    //             });
                    //             $('form')[0].reset();
                    //         }
                    //     },
                    //     error: function (jqXHR, textStatus, errorThrown) {
                    //         // Enable the button and hide spinner on error of the email request
                    //         submitButton.prop('disabled', false).html('Create BC');

                    //         // Handle errors for the email request
                    //         console.error('Error in email AJAX request:', textStatus, errorThrown);

                    //         // Show error SweetAlert popup for the email request
                    //         Swal.fire({
                    //             icon: 'warning',
                    //             title: 'User Created',
                    //             text: 'An error occurred in the email request.',
                    //         });

                    //         // Reset the form on error
                    //         $('form')[0].reset();
                    //     }
                    // });
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

