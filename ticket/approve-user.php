<?php
$requiredPermission = 'Create User';
include 'include/navbar.php';
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
// Check if the user ID is set in the session
if (!isset($_SESSION['user_id'])) {
    echo '<script>window.location.href = "bc-login.php";</script>';
    exit();
} else {
    $_SESSION['loggedInUserId'] = $_SESSION['user_id'];
}
?>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.2/css/bootstrap.min.css"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

<div class="container mt-2 mb-3">
  <div class="card">
  <div class="card-header py-0 px-2">
      <div class="row">
        <!-- Left Column -->
        <div class="col-4 text-center d-flex align-items-center justify-content-left fs-3">Approval Request</div>

        <!-- Middle Column -->
        <div class="col-4 text-center d-flex align-items-center justify-content-center">
        Pending:-<span id="pendingRequest"> 0</span>
        </div>

        <!-- Right Column -->
        <div class="col-4 text-center d-flex align-items-center justify-content-center">Approved:- <span id="approved">0</span></div>
      </div>
    </div>

    <div class="card-body pt-2 pb-2-body">
    <!-- Dropdown Filter -->
    <div class="row mb-3 justify-content-center"> 
    <!-- Added justify-content-center class to center the content -->
    <div class="col-md-3 text-center mt-1 mb-sm-1">
 <!-- Added text-center class to center the text -->
            
            <select id="statusFilter" class="form-control-sm">
            <option value="All" >All Request</option>
            <option value="Pending" selected>Pending</option>
            <option value="Approved">Approved</option>
            <option value="Rejected">Rejected</option>
            </select>
        </div>
        <div class="table table-responsive">
    <table id="ticketTable" class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th class="text-nowrap text-center">Email Id</th>
                <th class="text-nowrap text-center">Full Name</th>
                <th class="text-nowrap text-center">User Role</th>
                <th class="text-nowrap text-center">Created On</th>
                <th class="text-nowrap text-center">Status</th>
                <th class="text-nowrap text-center">Approve/Reject By</th>
                <th class="text-nowrap text-center">Date</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <!-- Table rows will be populated here using JavaScript -->
        </tbody>
    </table>
    </div>    
</div>
<!-- User Details Modal -->
<div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Account Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal content goes here...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <div class="ml-auto"> <!-- This div will push the buttons to the right -->

        <button class="btn btn-danger btn-sm ml-2 reject-btn" data-userid="" id="rejectBtn" title=" Reject request"> 
        <span id="rejectBtnText"><i class="fas fa-times-circle "></i> Reject</span>
        <span id="rejectBtnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
        </button>

        <button class="btn btn-success btn-sm ml-2 approve-btn" data-userid="" id="approveBtn" title=" Approve Request"> 
        <span id="approveBtnText"><i class="fas fa-check-circle "></i> Approve</span>
        <span id="approveBtnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
        </button>

        <!-- <button type="submit" class="btn btn-primary reset-password-btn" data-userid="" id="resetPasswordBtn">
            <span id="resetBtnText">Reset Password</span>
            <span id="resetBtnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
        </button> -->

      </div>
    </div>
  </div>
</div>

<!-- User Details Modal End -->
</div>    
</div>   
</div>

