<?php
include 'include/navbar.php';

// Check if the user ID is set in the session
if (!isset($_SESSION['user_id'])) {
    echo '<script>window.location.href = "bc-login.php";</script>';
    exit();
} else {
    $_SESSION['loggedInUserId'] = $_SESSION['user_id'];
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<!-- <link rel="stylesheet" href="assets/vendors/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

<div class="mt-2 mb-3 ml-1 mr-1">
  <div class="card">
  <div class="card-header py-0 px-2">
      <!-- <div class="row"> -->
        <!-- Left Column -->
        <div class="text-center d-flex align-items-center justify-content-center fs-3">My Tickets</div>

        <!-- Middle Column -->
        <!-- <div class="col-4 text-center d-flex align-items-center justify-content-center">
        Total Tickets:-<span id="totalTickets"> 0</span>
        </div> -->

        <!-- Right Column -->
        <!-- <div class="col-4 text-center d-flex align-items-center justify-content-center">Total Closed:- <span id="totalClosed">0</span></div> -->
      <!-- </div> -->
    </div>

    <div class="container card-body pt-2 pb-2 pl-1 pr-1">
    <div class="col-lg-3 col-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <!-- <div class="stat-icon dib"><i class="fas fa-receipt text-primary border-primary"></i></div> -->
                    <div class="stat-content dib">
                        <div class="h5 text-dark stat-text">Total Ticket</div>
                        <div class="h5 text-primary stat-digit count"><i class="fas fa-receipt text-primary border-primary"></i> <span id="totalTickets"> 0</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <!-- <div class="stat-icon dib"><i class="fas fa-clipboard-check text-success border-success"></i></div> -->
                    <div class="stat-content dib">
                        <div class="h5 text-dark stat-text">Closed</div>
                        <div class="h5 text-secondary stat-digit count"> <i class="fas fa-clipboard-check text-secondary border-success"></i> <span id="closedTickets"> 0</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <!-- <div class="stat-icon dib"><i class="fas fa-comment-dots text-info border-info"></i></div> -->
                    <div class="stat-content dib">
                        <div class="h5 text-dark stat-text">Answered</div>
                        <div class="h5 text-info stat-digit count"><i class="fas fa-comment-dots text-info border-dark"></i> <span id="answeredTickets"> 0</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <!-- <div class="stat-icon dib"><i class="fas fa-hourglass-half text-danger border-danger"></i></div> -->
                    <div class="stat-content dib">
                        <div class="h5 text-dark stat-text">Open</div>
                        <div class="h5 text-danger stat-digit count"><i class="fas fa-hand-point-right text-danger border-danger"></i> <span id="pendingTickets"> 0</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Dropdown Filter -->
    <div class="row mb-3 justify-content-center"> <!-- Added justify-content-center class to center the content -->
    <div class="col-md-3 text-center mt-1 mb-sm-1">
 <!-- Added text-center class to center the text -->
            
            <select id="statusFilter" class="form-control-sm">
                <option value="All">All Tickets</option>
                <option value="Open">Open</option>
                <option value="Close">Closed</option>
                <option value="Answered">Answered</option>
            </select>
        </div>
        </div>
        <div class="container table table-responsive">
    <table id="ticketTable" class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th class="text-nowrap text-center">Ticket ID</th>
                <th class="text-nowrap text-center">Title</th>
                <th class="text-nowrap text-center">Issue Details</th>
                <th class="text-nowrap text-center">Created On</th>
                <th class="text-nowrap text-center">Status</th>
                <th class="text-nowrap text-center">Resolve On</th>
                <th class="text-nowrap text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="text-wrap text-start">
            <!-- Table rows will be populated here using JavaScript -->
        </tbody>
    </table>
    </div>    
</div>
</div>    


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script>
    function viewTicket(ticketId) {
        window.location.href = `my_ticket.php?ticket_id=${ticketId}`;
    }

    function editTicket(ticketId) {
    window.alert('This operation is not available.');
    }


    // function deleteTicket(ticketId) {
    //     const isConfirmed = window.confirm('Are you sure you want to delete this ticket?');
    //     if (isConfirmed) {
    //         window.location.href = `delete-ticket.php?ticket_id=${ticketId}`;
    //     }
    // }

    $(document).ready(function() {
        
        var loggedInUserId = "<?php echo isset($_SESSION['user_id']) ? strval($_SESSION['user_id']) : ''; ?>";
        // console.log(loggedInUserId);

        const table = $('#ticketTable').DataTable({
            "ajax": {
            "url": "codes/my_tickets.php",
            "type": "GET", // Specify the request type
            "dataType": "json", // Specify the data type
            "data": { "userId": loggedInUserId }, // Pass the logged-in user ID
            "dataSrc": function(json) {
                return json;
            }
        },

        "columnDefs": [
            { "width": "1px", "targets": 0 },
            { "width": "60px", "targets": 1 },
            { "width": "250px", "targets": 3 },
            { "width": "50px", "targets": 4 },
            { "width": "50px", "targets": 5 },
            { "width": "50px", "targets": 6 },
            { "width": "50px", "targets": 7 },
            { "width": "30px", "targets": 2 }
            
        ],
        "order": [[1, "desc"]], // Set initial sorting order to descending based on the Ticket ID column (index 1)
            "columns": [
                { "data": null },
                { "data": "ticket_id" },
                { "data": "issue_type" },
                { "data": "issue",
                    "render": function(data, type, row) 
                    {
                        if (data.length > 45) {
                            return '<span ">' + data.substring(0, 45) + '...</span>';
                        } else {
                            return '<span class="text-nowrap">' + data + '</span>';}
                    } 
                },

                // { "data": "created_date",
                //     "render": function(data, type, row) 
                //     {
                //         if (!data || data.trim() === '')
                //         {
                //             return '<span class="text-nowrap">No Date</span>';
                //         }
                //         var dateTimeParts = data.split(' ');
                //         return '<span class="text-nowrap">' + dateTimeParts[0] + '</span>';
                //     } 
                // },
                { "data": "formatted_created_date" },

                {"data": "status",
                    "render": function(data, type, row) 
                    {
                        // Status rendering logic
                        let statusColor = ""; // Default color
                        let statusIcon = ""; // Default icon
                        
                        if (data === "Open") {
                            statusColor = "badge-danger";
                            statusIcon = "fas fa-hand-point-right";
                        } else if (data === "Closed") {
                            statusColor = "badge-secondary";
                            statusIcon = "fas fa-check";
                        } else if (data === "Answered") {
                            statusColor = "badge-info";
                            statusIcon = "fas fa-comment-dots";
                        }

    //   return `<span class="badge badge-pill ${statusColor}">${data}</span>`;
      return `<span class="badge badge-pill ${statusColor}"><i class="${statusIcon}"></i> ${data}</span>`;

    
                    }
                },
        //         { "data": "closed_date",
        //             "render": function(data, type, row) {
        //                 if (!data || data.trim() === '') {
        //     return '<span class="text-nowrap">-</span>';
        // }
        //                 // Split the date and time
        //                  var dateTimeParts = data.split(' ');
        //             return '<span class="text-nowrap">' + dateTimeParts[0] + '</span>';
        //         } },

        { "data": "formatted_close_date" },


                {"data": null,
    "render": function(data, type, row) {
        // Action buttons rendering logic
        let buttonColor = "btn-success"; // Default color
        let buttonIcon = "fas fa-comment-dots"; // Default icon
        let lockIconDisplay = "none"; // Default display
        let btnText = "Reply"; // Default display

        // If the status is Closed,
        if (row.status === 'Closed') {
            buttonColor = "btn-secondary";
            buttonIcon = "fas fa-lock";
            btnText = "Closed";
            lockIconDisplay = "none";
        }  // If the status is Answered,
        if (row.status === 'Answered') {
            buttonColor = "btn-success"; 
            buttonIcon = "fas fa-comment-dots";
            btnText = "reply";
            lockIconDisplay = "none";
        }

        return `
        <span class="text-nowrap">
            <button onclick="viewTicket('${row.ticket_id}')" class="btn ${buttonColor} btn-sm " ${row.status === 'Closed' ? 'disabled' : ''}>
                <i class="${buttonIcon}"></i> ${btnText}
            </button>

            <?php if (hasPermission('Modify Ticket data')): ?>
                <button onclick="editTicket('${row.ticket_id}')" class="btn btn-secondary btn-sm "> <i class="fas fa-edit"></i>
                    Edit
                </button>
            <?php endif; ?>
        </span>`;
    }
}],
          
            "searching": true,
            "paging": true,
            "pageLength": 50
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
            viewTicket(data.ticket_id);
        }
    }
}).css('cursor', 'pointer');

        // Update total ticket and total closed count
  function updateCounts() {
    const data = table.rows().data();
    let totalTickets = 0;
    let closedTickets = 0;
    let answeredTickets = 0;
    let pendingTickets = 0;

    data.each(function(row) {
      totalTickets++;
      if (row.status === 'Closed') {
        closedTickets++;
      } if(row.status === 'Open'){
        pendingTickets++;
      } if(row.status === 'Answered'){
        answeredTickets++;
      }
    });

    $('#totalTickets').text(totalTickets);
    $('#closedTickets').text(closedTickets);
    $('#pendingTickets').text(pendingTickets);
    $('#answeredTickets').text(answeredTickets);
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

// Apply the regex pattern for partial match search
table.column(5).search(escapedStatus, true, false).draw();
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
