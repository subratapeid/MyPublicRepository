<?php 
    $pageTitle="Register Maintenance Audit Form";
    include "include/navbar.php";
    include "codes/verify_audit_session.php"; 
?>
    <div class="formContainer mx-auto">
        <div class="container pl-2 pr-2">
            <h2 class="text-center mb-3">Register Maintenance</h2>
            <form id="equipmentForm" method="POST" enctype="multipart/form-data">
                <!-- Register form start -->
    <div class="form-group dark">
    <label for="transactionRegister">1. Transaction Register: Records details of all financial transactions conducted.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="transactionRegister" id="transactionRegisterYes" value="Yes">
            <label class="form-check-label" for="transactionRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="transactionRegister" id="transactionRegisterNo" value="No">
            <label class="form-check-label" for="transactionRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="transactionRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="transactionRegisterRemarks" id="transactionRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="accountOpeningRegister">2. Account Opening Register: Logs information about new accounts opened.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="accountOpeningRegister" id="accountOpeningRegisterYes" value="Yes">
            <label class="form-check-label" for="accountOpeningRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="accountOpeningRegister" id="accountOpeningRegisterNo" value="No">
            <label class="form-check-label" for="accountOpeningRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="accountOpeningRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="accountOpeningRegisterRemarks" id="accountOpeningRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="complaintRegister">3. Complaint Register: Captures customer complaints and their resolution status.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="complaintRegister" id="complaintRegisterYes" value="Yes">
            <label class="form-check-label" for="complaintRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="complaintRegister" id="complaintRegisterNo" value="No">
            <label class="form-check-label" for="complaintRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="complaintRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="complaintRegisterRemarks" id="complaintRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="visitorRegister">4. Visitor Register: Records information about visitors to the BCA point.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="visitorRegister" id="visitorRegisterYes" value="Yes">
            <label class="form-check-label" for="visitorRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="visitorRegister" id="visitorRegisterNo" value="No">
            <label class="form-check-label" for="visitorRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="visitorRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="visitorRegisterRemarks" id="visitorRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="cashRegister">5. Cash Register: Keeps track of cash inflows and outflows.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="cashRegister" id="cashRegisterYes" value="Yes">
            <label class="form-check-label" for="cashRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="cashRegister" id="cashRegisterNo" value="No">
            <label class="form-check-label" for="cashRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="cashRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="cashRegisterRemarks" id="cashRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="auditRegister">6. Audit Register: Documents audit visits and findings.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="auditRegister" id="auditRegisterYes" value="Yes">
            <label class="form-check-label" for="auditRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="auditRegister" id="auditRegisterNo" value="No">
            <label class="form-check-label" for="auditRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="auditRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="auditRegisterRemarks" id="auditRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="serviceRegister">7. Service Register: Notes various services provided to customers.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="serviceRegister" id="serviceRegisterYes" value="Yes">
            <label class="form-check-label" for="serviceRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="serviceRegister" id="serviceRegisterNo" value="No">
            <label class="form-check-label" for="serviceRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="serviceRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="serviceRegisterRemarks" id="serviceRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="inventoryRegister">8. Inventory Register: Lists the inventory of supplies and equipment.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="inventoryRegister" id="inventoryRegisterYes" value="Yes">
            <label class="form-check-label" for="inventoryRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="inventoryRegister" id="inventoryRegisterNo" value="No">
            <label class="form-check-label" for="inventoryRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="inventoryRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="inventoryRegisterRemarks" id="inventoryRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="loanRegister">9. Loan Register: Records details of loans disbursed and repayments made.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="loanRegister" id="loanRegisterYes" value="Yes">
            <label class="form-check-label" for="loanRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="loanRegister" id="loanRegisterNo" value="No">
            <label class="form-check-label" for="loanRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="loanRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="loanRegisterRemarks" id="loanRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>


<div class="form-group dark">
    <label for="customerFeedbackRegister">10. Customer Feedback Register: Captures customer feedback and suggestions.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="customerFeedbackRegister" id="customerFeedbackRegisterYes" value="Yes">
            <label class="form-check-label" for="customerFeedbackRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="customerFeedbackRegister" id="customerFeedbackRegisterNo" value="No">
            <label class="form-check-label" for="customerFeedbackRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="customerFeedbackRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="customerFeedbackRegisterRemarks" id="customerFeedbackRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>


<div class="form-group dark">
                <label for="complianceRegister">11. Compliance Register: Tracks compliance-related activities and checks.</label>
                <div>
                    <div class="form-check form-check-inline ml-4">
                        <input class="form-check-input" type="radio" name="complianceRegister" id="complianceRegisterYes" value="Yes">
                        <label class="form-check-label" for="targetYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline ml-5">
                        <input class="form-check-input" type="radio" name="complianceRegister" id="complianceRegisterNo" value="No">
                        <label class="form-check-label" for="targetNo">No</label>
                    </div>
                </div>
                <!-- Remarks -->
                <div class="form-group dark">
                    <label for="complianceRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
                    <textarea class="form-control" name="complianceRegisterRemarks" id="complianceRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
                </div>
            </div>


