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
        <div class="col-4 text-center d-flex align-items-center justify-content-left fs-3">All User List</div>

        <!-- Middle Column -->
        <div class="col-4 text-center d-flex align-items-center justify-content-center">
        Total User:-<span id="totalTickets"> 0</span>
        </div>

        <!-- Right Column -->
        <div class="col-4 text-center d-flex align-items-center justify-content-center">Active User:- <span id="totalClosed">0</span></div>
      </div>
    </div>

    <div class="card-body pt-2 pb-2-body">
    <!-- Dropdown Filter -->
    <div class="row mb-3 justify-content-center"> <!-- Added justify-content-center class to center the content -->
    <div class="col-md-3 text-center mt-1 mb-sm-1">
 <!-- Added text-center class to center the text -->
            
            <select id="statusFilter" class="form-control-sm">
                <option value="All">Show All</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                <option value="Blocked">Blocked</option>
            </select>
        </div>
        <div class="table table-responsive">
    <table id="ticketTable" class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th class="text-nowrap text-center">Image</th>
                <th class="text-nowrap text-center">Email Id</th>
                <th class="text-nowrap text-center">Full Name</th>
                <th class="text-nowrap text-center">User Role</th>
                <th class="text-nowrap text-center">Created On</th>
                <th class="text-nowrap text-center">Status</th>
                <th class="text-nowrap text-center">Actions</th>
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
        <h5 class="modal-title" id="exampleModalLabel">View User Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal content goes here...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- User Details Modal End -->


<!-- Reset Password Modal -->
<div class="modal fade" id="resetPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Reset User Password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
    <div id="userinfo" class="form-text"></div>
      </div>
      <div class="modal-footer">
      <a type="cancel" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
      <!-- <button type="submit" class="btn btn-primary reset-password-btn" data-userid="" id="resetPassword">Reset Password</button> -->
      <button type="submit" class="btn btn-primary reset-password-btn" data-userid="" id="resetPasswordBtn">
    <span id="resetBtnText">Reset Password</span>
    <span id="resetBtnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
</button>
<script>

// Call this function when you want to disable the button and show spinner

</script>
    </form>
      </div>
    </div>
  </div>
</div>
<!-- Reset Password Modal End  -->

<!-- Delete User Modal -->
<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary delete-btn" data-userid="" id="deleteBtn">
    <span id="deleteBtnText">Delete Account</span>
    <span id="deleteBtnSpiner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
</button>
      </div>
    </div>
  </div>
</div>
<!-- Delete User Modal End  -->

