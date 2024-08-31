<?php 
    $pageTitle="Operational Details Audit Form";
    include "include/navbar.php";
    include "codes/verify_audit_session.php"; 
?>
<div class="formContainer mx-auto">
  <div class="container pl-2 pr-2">
    <h2 class="text-center mb-3">Operational Details</h2>
    <form id="operationalForm" action="process_operational_form.php" method="post" enctype="multipart/form-data">

    <div class="form-group dark">
    <label for="abeName">1. ABE Name</label>
    <input type="text" class="form-control" id="abeName" name="abeName" placeholder="Enter ABE Name" required>
</div>
<div class="form-group dark">
    <label for="abmName">2. ABM Name</label>
    <input type="text" class="form-control" id="abmName" name="abmName" placeholder="Enter ABM Name" required>
</div>
<div class="form-group dark">
    <label for="rmName">3. RM Name</label>
    <input type="text" class="form-control" id="rmName" name="rmName" placeholder="Enter RM Name" required>
</div>
<div class="form-group dark">
    <label for="zmName">4. ZM Name</label>
    <input type="text" class="form-control" id="zmName" name="zmName" placeholder="Enter ZM Name" required>
</div>

<div class="form-group dark">
    <label for="operatingHours">5. What are the Operating Hours of BCA Point?</label>
    <textarea class="form-control" name="operatingHours" rows="3" id="operatingHours" placeholder="Enter operating hours" required></textarea>
</div>
<div class="form-group dark">
    <label for="operatingLocation">6. BCA operated from the designated BCA Point?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="custom-radio form-check-input" type="radio" name="operatingLocation" id="operatingLocationYes" value="Yes" required>
            <label class="custom-label form-check-label" for="operatingLocationYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="custom-radio form-check-input" type="radio" name="operatingLocation" id="operatingLocationNo" value="No" required>
            <label class="custom-label form-check-label" for="operatingLocationNo">No</label>
        </div>
    </div>
    <div class="form-group dark">
        <label for="operatingLocationRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="operatingLocationRemarks" id="operatingLocationRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>
<div class="form-group dark">
    <label for="trainingGiven">7. Is any Training given by the ABE on Opportunity chart, commission, SSS camps, and other training to BCA during the time of visit?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="trainingGiven" id="trainingGivenYes" value="Yes" required>
            <label class="form-check-label" for="trainingGivenYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="trainingGiven" id="trainingGivenNo" value="No" required>
            <label class="form-check-label" for="trainingGivenNo">No</label>
        </div>
    </div>
    <div class="form-group dark">
        <label for="trainingRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="trainingRemarks" id="trainingRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="businessExplore">8. Business Explore (IBKART, IRCTC, near shop, Acquiring new location):</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="businessExplore" id="businessExploreYes" value="Yes" required>
            <label class="form-check-label" for="businessExploreYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="businessExplore" id="businessExploreNo" value="No" required>
            <label class="form-check-label" for="businessExploreNo">No</label>
        </div>
    </div>
    <div class="form-group dark">
        <label for="businessExploreRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="businessExploreRemarks" id="businessExploreRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <h6 id="fieldHeading">9. Support & Target Set By ABE on BCA Activities:</h6>
    <label for="targetSet"><span class="mdi mdi-hand-pointing-right"></span> Targets Were set and communicated.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="targetSet" id="targetSetYes" value="Yes" required>
            <label class="form-check-label" for="targetSetYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="targetSet" id="targetSetNo" value="No" required>
            <label class="form-check-label" for="targetSetNo">No</label>
        </div>
    </div>

    <label for="targetClear"><span class="mdi mdi-hand-pointing-right"></span> Targets are clear to the BCA.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="targetClear" id="targetClearYes" value="Yes" required>
            <label class="form-check-label" for="targetClearYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="targetClear" id="targetClearNo" value="No" required>
            <label class="form-check-label" for="targetClearNo">No</label>
        </div>
    </div>

    <label for="targetDocumented"><span class="mdi mdi-hand-pointing-right"></span> Are the visits by the ABE documented and recorded?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="targetDocumented" id="targetDocumentedYes" value="Yes" required>
            <label class="form-check-label" for="targetDocumentedYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="targetDocumented" id="targetDocumentedNo" value="No" required>
            <label class="form-check-label" for="targetDocumentedNo">No</label>
        </div>
    </div>

    <label for="abeSupport"><span class="mdi mdi-hand-pointing-right"></span> ABE Support for all BCA operational activities.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="abeSupport" id="abeSupportYes" value="Yes" required>
            <label class="form-check-label" for="abeSupportYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="abeSupport" id="abeSupportNo" value="No" required>
            <label class="form-check-label" for="abeSupportNo">No</label>
        </div>
    </div>

    <label for="bankSupport"><span class="mdi mdi-hand-pointing-right"></span> Sufficient support from the bank or ABE for handling transactions.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="bankSupport" id="bankSupportYes" value="Yes" required>
            <label class="form-check-label" for="bankSupportYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="bankSupport" id="bankSupportNo" value="No" required>
            <label class="form-check-label" for="bankSupportNo">No</label>
        </div>
    </div>
    <div class="form-group dark">
        <label for="targetRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="targetRemarks" id="targetRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>
