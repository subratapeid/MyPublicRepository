<?php 
    $pageTitle="Hardware & Infrastructure Audit Form";
    include "include/navbar.php";
    include "codes/verify_audit_session.php"; 
?>
    <div class="formContainer mx-auto">
        <div class="container pl-2 pr-2">
            <h2 class="text-center mb-3">Hardware & Infrastructure</h2>
            <form id="equipmentForm" method="POST" enctype="multipart/form-data">
                <!-- Available Equipment Check box list -->

                <div class="form-group dark">
    <label for="laptopDesktop">1. Laptop or Desktop Computer is Present:</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="laptopDesktop" id="laptopDesktopYes" value="Yes" required>
            <label class="form-check-label" for="laptopDesktopYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="laptopDesktop" id="laptopDesktopNo" value="No" required>
            <label class="form-check-label" for="laptopDesktopNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="laptopDesktopRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="laptopDesktopRemarks" id="laptopDesktopRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="printer">2. Printer device is Present:</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="printer" id="printerYes" value="Yes" required>
            <label class="form-check-label" for="printerYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="printer" id="printerNo" value="No" required>
            <label class="form-check-label" for="printerNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="printerRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="printerRemarks" id="printerRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="scanner">3. Scanner is Present:</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="scanner" id="scannerYes" value="Yes" required>
            <label class="form-check-label" for="scannerYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="scanner" id="scannerNo" value="No" required>
            <label class="form-check-label" for="scannerNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="scannerRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="scannerRemarks" id="scannerRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="biometric">4. Biometric Device (Fingerprint Scanner) is Present:</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="biometric" id="biometricYes" value="Yes" required>
            <label class="form-check-label" for="biometricYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="biometric" id="biometricNo" value="No" required>
            <label class="form-check-label" for="biometricNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="biometricRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="biometricRemarks" id="biometricRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="posTerminal">5. POS (Point of Sale) Terminal is Present:</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="posTerminal" id="posTerminalYes" value="Yes" required>
            <label class="form-check-label" for="posTerminalYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="posTerminal" id="posTerminalNo" value="No" required>
            <label class="form-check-label" for="posTerminalNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="posTerminalRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="posTerminalRemarks" id="posTerminalRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="internetRouter">6. Internet Router/Modem is Present:</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="internetRouter" id="internetRouterYes" value="Yes" required>
            <label class="form-check-label" for="internetRouterYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="internetRouter" id="internetRouterNo" value="No" required>
            <label class="form-check-label" for="internetRouterNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="internetRouterRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="internetRouterRemarks" id="internetRouterRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="ups">7. UPS (Uninterruptible Power Supply) is Present:</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="ups" id="upsYes" value="Yes" required>
            <label class="form-check-label" for="upsYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="ups" id="upsNo" value="No" required>
            <label class="form-check-label" for="upsNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="upsRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="upsRemarks" id="upsRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="cctvCamera">8. CCTV Camera is Present:</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="cctvCamera" id="cctvCameraYes" value="Yes" required>
            <label class="form-check-label" for="cctvCameraYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="cctvCamera" id="cctvCameraNo" value="No" required>
            <label class="form-check-label" for="cctvCameraNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="cctvCameraRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="cctvCameraRemarks" id="cctvCameraRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="mobileTablet">9. Mobile Phone or Tablet is Present:</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="mobileTablet" id="mobileTabletYes" value="Yes" required>
            <label class="form-check-label" for="mobileTabletYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="mobileTablet" id="mobileTabletNo" value="No" required>
            <label class="form-check-label" for="mobileTabletNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="mobileTabletRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="mobileTabletRemarks" id="mobileTabletRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="countingMachine">10. Cash Counting Machine is Present:</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="countingMachine" id="countingMachineYes" value="Yes" required>
            <label class="form-check-label" for="countingMachineYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="countingMachine" id="countingMachineNo" value="No" required>
            <label class="form-check-label" for="countingMachineNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="countingMachineRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="countingMachineRemarks" id="countingMachineRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="cardReader">11. Card Reader is Present:</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="cardReader" id="cardReaderYes" value="Yes" required>
            <label class="form-check-label" for="cardReaderYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="cardReader" id="cardReaderNo" value="No" required>
            <label class="form-check-label" for="cardReaderNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="cardReaderRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="cardReaderRemarks" id="cardReaderRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="externalHDD">12. External Hard Drive or USB Drive is Present (for backups):</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="externalHDD" id="externalHDDYes" value="Yes" required>
            <label class="form-check-label" for="externalHDDYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="externalHDD" id="externalHDDNo" value="No" required>
            <label class="form-check-label" for="externalHDDNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="externalHDDRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="externalHDDRemarks" id="externalHDDRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>