</div>    
</div>   
</div>

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
        </div>

            `);
            $('#userDetailsModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error fetching user details. Please try again later.');
        }
    });
};

// Function to open the edit user modal and populate it with user details
function editUser(userId) {
    // Create a form element
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'edit_user.php';

    // Create an input element for the User ID
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'userId';
    input.value = userId;

    // Append the input to the form
    form.appendChild(input);

    // Append the form to the document body and submit it
    document.body.appendChild(form);
    form.submit();
}


//reset password
    function resetPassword(userId) {
        
           // Call API to fetch user details
    $.ajax({
        url: 'codes/get_user_details.php', // Adjust the URL according to your file structure
        method: 'POST',
        data: { userId: userId },
        dataType: 'json',
        success: function(response) {
          let img_url = response.img_url ? response.img_url : 'assets/img/avatars/nouser.png';
            // Populate modal with user details
            $('#resetPassword .modal-body').html(`
        <div class="text-center">
            <img src="${img_url}" class="rounded-circle" width="80" height="80" alt="User Photo">
        </div>
        <div class="mt-2 ml-5">
                <p><strong>Full Name:</strong> ${response.first_name} ${response.last_name}</p>
                <p><strong>Email ID:</strong> ${response.email}</p>
                <p><strong class="text-danger">New password will be send by email</strong></p>
      </div>
        </div>

            `);
            // Set the data-userid attribute of the Reset Password button to the user ID
            $('#resetPassword .reset-password-btn').data('userid', userId);
            $('#resetPassword').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error fetching user details. Please try again later.');
                  }
            });
        }   
function startSpiner(){
     // Disable the button and show spinner
     $('#resetPasswordBtn').prop('disabled', true);
    $('#resetBtnText').text('Reseting...');
    $('#resetBtnSpinner').removeClass('d-none');
}

function stopSpiner(){
     // Disable the button and show spinner
     $('#resetPasswordBtn').prop('disabled', false);
     $('#resetBtnText').text('Reset Password');
     $('#resetBtnSpinner').addClass('d-none');
}

// Function to request password reset via AJAX
function confirmPasswordReset(userId) {
    if (confirm('Are you sure to Reset The User Password?')) {

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
};
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


// Add event listener to the "Reset Password" button in the modal footer
$('#resetPassword').on('click', '.reset-password-btn', function() {
    var userId = $(this).data('userid'); // Get the user ID from the button data attribute
    confirmPasswordReset(userId); // Call the function to request password reset
});

    
//delete User
    function deleteUser(userId) {
        
            // console.log(userId);
          // Call API to fetch user details
    $.ajax({
        url: 'codes/get_user_details.php', // Adjust the URL according to your file structure
        method: 'POST',
        data: { userId: userId },
        dataType: 'json',
        success: function(response) {
          let img_url = response.img_url ? response.img_url : 'assets/img/avatars/nouser.png';
            // Populate modal with user details
            $('#deleteUser .modal-body').html(`
        <div class="text-center">
            <img src="${img_url}" class="rounded-circle" width="80" height="80" alt="User Photo">
        </div>
        <div class="mt-2 ml-5">
                <p><strong>Full Name:</strong> ${response.first_name} ${response.last_name}</p>
                <p><strong>Email ID:</strong> ${response.email}</p>
                <p><strong class="text-danger">User data will be permanently deleted</strong></p>
        </div>

            `);
            $('#deleteUser .delete-btn').data('userid', userId);
            $('#deleteUser').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error fetching user details. Please try again later.');
        }
    });
        }   

// Add event listener to the "Delete User" button in the modal footer
$('#deleteUser').on('click', '.delete-btn', function() {
    var userId = $(this).data('userid'); 
    confirmDelete(userId);
});

// Function to request password reset via AJAX
function confirmDelete(userId) {
    if (confirm('Are you sure to Delete the User Account?')) {
    // API endpoint URL for the password reset PHP script
    var apiUrl = 'codes/delete_user_code.php'; // Adjust the URL according to your file structure
    // Data to be sent in the POST request body
    var data = {
        userId: userId // Provide the user ID for which password reset is requested
    };
    // console.log(userId);
    // Making a POST request using jQuery AJAX
    $.ajax({
        url: apiUrl,
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function(response) {
            // Check if successful
            if (response.success) {
            alert(response.message);
            $('#deleteUser').modal('hide');
                // If successful, trigger request to send email
                // sendEmailWithNewPassword(response.newPassword, response.email, response.name);  
               
            } else {
                stopSpiner()
                alert(response.message); // Show error message
            }
        },
        error: function(xhr, status, error) {
            stopSpiner()
            // console.error(error);
            alert('Error Deleting Account. Please try again later.');
        }
    });
}
};

//get user list

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
        "order": [[5, "desc"]], // Set initial sorting order to descending based on the Ticket ID column (index 1)
            "columns": [
                { "data": null},
                {"data": null,
    "render": function(data, type, row, meta) {
        // Check if the image URL is present in the dataset
        var imageUrl = row.img_url ? row.img_url : 'assets/img/avatars/nouser.png'; // Provide the URL of the default image
        // HTML markup for the round image
        var imageHtml = '<img src="' + imageUrl + '" class="rounded-circle" width="40" height="40" />';
        // Return the HTML markup for the image
        return imageHtml;
    }
},
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

                
                { "data": "view_time",
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
                {"data": "status",
                    "render": function(data, type, row) 
                    {
                        // Status rendering logic
                        let statusColor = ""; // Default color
                        let statusIcon = ""; // Default icon
                        if (data === "Active") 
                        {statusColor = "badge-success"; // Blue color for Open status
                            statusIcon = "fas fa-play-circle"; // Play icon for Open status
                        }                  
                         else if (data === "Inactive") 
                        {
                         statusColor = "badge-secondary"; // Red color for Close status
                            statusIcon = "fas fa-lock"; // Lock icon for Close status
                        } else if (data === "Blocked") {
        statusColor = "badge-dark"; // Green color for Answered status
        statusIcon = "fas fa-clock"; // Check icon for Answered status
      }

      return `<span class="badge badge-pill ${statusColor}">${data}</span>`;
    
                    }
                },

                {"data": null,
    "render": function(data, type, row) {
        // Action buttons rendering logic
        let buttonColor = "btn-success"; // Default color
        let buttonIcon = "fas fa-comment-dots"; // Default icon
        let lockIconDisplay = "none"; // Default display
        let btnText = "Reply"; // Default display

        // If the status is Closed, adjust button appearance and behavior
        if (row.status === 'Closed') {
            buttonColor = "btn-secondary"; // Change button color to secondary
            buttonIcon = "fas fa-lock"; // Change icon to lock
            btnText = "Closed"; // Change button text to Closed
            lockIconDisplay = "none"; // Hide the lock icon
        }
        // <button onclick="viewTicket('${row.ticket_id}')" class="btn ${buttonColor} btn-sm " ${row.status === 'Closed' ? 'disabled' : ''}>
        //         <i class="${buttonIcon}"></i> ${btnText}
        //     </button>

        return `
        <span class="text-nowrap">
            <?php if (hasPermission('Modify User data')): ?>
                <button onclick="editUser('${row.id}')" class="btn btn-info btn-sm " title="Edit User"> 
                <i class="fas fa-edit" ></i>
                </button>
            <?php endif; ?>

            <?php if (hasPermission('Modify User data')): ?>
                <button onclick="resetPassword('${row.id}')" class="btn btn-warning btn-sm" title="Reset Password"> 
                <img src="assets/myicons/password-reset.png" alt="Reset Password" width="20" height="20"> 
                </button>
            <?php endif; ?>
            <?php if (hasPermission('Admin')): ?>
                <button onclick="deleteUser('${row.id}')" class="btn btn-danger btn-sm " title="Delete User"> 
                <i class="fas fa-trash-alt" ></i>
                </button>
            <?php endif; ?>
        </span>`;
    }
}],
          
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

        // Update total ticket and total closed count
  function updateCounts() {
    const data = table.rows().data();
    let totalTickets = 0;
    let totalClosed = 0;

    data.each(function(row) {
      totalTickets++;
      if (row.status === 'Active') {
        totalClosed++;
      }
    });

    $('#totalTickets').text(totalTickets);
    $('#totalClosed').text(totalClosed);
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
        table.column(6).search('').draw();
    } else {
        // Escape special characters in selectedStatus for use in regex
        const escapedStatus = $.fn.dataTable.util.escapeRegex(selectedStatus);

        // Create a regex pattern for exact match
        const regexPattern = '^' + escapedStatus + '$';

        // Apply the regex pattern for exact match search
        table.column(6).search(regexPattern, true, false).draw();
    }
};

    // Set the default value of the status filter dropdown
    // $('#statusFilter').val('Active');

    
    // Call the filter function when status is selected
    $('#statusFilter').on('change', function() {
        applyFilter();
    });
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
