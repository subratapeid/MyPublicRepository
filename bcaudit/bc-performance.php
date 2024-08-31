<?php 
    $pageTitle="BC Performance Audit Form";
    include "include/navbar.php";
    include "codes/verify_audit_session.php"; 
?>
    <div class="formContainer mx-auto">
        <div class="container pl-2 pr-2">
            <h2 class="text-center mb-3">BC Performance</h2>
            <form id="equipmentForm" method="POST" enctype="multipart/form-data">
                <!-- transaction verification list -->
                <!-- <div class="form-group dark">
    <label for="procTrans">1. Transactions were processed promptly.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="procTrans" id="procTransYes" value="Yes">
            <label class="form-check-label" for="procTransYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="procTrans" id="procTransNo" value="No">
            <label class="form-check-label" for="procTransNo">No</label>
        </div>
    </div>

    <div class="form-group dark">
        <label for="remarksProcTrans"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksProcTrans" id="remarksProcTrans" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div> -->

    <!-- Submit Button -->
    <div class="d-flex pt-3 mt-5 mb-4 justify-content-center">
        <button type="button" class="btn btn-secondary mr-5 pt-2 pb-2 pl-3 pr-3" id="backButton">Previous</button>
    <!-- <button type="submit" class="btn btn-danger ml-5 pt-2 pb-2 pl-3 pr-3" id="saveButton">Save & Next</button> -->
        <a href="/bcaudit/auditor-observation.php" class="bg-danger mr-5 pt-2 pb-2 pl-3 pr-3" id="temp">Next</a>

    </div>
</form>
</div>
</div>

<?php include "include/footer.php"; ?>
<script src ="js/fetchProgress.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {   

// Initialize data variables
let bcaId = "<?php echo($bcaId); ?>";
let bcaName = "<?php echo($bcaName); ?>";
let auditNumber = "<?php echo($auditNumber); ?>";
let formProgress = 6;
const nextBtn = document.getElementById('nextButton');

// Go to next page function
function goToNextPage() {
    window.location.href = '/bcaudit/bc-performance.php';
}

nextBtn.addEventListener('click', goToNextPage);

const getProgress = async () => {
    try {
        let progress = await fetchProgress(bcaId, auditNumber);
        console.log('Progress:', progress);

        // Form part start
        if (progress >= formProgress) {
            console.log('Fetching inserted data');
            $('#nextButton').prop('disabled', false);

            // Fetch already saved form data
            $.ajax({
                url: 'codes/fetchData/fetch_transaction_verification_saved_data.php',
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        var data = response.data;
                        populateData(data);
                        formOldData = new FormData(document.getElementById('equipmentForm'));
                    } else {
                        alert("Failed to fetch data: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert("Error occurred while fetching data!");
                    console.error('Error occurred while fetching data:', status, error);
                    console.error(xhr.responseText);
                }
            });

        } else {
            console.log('Fetching pre-fed data');
            $('#nextButton').prop('disabled', true);
            $('#saveButton').css('display', 'inline-block');
        }

        // Convert form data to object for comparison
        function formDataToObject(formData) {
            var object = {};
            formData.forEach((value, key) => {
                if (value instanceof File && value.name) {
                    object[key] = { name: value.name, size: value.size };
                } else {
                    object[key] = value;
                }
            });
            return object;
        }

        // Submit form
        $('#equipmentForm').on('submit', function(event) {
            event.preventDefault();
            var form = $(this);
            var formData = new FormData(this);
            var formElement = document.getElementById('equipmentForm');
            var formData = new FormData(formElement);

            if (progress >= formProgress) {
                var oldDataObject = formDataToObject(formOldData);
                var newDataObject = formDataToObject(formData);
            }

            if (progress < formProgress) {
                insertData(formData);
            } else if (JSON.stringify(oldDataObject) !== JSON.stringify(newDataObject)) {
                updateForm(formData);
                $('#saveButton').text("Update & Next");
            } else {
                alert("No changes detected.");
            }
        });

    } catch (error) {
        console.error('Error:', error);
    }
}