<div class="form-group dark">
    <label for="photocopier">13. Photocopier is Present:</label>
    <div>
        <div class="form-check form-check-inline ml-4">
            <input class="form-check-input" type="radio" name="photocopier" id="photocopierYes" value="Yes" required>
            <label class="form-check-label" for="photocopierYes">Yes</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input" type="radio" name="photocopier" id="photocopierNo" value="No" required>
            <label class="form-check-label" for="photocopierNo">No</label>
        </div>
    </div>
    <!-- Remarks -->
    <div class="form-group dark">
        <label for="photocopierRemarks"><span class="mdi mdi-hand-pointing-right"></span> Remarks (if any):</label>
        <textarea class="form-control" name="photocopierRemarks" id="photocopierRemarks" rows="2" placeholder="Enter your remarks"></textarea>
    </div>
</div>

<div class="form-group dark">
    <label for="otherDevices">14. Other Devices (if any):</label>
    <textarea class="form-control" name="otherDevices" id="otherDevices" rows="3" placeholder="Enter Device names"></textarea>
</div>

<div class="form-group dark">
    <label for="hardwarePhotoPreview">15. Capture Hardware's Photo:</label>
    <div>
        <img id="hardwarePhotoPreview" class="mt-2 mb-3 img-thumbnail" src="default-image.png" alt="Image preview">
    </div>
    <div>
        <a class="btn btn-primary mr-2" id="openCaptureModalBtnHardware" data-toggle="modal" data-target="#photoCaptureModal">Capture Hardware's Photo</a>
    </div>
    <input type="hidden" id="hardwarePhotoBase64" name="hardwarePhoto" >
