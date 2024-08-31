<?php
$requiredPermission = 'BC Login';
include 'include/navbar.php';

if (!isset($_SESSION['user_id'])) {
    echo '<script>window.location.href = "bc-login.php";</script>';
    exit();
} else {
    $_SESSION['loggedInUserId'] = $_SESSION['user_id'];
}
// Check if the user has the required permission
if (!hasPermission($requiredPermission)) {
   echo '<script>window.location.href = "dashboard.php";</script>';
 // Redirect to an unauthorized page if the user doesn't have the required permission
    exit;
}
$userPermissions = getUserPermissions();

// Include your PDO database connection configuration
include 'include/connection.php';

// Check if the user_id is set in the session
if (isset($_SESSION['user_id'])) {
    // Fetch user_id from the session
    $user_id = $_SESSION['user_id'];
    // Fetch first name and last name from the database (replace with your actual query)
    $query = "SELECT * FROM bc_details WHERE bc_id = :user_id";
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
        $officeId = $row['po_id'];
        $officeName = $row['po_name'];
        $mobile = $row['bc_temp_mobile'];
        $email = $row['bc_temp_email'];
        $createdByRole = "BC";

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
<form class="row g-3 needs-validation" id="createTicket" action="" method="post" enctype="multipart/form-data" novalidate>


<div class="col-xl-4 col-md-6" >
    <label for="fullName" class="form-label">BC Full Name</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="fullName" id="fullName" readonly>
  </div>
</div>

<div class="col-xl-4 col-md-6">
    <label for="emailId" class="form-label">BC Email ID*</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-email" id="inputGroupPrepend"></span>
    <input type="email" class="form-control" name="emailId" id="emailId" placeholder="Enter email id" required>
  </div>
</div>

<div class="col-xl-4 col-md-6">
    <label for="mobileNo" class="form-label">Mobile No*</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter 10 Digit Mobile No" maxlength="10" required>
  </div>
</div>


<!-- <div class="col-xl-4 col-md-6">
    <label for="issueType" class="form-label">Select Issue Type*</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-alert-outline" id="inputGroupPrepend"></span>
              <select class="form-select" name="issueType" id="issueType" required>
      <option selected disabled value="">Choose...</option>
      <option value="RO">Login Issue</option>
      <option>transaction Issue</option>
      <option>Connection Issue</option>
      <option>Card Issue</option>
    </select>
  </div>
  </div> -->


  <div class="col-xl-4 col-md-6">
    <label for="issueType" class="form-label">Select Issue Type*</label>
    <div class="input-group has-validation">
        <span class="input-group-text mdi mdi-alert-outline" id="inputGroupPrepend"></span>
        <select class="form-select" name="issueType" id="issueType" required>
            <option selected disabled value="">Choose...</option>
        </select>
    </div>
</div>


  <div class="col-xl-4 col-md-6 issues-fields issue">
    <label for="location" class="form-label">Select Issue*</label> 
    <div class="input-group has-validation">
        <span class="input-group-text mdi mdi-city" id="inputGroupPrepend"></span>     
        <select class="form-select" name="issues" id="issues" required>
        <option selected disabled value="">Choose...</option></select>
    </div>
</div>


  <div class="col-xl-4 col-md-6">
    <label for="media" class="form-label">Upload Issue's Photo</label>
    <div class="input-group">
        <input type="file" class="form-control" id="media" name="image" accept="image/*">
    </div>
</div>



  <div class="col-12 issues-fields remarks">
    <label for="location" class="form-label">Remarks*</label> 
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

      <!-- <input type="email" class="form-control" id="email" aria-describedby="inputGroupPrepend" name="email" value="email@mail.com" hidden>

      <input type="number" class="form-control" id="mobile" aria-describedby="inputGroupPrepend" name="mobile" value="7777777777" hidden>

      <input type="text" class="form-control" id="department" aria-describedby="inputGroupPrepend" name="department" value="department" hidden> -->

  <div class="col-12 d-flex justify-content-center pt-4 pb-4">
    <button class="btn btn-primary" type="submit">Create Ticket</button>
  </div>
</form>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    // Field Visibility Controll
$(document).ready(function () {
    // Initial setup
    updateFieldsVisibility();

    // Handle change event on the Issue type select
    $('#issueType').change(function () {
        // Reset the values of hidden fields
        resetHiddenFields();

        // Update field visibility
        updateFieldsVisibility();
    });

    function updateFieldsVisibility() {
        var selectedRole = $('#issueType').val();

        // Hide all department-related fields
        $('.issues-fields').hide();

        // Show/hide fields based on the selected role
        if (selectedRole == "Others") {
            // If HO, RO, or IT is selected, show the relevant fields
            $('.issues-fields.issue').hide();
            $('.issues-fields.remarks').show();
        } else if (selectedRole != "Others") {
            $('.issues-fields.issue').show();
            $('.issues-fields.remarks').hide();

        }
    }


    function resetHiddenFields() {
        // Reset the values of hidden fields
        $('.issues-fields').find('select, input, textarea').each(function() {
        $(this).val('');
        $(this).prop('defaultValue', '');
    });
    }

    //get issue types from db
    $(document).ready(function() {
        $.ajax({
            url: 'codes/get_issue_types.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Populate the dropdown with the retrieved data
                $.each(data, function(index, item) {
                    $('#issueType').append($('<option>', {
                        value: item.issue_type,
                        text: item.issue_type
                    }));
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error: ' + textStatus, errorThrown);
            }
        });
    });


    // Function to fetch office locations based on the selected user role from the dropdown
function fetchIssues() {
  var selectedIssueType = document.getElementById("issueType").value;
//   console.log(selectedIssueType);
    // Fetch office locations
    $.ajax({
        url: 'codes/fetch_issues.php',
        method: 'GET',
        data: { issueType: selectedIssueType },
        success: function(response) {
            var dropdownMenu = document.getElementById("issues");
            dropdownMenu.innerHTML = ""; // Clear previous options

                // Create and add the "Select Office" option
                var selectIssueOption = document.createElement("option");
                selectIssueOption.text = "Select Issue";
                selectIssueOption.disabled = true;
                selectIssueOption.selected = true; // Select this option by default
                selectIssueOption.value = ""; // Set value to empty string
                dropdownMenu.add(selectIssueOption);
            
            // console.log(response);
            response.forEach(function(issueList) {
                // Create an option element for each Issues
                var option = document.createElement("option");
                option.text = issueList.issue;
                option.value = issueList.issue;
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
document.getElementById("issueType").addEventListener("change", fetchIssues);

//assign values in the form fields
document.getElementById('fullName').value = <?php echo json_encode($fullName);?>;
document.getElementById('mobile').value = <?php echo json_encode($mobile);?>;
document.getElementById('emailId').value = <?php echo json_encode($email);?>;

$(document).ready(function () {

    function resetFields() {
    // Reset specific fields to their default or empty values
    $('#issueType').val('');
    $('#media').val('');
    $('#remarks').val('');
    $('#issues').val('');

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
        // var formData = $(this).serialize();
        var formData = new FormData($("#createTicket")[0]);
        // Append additional data
        formData.append('userId', <?php echo json_encode($user_id); ?>);
        formData.append('fullName', <?php echo json_encode($fullName); ?>);
        formData.append('officeId', <?php echo json_encode($officeId); ?>);
        formData.append('officeName', <?php echo json_encode($officeName); ?>);
        formData.append('createdByRole', <?php echo json_encode($createdByRole); ?>);
        // Perform AJAX request only if visible required fields are not empty
        $.ajax({
            url: 'codes/index_code.php', // Replace with the actual backend script URL
            type: 'POST',
            data: formData, // Serialize form data
            dataType: 'json', // Expect JSON response from the server
            processData: false,
            contentType: false,
            success: function (response) {
                // Check the response from the server
                if (response.success) {
                    var ticketId = response.ticketId;
                    // Send another AJAX request for email here
                    formData.append('ticketId', ticketId);
                    $.ajax({
                        url: 'email/bc_ticket_created.php', // Replace with the actual email script URL
                        type: 'POST',
                        data: formData, // Pass the same form data to the email request
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function (emailResponse) {
                            // Enable the button and hide spinner on success of the email request
                            submitButton.prop('disabled', false).html('Create Ticket');

                            // Check the response from the email server
                            if (emailResponse.status === 'success') {
                                // Show success SweetAlert popup for the email request
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Ticket Created Successfully!',
                                    html: 'Ticket ID: ' + ticketId + '<br> Email Notification Sent Successfully',
                                    showConfirmButton: true,
                                    confirmButtonText: 'View Ticket'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Redirect to your custom URL
                                        window.location.href = 'my_ticket.php?ticket_id=' + ticketId;
                                    }
                                });

                                // Reset the form on success
                                resetFields();
                            } else {
                                // Show error SweetAlert popup for the email request
                                Swal.fire({
                                    icon: 'success', // Change to 'warning' icon for email not sent
                                    title: 'Ticket Created Successfully!',
                                    html: 'Ticket ID: ' + ticketId + '<br> Unable To Send Email Notification',
                                    showConfirmButton: true,
                                    confirmButtonText: 'View Ticket'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Redirect to your custom URL
                                        window.location.href = 'my_ticket.php?ticket_id=' + ticketId;
                                    }
                                });
                                resetFields();
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
                            title: 'Ticket Created',
                            html: 'Ticket ID: ' + ticketId + '<br>An error occurred in the email request.',
                            });

                            // Reset the form on error
                            resetFields();
                        }
                    });
                } else {
                    // Enable the button and hide spinner on error in the first request
                    submitButton.prop('disabled', false).html('Create Ticket');

                    // Show error SweetAlert popup for the first request
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: response.error ? response.error : error,
                    });


                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Enable the button and hide spinner on error in the first request
                submitButton.prop('disabled', false).html('Create Ticket');

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
});
</script>

<script src="js/form.js"></script>


<?php include 'include/footer.php'; ?>

