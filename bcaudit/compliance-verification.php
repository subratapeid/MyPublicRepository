<?php 
    $pageTitle="Compliance & Verification Audit Form";
    include "include/navbar.php";
    include "codes/verify_audit_session.php"; 
?>
    <div class="formContainer mx-auto">
        <div class="container pl-2 pr-2">
            <h2 class="text-center mb-3">Compliance & Verification</h2>
            <form id="equipmentForm" method="POST" enctype="multipart/form-data">
                <!-- Compliance form start -->
    <div class="form-group dark">
    <label for="bcPointPlace">1. Is the BC Point located in a prominent place?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="bcPointPlace" id="bcPointPlaceYes" value="Yes">
            <label class="form-check-label" for="bcPointPlaceYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="bcPointPlace" id="bcPointPlaceNo" value="No">
            <label class="form-check-label" for="bcPointPlaceNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="bcPointPlaceRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="bcPointPlaceRemarks" id="bcPointPlaceRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="bcPointClean">2. The BC Point was clean and well-maintained.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="bcPointClean" id="bcPointCleanYes" value="Yes">
            <label class="form-check-label" for="bcPointCleanYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="bcPointClean" id="bcPointCleanNo" value="No">
            <label class="form-check-label" for="bcPointCleanNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="bcPointCleanRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="bcPointCleanRemarks" id="bcPointCleanRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <h6 id="postersHeading">3. Bank Banner, Poster, SSS Poster, Services Poster, Dos’ and Don’ts</h6>
    <label for="postersDisplayed"><span class="mdi mdi-hand-pointing-right"></span> All necessary posters were displayed?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="postersDisplayed" id="postersDisplayedYes" value="Yes">
            <label class="form-check-label" for="postersDisplayedYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="postersDisplayed" id="postersDisplayedNo" value="No">
            <label class="form-check-label" for="postersDisplayedNo">No</label>
        </div>
    </div>
    <label for="outdatedPosters"><span class="mdi mdi-hand-pointing-right"></span> Outdated posters were displayed?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="outdatedPosters" id="outdatedPostersYes" value="Yes">
            <label class="form-check-label" for="outdatedPostersYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="outdatedPosters" id="outdatedPostersNo" value="No">
            <label class="form-check-label" for="outdatedPostersNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="postersRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="postersRemarks" id="postersRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="customerAlertDosDonts">4. Dos and Don’ts for Customer Alert before Transactions Displayed?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="customerAlertDosDonts" id="customerAlertDosDontsYes" value="Yes">
            <label class="form-check-label" for="customerAlertDosDontsYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="customerAlertDosDonts" id="customerAlertDosDontsNo" value="No">
            <label class="form-check-label" for="customerAlertDosDontsNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="customerAlertDosDontsRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="customerAlertDosDontsRemarks" id="customerAlertDosDontsRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="verificationCertificate">5. IIBF, DSA, police verification certificate is present?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="verificationCertificate" id="verificationCertificateYes" value="Yes">
            <label class="form-check-label" for="verificationCertificateYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="verificationCertificate" id="verificationCertificateNo" value="No">
            <label class="form-check-label" for="verificationCertificateNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="verificationCertificateRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="verificationCertificateRemarks" id="verificationCertificateRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="unauthorizedIndividuals">6. Unauthorized individuals were observed engaging in Integra's BCA transaction activities.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="unauthorizedIndividuals" id="unauthorizedIndividualsYes" value="Yes">
            <label class="form-check-label" for="unauthorizedIndividualsYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="unauthorizedIndividuals" id="unauthorizedIndividualsNo" value="No">
            <label class="form-check-label" for="unauthorizedIndividualsNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="unauthorizedIndividualsRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="unauthorizedIndividualsRemarks" id="unauthorizedIndividualsRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="idCardUsage">7. BCA is using a valid ID card issued by the company?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="idCardUsage" id="idCardUsageYes" value="Yes">
            <label class="form-check-label" for="idCardUsageYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="idCardUsage" id="idCardUsageNo" value="No">
            <label class="form-check-label" for="idCardUsageNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="idCardUsageRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="idCardUsageRemarks" id="idCardUsageRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="cloneFingerprint">8. Any evidence of clone fingerprint usage?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="cloneFingerprint" id="cloneFingerprintYes" value="Yes">
            <label class="form-check-label" for="cloneFingerprintYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="cloneFingerprint" id="cloneFingerprintNo" value="No">
            <label class="form-check-label" for="cloneFingerprintNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="cloneFingerprintRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="cloneFingerprintRemarks" id="cloneFingerprintRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <h6 id="manualReceiptsHeading">9. Manual Receipts and Passbook Entries</h6>
    <label for="manualReceipts"><span class="mdi mdi-hand-pointing-right"></span> Any manual handwritten receipts issued by the BCA?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="manualReceipts" id="manualReceiptsYes" value="Yes">
            <label class="form-check-label" for="manualReceiptsYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="manualReceipts" id="manualReceiptsNo" value="No">
            <label class="form-check-label" for="manualReceiptsNo">No</label>
        </div>
    </div>
    <label for="systemGeneratedReceipts"><span class="mdi mdi-hand-pointing-right"></span> Only system-generated transaction receipts are issued by the BCA.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="systemGeneratedReceipts" id="systemGeneratedReceiptsYes" value="Yes">
            <label class="form-check-label" for="systemGeneratedReceiptsYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="systemGeneratedReceipts" id="systemGeneratedReceiptsNo" value="No">
            <label class="form-check-label" for="systemGeneratedReceiptsNo">No</label>
        </div>
    </div>
    <label for="customerPassbooks"><span class="mdi mdi-hand-pointing-right"></span> The BCA collects and retains customer passbooks.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="customerPassbooks" id="customerPassbooksYes" value="Yes">
            <label class="form-check-label" for="customerPassbooksYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="customerPassbooks" id="customerPassbooksNo" value="No">
            <label class="form-check-label" for="customerPassbooksNo">No</label>
        </div>
    </div>
    <label for="transactionSlips"><span class="mdi mdi-hand-pointing-right"></span> Customer transaction slips are handed over to the customer.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="transactionSlips" id="transactionSlipsYes" value="Yes">
            <label class="form-check-label" for="transactionSlipsYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="transactionSlips" id="transactionSlipsNo" value="No">
            <label class="form-check-label" for="transactionSlipsNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="manualReceiptsRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="manualReceiptsRemarks" id="manualReceiptsRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="nonRelevantApplications">10. Non-relevant applications were used.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="nonRelevantApplications" id="nonRelevantApplicationsYes" value="Yes">
            <label class="form-check-label" for="nonRelevantApplicationsYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="nonRelevantApplications" id="nonRelevantApplicationsNo" value="No">
            <label class="form-check-label" for="nonRelevantApplicationsNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="nonRelevantApplicationsRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="nonRelevantApplicationsRemarks" id="nonRelevantApplicationsRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="blockedAccounts">11. Accounts were found blocked without reason.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="blockedAccounts" id="blockedAccountsYes" value="Yes">
            <label class="form-check-label" for="blockedAccountsYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="blockedAccounts" id="blockedAccountsNo" value="No">
            <label class="form-check-label" for="blockedAccountsNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="blockedAccountsRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="blockedAccountsRemarks" id="blockedAccountsRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>



    <!-- <div class="form-group dark">
        <div>
            <label for="bcPointPhotoPreview">20. Capture registers Photo</label>
        </div>
        <div>
            <img id="hardwarePhotoPreview" class="mt-2 mb-3 img-thumbnail" src="default-image.png" alt="Image preview">
        </div>
        <div>
            <a class="btn btn-primary mr-2" id="openCaptureModalBtnHardware" data-toggle="modal" data-target="#photoCaptureModal">Capture Registers Photo</a>
        </div>
        <input type="hidden" id="hardwarePhotoBase64" name="hardwarePhoto" required>
    </div> -->
    
    
    <!-- form buttons -->
            <div class="d-flex pt-3 mt-5 mb-4 justify-content-between">
                <button type="button" class="btn btn-secondary btn-sm pt-2 pb-2 pl-3 pr-3" id="backButton">Previous</button>
                <!--<a href="operational-details.php" class="bg-danger mr-5 pt-2 pb-2 pl-3 pr-3" id="temp">Next</a>-->
                <button type="submit" class="btn btn-danger btn-sm pt-2 pb-2 pl-3 pr-3" id="saveButton"><span class="spinner-border spinner-border-sm d-none" id="submitBtnSpinner" role="status" aria-hidden="true"></span> Save & Next</button>
                <button type="button" class="btn btn-info btn-sm pt-2 pb-2 pl-3 pr-3" id="nextButton" disabled>Next</button>
                

                <!-- Submit Button -->
                <!--<div class="d-flex pt-3 mt-5 mb-4 justify-content-center">-->
                <!--    <button type="button" class="btn btn-secondary mr-5 pt-2 pb-2 pl-3 pr-3" id="backButton">Previous</button>-->
                <!--    <button type="submit" class="btn btn-danger ml-5 pt-2 pb-2 pl-3 pr-3" id="saveButton">Save & Next</button>-->
                <!--    <a href="transaction-verification.php" class="bg-danger mr-5 pt-2 pb-2 pl-3 pr-3" id="temp">Next</a>-->
                <!--<button type="button" class="btn btn-info ml-5 pt-2 pb-2 pl-3 pr-3" id="nextButton" disabled>Next</button>-->


                </div>
            </form>
            </div>
        </div>
    </div>


    <!--  Modal for Photo Capture -->
