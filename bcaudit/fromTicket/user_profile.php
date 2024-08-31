<?php
include 'include/navbar.php';

// Check if the user ID is set in the session
if (!isset($_SESSION['user_id'])) {
  echo '<script>window.location.href = "user-login.php";</script>';
  exit();  // Stop further execution
}
$userID=$_SESSION['user_id'];
$role=$_SESSION['user_role'];

// Check if ticket ID is present in the URL
// if (isset($_POST['userId']) && !empty($_POST['userId'])) {
//   $userId = $_POST['userId'];
// } else {
  // Redirect to another page if ticket_id is not provided
//   echo '<script>window.location.href = "all-users.php";</script>';
//   exit();  // Stop further execution
// }

    // if ($userId) {
    //   if ($role=="BC"){
    //     $table="bc_details";
    //     $column="bc_id";
    //   } else {
    //     $table="users";
    //     $column="id";
    //   }
    //     // Check if the User ID exists in the database
    //     $stmt = $pdo->prepare("SELECT * FROM $table WHERE $column = :userId");
    //     $stmt->execute(['userId' => $userId]);
    //     $user = $stmt->fetch();

    //     if (!$userId) {
    //         // User not found, display alert and redirect to homepage
    //         echo '<script>alert("User not found."); window.location.href = "all-users.php";</script>';
    //         exit;  // Stop further execution
    //     }
    //   }
?>
<style>
    h1 {
        font-family: sans-serif;
        text-align: center;
        font-size: 30px;
        color: #222;
    }

    .profile-pic-div {
        width: 150px;
        height: 150px;
        position: relative; /* Position relative for container */
        margin: 0 auto; /* Center the container */
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        border: 2px solid grey;
        align-items: center;
    }

    #photo {
        height: 100%;
        width: auto;
    }

    #file {
        display: none;
    }

    #uploadBtn {
        position: absolute;
        bottom: 0;
        left: 20%;
        transform: translateX(-20%);
        text-align: center;
        background: rgba(0, 0, 0, 0.7);
        color: wheat;
        line-height: 30px;
        font-family: sans-serif;
        font-size: 15px;
        cursor: pointer;
        width: 100%;
        opacity: 0;
        transition: opacity 0.5s ease; /* Add transition effect */
    }

    .profile-pic-div:hover #uploadBtn {
        opacity: 1; /* Show upload button on hover */
    }
</style>

<div class="container mt-2 mb-3">
  <div class="card">
    <div class="card-header py-0 px-2">
      <h2 class="text-center">Your Profile</h2>
    </div>
      <div class="card-body">
        <!-- Image and Image Input Field -->
        <div class="profile-pic-div">
          <img src="assets/img/avatars/nouser.png" id="photo">
          <input type="file" name="userImg" id="file"onchange="loadFile(event)" accept="image/*"/>
          <label for="file" id="uploadBtn">Change Photo</label>
        </div>
        <form class="row g-3 needs-validation" action="" method="post" novalidate>
        <div class="col-xl-4 col-md-6">
          <label for="validationCustom01" class="form-label">First name</label>
          <div class="input-group has-validation">
            <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
            <input type="text" class="form-control" value="" name="firstName" id="firstName" placeholder="firstname" required>
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
          <label for="mobile" class="form-label">Phone Number</label>
          <div class="input-group has-validation">
            <span class="input-group-text mdi mdi-phone" id="inputGroupPrepend"></span>
            <input type="text" class="form-control" pattern="\d*" id="pinInput" name="userMobile" placeholder="Enter 10 Digit Mobile No" title="Please enter 10-digit Mobile No" maxlength="10" minlength="10" required>
            <div class="invalid-feedback">Please provide a valid Mobile No.
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-md-6">
          <label for="validationCustomUsername" class="form-label" >Email Id</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="email" class="form-control" id="email" aria-describedby="inputGroupPrepend" name="email" placeholder="example@company.com" required readonly>
            <div class="invalid-feedback">Please enter Employee email id.
            </div>
          </div>
        </div>
  
  <div class="col-xl-4 col-md-6">
    <label for="validationCustom04" class="form-label">User Role</label>
    <div class="input-group has-validation">
        <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
        <Input class="form-control" name="role" id="user_role" readonly>
    </div>
  </div>
  <div class="col-xl-4 col-md-6">
    <label for="department" class="form-label">Department</label>
    <div class="input-group has-validation">
      <span class="input-group-text mdi mdi-briefcase-variant-outline" id="inputGroupPrepend"></span>
        <input type="text" class="form-control" name="department" id="department" readonly>
    </div>
  </div>

  <div class="col-xl-4 col-md-6 department-fields ho-ro-it">
    <label for="location" class="form-label">Office Location</label> 
    <div class="input-group has-validation">
        <span class="input-group-text mdi mdi-city" id="inputGroupPrepend"></span>     
        <input type="text" class="form-control" name="office" id="location" readonly>
    </div>