</div>

                <!-- Remarks for equipment -->
                <div class="form-group dark">
                    <label for="remarks">16. Remarks for Hardwares (optional):</label>
                    <textarea class="form-control" name="remarks" id="remarks" rows="4" placeholder="Enter your remarks"></textarea>
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
                <!--<a href="register-maintenance.php" class="bg-danger mr-5 pt-2 pb-2 pl-3 pr-3" id="temp">Next</a>-->
                <!--    <button type="submit" class="btn btn-danger ml-5 pt-2 pb-2 pl-3 pr-3" id="saveButton">Save & Next</button>-->
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
$(document).ready(function() {

    const openCaptureModalBtnHardware = document.getElementById('openCaptureModalBtnHardware');
    const captureBtn = document.getElementById('captureBtn');
    const retakeBtn = document.getElementById('retakeBtn');
    const confirmBtn = document.getElementById('confirmBtn');
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');

    const capturedPhoto = document.getElementById('capturedPhoto');
    const hardwarePhotoPreview = document.getElementById('hardwarePhotoPreview');

    const hardwarePhotoBase64 = document.getElementById('hardwarePhotoBase64');

    const photoCaptureModalLabel = document.getElementById('photoCaptureModalLabel');
    let currentFacingMode = 'user';
    const toggleCameraBtn = document.getElementById('toggleCameraBtn');
    let stream;
    let currentPhotoType;


function startCamera() {
        toggleCameraBtn.classList.remove('d-none');
        const constraints = { video: { facingMode: currentFacingMode } };
        navigator.mediaDevices.getUserMedia(constraints)
            .then(function(mediaStream) {
                stream = mediaStream;
                video.srcObject = stream;
                video.play().then(() => {
                    console.log('Camera stream started successfully.');
                }).catch(function(err) {
                    console.error('Error playing video: ', err);
                });
            }).catch(function(err) {
                console.error('Error accessing media devices.', err);
                handlePermissionDenied();
            });
    }

    function handlePermissionDenied() {
        photoCaptureModalLabel.textContent = "Can't Access Camera & Location";
        captureBtn.disabled = true;
        retakeBtn.disabled = true;
        confirmBtn.disabled = true;
        toggleCameraBtn.disabled = true;
        const container = document.getElementById('permission-message');
        const video = document.getElementById('video');
        video.style.display = 'none';
        container.innerHTML = '';
        const gif = document.createElement('img');
        gif.src = 'assets/images/cameraAccess.gif';
        gif.alt = 'Permission Denied';
        container.appendChild(gif);
    }

    function stopCamera() {
        if (stream) {
            const tracks = stream.getTracks();
            tracks.forEach(function(track) {
                track.stop();
            });
            stream = null;
        }
    }

    openCaptureModalBtnHardware.addEventListener('click', function() {
        photoCaptureModalLabel.textContent = "Hardwares Photo";
        currentPhotoType = 'hardware';
        currentFacingMode = 'environment';
        $('#photoCaptureModal').modal('show');
        retakeBtn.classList.add('d-none');
        confirmBtn.classList.add('d-none');
        captureBtn.classList.remove('d-none');
        if (!stream) startCamera();
        video.style.display = 'block';
        capturedPhoto.classList.add('d-none');
        canvas.style.display = 'none';
    });

    $('#photoCaptureModal').on('hidden.bs.modal', function() {
        stopCamera();
    });

    toggleCameraBtn.addEventListener('click', function() {
        currentFacingMode = (currentFacingMode === 'user') ? 'environment' : 'user';
        if (stream) stream.getTracks().forEach(track => track.stop());
        startCamera();
    });

    captureBtn.addEventListener('click', function() {
        toggleCameraBtn.classList.add('d-none');
        captureBtn.classList.add('d-none');
        retakeBtn.classList.remove('d-none');
        confirmBtn.classList.remove('d-none');
        confirmBtn.disabled = true;

        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);

        fetch('https://worldtimeapi.org/api/timezone/Asia/Kolkata')
            .then(response => response.json())
            .then(data => {
                const kolkataTime = new Date(data.utc_datetime);
                const dateOptions = { year: 'numeric', month: 'short', day: 'numeric' };
                const timeOptions = { hour: 'numeric', minute: 'numeric', hour12: true };
                const formattedDate = kolkataTime.toLocaleDateString('en-IN', dateOptions);
                const formattedTime = kolkataTime.toLocaleTimeString('en-US', timeOptions);
                drawOnCanvas(formattedDate, formattedTime);
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                const defaultDate = new Date().toLocaleDateString('en-IN', dateOptions);
                const defaultTime = new Date().toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
                drawOnCanvas(defaultDate, defaultTime);
            });
    });

    function drawOnCanvas(dateString, timeString) {
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
        navigator.geolocation.getCurrentPosition(position => {
            const { latitude, longitude } = position.coords;
            const rectHeight = 50;
            context.globalAlpha = 0.5;
            context.fillStyle = 'black';
            context.fillRect(0, canvas.height - rectHeight, canvas.width, rectHeight);
            context.globalAlpha = 1.0;
            context.fillStyle = 'white';
            context.font = '16px Arial';
            context.fillText(`Date: ${dateString} Time: ${timeString}`, 10, canvas.height - rectHeight + 20);
            context.fillText(`Latitude: ${latitude.toFixed(6)}, Longitude: ${longitude.toFixed(6)}`, 10, canvas.height - rectHeight + 40);
            displayCapturedPhoto();
        });
    }

    function displayCapturedPhoto() {
        const photoDataUrl = canvas.toDataURL('image/png');
        video.style.display = 'none';
        capturedPhoto.src = photoDataUrl;
        capturedPhoto.classList.remove('d-none');
        canvas.classList.add('d-none');
        confirmBtn.disabled = false;
        
    }

    retakeBtn.addEventListener('click', function() {
        if (!stream) startCamera();
        video.style.display = 'block';
        capturedPhoto.classList.add('d-none');
        captureBtn.classList.remove('d-none');
        retakeBtn.classList.add('d-none');
        confirmBtn.classList.add('d-none');
        toggleCameraBtn.classList.remove('d-none');
    });

    confirmBtn.addEventListener('click', function() {
        const photoDataUrl = canvas.toDataURL('image/png');
        const photoDataBase64 = photoDataUrl.replace(/^data:image\/(png|jpg);base64,/, "");
        if (currentPhotoType === 'hardware') {
            hardwarePhotoBase64.value = photoDataBase64;
            hardwarePhotoPreview.src = photoDataUrl;
            hardwarePhotoPreview.classList.remove('d-none');
        } 
        $('#photoCaptureModal').modal('hide');
    });

    // Camera part end

// initilize data variable
        let bcaId = "<?php echo($bcaId); ?>";
        let bcaName = "<?php echo($bcaName); ?>";
        let auditNumber = "<?php echo($auditNumber); ?>";
        let formProgress = 3;
        const nextBtn = document.getElementById('nextButton');
        
        // go to next page function
        function goToNextPage(){
            window.location.href = '/bcaudit/register-maintenance.php';
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
                url: 'codes/fetchData/fetch_hardware-infrastructure_saved_data.php',
                method: 'GET',
                // data: { bcaId: bcaId },
                success: function(response) {
                    if (response.success) {
                        var data = response.data;
                        populateData(data);
                        formOldData = new FormData(document.getElementById('equipmentForm'));
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
        $('#equipmentForm').on('submit', function(event) {
            event.preventDefault();
            var form = $(this);
            // var button = form.find('button[type="submit"]');
            var formData = new FormData(this);
            var formElement = document.getElementById('equipmentForm');
            var formData = new FormData(formElement);

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
            $.ajax({
                url: 'codes/insert_hardware-infrastructure_form.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    hideOverlay();
                    
                    $('#saveButton').prop('disabled', false);
                    // stopSpin();
                        if (response.status =='success') {
                            alert(response.message);
                            goToNextPage();
                        } else {
                            alert(response.error);
                            console.log('Error: ' + response.error);
                        }
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                    console.log('Error: ' + error);
                    hideOverlay();
                }
            });
        }
        // Insert form  data end

        // Update form function
        function updateForm(formData) {
            console.log('updating data');
            showOverlay('--Updating Data--');
            $('#saveButton').prop('disabled', true);
            $.ajax({
                url: 'codes/update_hardware-infrastructure_form.php', // Replace with your backend script URL
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
                        console.log('Error: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                    console.log('Error: ' + error);
                    hideOverlay();
                }
            });
        }
        // Update form end

// populate the form data after fetching sart
function populateData(data) {
    // Populate radio buttons and text areas
    $('input[name="laptopDesktop"][value="' + data.laptop_desktop + '"]').prop('checked', true);
    $('#laptopDesktopRemarks').val(data.laptop_desktop_remarks);

    $('input[name="printer"][value="' + data.printer + '"]').prop('checked', true);
    $('#printerRemarks').val(data.printer_remarks);

    $('input[name="scanner"][value="' + data.scanner + '"]').prop('checked', true);
    $('#scannerRemarks').val(data.scanner_remarks);

    $('input[name="biometric"][value="' + data.biometric + '"]').prop('checked', true);
    $('#biometricRemarks').val(data.biometric_remarks);

    $('input[name="posTerminal"][value="' + data.pos_terminal + '"]').prop('checked', true);
    $('#posTerminalRemarks').val(data.pos_terminal_remarks);

    $('input[name="internetRouter"][value="' + data.internet_router + '"]').prop('checked', true);
    $('#internetRouterRemarks').val(data.internet_router_remarks);

    $('input[name="ups"][value="' + data.ups + '"]').prop('checked', true);
    $('#upsRemarks').val(data.ups_remarks);

    $('input[name="cctvCamera"][value="' + data.cctv_camera + '"]').prop('checked', true);
    $('#cctvCameraRemarks').val(data.cctv_camera_remarks);

    $('input[name="mobileTablet"][value="' + data.mobile_tablet + '"]').prop('checked', true);
    $('#mobileTabletRemarks').val(data.mobile_tablet_remarks);

    $('input[name="countingMachine"][value="' + data.counting_machine + '"]').prop('checked', true);
    $('#countingMachineRemarks').val(data.counting_machine_remarks);

    $('input[name="cardReader"][value="' + data.card_reader + '"]').prop('checked', true);
    $('#cardReaderRemarks').val(data.card_reader_remarks);

    $('input[name="externalHDD"][value="' + data.external_hdd + '"]').prop('checked', true);
    $('#externalHDDRemarks').val(data.external_hdd_remarks);

    $('input[name="photocopier"][value="' + data.photocopier + '"]').prop('checked', true);
    $('#photocopierRemarks').val(data.photocopier_remarks);

    $('#otherDevices').val(data.other_devices);
    $('#remarks').val(data.remarks);
    $('#remarks').val(data.hardware_remarks);
    if (data.hardware_photo_path) {
        $('#hardwarePhotoPreview').attr('src', 'codes/' + data.hardware_photo_path).show();
    }
}
// populate the form data after fetching End

getProgress();

    });
    </script>