<!-- <div class="modal fade" id="photoCaptureModal" tabindex="-1" role="dialog" aria-labelledby="photoCaptureModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="photoCaptureModalLabel">Capture Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="mdi mdi-close-box-outline text-danger"></span>
                </button>
            </div>
            <div class="modal-body">
                <div id="photoCaptureContent">
                    <div id="permission-message">

                    </div>
                    <video id="video" width="100%" height="auto" autoplay></video>
                    <canvas id="canvas" class="d-none"></canvas>
                    <img id="capturedPhoto" class="mt-2 img-thumbnail d-none" src="default-image.png" alt="Captured photo">
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" id="closeBtn" data-dismiss="modal">Close</button>
                <button type="button" class="iconButtons btn btn-primary d-none" id="captureBtn" title="Capture"><span class="mdi mdi-camera-outline btnIcon"></span></button>
                <button type="button" class="iconButtons btn btn-success d-none" id="confirmBtn" title="Confirm"><span class="mdi mdi-check-circle-outline btnIcon"></span></button>
                <button type="button" class="iconButtons btn btn-danger d-none" id="retakeBtn" title="Retake"><i class="mdi mdi-camera-retake-outline btnIcon"></i></button>
                <button type="button" class="iconButtons btn btn-warning" id="toggleCameraBtn" title="Flip Camera"><span class="mdi mdi-camera-flip-outline btnIcon"></span></button>
            </div>
        </div>
    </div>
