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
        <div class="col-4 text-center d-flex align-items-center justify-content-left fs-3">All Existing BC List</div>

        <!-- Middle Column -->
        <div class="col-4 text-center d-flex align-items-center justify-content-center">
        Total BC:-<span id="totalTickets"> 0</span>
        </div>

        <!-- Right Column -->
        <div class="col-4 text-center d-flex align-items-center justify-content-center">Active BC:- <span id="totalClosed">0</span></div>
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
                <th class="text-nowrap text-center">BC ID</th>
                <th class="text-nowrap text-center">BC Full Name</th>
                <th class="text-nowrap text-center">BC Mobile No</th>
                <th class="text-nowrap text-center">Project Office</th>
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
<!-- BC Details Modal -->
<div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View BC Details</h5>
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

<!-- BC Details Modal End -->


<!-- Delete BC Modal -->
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
        <button type="button" class="btn btn-primary">Delete Account</button>
      </div>
    </div>
  </div>
</div>
<!-- Delete BC Modal End  -->

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
        url: 'codes/get_bc_details.php', // Adjust the URL according to your file structure
        method: 'POST',
        data: { userId: userId },
        dataType: 'json',
        success: function(response) {
          let img_url = response.img_url ? response.img_url : 'assets/img/avatars/nouser.png';
            // Populate modal with user details
            $('#userDetailsModal .modal-body').html(`
        <div class="mt-2 ml-5">
                <p><strong>BC ID:</strong> ${response.bc_id}</p>
                <p><strong>Card ID:</strong> ${response.card_id}</p>
                <p><strong>Terminal ID:</strong> ${response.terminal_id}</p>
                <p><strong>Full Name:</strong> ${response.bc_first_name} ${response.bc_last_name}</p>
                <p><strong>Mobile No:</strong> ${response.bc_temp_mobile}</p>
                <p><strong>Email ID:</strong> ${response.bc_temp_email}</p>
                <p><strong>Account Status:</strong> ${response.status}</p>
                <p><strong>Created By:</strong> ${response.created_by_name}</p>
                <p><strong>Created On:</strong> ${response.formatted_view_time}</p>
                <p><strong>PO ID:</strong> ${response.po_id}</p>
                <p><strong>PO Name:</strong> ${response.po_name}</p>
        </div>

            `);
            $('#userDetailsModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error fetching BC details. Please try again later.');
        }
    });
};

// Function to open the edit user modal and populate it with user details
function editBc(userId) {
    // Create a form element
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'edit_bc.php';

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



    
//delete User
    function deleteUser(userId) {
        if (confirm('Are you sure to Delete the User Account?')) {

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
            $('#deleteUser').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error fetching user details. Please try again later.');
        }
    });
        }   
    };


    $(document).ready(function() {
    var loggedInUserId = "<?php echo isset($_SESSION['user_id']) ? strval($_SESSION['user_id']) : ''; ?>";

    const table = $('#ticketTable').DataTable({
        "ajax": {
            "url": "codes/bc_list.php",
            "type": "GET", // Specify the request type
            "dataType": "json", // Specify the data type
            "data": { "userId": loggedInUserId }, // Pass the logged-in user ID
            "dataSrc": function(json) {
                return json;
            }
        },

        "columnDefs": [
            { "width": "1px", "targets": 0 },
            { "width": "20px", "targets": 1 },
            { "width": "auto", "targets": 2 },
            { "width": "50px", "targets": 4 },
            { "width": "70px", "targets": 5 }
        ],

        "order": [[5, "desc"]], // Set initial sorting order to descending based on the created_date column

        "columns": [
            { "data": null },
            { "data": "bc_id" },
            {
                "data": null,
                "render": function(data, type, row) {
                    // Concatenate the first name and last name to display the full name
                    var fullName = row.bc_first_name + " " + row.bc_last_name;
                    // Return the full name
                    return fullName;
                }
            },
            { "data": "bc_temp_mobile" },
            { "data": "po_name" },
            {
                "data": "created_date",
                "render": function(data, type, row) {
                    if (!data || data.trim() === '') {
                        return '<span class="text-nowrap">No Date</span>';
                    }
                    var dateTimeParts = data.split(' ');
                    return '<span class="text-nowrap">' + dateTimeParts[0] + '</span>';
                }
            },
            {
                "data": "status",
                "render": function(data, type, row) {
                    // Status rendering logic
                    let statusColor = ""; // Default color
                    if (data === "Active") {
                        statusColor = "badge-success"; // Green color for Active status
                    } else if (data === "Inactive") {
                        statusColor = "badge-secondary"; // Red color for Inactive status
                    } else if (data === "Blocked") {
                        statusColor = "badge-dark"; // Gray color for Blocked status
                    }
                    return `<span class="badge badge-pill ${statusColor}">${data}</span>`;
                }
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    // Action buttons rendering logic
                    return `
                    <span class="text-nowrap">
                        <?php if (hasPermission('Modify User data')): ?>
                            <button onclick="editBc('${row.id}')" class="btn btn-info btn-sm" title="Edit BC"> 
                                <i class="fas fa-edit"></i>
                            </button>
                        <?php endif; ?>

                        <?php if (hasPermission('Admin')): ?>
                            <button onclick="deleteUser('${row.id}')" class="btn btn-danger btn-sm" title="Delete User"> 
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        <?php endif; ?>
                    </span>`;
                }
            }
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
