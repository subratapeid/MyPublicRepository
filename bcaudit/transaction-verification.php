<?php 
    $pageTitle="Transaction Verification Audit Form";
    include "include/navbar.php";
    include "codes/verify_audit_session.php"; 
?>
    <div class="formContainer mx-auto">
        <div class="container pl-2 pr-2">
            <h2 class="text-center mb-3">Transaction Verification</h2>
            <form id="equipmentForm" method="POST" enctype="multipart/form-data">
                <!-- transaction verification list -->
                <div class="form-group dark">
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
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksProcTrans"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksProcTrans" id="remarksProcTrans" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="procDepWith">2. Are deposits and withdrawals processed promptly?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="procDepWith" id="procDepWithYes" value="Yes">
            <label class="form-check-label" for="procDepWithYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="procDepWith" id="procDepWithNo" value="No">
            <label class="form-check-label" for="procDepWithNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksProcDepWith"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksProcDepWith" id="remarksProcDepWith" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="delayTrans">3. Is there any delay between the customer's request and the actual transaction?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="delayTrans" id="delayTransYes" value="Yes">
            <label class="form-check-label" for="delayTransYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="delayTrans" id="delayTransNo" value="No">
            <label class="form-check-label" for="delayTransNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksDelayTrans"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksDelayTrans" id="remarksDelayTrans" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="accTrans">4. Are all transactions accurately recorded in the system?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="accTrans" id="accTransYes" value="Yes">
            <label class="form-check-label" for="accTransYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="accTrans" id="accTransNo" value="No">
            <label class="form-check-label" for="accTransNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksAccTrans"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksAccTrans" id="remarksAccTrans" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="timeMatch">5. Do the timestamps on transaction slips match the actual transaction times?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="timeMatch" id="timeMatchYes" value="Yes">
            <label class="form-check-label" for="timeMatchYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="timeMatch" id="timeMatchNo" value="No">
            <label class="form-check-label" for="timeMatchNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksTimeMatch"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksTimeMatch" id="remarksTimeMatch" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="custVer">6. Is proper customer verification conducted before processing transactions?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="custVer" id="custVerYes" value="Yes">
            <label class="form-check-label" for="custVerYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="custVer" id="custVerNo" value="No">
            <label class="form-check-label" for="custVerNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksCustVer"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksCustVer" id="remarksCustVer" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="bcVerify">7. Are customer OTPs, biometric data, or PINs used by the BC for verifying transactions?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="bcVerify" id="bcVerifyYes" value="Yes">
            <label class="form-check-label" for="bcVerifyYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="bcVerify" id="bcVerifyNo" value="No">
            <label class="form-check-label" for="bcVerifyNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksBcVerify"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksBcVerify" id="remarksBcVerify" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="sysReceipts">8. Are system-generated receipts issued for each transaction?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="sysReceipts" id="sysReceiptsYes" value="Yes">
            <label class="form-check-label" for="sysReceiptsYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="sysReceipts" id="sysReceiptsNo" value="No">
            <label class="form-check-label" for="sysReceiptsNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksSysReceipts"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksSysReceipts" id="remarksSysReceipts" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="custCopy">9. Are customers provided with a customer copy of the transaction slip?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="custCopy" id="custCopyYes" value="Yes">
            <label class="form-check-label" for="custCopyYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="custCopy" id="custCopyNo" value="No">
            <label class="form-check-label" for="custCopyNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksCustCopy"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksCustCopy" id="remarksCustCopy" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>