</div> -->

    <?php include "include/footer.php"; ?>
    <script src ="js/fetchProgress.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {   

// Initialize data variables
let bcaId = "<?php echo($bcaId); ?>";
let bcaName = "<?php echo($bcaName); ?>";
let auditNumber = "<?php echo($auditNumber); ?>";
let formProgress = 5;
const nextBtn = document.getElementById('nextButton');

// Go to next page function
function goToNextPage() {
    window.location.href = '/bcaudit/transaction-verification.php';
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
                url: 'codes/fetchData/fetch_compliance_verification_saved_data.php',
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
        url: 'codes/insert_compliance_verification_form.php',
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
        url: 'codes/update_compliance_verification_form.php',
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
    $('input[name="bcPointPlace"][value="' + data.bc_point_place + '"]').prop('checked', true);
    $('#bcPointPlaceRemarks').val(data.bc_point_place_remarks);

    $('input[name="bcPointClean"][value="' + data.bc_point_clean + '"]').prop('checked', true);
    $('#bcPointCleanRemarks').val(data.bc_point_clean_remarks);

    $('input[name="postersDisplayed"][value="' + data.posters_displayed + '"]').prop('checked', true);
    $('input[name="outdatedPosters"][value="' + data.outdated_posters + '"]').prop('checked', true);
    $('#postersRemarks').val(data.posters_remarks);

    $('input[name="customerAlertDosDonts"][value="' + data.customer_alert_dos_donts + '"]').prop('checked', true);
    $('#customerAlertDosDontsRemarks').val(data.customer_alert_dos_donts_remarks);

    $('input[name="verificationCertificate"][value="' + data.verification_certificate + '"]').prop('checked', true);
    $('#verificationCertificateRemarks').val(data.verification_certificate_remarks);

    $('input[name="unauthorizedIndividuals"][value="' + data.unauthorized_individuals + '"]').prop('checked', true);
    $('#unauthorizedIndividualsRemarks').val(data.unauthorized_individuals_remarks);

    $('input[name="idCardUsage"][value="' + data.id_card_usage + '"]').prop('checked', true);
    $('#idCardUsageRemarks').val(data.id_card_usage_remarks);

    $('input[name="cloneFingerprint"][value="' + data.clone_fingerprint + '"]').prop('checked', true);
    $('#cloneFingerprintRemarks').val(data.clone_fingerprint_remarks);

    $('input[name="manualReceipts"][value="' + data.manual_receipts + '"]').prop('checked', true);
    $('input[name="systemGeneratedReceipts"][value="' + data.system_generated_receipts + '"]').prop('checked', true);
    $('input[name="customerPassbooks"][value="' + data.customer_passbooks + '"]').prop('checked', true);
    $('input[name="transactionSlips"][value="' + data.transaction_slips + '"]').prop('checked', true);
    $('#manualReceiptsRemarks').val(data.manual_receipts_remarks);

    $('input[name="nonRelevantApplications"][value="' + data.non_relevant_applications + '"]').prop('checked', true);
    $('#nonRelevantApplicationsRemarks').val(data.non_relevant_applications_remarks);

    $('input[name="blockedAccounts"][value="' + data.blocked_accounts + '"]').prop('checked', true);
    $('#blockedAccountsRemarks').val(data.blocked_accounts_remarks);
}

    getProgress();

    });
    </script>