<?php 
     $pageTitle = "BCA & BC Point Details";
     include "include/navbar.php";
     include "codes/verify_audit_session.php";
?>
<div class="formContainer mx-auto">
    <div class="container pl-2 pr-2">
        <h2 class="text-center mb-3">BCA & BC Point Details</h2>
        <form id="bcaForm" action="" method="post" enctype="multipart/form-data">
            
            <!-- From Session -->
            <div class="form-group dark">
    <label for="bcaId">1. BCA/Agent ID</label>
    <input type="text" class="form-control" id="bcaId" name="bcaId" placeholder="Enter BCA ID" required disabled>
</div>

<div class="form-group dark">
    <label for="bcaFullName">2. BCA Full Name</label>
    <input type="text" class="form-control" id="bcaFullName" name="bcaFullName" placeholder="Enter Full Name" required>
</div>

<div class="form-group dark">
    <label for="contactNo">3. Contact No</label>
    <input type="text" class="form-control" id="contactNo" name="contactNo" placeholder="Enter Contact Number" value="" required>
</div>

<div class="form-group dark">
    <label for="emailID">4. Email ID</label>
    <input type="email" class="form-control" id="emailID" name="emailID" placeholder="Enter Email ID" value="" required>
</div>

<div class="form-group dark">
    <label for="bcPointName">5. BC Point Name</label>
    <input type="text" class="form-control" id="bcPointName" name="bcPointName" placeholder="Enter BC Point Name" value="" required>
</div>

<div class="form-group dark">
    <label for="transactionModule">6. Transaction Module</label>
    <select class="form-control" name="transactionModule" id="transactionModule" required>
        <option value="" selected disabled>--Select Transaction Module--</option>
        <option value="android">Android</option>
        <option value="kiosk">Kiosk</option>
        <option value="terminal">Terminal</option>
        <option value="ios">IOS</option>
    </select>
</div>

<div class="form-group dark">
    <label for="state">7. State</label>
    <input type="text" class="form-control" name="state" id="state" placeholder="Enter State Name" value="" required>
        <!-- <option value="State" selected >--Select State--</option> -->
    <!-- </select> -->
</div>

<div class="form-group dark">
    <label for="district">8. District</label>
    <input type="text" class="form-control" name="district" id="district" placeholder="Enter District Name" value="" required>
</div>

<div class="form-group dark">
    <label for="pinCode">9. Pin Code</label>
    <input type="text" class="form-control" id="pinCode" name="pinCode" placeholder="Enter Pin Code" value="" required>
</div>

<div class="form-group dark">
    <label for="location">10. Location</label>
    <input type="text" class="form-control" id="location" name="location" placeholder="Enter BCA Location" value="" required>
</div>

<div class="form-group dark">
    <label for="village">11. Village</label>
    <input type="text" class="form-control" id="village" name="village" placeholder="Enter Village" value="" required>
</div>

<div class="form-group dark">
    <label for="landmark">12. Landmark</label>
    <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Enter Landmark" value="" required>
</div>

<!-- <div class="form-group dark">
    <label for="gpsCoordinates">GPS Coordinates</label>
    <input type="text" class="form-control" id="gpsCoordinates" name="gpsCoordinates" placeholder="Enter GPS Coordinates" value="" required>
</div> -->

<div class="form-group dark">
    <label for="bcaBank">13. BCA Bank Name</label>
    <input type="text" class="form-control" name="bcaBank" id="bcaBank" placeholder="Enter Bank Name" value="" required>
</div>

<div class="form-group dark">
    <label for="bcaBankBranch">14. BCA Bank Branch</label>
    <input type="text" class="form-control" id="bcaBankBranch" name="bcaBankBranch" placeholder="Enter Bank Branch" value="" required>
</div>

<div class="form-group dark">
    <label for="bcaPointAddress">15. BC Point Full Address</label>
    <textarea class="form-control" id="bcaPointAddress" name="bcaPointAddress" rows="4" placeholder="Enter BC Point Address" required></textarea>
</div>

