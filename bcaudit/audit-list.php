<?php 
    $pageTitle="All Audit List";
    include "include/navbar.php"; 
?>

<style>
#searchInput{
    width: 350px;
    margin: 0 10px 0 10px;
}
    .table-container {
        min-height: 600px;
        width: 100%;
        overflow-x: auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: var(--white-color);
        padding: 10px;
        border-radius: 8px;
        border: 2px solid #ddd;
    }
    .header-container {
            display: flex;
            justify-content: space-between; /* Spaces out title and button container */
            align-items: center;
            padding: 10px 10px 40px;
        }
        .header-title {
            font-size: 24px;
            font-weight: bold;
        }
        .button-container {
            display: flex;
            gap: 10px;

        }
        
        /* Media query for mobile devices */
        @media (max-width: 600px) {
            .header-title {
                display: none; /* Hides the title on mobile screens */
            }
            .header-container {
                justify-content: center; /* Centers the button container on mobile screens */
                flex-wrap: wrap; /* Allows elements to wrap if needed */
            }
        }
    .data-container{
        min-height: 600px;
        background-color: var(--white-color);
        /* border: 1px solid #ddd; */
        overflow-x: auto;
        padding: 2px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 800px;
    }
    table tr td, table tr th {
    white-space: nowrap;
    }

    th {
        border: 2px solid #ddd;
        padding: 8px;
        text-align: left;
        position: relative;
        cursor: pointer;
        background-color: var(--blue-white);
        color: var(--white-color);
        text-align: center;
    }
    td {
        border: 2px solid #ddd;
        padding: 8px;
        text-align: left;
        position: relative;
    }

    .sort-up::before,
    .sort-down::before {
        content: '';
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
    }

    .sort-up::before {
        content: '\25b2'; /* Unicode for up arrow */
    }

    .sort-down::before {
        content: '\25bc'; /* Unicode for down arrow */
    }

    .status {
        padding: 2px 10px;
        border-radius: 10px;
        color: white;
        font-size: 13px;
    }

    .status.pending {
        background-color: #ff1493;
    }

    .status.inprogress {
        background-color: #ffd700;
        color: black;
    }

    .status.submited {
        background-color: #008000;
    }

    .status.submited {
        background-color: #800080;
    }

    .status.rejected {
        background-color: #ff0000;
    }

    .action-button {
        padding: 5px 10px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        color: white;
        background:#0037ff;
    }
    .action-button:hover {
        text-decoration: none;
        color: white;
        background:#344276;
    }
/* 
    .action-button.start-audit {
        background-color: #007bff;
    }

    .action-button.resume-audit {
        background-color: #a97e00;
    }

    .action-button.download-report {
        background-color: #006c05;
    }

    .action-button.review {
        background-color: #ff0000;
    }
    .action-button.open-progress {
        background-color: #720072;
    } */

    .pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
    }

    .pagination a {
        margin: 0 5px;
        text-decoration: none;
        color: #007bff;
    }

    .pagination a:hover {
        text-decoration: underline;
    }

    .controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        overflow-x: auto;
        margin-bottom: 10px;
        max-width: auto;
    }

    .show-pages {
        display: flex;
        align-items: center;
    }
    .filter-data {
        display: flex;
        align-items: center;
    }
    .controllLabel {
        margin: 0 5px; /* Adjust margins as needed */
    }

    .controls input, .controls select {
        padding: 5px;
        margin-right: 10px;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    @media (max-width: 780px) {
        .show-pages{
            display: none;
        }
        #searchInput{
            max-width: 200px;
            margin-left: 10px
        }
        .controllLabel{
            display: none;
        }
    }

</style>
<div class="table-container">

<div class="header-container">
    <div class="header-title">List of All Audits</div>
        <div class="button-container">
            <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#auditModal">
                <i class="fas fa-plus"></i> New Audit
            </button>
            <a href="#" class="btn btn-info ml-2">
                <i class="fas fa-file-export"></i> Export Data
            </a>
        </div>