// Insert form data function
function insertData(formData) {
    showOverlay('--Inserting Data--');
    $.ajax({
        url: 'codes/insert_transaction_verification_form.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            hideOverlay();
            $('#saveButton').prop('disabled', false);
            if (response.status == 'success') {
                alert(response.message);
                goToNextPage();
            } else {
                alert(response.error);
        console.log(response.error);

            }
        },
        error: function(xhr, status, error) {
            alert('Error: ' + error);
        console.log(error);
            hideOverlay();
        }
    });
}

// Update form data function
function updateForm(formData) {
    showOverlay('--Updating Data--');
    console.log('updating');

    $('#saveButton').prop('disabled', true);
    $.ajax({
        url: 'codes/update_transaction_verification_form.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            hideOverlay();
            console.log(response);
            $('#saveButton').prop('disabled', false);
            if (response.status == 'success') {
                alert(response.message);
                goToNextPage();
            } else {
                alert('Error: ' + response.error);
            }
        },
        error: function(xhr, status, error) {
            alert('Error: ' + error);
            hideOverlay();
        }
    });
}

// Populate form data after fetching
function populateData(data) {
    // Populate radio buttons and text areas for each field
    $('input[name="procTrans"][value="' + data.proc_trans + '"]').prop('checked', true);
    $('#remarksProcTrans').val(data.remarks_proc_trans);
    
    $('input[name="procDepWith"][value="' + data.proc_dep_with + '"]').prop('checked', true);
    $('#remarksProcDepWith').val(data.remarks_proc_dep_with);
    
    $('input[name="delayTrans"][value="' + data.delay_trans + '"]').prop('checked', true);
    $('#remarksDelayTrans').val(data.remarks_delay_trans);
    
    $('input[name="accTrans"][value="' + data.acc_trans + '"]').prop('checked', true);
    $('#remarksAccTrans').val(data.remarks_acc_trans);
    
    $('input[name="timeMatch"][value="' + data.time_match + '"]').prop('checked', true);
    $('#remarksTimeMatch').val(data.remarks_time_match);
    
    $('input[name="custVer"][value="' + data.cust_ver + '"]').prop('checked', true);
    $('#remarksCustVer').val(data.remarks_cust_ver);
    
    $('input[name="bcVerify"][value="' + data.bc_verify + '"]').prop('checked', true);
    $('#remarksBcVerify').val(data.remarks_bc_verify);
    
    $('input[name="sysReceipts"][value="' + data.sys_receipts + '"]').prop('checked', true);
    $('#remarksSysReceipts').val(data.remarks_sys_receipts);
    
    $('input[name="custCopy"][value="' + data.cust_copy + '"]').prop('checked', true);
    $('#remarksCustCopy').val(data.remarks_cust_copy);
    
    $('input[name="prescLimits"][value="' + data.presc_limits + '"]').prop('checked', true);
    $('#remarksPrescLimits').val(data.remarks_presc_limits);
    
    $('input[name="authTrans"][value="' + data.auth_trans + '"]').prop('checked', true);
    $('#remarksAuthTrans').val(data.remarks_auth_trans);
    
    $('input[name="cashHandling"][value="' + data.cash_handling + '"]').prop('checked', true);
    $('#remarksCashHandling').val(data.remarks_cash_handling);
    
    $('input[name="cashDiscrep"][value="' + data.cash_discrep + '"]').prop('checked', true);
    $('#remarksCashDiscrep').val(data.remarks_cash_discrep);
    
    $('input[name="complaints"][value="' + data.complaints + '"]').prop('checked', true);
    $('#remarksComplaints').val(data.remarks_complaints);
    
    $('input[name="compPolicies"][value="' + data.comp_policies + '"]').prop('checked', true);
    $('#remarksCompPolicies').val(data.remarks_comp_policies);
    
    $('input[name="regReq"][value="' + data.reg_req + '"]').prop('checked', true);
    $('#remarksRegReq').val(data.remarks_reg_req);
    
    $('input[name="auditTrail"][value="' + data.audit_trail + '"]').prop('checked', true);
    $('#remarksAuditTrail').val(data.remarks_audit_trail);
    
    $('input[name="commTrans"][value="' + data.comm_trans + '"]').prop('checked', true);
    $('#remarksCommTrans').val(data.remarks_comm_trans);

    $('input[name="techIssues"][value="' + data.tech_issues + '"]').prop('checked', true);
    $('#remarksTechIssues').val(data.remarks_tech_issues);
}

getProgress();

    });
    </script>