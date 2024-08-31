<?php
$requiredPermission = 'BC Login';
include 'include/navbar.php';

// Check if the user is logged in
if(isset($_SESSION['user_id'])) {
    // User is logged in
    $readonlyAttribute = 'readonly';
    $hiddenAttribute = 'style="display:none;"';
} else {
    // User is not logged in
    $readonlyAttribute = '';  // No readonly attribute
    $hiddenAttribute = '';    // No hidden attribute
}
// Check if the user has the required permission
if (!hasPermission($requiredPermission)) {
   echo '<script>window.location.href = "dashboard.php";</script>';
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
      <h2 class="text-center">Create A Ticket</h2>
    </div>
<div class="card-body">
<form class="row g-3 needs-validation" action="" method="post" novalidate>

<div class="col-xl-4 col-md-6" <?php echo $hiddenAttribute; ?>>
    <label for="bcId" class="form-label">BC ID</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="bcId" id="bcId" placeholder="Enter BC ID" <?php echo $readonlyAttribute; ?> required>
  </div>
</div>

<div class="col-xl-4 col-md-6">
    <label for="emailId" class="form-label">Email ID</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-email" id="inputGroupPrepend"></span>
    <input type="email" class="form-control" name="emailId" id="emailId" placeholder="Email ID" required>
  </div>
</div>

<div class="col-xl-4 col-md-6" <?php echo $hiddenAttribute; ?>>
    <label for="fullName" class="form-label">Full Name</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Full name" <?php echo $readonlyAttribute; ?> required>
  </div>
</div>

<div class="col-xl-4 col-md-6" <?php echo $hiddenAttribute; ?>>
    <label for="mobileNo" class="form-label">Mobile No</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="mobileNo" id="mobileNo" placeholder="Enter 10 Digit Mobile No" <?php echo $readonlyAttribute; ?> required>
  </div>
</div>

<div class="col-xl-4 col-md-6" <?php echo $hiddenAttribute; ?>>
    <label for="poPin" class="form-label">Project Office PIN</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="poPin" id="poPin" placeholder="Enter 6 Digit PIN" <?php echo $readonlyAttribute; ?> required>
  </div>
</div>

<div class="col-xl-4 col-md-6" <?php echo $hiddenAttribute; ?>>
    <label for="poName" class="form-label">Project Office Name</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="poName" id="poName" placeholder="Project Office Name" <?php echo $readonlyAttribute; ?> readonly >
  </div>
</div>

<div class="col-xl-4 col-md-6">
    <label for="issueType" class="form-label">Select Issue Type</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-alert-outline" id="inputGroupPrepend"></span>
              <select class="form-select" name="issueType" id="issueType" required>
      <option selected disabled value="">Choose...</option>
      <option>Login Issue</option>
      <option>transaction Issue</option>
      <option>Connection Issue</option>
      <option>Card Issue</option>
    </select>
  </div>
  </div>

  <div class="col-xl-4 col-md-6">
    <label for="media" class="form-label">Upload Issue's Photo</label>
    <div class="input-group">
        <input type="file" class="form-control" id="media" name="media" accept="image/*, video/*" optional>
        <!-- <label class="input-group-text" for="media"><i class="mdi mdi-file-upload"></i></label> -->
    </div>
</div>


  <div class="col-12">
    <label for="location" class="form-label">Describe The Issue</label> 
    <div class="input-group has-validation">
        <span class="input-group-text mdi mdi-comment-text-outline" id="inputGroupPrepend" style="padding-left: 25px; padding-right: 25px;"></span>     
        <textarea class="form-control" name="remarks" id="remarks" rows="4" placeholder="Enter about the issue In details" style="resize: none;height: auto;" rows="4" required></textarea>
    </div>
</div>
<!-- 
<div class="input-group">
            <textarea id="message" name="message" class="form-control" placeholder="Type your messages..." style="resize: none; height: auto;" rows="4" required></textarea>
                        <div class="input-group-append">
                            <label class="input-group-text outline-secondary" for="image" style="cursor: pointer; padding-left: 25px; padding-right: 25px;">
                                <i class="fas fa-camera fa-lg mr-2"></i>
                            </label>
                            <input type="file" name="image" accept="image/*" id="image" style="display: none;">
                        </div>
                    </div> -->

      <input type="email" class="form-control" id="email" aria-describedby="inputGroupPrepend" name="email" value="email@mail.com" hidden>

      <input type="number" class="form-control" id="mobile" aria-describedby="inputGroupPrepend" name="mobile" value="7777777777" hidden>

      <input type="text" class="form-control" id="department" aria-describedby="inputGroupPrepend" name="department" value="department" hidden>

  <div class="col-12 d-flex justify-content-center pt-4 pb-4">
    <button class="btn btn-primary" type="submit">Create Ticket</button>
  </div>
</form>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
$(document).ready(function () {
    
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
            submitButton.prop('disabled', false).html('Create Ticket');
            // Show an alert or handle the case where visible required fields are empty
            alert('Please fill in all required fields.');
            return;
        }

        // Check if all fields are valid
        if (!areFieldsValid()) {
            // Enable the button and hide spinner
            submitButton.prop('disabled', false).html('Create Ticket');
            alert('Please Enter Valid Data');
            return;
        }

        // Serialize form data
        var formData = $(this).serialize();
        // Perform AJAX request only if visible required fields are not empty
        $.ajax({
            url: 'codes/bc_create_ticket.php', // Replace with the actual backend script URL
            type: 'POST',
            data: formData, // Serialize form data
            dataType: 'json', // Expect JSON response from the server
            success: function (response) {
                // Check the response from the server
                if (response.success) {
                    // Send another AJAX request for email here
                    $.ajax({
                        url: 'email/bc_ticket_created.php', // Replace with the actual email script URL
                        type: 'POST',
                        data: formData, // Pass the same form data to the email request
                        dataType: 'json',
                        success: function (emailResponse) {
                            // Enable the button and hide spinner on success of the email request
                            submitButton.prop('disabled', false).html('Create Ticket');

                            // Check the response from the email server
                            if (emailResponse.status === 'success') {
                                // Show success SweetAlert popup for the email request
                                Swal.fire({
                                    icon: 'success',
                                    title: 'User Created Successfully!',
                                    text: 'Email sent successfully: ' + emailResponse.message,
                                    showConfirmButton: true,
                                    timer: 3000
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
                            submitButton.prop('disabled', false).html('Create Ticket');

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
                    submitButton.prop('disabled', false).html('Create Ticket');

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
                submitButton.prop('disabled', false).html('Create Ticket');

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

<?php
// Include your PDO database connection configuration
include 'include/connection.php';

// Check if the user_id is set in the session
if (isset($_SESSION['user_id'])) {
    // Fetch user_id from the session
    $user_id = $_SESSION['user_id'];
    // Fetch first name and last name from the database (replace with your actual query)
    $query = "SELECT bc_first_name, bc_last_name, bc_mobile, po_pin FROM bc_details WHERE bc_id = :user_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    // Check if the query was successful
    if ($stmt) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Combine first name and last name to create the full name
        $fullName = $row['bc_first_name'] . ' ' . $row['bc_last_name'];
        $mobile = $row['bc_mobile'];
        $pin = $row['po_pin'];

        // Output the full name in the input field
        echo "<script>document.getElementById('mobileNo').value = '$mobile';</script>";
        echo "<script>document.getElementById('poPin').value = '$pin';</script>";
        echo "<script>document.getElementById('fullName').value = '$fullName';</script>";
        echo "<script>document.getElementById('bcId').value = '$user_id';</script>";
    } else {
        // Handle the case where the query was not successful
        echo "Error fetching data from the database: " . $stmt->errorInfo()[2];
    }
} else {
    // Handle the case where user_id is not set in the session
   
}

// Close the database connection (ensure to close the connection after use)
$pdo = null;
?>

<?php include 'include/footer.php'; ?>