</div>

<div class="controls">
    <div class="show-pages">
    <p class="controllLabel">show</p>
        <select id="entriesPerPage">
            <option value="15">15</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <p class="controllLabel">entries</p>
    </div>
    <div class="search-container">
    <input type="text" id="searchInput" placeholder="Search...">
    </div>

    <div class="filter-data">
        <p class="controllLabel">Filter</p>
        <select id="filterStatus">
            <option value="all">All</option>
            <option value="submited">Submited</option>
            <option value="inprogress">Inprogress</option>
            <option value="approved">Approved</option>
            <option value="rejected">Rejected</option>
        </select>
    </div>
</div>

<div class="data-container">
    <table id="dataTable">
        <thead>
            <tr>
                <th data-column="sl" class="sortable">SL No <span class="sort-icon"></span></th>
                <th data-column="auditNumber" class="sortable">Audit Number <span class="sort-icon"></span></th>
                <th data-column="bcaId" class="sortable">BCA ID <span class="sort-icon"></span></th>
                <th data-column="bcaFullName" class="sortable pl-3 pr-3">BCA Full Name <span class="sort-icon"></span></th>
                <th data-column="bcaFullName" class="sortable pl-3 pr-3">Mobile No<span class="sort-icon"></span></th>
                <th data-column="bcaFullName" class="sortable">State <span class="sort-icon"></span></th>
                <th data-column="bcaFullName" class="sortable">Location <span class="sort-icon"></span></th>
                <th data-column="status" class="sortable">Audit Status <span class="sort-icon"></span></th>
                <th data-column="date" class="sortable">Audit Date <span class="sort-icon"></span></th>
                <th data-column="auditorName" class="sortable">Created By <span class="sort-icon"></span></th>
                <th class="">Action</th>
            </tr>
        </thead>
        <tbody id="dataTableBody">
            <!-- Rows will be dynamically generated by JavaScript -->
        </tbody>
    </table>
</div>
<div class="pagination">
    <div id="recordInfo">0 to 0 of 0 data</div>
    <div id="paginationControls"></div>
</div>
</div>

</div>

<!-- New audit modal -->

<div class="modal fade" id="auditModal" tabindex="-1" role="dialog" aria-labelledby="auditModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="auditModalLabel">Validate BCA ID</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pt-2 pb-3">
        <div class="form-group row justify-content-center">
          <div class="col-10">
            <label for="bcaId">BCA ID</label>
            <input type="text" class="form-control uppercase-input no-space" id="bcaId" name="bcaId" placeholder="Enter a BCA ID" required>
          </div>
        </div>
        <div class="form-group row justify-content-center">
          <div class="col-10">
            <label for="bcaName">BCA Full Name</label>
            <input type="text" class="form-control" id="bcaName" name="bcaName" placeholder="" required disabled>
          </div>
        </div>
<!-- error message display -->
        <div id="errorMessageArea">
      <span><i class="fas fa-exclamation-circle text-danger"></i>
        <span id="errorMsg" class="text-danger"> Error Message Here</span></span>
    </div>

      </div>
      <div class="modal-footer d-flex justify-content-center pt-1 pb-1">
        <button type="button" class="btn btn-secondary mr-4" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="proceedBtn" disabled>Proceed</button>
      </div>
    </div>
  </div>
</div>

<?php include "include/footer.php"; ?>
<script>
    showOverlay('--Fetching Data--');