<!-- Image fields -->
<div class="row">
    <div class="col-md-6 form-group dark">
        <div>
            <label for="bcaPhotoPreview">16. Selfie Photo With BCA</label>
        </div>
        <div>
            <img id="bcaPhotoPreview" class="mt-2 mb-3 img-thumbnail" src="default-image.png" alt="Image preview">
        </div>
        <div>
            <a class="btn btn-primary mr-2" id="openCaptureModalBtnBca" data-toggle="modal" data-target="#photoCaptureModal">Capture Photo With BCA</a>
        </div>
        <input type="hidden" id="bcaPhotoBase64" name="bcaPhoto" required>
    </div>

    <div class="col-md-6 form-group dark">
        <div>
            <label for="bcPointPhotoPreview">17. BC Point Photo</label>
        </div>
        <div>
            <img id="bcPointPhotoPreview" class="mt-2 mb-3 img-thumbnail" src="default-image.png" alt="Image preview">
        </div>
        <div>
            <a class="btn btn-primary mr-2" id="openCaptureModalBtnBcPoint" data-toggle="modal" data-target="#photoCaptureModal">Capture BC Point Photo</a>
        </div>
        <input type="hidden" id="bcPointPhotoBase64" name="bcPointPhoto" required>
    </div>

    <!-- Signature and Stamp -->
    <div class="col-md-6 form-group dark">
        <div>
            <label for="bcSignaturePhotoPreview">18. BCA Signature</label>
        </div>
        <div>
            <img id="bcSignaturePhotoPreview" class="mt-2 mb-3 img-thumbnail" src="default-image.png" alt="Image preview">
        </div>
        <div>
            <a class="btn btn-primary mr-2" id="openSignatureModalBtn" data-toggle="modal" data-target="#signatureModal">Take BCA Signature</a>
        </div>
        <input type="hidden" id="bcSignaturePhotoBase64" name="bcSignaturePhoto" required>
    </div>

    <div class="col-md-6 form-group dark">
        <div>
            <label for="bcStampPreview">19. BC Stamp Photo (optional)</label>
        </div>
        <div>
            <img id="bcStampPreview" class="mt-2 mb-3 img-thumbnail" src="default-image.png" alt="Image preview">
        </div>
        <div>
            <a class="btn btn-primary mr-2" id="openCaptureModalBtnBcaStamp" data-toggle="modal" data-target="#photoCaptureModal">Capture BC Stamp Photo</a>
        </div>
        <input type="hidden" id="bcStampPhotoBase64" name="bcStampPhoto">
    </div>
</div>


    </div>
            <!-- form buttons -->
            <div class="d-flex pt-3 mt-5 mb-4 justify-content-between">
                <button type="button" class="btn btn-secondary btn-sm pt-2 pb-2 pl-3 pr-3" id="backButton">Previous</button>
                <!--<a href="operational-details.php" class="bg-danger mr-5 pt-2 pb-2 pl-3 pr-3" id="temp">Next</a>-->
                <button type="submit" class="btn btn-danger btn-sm pt-2 pb-2 pl-3 pr-3" id="saveButton"><span class="spinner-border spinner-border-sm d-none" id="submitBtnSpinner" role="status" aria-hidden="true"></span> Save & Next</button>
                <button type="button" class="btn btn-info btn-sm pt-2 pb-2 pl-3 pr-3" id="nextButton" disabled>Next</button>
                <!-- <a href="/bcaudit/equipment-infrastructure.php" type="button" class="btn btn-danger ml-5 pt-2 pb-2 pl-3 pr-3" id="nextButton" style="display:none;">Next</a> -->
            </div>
        </form>
    </div>
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
<style>
    .signature-container {
    text-align: center;
    margin: 5px auto;
    width: 100%;
}

.signature-pad {
    border: 1px solid #000;
    display: block;
    margin: 0 auto;
}
</style>
<!--  Modal for Signature -->
<div class="modal fade" id="signatureModal" tabindex="-1" role="dialog" aria-labelledby="signatureModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signatureModalLabel">BCA Signature Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="mdi mdi-close-box-outline text-danger"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="signature-container">
                <canvas id="signaturePad" class="signature-pad" width="auto" height="500px"></canvas>
            </div>
            <div class="modal-footer pt-2 pb-0 d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" id="closeBtn" data-dismiss="modal">Close</button>
                <button type="button" class="iconButtons btn btn-success" id="confirmButton" title="Confirm"><i class="mdi mdi-check-circle-outline btnIcon"></i></button>
                <button type="button" class="iconButtons btn btn-danger" id="clearButton" title="Clear"><i class="mdi mdi-rotate-right btnIcon"></i></button>
            </div>
        </div>
    </div>
</div>

<?php include "include/footer.php"; ?>
<!-- <script src="js/camera_function.js"></script> -->