<div class="form-group dark">
    <label for="staffAttendanceRegister">12. Staff Attendance Register: Records attendance and leave details of staff members.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="staffAttendanceRegister" id="staffAttendanceRegisterYes" value="Yes">
            <label class="form-check-label" for="staffAttendanceRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="staffAttendanceRegister" id="staffAttendanceRegisterNo" value="No">
            <label class="form-check-label" for="staffAttendanceRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="staffAttendanceRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="staffAttendanceRegisterRemarks" id="staffAttendanceRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="trainingRegister">13. Training Register: Tracks training sessions attended by the BCA and staff.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="trainingRegister" id="trainingRegisterYes" value="Yes">
            <label class="form-check-label" for="trainingRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="trainingRegister" id="trainingRegisterNo" value="No">
            <label class="form-check-label" for="trainingRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="trainingRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="trainingRegisterRemarks" id="trainingRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="shgRegister">14. SHG (Self Help Group) Register: Maintains details of SHG customers and their transactions.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="shgRegister" id="shgRegisterYes" value="Yes">
            <label class="form-check-label" for="shgRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="shgRegister" id="shgRegisterNo" value="No">
            <label class="form-check-label" for="shgRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="shgRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="shgRegisterRemarks" id="shgRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="settlementRegister">15. Settlement Register: Documents settlement of daily transactions and balances.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="settlementRegister" id="settlementRegisterYes" value="Yes">
            <label class="form-check-label" for="settlementRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="settlementRegister" id="settlementRegisterNo" value="No">
            <label class="form-check-label" for="settlementRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="settlementRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="settlementRegisterRemarks" id="settlementRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="targetAchievementRegister">16. Target Achievement Register: Logs targets set and achieved by the BCA.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="targetAchievementRegister" id="targetAchievementRegisterYes" value="Yes">
            <label class="form-check-label" for="targetAchievementRegisterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="targetAchievementRegister" id="targetAchievementRegisterNo" value="No">
            <label class="form-check-label" for="targetAchievementRegisterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="targetAchievementRegisterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="targetAchievementRegisterRemarks" id="targetAchievementRegisterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="entriesAccuracy">17. The entries are precise and correct.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="entriesAccuracy" id="entriesAccuracyYes" value="Yes">
            <label class="form-check-label" for="entriesAccuracyYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="entriesAccuracy" id="entriesAccuracyNo" value="No">
            <label class="form-check-label" for="entriesAccuracyNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="entriesAccuracyRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="entriesAccuracyRemarks" id="entriesAccuracyRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="transactionEntriesReliability">18. Transaction registers contain varying and unreliable entries.</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="transactionEntriesReliability" id="transactionEntriesReliabilityYes" value="Yes">
            <label class="form-check-label" for="transactionEntriesReliabilityYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="transactionEntriesReliability" id="transactionEntriesReliabilityNo" value="No">
            <label class="form-check-label" for="transactionEntriesReliabilityNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="transactionEntriesReliabilityRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="transactionEntriesReliabilityRemarks" id="transactionEntriesReliabilityRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="txnCountMatching">19. Is it matching Txns count in the registers entry / Settlement account entry?</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="txnCountMatching" id="txnCountMatchingYes" value="Yes">
            <label class="form-check-label" for="txnCountMatchingYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="txnCountMatching" id="txnCountMatchingNo" value="No">
            <label class="form-check-label" for="txnCountMatchingNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="txnCountMatchingRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="txnCountMatchingRemarks" id="txnCountMatchingRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

    <!-- Additional Remarks Regarding Registers -->
<div class="form-group dark">
    <label for="additionalRemarksRegisters">20. Additional Remarks Regarding Registers:</label>
    <textarea class="form-control" name="additionalRemarksRegisters" id="additionalRemarksRegisters" rows="4" placeholder="Enter your remarks"></textarea>
</div>

 <!-- <div class="form-group dark">
        <div>
            <label for="registersPhotoPreview">20. Capture registers Photo (optional)</label>
        </div>
        <div>
            <img id="registersPhotoPreview" class="mt-2 mb-3 img-thumbnail" src="default-image.png" alt="Image preview">
        </div>
        <div>
            <a class="btn btn-primary mr-2" id="openCaptureModalBtnRegister" data-toggle="modal" data-target="#photoCaptureModal">Capture Registers Photo</a>
        </div>
        <input type="hidden" id="registerPhotoBase64" name="registerPhoto" required>
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
                <!--    <a href="compliance-verification.php" class="bg-danger mr-5 pt-2 pb-2 pl-3 pr-3" id="temp">Next</a>-->
                <!--<button type="button" class="btn btn-info ml-5 pt-2 pb-2 pl-3 pr-3" id="nextButton" disabled>Next</button>-->


                </div>
            </form>
            </div>
        </div>
    </div>


    <!--  Modal for Photo Capture -->