<div class="form-group dark">
    <h6 class="fieldHeading">10. On-boarding Payment-operation</h6>
    <label for="onboardingFeePaid"><span class="mdi mdi-hand-pointing-right"></span> A fee was paid during on-boarding.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="onboardingFeePaid" id="onboardingFeePaidYes" value="Yes" required>
            <label class="form-check-label" for="onboardingFeePaidYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="onboardingFeePaid" id="onboardingFeePaidNo" value="No" required>
            <label class="form-check-label" for="onboardingFeePaidNo">No</label>
        </div>
    </div>

    <label for="feeUnclear"><span class="mdi mdi-hand-pointing-right"></span> Fee was unclearly explained, undocumented, and no receipt was issued.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="feeUnclear" id="feeUnclearYes" value="Yes" required>
            <label class="form-check-label" for="feeUnclearYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="feeUnclear" id="feeUnclearNo" value="No" required>
            <label class="form-check-label" for="feeUnclearNo">No</label>
        </div>
    </div>

    <label for="feesDocumented"><span class="mdi mdi-hand-pointing-right"></span> All the on-boarding fees are documented and justified by the company.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="feesDocumented" id="feesDocumentedYes" value="Yes" required>
            <label class="form-check-label" for="feesDocumentedYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="feesDocumented" id="feesDocumentedNo" value="No" required>
            <label class="form-check-label" for="feesDocumentedNo">No</label>
        </div>
    </div>
    <div class="form-group dark">
        <label for="transactionModule"><span class="mdi mdi-hand-pointing-right"></span> How are fees payments made?</label>
        <select class="form-control" name="transactionModule" id="transactionModule" required>
            <option value="" selected disabled>--Select payment mode--</option>
            <option value="Cash">Cash</option>
            <option value="Cheque">Cheque</option>
            <option value="Direct Deposit">Direct Deposit</option>
            <option value="Card Payment">Card Payment</option>
            <option value="QR Code">QR Code</option>
            <option value="Digital Money">Digital Money</option>
        </select>
    </div>
    <div class="form-group dark">
        <label for="onboardingRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="onboardingRemarks" id="onboardingRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="rmVisit">11. RM visited twice in the last month?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="rmVisit" id="rmVisitYes" value="Yes" required>
            <label class="form-check-label" for="rmVisitYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="rmVisit" id="rmVisitNo" value="No" required>
            <label class="form-check-label" for="rmVisitNo">No</label>
        </div>
    </div>
    <div class="form-group dark">
        <label for="rmVisitRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="rmVisitRemarks" id="rmVisitRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="abmVisit">12. ABM visited once in the last month?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="abmVisit" id="abmVisitYes" value="Yes" required>
            <label class="form-check-label" for="abmVisitYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="abmVisit" id="abmVisitNo" value="No" required>
            <label class="form-check-label" for="abmVisitNo">No</label>
        </div>
    </div>
    <div class="form-group dark">
        <label for="abmVisitRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="abmVisitRemarks" id="abmVisitRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="abeVisit">13. ABE visited three times in the last month?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="abeVisit" id="abeVisitYes" value="Yes" required>
            <label class="form-check-label" for="abeVisitYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="abeVisit" id="abeVisitNo" value="No" required>
            <label class="form-check-label" for="abeVisitNo">No</label>
        </div>
    </div>
    <div class="form-group dark">
        <label for="abeVisitRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="abeVisitRemarks" id="abeVisitRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="bankOfficialVisit">14. Bank officials visited the BCA point?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="bankOfficialVisit" id="bankOfficialVisitYes" value="Yes" required>
            <label class="form-check-label" for="bankOfficialVisitYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="bankOfficialVisit" id="bankOfficialVisitNo" value="No" required>
            <label class="form-check-label" for="bankOfficialVisitNo">No</label>
        </div>
    </div>
    <div class="form-group dark">
        <label for="bankOfficialVisitRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="bankOfficialVisitRemarks" id="bankOfficialVisitRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="bcVisit">15. BC makes frequent visits to the bank?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="bcVisit" id="bcVisitYes" value="Yes" required>
            <label class="form-check-label" for="bcVisitYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="bcVisit" id="bcVisitNo" value="No" required>
            <label class="form-check-label" for="bcVisitNo">No</label>
        </div>
    </div>
    <div class="form-group dark">
        <label for="bcVisitRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="bcVisitRemarks" id="bcVisitRemarks" rows="3" placeholder="Enter your remarks"></textarea>
    </div>