$(document).ready(function() {
    const entriesPerPageSelect = document.getElementById("entriesPerPage");
    const searchInput = document.getElementById("searchInput");
    const filterStatus = document.getElementById("filterStatus");
    const dataTableBody = document.querySelector("#dataTable tbody");
    const recordInfo = document.getElementById("recordInfo");
    const paginationControls = document.getElementById("paginationControls");
    const sortableHeaders = document.querySelectorAll(".sortable");

    let currentPage = 1;
    let entriesPerPage = parseInt(entriesPerPageSelect.value);
    let searchQuery = "";
    let selectedStatus = "all";
    let sortColumn = null;
    let sortDirection = 'asc';

// Data table rendering start
function renderTable(data) {
    const filteredData = data.filter(item => {
        const matchesSearch = searchQuery === "" || item.bca_full_name.toLowerCase().includes(searchQuery.toLowerCase()) || item.bca_id.toLowerCase().includes(searchQuery.toLowerCase()) || item.audit_number.toLowerCase().includes(searchQuery.toLowerCase());
        const matchesStatus = selectedStatus === "all" || item.status === selectedStatus;
        hideOverlay();
        return matchesSearch && matchesStatus;
    });

    const totalEntries = filteredData.length;
    const totalPages = Math.ceil(totalEntries / entriesPerPage);

    const start = (currentPage - 1) * entriesPerPage;
    const end = start + entriesPerPage;

    if (sortColumn) {
        filteredData.sort((a, b) => {
            let comparison = 0;
            if (a[sortColumn] > b[sortColumn]) {
                comparison = 1;
            } else if (a[sortColumn] < b[sortColumn]) {
                comparison = -1;
            }
            return sortDirection === 'desc' ? comparison * -1 : comparison;
        });
    }

    // Check if dataTableBody exists
    const dataTableBody = document.querySelector('#dataTableBody');
    if (!dataTableBody) {
        console.error("Error: dataTableBody element not found.");
        return;
    }

    dataTableBody.innerHTML = filteredData.slice(start, end).map((item, index) => {
        const sl = start + index + 1; // Calculate serial number based on filtered data index
        const auditNumber = item.audit_number;
        const bcaId = item.bca_id;
        const bcaName = item.bca_full_name;
        const bcaMobile = item.bca_contact_no;
        const state = item.state;
        const location = item.location;

        return `
            <tr>
                <td>${sl}</td>
                <td>${auditNumber}</td>
                <td>${bcaId}</td>
                <td>${bcaName}</td>
                <td>${bcaMobile}</td>
                <td>${state}</td>
                <td>${location}</td>
                <td><span class="status ${item.status}">${item.status.charAt(0).toUpperCase() + item.status.slice(1)}</span></td>
                <td>${item.formatted_date}</td>
                <td>${item.user_full_name}</td>
                <td>
                    <button type="button" class="action-button" data-audit-number="${auditNumber}" data-bca-id="${bcaId}" data-bca-name="${bcaName}" data-bca-state="${state}" data-bca-location="${location}">Open</button>
                </td>
            </tr>
        `;
    }).join("");

    // Function to add event listeners after the table has been rendered
    function addEventListeners() {
        hideOverlay();
        dataTableBody.addEventListener('click', function(event) {
            if (event.target && event.target.matches('button.action-button')) {
            showOverlay();
                const button = event.target;
                const auditNumber = button.getAttribute('data-audit-number');
                const bcaId = button.getAttribute('data-bca-id');
                const bcaName = button.getAttribute('data-bca-name');
                const state = button.getAttribute('data-bca-state');
                const location = button.getAttribute('data-bca-location');

                // Call storeSessionData with the appropriate data
                storeSessionData(bcaId, bcaName, state, location, auditNumber);
            }
        });
    }

    // Call the function to add event listeners after setting innerHTML
    addEventListeners();

    recordInfo.textContent = `Showing ${start + 1} to ${Math.min(end, totalEntries)} of ${totalEntries} entries`;

    // paginationControls.innerHTML = Array.from({ length: totalPages }, (_, i) => `
    //     <a href="#" class="${i + 1 === currentPage ? 'active' : ''}" data-page="${i + 1}">${i + 1}</a>
    // `).join("");

    // document.querySelectorAll("#paginationControls a").forEach(a => {
    //     a.addEventListener("click", function(event) {
    //         event.preventDefault();
    //         currentPage = parseInt(this.getAttribute("data-page"));
    //         fetchData();
    //     });
    // });
    
       function updatePaginationControls() {
       
       if (totalPages < 2) {
        paginationControls.innerHTML = ''; // Hide pagination if less than 2 pages
        return;
    }
    
    let paginationHtml = '';

    // Previous button
    if (currentPage > 1) {
        paginationHtml += `<a href="#" class="prev" data-page="${currentPage - 1}">Previous</a>`;
    }

    // Always show the first 2 pages
    for (let i = 1; i <= 2; i++) {
        paginationHtml += `<a href="#" class="${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</a>`;
    }

    // Dots before the current page range if needed
    if (currentPage > 4) {
        paginationHtml += `<span>...</span>`;
    }

    // Current page and its previous and next pages
    let startPage = Math.max(3, currentPage - 1);
    let endPage = Math.min(totalPages - 1, currentPage + 1);
    for (let i = startPage; i <= endPage; i++) {
        if (i > 2 && i < totalPages) {
            paginationHtml += `<a href="#" class="${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</a>`;
        }
    }

    // Dots after the current page range if needed
    if (currentPage < totalPages - 2) {
        paginationHtml += `<span>...</span>`;
    }

    // Always show the last page
    if (totalPages > 2) {
        paginationHtml += `<a href="#" class="${totalPages === currentPage ? 'active' : ''}" data-page="${totalPages}">${totalPages}</a>`;
    }

    // Next button
    if (currentPage < totalPages) {
        paginationHtml += `<a href="#" class="next" data-page="${currentPage + 1}">Next</a>`;
    }

    paginationControls.innerHTML = paginationHtml;

    document.querySelectorAll("#paginationControls a").forEach(a => {
        a.addEventListener("click", function(event) {
            event.preventDefault();
            currentPage = parseInt(this.getAttribute("data-page"));
            fetchData('pagination');
        });
    });
}
// pagination part end

    updatePaginationControls();
}
    // data table rendering end /////
    
let errorCount = 0;
function fetchData(input) {
    if(input){
        showOverlay('--Please Wait--');
        }
    if (errorCount > 5) {
            return; // Stop further execution
    } else if(errorCount == 5){
                alert("Error fetching data! Please Retry After Sometime.");
                // reload the page
                // location.reload();
                hideOverlay();
                return; // Stop further execution
            }
    fetch('codes/fetchData/fetch_audit_list_data.php')
        .then(response => response.json())
        .then(data => {
            // Reset the error count on a successful fetch
            errorCount = 0;
            // console.log(data);
            renderTable(data);
        })
        .catch(error => {
            errorCount += 1;
            console.error('Error fetching data:', error);
            console.log('Error count:', errorCount);

            if (errorCount >= 5) {
                // alert("Error fetching data! Please reload the page.");
                // reload the page
                // location.reload();
                return; // Stop further execution
            } else {
                showOverlay('Connecting...');
            }
        });
}


    function handleSort(column) {
        if (column === sortColumn) {
            sortDirection = sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            sortColumn = column;
            sortDirection = 'asc';
        }

        sortableHeaders.forEach(header => {
            if (header.dataset.column === column) {
                header.classList.add(sortDirection === 'asc' ? 'sort-up' : 'sort-down');
            } else {
                header.classList.remove('sort-up', 'sort-down');
            }
        });

        renderTable();
    }

    // function handleFormSubmit(action, bc_id) {
    //     // Find the form that triggered the function
    //     const form = event.target;

    //     // Set the action of the form based on the passed action parameter
    //     switch (action) {
    //         case 'Start Audit':
    //             form.action = 'progress.php';
    //             break;
    //         case 'Resume Audit':
    //             form.action = 'progress.php';
    //             break;
    //         case 'Download Report':
    //             form.action = 'download-audit-report.php';
    //             break;
    //         case 'Restart':
    //             form.action = 'restart.php';
    //             break;
    //         default:
    //             return false;
    //     }

    //     // Create a hidden input for bcid
    //     const bcidInput = document.createElement('input');
    //     bcidInput.type = 'hidden';
    //     bcidInput.name = 'bc_id';
    //     bcidInput.value = bc_id;
    //     form.appendChild(bcidInput);

    //     return true;  // Allow form submission
    // }

    entriesPerPageSelect.addEventListener("change", function () {
        entriesPerPage = parseInt(this.value);
        currentPage = 1;
        fetchData('showEntry');
    });

    searchInput.addEventListener("input", function () {
        searchQuery = this.value;
        currentPage = 1;
        fetchData();
    });

    filterStatus.addEventListener("change", function () {
        selectedStatus = this.value;
        currentPage = 1;
        fetchData();
    });

    sortableHeaders.forEach(header => {
        header.addEventListener("click", function () {
            const column = this.dataset.column;
            handleSort(column);
        });
    });

    fetchData(); // Initial fetch of data

//  data refresh every 10 seconds
        setInterval(() => {
            fetchData();
        }, 1000);

// //////////////////: Modal Funtion Start :///////////////////////////
    // Function to fetch BCA name on BCA ID input change
    $('#bcaId').on('input', function() {
      var bcaId = $(this).val().trim();
      if (bcaId.length >= 3) { // Only proceed if BCA ID is 6 characters long
        fetchBcaName(bcaId);
      } else {
        $('#bcaName').val('').prop('disabled', true);
        $('#proceedBtn').prop('disabled', true);
        displayErrorMessage('Please enter a valid 3-digit BCA ID.');
      }
    });

    // Function to fetch BCA name via AJAX
function fetchBcaName(bcaId) {
  $.ajax({
    url: '/bcaudit/codes/fetchData/validate_bca_for_new_audit.php',
    method: 'GET',
    data: { bca_id: bcaId },
    dataType: 'json',
    success: function(response) {
      if (response.success) {
        // console.log(response);
        var bcaName = response.data['bca_name'];
        var state = response.data['state'];
        var location = response.data['location'];
        document.getElementById('errorMessageArea').style.display = 'none';
        $('#bcaName').val(bcaName);
        $('#proceedBtn').prop('disabled', false);

        // Enable proceed button click handler to store session data
        $('#proceedBtn').off('click').on('click', function() {
          storeSessionData(bcaId, bcaName, state, location);
        });
      } else {
        $('#bcaName').val(response.message);
        $('#proceedBtn').prop('disabled', true);
        displayErrorMessage(response.message);
      }
    },
    error: function() {
      $('#bcaName').val('Error fetching name').prop('disabled', true);
      $('#proceedBtn').prop('disabled', true);
      displayErrorMessage('Error fetching BCA name. Please try again.');
    }
  });
}

// Function to store session data
function storeSessionData(bcaId, bcaName, state, location, auditNumber) {
    if (auditNumber){
        var action = 'newAudit';
    }else{
        var action = 'existingAudit';
    }
  $.ajax({
    url: '/bcaudit/codes/store_session.php',
    type: 'POST',
    data: { bcaId: bcaId, bcaName: bcaName, auditNumber: auditNumber, action: action, state: state, location: location },
    success: function(response) {
      var result = JSON.parse(response);
      if (result.success) {
        console.log('Session data stored successfully');
        window.location.href = '/bcaudit/progress.php';
      } else {
        console.log('Error: ' + result.message);
      }
    },
    error: function() {
      console.log('AJAX request failed');
    }
  });
}

// Proceed button click handler initially disabled
$('#proceedBtn').prop('disabled', true);


    function displayErrorMessage(message) {
            var errorMessageArea = document.getElementById('errorMessageArea');
            var errorMsg = document.getElementById('errorMsg');
            // Show the error message div
            errorMessageArea.style.display = 'flex';
            // Set the error message text
            errorMsg.innerText = message;           
        }
// //////////////////: Modal Funtion End :///////////////////////////


  });

    </script>