</div>

  <div class="col-12 d-flex justify-content-center pt-4 pb-4">
    <button class="btn btn-danger me-2" type="cancel">Cancel</button>
    <button class="btn btn-success ms-2" type="submit">Update User</button>
  </div>

  </div>
</form>
</div>
</div>
<script>
    var loadFile = function(event) {
        var image = document.getElementById("photo");
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    // Function to make a POST request to fetch user data
    function fetchUserData() {
        var apiUrl = 'codes/get_user_details.php'; // Relative path to your PHP API endpoint
        var userId = <?php echo json_encode($userId); ?>;
        var data = { userId: userId };

        $.ajax({
            url: apiUrl,
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(response) {
                populateUserData(response);
                submitData(response) // Call populateUserData function with the response data
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('Error fetching user details. Please try again later.');
            }
        });
    }

    // Function to populate user data into input fields
    function populateUserData(user) {
        document.getElementById('firstName').value = user.first_name;
        document.getElementById('lastName').value = user.last_name;
        document.getElementById('email').value = user.email;
        document.getElementById('pinInput').value = user.mobile;
        document.getElementById('user_role').value = user.role ? user.role:"NA";
        document.getElementById('department').value = user.department ? user.department: "NA";
        document.getElementById('location').value = user.office;
        document.getElementById('photo').src =user.img_url ? user.img_url : 'assets/img/avatars/nouser.png';
    }

    // Call the fetchUserData function when the page loads
    window.onload = function() {
        fetchUserData();
    };

    //update data api call script///////////////////////
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
    function submitData(user) {
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
        var formData = new FormData(this);

// Append the selected image file to the form data
var fileInput = $('#file')[0];
if (fileInput.files.length > 0) {
    formData.append('userImg', fileInput.files[0]);
} else{ formData.append('userImg', user.img_url ? user.img_url : 'assets/img/avatars/nouser.png');

}
        // Perform AJAX request only if visible required fields are not empty
        $.ajax({
            url: 'codes/update_my_profile.php', // Replace with the actual backend script URL
            type: 'POST',
            data: formData, // Send FormData object
            contentType: false, // Prevent jQuery from overriding the content type
            processData: false, // Prevent jQuery from processing the data
            dataType: 'json', // Expect JSON response from the server
            success: function(response) {
                // Check the response from the server
                if (response.success) {
                    
                            // Enable the button and hide spinner on success of the email request
                            submitButton.prop('disabled', false).html('Create User');

                                // Show success SweetAlert popup for the email request
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Data Updated Successfully!',
                                    
                                    showConfirmButton: true,
                                    
                                });

                            } else {
                                // Show error SweetAlert popup for the email request
                                Swal.fire({
                                    icon: 'warning', // Change to 'warning' icon for email not sent
                                    title: 'Failed to update data',
                                    
                                    showConfirmButton: true,
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
            }
        });
    });
  };
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
</script>


<?php include 'include/footer.php'; ?>