</div>


<!-- form buttons -->
            <div class="d-flex pt-3 mt-5 mb-4 justify-content-between">
                <button type="button" class="btn btn-secondary btn-sm pt-2 pb-2 pl-3 pr-3" id="backButton">Previous</button>
                <!--<a href="operational-details.php" class="bg-danger mr-5 pt-2 pb-2 pl-3 pr-3" id="temp">Next</a>-->
                <button type="submit" class="btn btn-danger btn-sm pt-2 pb-2 pl-3 pr-3" id="saveButton"><span class="spinner-border spinner-border-sm d-none" id="submitBtnSpinner" role="status" aria-hidden="true"></span> Save & Next</button>
                <button type="button" class="btn btn-info btn-sm pt-2 pb-2 pl-3 pr-3" id="nextButton" disabled>Next</button>
                
            <!-- Submit button -->
            <!--<div class="d-flex pt-3 mt-5 mb-4 justify-content-center">-->
            <!--    <button type="button" class="btn btn-secondary mr-5 pt-2 pb-2 pl-3 pr-3" id="backButton">Previous</button>-->
            <!--    <a href="hardware-infrastructure.php" class="bg-danger mr-5 pt-2 pb-2 pl-3 pr-3" id="temp">Next</a>-->

            <!--    <button type="submit" class="btn btn-danger ml-5 pt-2 pb-2 pl-3 pr-3" id="savaButton">Save & Next</button>-->
            <!--    <button type="button" class="btn btn-info ml-5 pt-2 pb-2 pl-3 pr-3" id="nextButton" disabled>Next</button>-->
            <!--</div>-->
    </form>
  </div>
</div>

<?php include "include/footer.php"; ?>
<script src ="js/fetchProgress.js"></script>