<style>.table td {
    text-align: left;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

<script>
    //show user details
    function userDetails(userId) {
    // Call API to fetch user details
    $.ajax({
        url: 'codes/get_user_details.php', // Adjust the URL according to your file structure
        method: 'POST',
        data: { userId: userId },
        dataType: 'json',
        success: function(response) {
          let img_url = response.img_url ? response.img_url : 'assets/img/avatars/nouser.png';
            // Populate modal with user details
            $('#userDetailsModal .modal-body').html(`
        <div class="text-center">
            <img src="${img_url}" class="rounded-circle" width="80" height="80" alt="User Photo">
        </div>
        <div class="mt-2 ml-5">
                <p><strong>Full Name:</strong> ${response.first_name} ${response.last_name}</p>
                <p><strong>Mobile No:</strong> ${response.mobile}</p>
                <p><strong>Email ID:</strong> ${response.email}</p>
                <p><strong>User Role:</strong> ${response.role}</p>
                <p><strong>Depertment:</strong> ${response.depertment}</p>
                <p><strong>Account Status:</strong> ${response.status}</p>
                <p><strong>Created By:</strong> ${response.created_by_name}</p>
                <p><strong>Created On:</strong> ${response.formatted_view_time}</p>
                <p><strong>Office PIN:</strong> ${response.pin}</p>
        </div>`);
            $('#userDetailsModal').modal('show');

           // Attach click event handler to reject button
           $('#rejectBtn').off('click').on('click', function() {
                // Call function to reject user with the provided user ID
                rejectUser(userId);
            });
            // Attach click event handler to approve button
           $('#approveBtn').off('click').on('click', function() {
                // Call function to reject user with the provided user ID
                approveUser(userId);
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error fetching user details. Please try again later.');
        }
    });
};


// Function to reject user
function rejectUser(userId) {
    if (confirm('Are you sure to Reject the request?')) {
        // start spin and disable button
        startSpinner("rejectBtn");
        disableBtn("approveBtn");
    // Call API to reject the user using the provided user ID
    $.ajax({
        url: 'codes/approve_or_reject_user.php',
        method: 'POST',
        data: { 
            userId: userId,
            request: 'reject'
            },
        dataType: 'json',
        success: function(response) {
            // Handle success response
            // console.log(response);
            alert(response.message);
            // close the modal after success reject
            $('#userDetailsModal').modal('hide');
            // stop spin and enable button
            stopSpinner("rejectBtn");
            enableBtn("approveBtn");
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error rejecting user. Please try again later.');
            // stop spin and enable button
            stopSpinner("rejectBtn");
            enableBtn("approveBtn");
        }
    });
}
};

// Function to approve user
function approveUser(userId) {
    if (confirm('Are you sure to Approve the user account?')) {
        // spin and disable button
        startSpinner("approveBtn");
        disableBtn("rejectBtn");
    // Call API to approve the user using the provided user ID
    $.ajax({
        url: 'codes/approve_or_reject_user.php',
        method: 'POST',
        data: { 
            userId: userId,
            request: 'approve'
            },
        dataType: 'json',
        success: function(response) {
            // Handle success response
            console.log(response);
            alert(response.message);
            // close the modal after success approve
            $('#userDetailsModal').modal('hide');
            // stop spin and enable button
            stopSpinner("approveBtn");
            enableBtn("rejectBtn");
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error approving user. Please try again later.');
            // stop spin and enable button
            stopSpinner("approveBtn");
            enableBtn("rejectBtn");
        }
    });
}
};
    function startSpinner(buttonId) {
    // Get the button element by its ID
    var button = document.getElementById(buttonId);
    // Get the spinner element inside the button
    var spinner = button.querySelector('.spinner-border');
    // Show the spinner
    spinner.classList.remove('d-none');
    // Disable the button
    button.disabled = true;
}

function stopSpinner(buttonId) {
    // Get the button element by its ID
    var button = document.getElementById(buttonId);
    // Get the spinner element inside the button
    var spinner = button.querySelector('.spinner-border');
    // Hide the spinner
    spinner.classList.add('d-none');
    // Enable the button
    button.disabled = false;
}
function enableBtn(buttonId) {
    var button = document.getElementById(buttonId);
    button.disabled = false;
}
function disableBtn(buttonId) {
    var button = document.getElementById(buttonId);
    button.disabled = true;
}

// Function to request password reset via AJAX
function confirmPasswordReset(userId) {
    startSpiner()
    // API endpoint URL for the password reset PHP script
    var apiUrl = 'codes/reset_password.php'; // Adjust the URL according to your file structure
    // Data to be sent in the POST request body
    var data = {
        userId: userId // Provide the user ID for which password reset is requested
    };

    // Making a POST request using jQuery AJAX
    $.ajax({
        url: apiUrl,
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function(response) {
            // Check if the password reset request was successful
            if (response.success) {
                // If successful, trigger request to send email with new password
                sendEmailWithNewPassword(response.newPassword, response.email, response.name);  
               
            } else {
                stopSpiner()
                alert(response.message); // Show error message
            }
        },
        error: function(xhr, status, error) {
            stopSpiner()
            // console.error(error);
            alert('Error requesting password reset. Please try again later.');
        }
    });
}
// Function to send email with new password
function sendEmailWithNewPassword(newPassword, userEmail, name, callback) {
    // AJAX request to send email with new password
    $.ajax({
        url: 'email/email_password.php', // Endpoint to send email
        method: 'POST',
        data: { newPassword: newPassword, userEmail: userEmail, name: name },
        dataType: 'json',
        success: function(response) {
            stopSpiner();
            // Execute the callback function with the email sending response
            alert('Password Reset Successfull');
            $('#resetPassword').modal('hide');
        },
        error: function(xhr, status, error) {
            stopSpiner()
            // console.error(error);
            alert('Error sending email. Please try again later.');
        }
    });
}

// display user data list in table

    $(document).ready(function() {
        
        var loggedInUserId = "<?php echo isset($_SESSION['user_id']) ? strval($_SESSION['user_id']) : ''; ?>";

        const table = $('#ticketTable').DataTable({
            "ajax": {
            "url": "codes/user_list.php",
            "type": "GET", // Specify the request type
            "dataType": "json", // Specify the data type
            "data": { "userId": loggedInUserId }, // Pass the logged-in user ID
            "dataSrc": function(json) {
                return json;
            }
        },

            "columnDefs": [
            { "width": "1px", "targets": 0 }
        //     { "width": "20px", "targets": 1 },
        //     { "width": "auto-width", "targets": 2 },
        //     { "width": "50px", "targets": 4 },
        //     { "width": "70px", "targets": 5 }

            
        ],
        "order": [[4, "desc"]], // Set initial sorting order to descending based on the Ticket ID column (index 1)
            "columns": [
                { "data": null},
                
                { "data": "email" },
                {"data": null,
    "render": function(data, type, row) {
        // Concatenate the first name and last name to display the full name
        var fullName = row.first_name + " " + row.last_name;
        
        // Return the full name
        return fullName;
    }
},
                    { "data": "role"},

                { "data": "created_on",
                    "render": function(data, type, row) 
                    {
                        if (!data || data.trim() === '')
                        {
                            return '<span class="text-nowrap">No Date</span>';
                        }
                        var dateTimeParts = data.split(' ');
                        return '<span class="text-nowrap">' + dateTimeParts[0] + '</span>';
                    } 
                },
                {"data": "is_approved",
                    "render": function(data, type, row) 
                    {
                        // Status rendering logic
                        let statusColor = ""; // Default color
                        let statusIcon = ""; // Default icon
                        if (data === 1) 
                        {statusColor = "badge-success"; // Blue color for Open status
                            statusText = "Approved";
                            statusIcon = "fas fa-play-circle"; // Play icon for Open status
                        }                  
                         else if (data === 0) 
                        {
                         statusColor = "badge-primary"; // Red color for Close status
                         statusText = "Pending";
                            statusIcon = "fas fa-lock"; // Lock icon for Close status
                        } else if (data === 2) {
                        statusColor = "badge-danger"; // Green color for Answered status
                        statusText = "Rejected";
                        statusIcon = "fas fa-clock"; // Check icon for Answered status
      }

      return `<span class="badge badge-pill ${statusColor}">${statusText}</span>`;
                    }
                },


            {"data": "approve_reject_by_name"},

            { "data": "approve_reject_date",
                    "render": function(data, type, row) 
                    {
                        if (!data || data.trim() === '')
                        {
                            return '<span class="text-nowrap">NA</span>';
                        }
                        var dateTimeParts = data.split(' ');
                        return '<span class="text-nowrap">' + dateTimeParts[0] + '</span>';
                    } 
                },

],
          
            "searching": true,
            "paging": true,
            "pageLength": 10
        });

        // Add row numbers
        table.on('order.dt search.dt', function() {
            table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

// Add event listener for row clicks (excluding heading row)
$('#ticketTable tbody').on('click', 'tr:not(.thead-dark)', function(event) {
    const columnIndex = $(event.target).closest('td').index();

    // Check if the clicked element is not in the action column (modify the index as needed)
    if (columnIndex !== 7) {
        const data = table.row(this).data();
        if (data) {
            // Assuming `viewTicket` is the function to open a ticket, adjust it as needed
            const userId=data.id;
            // userDetails(data.id);
            userDetails(userId);
        }
    }
}).css('cursor', 'pointer');

        // Update approval request count
  function updateCounts() {
    const data = table.rows().data();
    let totalRequest = 0;
    let approved = 0;
    let rejected =0;
    data.each(function(row) {
        totalRequest++;
      if (row.is_approved === 1) {
        approved++;
      }
      if (row.is_approved === 2) {
        rejected++;
      }
    });
    let pendingRequest = totalRequest - approved - rejected;
    $('#pendingRequest').text(pendingRequest);
    $('#approved').text(approved);
  }

  // Update counts on table draw
  table.on('draw', function() {
    updateCounts();
  });

  // Initial update
  updateCounts();

        // Polling mechanism to update data every 5 seconds
        setInterval(function() {
            table.ajax.reload(null, false); // Reload table data without refreshing the page
        }, 5000);
// Filter Function
function applyFilter() {
    const selectedStatus = $('#statusFilter').val();
    console.log("Selected Status:", selectedStatus); // Debugging
    

    // Check if the selected option is "Show All"
    if (selectedStatus === "All") {
        // Clear any existing search filter and redraw the table
        table.column(5).search('').draw();
    } else {
        // Escape special characters in selectedStatus for use in regex
        const escapedStatus = $.fn.dataTable.util.escapeRegex(selectedStatus);

        // Create a regex pattern for exact match
        const regexPattern = '^' + escapedStatus + '$';

        // Apply the regex pattern for exact match search
        table.column(5).search(regexPattern, true, false).draw();
    }
};
    // Set the default value of the status filter dropdown
    $('#statusFilter').val('Pending');

    
    // Call the filter function when status is selected
    $('#statusFilter').on('change', function() {
        applyFilter();
    });
    applyFilter();
    });
</script>
<script>
  function truncateAndWrap(text, maxLength) {
    let truncatedText = text.substring(0, maxLength);
    let wrappedText = truncatedText.replace(/(.{30})/g, '$1\n');
    return wrappedText;
  }
</script>

<?php include 'codes/triger_unlock_cron.php'; ?>
<?php include 'include/footer.php'; ?>