<div class="modal fade" id="photoCaptureModal" tabindex="-1" role="dialog" aria-labelledby="photoCaptureModalLabel" aria-hidden="true">
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
                        <!-- This is where the permission message will appear -->
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
</div>

    <?php include "include/footer.php"; ?>
    <script src ="js/fetchProgress.js"></script>


<script>
document.addEventListener('DOMContentLoaded', function() {   
// Initialize data variables
let bcaId = "<?php echo($bcaId); ?>";
let bcaName = "<?php echo($bcaName); ?>";
let auditNumber = "<?php echo($auditNumber); ?>";
let formProgress = 4;
const nextBtn = document.getElementById('nextButton');

// Go to next page function
function goToNextPage() {
    window.location.href = '/bcaudit/compliance-verification.php';
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
                url: 'codes/fetchData/fetch_register_maintenance_saved_data.php',
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
        url: 'codes/insert_register_maintenance_form.php',
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
            }
        },
        error: function(xhr, status, error) {
            alert('Error: ' + error);
            hideOverlay();
        }
    });
}

// Update form data function
function updateForm(formData) {
    showOverlay('--Updating Data--');
    $('#saveButton').prop('disabled', true);
    $.ajax({
        url: 'codes/update_register_maintenance_form.php',
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
    $('input[name="transactionRegister"][value="' + data.transaction_register + '"]').prop('checked', true);
    $('#transactionRegisterRemarks').val(data.transaction_register_remarks);

    $('input[name="accountOpeningRegister"][value="' + data.account_opening_register + '"]').prop('checked', true);
    $('#accountOpeningRegisterRemarks').val(data.account_opening_register_remarks);

    $('input[name="complaintRegister"][value="' + data.complaint_register + '"]').prop('checked', true);
    $('#complaintRegisterRemarks').val(data.complaint_register_remarks);

    $('input[name="visitorRegister"][value="' + data.visitor_register + '"]').prop('checked', true);
    $('#visitorRegisterRemarks').val(data.visitor_register_remarks);

    $('input[name="cashRegister"][value="' + data.cash_register + '"]').prop('checked', true);
    $('#cashRegisterRemarks').val(data.cash_register_remarks);

    $('input[name="auditRegister"][value="' + data.audit_register + '"]').prop('checked', true);
    $('#auditRegisterRemarks').val(data.audit_register_remarks);

    $('input[name="serviceRegister"][value="' + data.service_register + '"]').prop('checked', true);
    $('#serviceRegisterRemarks').val(data.service_register_remarks);

    $('input[name="inventoryRegister"][value="' + data.inventory_register + '"]').prop('checked', true);
    $('#inventoryRegisterRemarks').val(data.inventory_register_remarks);

    $('input[name="loanRegister"][value="' + data.loan_register + '"]').prop('checked', true);
    $('#loanRegisterRemarks').val(data.loan_register_remarks);

    $('input[name="customerFeedbackRegister"][value="' + data.customer_feedback_register + '"]').prop('checked', true);
    $('#customerFeedbackRegisterRemarks').val(data.customer_feedback_register_remarks);

    $('input[name="complianceRegister"][value="' + data.compliance_register + '"]').prop('checked', true);
    $('#complianceRegisterRemarks').val(data.compliance_register_remarks);

    $('input[name="staffAttendanceRegister"][value="' + data.staff_attendance_register + '"]').prop('checked', true);
    $('#staffAttendanceRegisterRemarks').val(data.staff_attendance_register_remarks);

    $('input[name="trainingRegister"][value="' + data.training_register + '"]').prop('checked', true);
    $('#trainingRegisterRemarks').val(data.training_register_remarks);

    $('input[name="shgRegister"][value="' + data.shg_register + '"]').prop('checked', true);
    $('#shgRegisterRemarks').val(data.shg_register_remarks);

    $('input[name="settlementRegister"][value="' + data.settlement_register + '"]').prop('checked', true);
    $('#settlementRegisterRemarks').val(data.settlement_register_remarks);

    $('input[name="targetAchievementRegister"][value="' + data.target_achievement_register + '"]').prop('checked', true);
    $('#targetAchievementRegisterRemarks').val(data.target_achievement_register_remarks);

    $('input[name="entriesAccuracy"][value="' + data.entries_accuracy + '"]').prop('checked', true);
    $('#entriesAccuracyRemarks').val(data.entries_accuracy_remarks);

    $('input[name="transactionEntriesReliability"][value="' + data.transaction_entries_reliability + '"]').prop('checked', true);
    $('#transactionEntriesReliabilityRemarks').val(data.transaction_entries_reliability_remarks);

    $('input[name="txnCountMatching"][value="' + data.txn_count_matching + '"]').prop('checked', true);
    $('#txnCountMatchingRemarks').val(data.txn_count_matching_remarks);

    $('#additionalRemarksRegisters').val(data.additional_remarks_registers);
}

getProgress();

    });
    </script>