<div class="form-group dark">
    <label for="prescLimits">10. Are deposit and withdrawal transactions within the prescribed limits?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="prescLimits" id="prescLimitsYes" value="Yes">
            <label class="form-check-label" for="prescLimitsYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="prescLimits" id="prescLimitsNo" value="No">
            <label class="form-check-label" for="prescLimitsNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksPrescLimits"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksPrescLimits" id="remarksPrescLimits" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="authTrans">11. Are any transactions exceeding the limits properly authorized and documented?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="authTrans" id="authTransYes" value="Yes">
            <label class="form-check-label" for="authTransYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="authTrans" id="authTransNo" value="No">
            <label class="form-check-label" for="authTransNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksAuthTrans"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksAuthTrans" id="remarksAuthTrans" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="cashHandling">12. Is cash handled securely and accurately?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="cashHandling" id="cashHandlingYes" value="Yes">
            <label class="form-check-label" for="cashHandlingYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="cashHandling" id="cashHandlingNo" value="No">
            <label class="form-check-label" for="cashHandlingNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksCashHandling"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksCashHandling" id="remarksCashHandling" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="cashDiscrep">13. Are there any discrepancies in the cash register?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="cashDiscrep" id="cashDiscrepYes" value="Yes">
            <label class="form-check-label" for="cashDiscrepYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="cashDiscrep" id="cashDiscrepNo" value="No">
            <label class="form-check-label" for="cashDiscrepNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksCashDiscrep"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksCashDiscrep" id="remarksCashDiscrep" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="complaints">14. Are there any complaints regarding delays or errors in transactions?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="complaints" id="complaintsYes" value="Yes">
            <label class="form-check-label" for="complaintsYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="complaints" id="complaintsNo" value="No">
            <label class="form-check-label" for="complaintsNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksComplaints"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksComplaints" id="remarksComplaints" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="compPolicies">15. Are the deposit and withdrawal procedures in compliance with the bank's policies?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="compPolicies" id="compPoliciesYes" value="Yes">
            <label class="form-check-label" for="compPoliciesYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="compPolicies" id="compPoliciesNo" value="No">
            <label class="form-check-label" for="compPoliciesNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksCompPolicies"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksCompPolicies" id="remarksCompPolicies" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="regReq">16. Are regulatory requirements adhered to during transactions?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="regReq" id="regReqYes" value="Yes">
            <label class="form-check-label" for="regReqYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="regReq" id="regReqNo" value="No">
            <label class="form-check-label" for="regReqNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksRegReq"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksRegReq" id="remarksRegReq" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="auditTrail">17. Is there a clear audit trail for each deposit and withdrawal?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="auditTrail" id="auditTrailYes" value="Yes">
            <label class="form-check-label" for="auditTrailYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="auditTrail" id="auditTrailNo" value="No">
            <label class="form-check-label" for="auditTrailNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksAuditTrail"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksAuditTrail" id="remarksAuditTrail" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="commTrans">18. Is there a clear communication of transaction details to customers?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="commTrans" id="commTransYes" value="Yes">
            <label class="form-check-label" for="commTransYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="commTrans" id="commTransNo" value="No">
            <label class="form-check-label" for="commTransNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksCommTrans"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksCommTrans" id="remarksCommTrans" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="techIssues">19. Are there any technical issues affecting transaction processing?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="techIssues" id="techIssuesYes" value="Yes">
            <label class="form-check-label" for="techIssuesYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="techIssues" id="techIssuesNo" value="No">
            <label class="form-check-label" for="techIssuesNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="remarksTechIssues"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="remarksTechIssues" id="remarksTechIssues" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<!-- form buttons -->
            <div class="d-flex pt-3 mt-5 mb-4 justify-content-between">
                <button type="button" class="btn btn-secondary btn-sm pt-2 pb-2 pl-3 pr-3" id="backButton">Previous</button>
                <!--<a href="operational-details.php" class="bg-danger mr-5 pt-2 pb-2 pl-3 pr-3" id="temp">Next</a>-->
                <button type="submit" class="btn btn-danger btn-sm pt-2 pb-2 pl-3 pr-3" id="saveButton"><span class="spinner-border spinner-border-sm d-none" id="submitBtnSpinner" role="status" aria-hidden="true"></span> Save & Next</button>
                <button type="button" class="btn btn-info btn-sm pt-2 pb-2 pl-3 pr-3" id="nextButton" disabled>Next</button>
                
    <!-- Submit Button -->
    <!--<div class="d-flex pt-3 mt-5 mb-4 justify-content-center">-->
    <!--    <button type="button" class="btn btn-secondary mr-5 pt-2 pb-2 pl-3 pr-3" id="backButton">Previous</button>-->
    <!--<button type="submit" class="btn btn-danger ml-5 pt-2 pb-2 pl-3 pr-3" id="saveButton">Save & Next</button>-->
    <!--    <a href="bc-performance.php" class="bg-danger mr-5 pt-2 pb-2 pl-3 pr-3" id="temp">Next</a>-->
    <!--    <button type="button" class="btn btn-info ml-5 pt-2 pb-2 pl-3 pr-3" id="nextButton" disabled>Next</button>-->


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