<script>
$(document).ready(function() {
// initilize data variable
        let bcaId = "<?php echo($bcaId); ?>";
        let bcaName = "<?php echo($bcaName); ?>";
        let auditNumber = "<?php echo($auditNumber); ?>";
        let formProgress = 2;
        const nextBtn = document.getElementById('nextButton');
        
        // go to next page function
        function goToNextPage(){
            window.location.href = '/bcaudit/hardware-infrastructure.php';
        };

        nextBtn.addEventListener('click', goToNextPage);

const getProgress = async () => {
    try {
        let progress = await fetchProgress(bcaId, auditNumber);
        console.log('Progress:', progress);
        // Use the progress value here it is ended below

    // Form Part Start
        if (progress >= formProgress) {
            console.log('fetching inserted data');
            $('#nextButton').prop('disabled', false);
        //fetch already saved form data start
            $.ajax({
                url: 'codes/fetchData/fetch_operational_saved_data.php',
                method: 'GET',
                // data: { bcaId: bcaId },
                success: function(response) {
                    if (response.success) {
                        var data = response.data;
                        populateData(data);
                        formOldData = new FormData(document.getElementById('operationalForm'));
                        // console.log(formOldData);
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
        //fetch already saved form data end

        } else {
            console.log('fetching pre feeded data');
            $('#nextButton').prop('disabled', true);
            $('#saveButton').css('display', 'inline-block');
            // $('#bcaId').val(bcaId);
            // $('#bcaFullName').val(bcaName);
            $('#bcaFullName').prop('disabled', false);
        // get some pre details from bcadetails table
            $.ajax({
                url: 'codes/fetchData/fetch_bca_preFeeded_data.php',
                method: 'GET',
                // data: { bcaId: bcaId },
                success: function(response) {
                    if (response.success) {
                        var data = response.data;
                        // console.log(data);
                        populateData(data);
                        formOldData = new FormData(document.getElementById('operationalForm'));
                        // console.log(formOldData);
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
        }

// convert old form data and current form data into same format before compare
    function formDataToObject(formData) {
    var object = {};
    formData.forEach((value, key) => {
        if (value instanceof File && value.name) {
            // For file inputs, store file name and size for comparison
            object[key] = { name: value.name, size: value.size };
        } else {
            object[key] = value;
        }
    });
    return object;
}

    // this function will execute after click save/update button
        $('#operationalForm').on('submit', function(event) {
            event.preventDefault();
            var form = $(this);
            // var button = form.find('button[type="submit"]');
            var formData = new FormData(this);
            var formElement = document.getElementById('operationalForm');
            var formData = new FormData(formElement);

        //     if (auditNumber == ""){
        //         if (!bcaPhotoBase64.value) {
        //     alert('Please capture and confirm the BCA photo.');
        //     return;
        //     }
        // if (!bcPointPhotoBase64.value) {
        //     alert('Please capture and confirm the BC Point photo.');
        //     return;
        //     }
        //     if (!bcSignaturePhotoBase64.value) {
        //     alert('Please Take BCA Signature.');
        //     return;
        //     }
        // }
            if (progress >= formProgress) {
                console.log(progress);
        // Use formOldData for comparison or other operations
        var oldDataObject = formDataToObject(formOldData);
        console.log(oldDataObject);
        var newDataObject = formDataToObject(formData);
        console.log(newDataObject);
            }

            if (progress < formProgress) {
                insertData(formData); // Insert new form data
            } else if (JSON.stringify(oldDataObject) !== JSON.stringify(newDataObject)) {
                updateForm(formData); // Update existing form data
            $('#saveButton').text("Update & Next");
            } else {
            alert("No changes detected. Go to next");
            goToNextPage();
                console.log("No changes detected.");
            }
        
    });

// progress fetch ending part
} catch (error) {
        console.error('Error:', error);
    }
}  // progress fetch ending part
  

// insert form data function
function insertData(formData) {

    showOverlay('--Inserting Data--');
    console.log('inserting Data');
    // startSpin();
    $('#saveButton').prop('disabled', true);
            $.ajax({
                url: 'codes/insert_operationalDetails_form.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    hideOverlay();
                    $('#saveButton').prop('disabled', false);
                    // stopSpin();
                        if (response.status=='success') {
                            alert(response.message);
                            goToNextPage();
                        } else {
                            alert(response.error);
                            console.log('Error: ' + response.error);

                            // form.find('input, textarea, select').prop('disabled', false);
                        }
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                    console.log('Error: ' + error);
                    hideOverlay();
                    // stopSpin();
                }
            });
        }
        // Insert form  data end

        // Update form function
        function updateForm(formData) {
            console.log('updating data');
            showOverlay('--Updating Data--');
            // startSpin();
            $('#saveButton').prop('disabled', true);
            $.ajax({
                url: 'codes/update_operationalDetails_form.php', // Replace with your backend script URL
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    hideOverlay();
                    // stopSpin();
                    $('#saveButton').prop('disabled', false);
                    if (response.status == 'success') {
                        alert(response.message);
                        goToNextPage();
                    } else {
                        alert('Error: ' + response.error);
                        console.log('Error: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                    console.log('Error: ' + error);
                    hideOverlay();
                    // stopSpin();
                }
            });
        }
        // Update form end
    
// populateData(datas);
function populateData(data) {
    $('#abeName').val(data.abe_name);
    $('#abmName').val(data.abm_name);
    $('#rmName').val(data.rm_name);
    $('#zmName').val(data.zm_name);
    $('#operatingHours').val(data.operating_hours);

    $('input[name="operatingLocation"][value="' + data.designated_location + '"]').prop('checked', true);
    $('#operatingLocationRemarks').val(data.designated_location_remarks);

    $('input[name="trainingGiven"][value="' + data.training_given + '"]').prop('checked', true);
    $('#trainingRemarks').val(data.training_remarks);

    $('input[name="businessExplore"][value="' + data.business_explore + '"]').prop('checked', true);
    $('#businessExploreRemarks').val(data.business_explore_remarks);

    $('input[name="targetSet"][value="' + data.target_set + '"]').prop('checked', true);
    $('input[name="targetClear"][value="' + data.target_clear + '"]').prop('checked', true);
    $('input[name="targetDocumented"][value="' + data.target_documented + '"]').prop('checked', true);
    $('input[name="abeSupport"][value="' + data.abe_support + '"]').prop('checked', true);
    $('input[name="bankSupport"][value="' + data.bank_support + '"]').prop('checked', true);
    $('#targetRemarks').val(data.target_remarks);

    $('input[name="onboardingFeePaid"][value="' + data.onboarding_fee_paid + '"]').prop('checked', true);
    $('input[name="feeUnclear"][value="' + data.fee_unclear + '"]').prop('checked', true);
    $('input[name="feesDocumented"][value="' + data.fees_documented + '"]').prop('checked', true);
    $('#transactionModule').val(data.fee_payment_mode);
    $('#onboardingRemarks').val(data.onboarding_remarks);

    $('input[name="rmVisit"][value="' + data.rm_visit + '"]').prop('checked', true);
    $('#rmVisitRemarks').val(data.rm_visit_remarks);

    $('input[name="abmVisit"][value="' + data.abm_visit + '"]').prop('checked', true);
    $('#abmVisitRemarks').val(data.abm_visit_remarks);

    $('input[name="abeVisit"][value="' + data.abe_visit + '"]').prop('checked', true);
    $('#abeVisitRemarks').val(data.abe_visit_remarks);

    $('input[name="bankOfficialVisit"][value="' + data.bank_official_visit + '"]').prop('checked', true);
    $('#bankOfficialVisitRemarks').val(data.bank_official_visit_remarks);

    $('input[name="bcVisit"][value="' + data.bc_visit + '"]').prop('checked', true);
    $('#bcVisitRemarks').val(data.bc_visit_remarks);
}

getProgress();

});
    </script>