<script>
showOverlay();
 document.addEventListener('DOMContentLoaded', function() {

    const openCaptureModalBtnBca = document.getElementById('openCaptureModalBtnBca');
    const openCaptureModalBtnBcPoint = document.getElementById('openCaptureModalBtnBcPoint');
    const openCaptureModalBtnBcaStamp = document.getElementById('openCaptureModalBtnBcaStamp');
    const captureBtn = document.getElementById('captureBtn');
    const retakeBtn = document.getElementById('retakeBtn');
    const confirmBtn = document.getElementById('confirmBtn');
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');

    const capturedPhoto = document.getElementById('capturedPhoto');
    const bcaPhotoPreview = document.getElementById('bcaPhotoPreview');
    const bcPointPhotoPreview = document.getElementById('bcPointPhotoPreview');
    const bcStampPreview = document.getElementById('bcStampPreview');

    const bcaPhotoBase64 = document.getElementById('bcaPhotoBase64');
    const bcPointPhotoBase64 = document.getElementById('bcPointPhotoBase64');
    const bcSignaturePhotoBase64 = document.getElementById('bcSignaturePhotoBase64');
    const bcStampPhotoBase64 = document.getElementById('bcStampPhotoBase64');

    const photoCaptureModalLabel = document.getElementById('photoCaptureModalLabel');
    let currentFacingMode = 'user';
    const toggleCameraBtn = document.getElementById('toggleCameraBtn');
    let stream;
    let currentPhotoType;
    

//     function startSpin(){
//         submitBtn.disabled = true;
//         openCaptureModalBtn.disabled = true;
//         submitBtn.querySelector('.spinner-border').classList.remove('d-none');
//     };

//     function stopSpin(){
//         submitBtn.disabled = false;
//         openCaptureModalBtn.disabled = false;
//         submitBtn.querySelector('.spinner-border').classList.add('d-none');
//     };


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

    openCaptureModalBtnBca.addEventListener('click', function() {
        photoCaptureModalLabel.textContent = "Photo With BCA";
        currentPhotoType = 'bca';
        currentFacingMode = 'user';
        $('#photoCaptureModal').modal('show');
        retakeBtn.classList.add('d-none');
        confirmBtn.classList.add('d-none');
        captureBtn.classList.remove('d-none');
        if (!stream) startCamera();
        video.style.display = 'block';
        capturedPhoto.classList.add('d-none');
        canvas.style.display = 'none';
    });

    openCaptureModalBtnBcPoint.addEventListener('click', function() {
        photoCaptureModalLabel.textContent = "BC Point Photo";
        currentPhotoType = 'bcPoint';
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

    openCaptureModalBtnBcaStamp.addEventListener('click', function() {
        photoCaptureModalLabel.textContent = "BCA Stamp Photo";
        currentPhotoType = 'bcaStamp';
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
        if (currentPhotoType === 'bca') {
            bcaPhotoBase64.value = photoDataBase64;
            bcaPhotoPreview.src = photoDataUrl;
            bcaPhotoPreview.classList.remove('d-none');
        } else if (currentPhotoType === 'bcPoint') {
            bcPointPhotoBase64.value = photoDataBase64;
            bcPointPhotoPreview.src = photoDataUrl;
            bcPointPhotoPreview.classList.remove('d-none');
        } else if (currentPhotoType === 'bcaStamp') {
            bcStampPhotoBase64.value = photoDataBase64;
            bcStampPreview.src = photoDataUrl;
            bcStampPreview.classList.remove('d-none');
        }
        $('#photoCaptureModal').modal('hide');
    });

    // Camera part end
// ///////////////////////////////////////

    // Signature Part Start
    const signatureCanvas = document.getElementById('signaturePad');
        const signaturePad = new SignaturePad(signatureCanvas);

        document.getElementById('clearButton').addEventListener('click', function() {
            signaturePad.clear();
        });

        document.getElementById('confirmButton').addEventListener('click', function() {
            if (!signaturePad.isEmpty()) {
                const signatureDataURL = signaturePad.toDataURL('image/png');

                // Rotate the image
                const rotationCanvas = document.createElement('canvas');
                const ctx = rotationCanvas.getContext('2d');
                const img = new Image();
                img.src = signatureDataURL;

                img.onload = function() {
                    // Set canvas size to the dimensions of the signature image, swapped for rotation
                    rotationCanvas.width = img.height;
                    rotationCanvas.height = img.width;

                    // Rotate the canvas and draw the image
                    ctx.save();
                    ctx.translate(rotationCanvas.width / 2, rotationCanvas.height / 2);
                    ctx.rotate(Math.PI / 2);
                    ctx.drawImage(img, -img.width / 2, -img.height / 2);
                    ctx.restore();

                    // Get the rotated image data URL
                    const rotatedDataURL = rotationCanvas.toDataURL('image/png');
                    const rotatedDataBase64 = rotatedDataURL.replace(/^data:image\/(png|jpg);base64,/, "");

                    // Update the preview image and hidden input value
                    const bcSignaturePhotoPreview = document.getElementById('bcSignaturePhotoPreview');
                    bcSignaturePhotoPreview.src = rotatedDataURL;
                    document.getElementById('bcSignaturePhotoBase64').value = rotatedDataBase64;
                    $('#signatureModal').modal('hide');
                    // Save the rotated image to the backend
                    // saveSignature(rotatedDataURL);
                };
            } else {
                alert("Please make a signature first.");
            }
        });

        function saveSignature(dataURL) {
        fetch('codes/save_signature.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ image: dataURL })
        })
        .then(response => response.text())
        .then(result => {
            alert(result);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
// ///////////////////////////////////////
    // Form Part Start
    let bcaId = "<?php echo($bcaId); ?>";
    let bcaName = "<?php echo($bcaName); ?>";
    let auditNumber = "<?php echo($auditNumber); ?>";

    const nextBtn = document.getElementById('nextButton');
    
    // go to next page function
    function goToNextPage(){
        window.location.href = '/bcaudit/operational-details.php';
    };

    nextBtn.addEventListener('click', goToNextPage);

        if (auditNumber != "") {
            $('#nextButton').prop('disabled', false);
            // fetchProgress();
        //fetch already saved form data start
            $.ajax({
                url: 'codes/fetchData/fetch_bca_bcpoint_saved_data.php',
                method: 'GET',
                // data: { bcaId: bcaId },
                success: function(response) {
                    hideOverlay();
                    if (response.success) {
                        var data = response.data;
                        populateData(data);
                        formOldData = new FormData(document.getElementById('bcaForm'));
                        // console.log(formOldData);
                    } else {
                        alert("Failed to fetch data: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                     hideOverlay();
                    alert("Error occurred while fetching data!");
                    console.error('Error occurred while fetching data:', status, error);
                    console.error(xhr.responseText);
                }
            });
        //fetch already saved form data end

        } else {
            $('#nextButton').prop('disabled', true);
            $('#saveButton').css('display', 'inline-block');
            // $('#bcaId').val(bcaId);
            // $('#bcaFullName').val(bcaName);
            $('#bcaFullName').prop('disabled', false);
        // get bca details from bcadetails table
            $.ajax({
                url: 'codes/fetchData/fetch_bca_preFeeded_data.php',
                method: 'GET',
                // data: { bcaId: bcaId },
                success: function(response) {
                     hideOverlay();
                    if (response.success) {
                        var data = response.data;
                        populateData(data);
                        formOldData = new FormData(document.getElementById('bcaForm'));
                        // console.log(formOldData);
                    } else {
                        alert("Failed to fetch data: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                     hideOverlay();
                    alert("Error occurred while fetching data!");
                    console.error('Error occurred while fetching data:', status, error);
                    console.error(xhr.responseText);
                }
            });
        }


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
        $('#bcaForm').on('submit', function(event) {
            event.preventDefault();
            var form = $(this);
            // var button = form.find('button[type="submit"]');
            var formData = new FormData(this);
            var formElement = document.getElementById('bcaForm');
            var formData = new FormData(formElement);

            if (auditNumber == ""){
                if (!bcaPhotoBase64.value) {
            alert('Please capture and confirm the BCA photo.');
            return;
            }
        if (!bcPointPhotoBase64.value) {
            alert('Please capture and confirm the BC Point photo.');
            return;
            }
            if (!bcSignaturePhotoBase64.value) {
            alert('Please Take BCA Signature.');
            return;
            }
        }
            if (auditNumber != "") {
        // Use formOldData for comparison or other operations
        var oldDataObject = formDataToObject(formOldData);
        console.log(oldDataObject);
        var newDataObject = formDataToObject(formData);
        console.log(newDataObject);
            }

            if (auditNumber === "") {
                insertForm(formData); // Insert new form data
            } else if (JSON.stringify(oldDataObject) !== JSON.stringify(newDataObject)) {
                updateForm(formData); // Update existing form data
            $('#saveButton').text("Update & Next");
            } else {
            alert("No changes detected. Go to next");
                
                console.log("No changes detected.");
            }
        
    });

    // fetch progress
// function fetchProgress() {
//     var saveButton = document.getElementById('saveButton');
//     var nextButton = document.getElementById('nextButton');
//     $.ajax({
//         url: '/bcaudit/codes/fetch_progress.php',
//         type: 'GET',
//         data: { 
//             bcaId: bcaId, 
//             auditNumber: auditNumber 
//         },
//         success: function(response) {
//             if (response.success) {
//                 var progress = parseInt(response.data.progress, 10);
//                 if (progress > 8) {
//                     $('#nextButton').css('display', 'inline-block');

//                     $('#bcaForm').find('input, textarea, select').prop('disabled', true);
//                     console.log(progress);
//                 } else {
//                     $('#saveButton').css('display', 'inline-block');
//                     // $('#bcaForm').find('input, textarea, select').prop('disabled', false);
//                 }
//                 // console.log(formDataToObject(formOldData));
//             } else {
//                 alert("BCA ID not found");
//                 window.location.href = "audit-list.php";
//             }
//         },
//         error: function(xhr, status, error) {
//             alert('Error fetching data: ' + error);
//         }
//     });
// }

// insert form data function 
function insertForm(formData) {
    showOverlay('--Inserting Data--');
    // startSpin();
    $('#saveButton').prop('disabled', true);
            $.ajax({
                url: 'codes/insert_bca_bcpoint_form.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                     hideOverlay();
                    $('#saveButton').prop('disabled', false);
                    // stopSpin();
                        if (response.success) {
                            alert('Form submitted successfully! (Audit No- ' + response.auditNumber +'). Go to the next page.');
                            goToNextPage();
                        } else {
                            alert(response.error);
                            console.log('Error: ' + response.error);

                            // form.find('input, textarea, select').prop('disabled', false);
                        }
                },
                error: function(xhr, status, error) {
                     hideOverlay();
                    alert('Error: ' + error);
                    console.log('Error: ' + error);
                    // stopSpin();
                }
            });
        }
        // Insert form  data end

        // Update form function
        function updateForm(formData) {
            showOverlay('--Updating Data--');
            // startSpin();
            $('#saveButton').prop('disabled', true);
            $.ajax({
                url: 'codes/update_bca_bcpoint_form.php', // Replace with your backend script URL
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                     hideOverlay();
                    // stopSpin();
                    $('#saveButton').prop('disabled', false);
                    if (response.success) {
                        alert('Data updated successfully! Go to next');
                        goToNextPage();
                    } else {
                        alert('Error: ' + response.error);
                        console.log('Error: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                     hideOverlay();
                    alert('Error: ' + error);
                    console.log('Error: ' + error);
                    // stopSpin();
                }
            });
        }
        // Update form end

        function populateData(data){
                        $('#bcaId').val(data.bca_id);
                        $('#bcaFullName').val(data.bca_name);
                        $('#contactNo').val(data.bca_contact_no);
                        $('#emailID').val(data.bca_email_id);

                        $('#bcPointName').val(data.bc_point_name);
                        $('#transactionModule').val(data.transaction_module);
                        $('#village').val(data.village);
                        $('#location').val(data.location);

                        $('#district').val(data.district);
                        $('#state').val(data.state);
                        $('#pinCode').val(data.pin);
                        $('#landmark').val(data.landmark);

                        $('#bcaBank').val(data.bca_bank);
                        $('#bcaBankBranch').val(data.bca_bank_branch);
                        $('#bcaPointAddress').val(data.bc_point_address);

                        if (data.bca_photo_url) {
                            $('#bcaPhotoPreview').attr('src', 'codes/' + data.bca_photo_url).show();
                        }
                        if (data.bc_point_photo_url) {
                            $('#bcPointPhotoPreview').attr('src', 'codes/' + data.bc_point_photo_url).show();
                        }
                        if (data.bca_signature_url) {
                            $('#bcSignaturePhotoPreview').attr('src', 'codes/' + data.bca_signature_url).show();
                        }
                        if (data.bc_stamp_url) {
                            $('#bcStampPreview').attr('src', 'codes/' + data.bc_stamp_url).show();
                        }
        }

    });
</script>
