document.addEventListener('DOMContentLoaded', function() {
    // const openCaptureModalBtn = document.getElementById('openCaptureModalBtn');
    // const captureBtn = document.getElementById('captureBtn');
    // const retakeBtn = document.getElementById('retakeBtn');
    // const confirmBtn = document.getElementById('confirmBtn');
    // const video = document.getElementById('video');
    // const canvas = document.getElementById('canvas');
    // const capturedPhoto = document.getElementById('capturedPhoto');
    // const photoPreview = document.getElementById('photoPreview');
    // const photoBase64Input = document.getElementById('photoBase64');

    // const submitBtn = document.getElementById('saveButton');


let stream;

function startCamera() {
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } })
        .then(function(mediaStream) {
            stream = mediaStream;
            video.srcObject = mediaStream;
            video.play()
                .then(() => {
                    console.log('Camera stream started successfully.');
                })
                .catch(function(err) {
                    console.error('Error playing video: ', err);
                });
        })
        .catch(function(err) {
            console.error('Error accessing media devices.', err);
            handlePermissionDenied();
        });
}


        function handlePermissionDenied() {
            const message = document.createElement('p');
            message.textContent = 'Camera access was denied.';

            const instructions = document.createElement('p');
            instructions.textContent = 'Please allow camera access in your browser settings and try again.';

            const settingsLink = document.createElement('a');
            settingsLink.textContent = 'Click here for instructions on how to change camera settings';
            settingsLink.href = 'https://example.com/change-camera-settings'; // Replace with actual link

            const container = document.getElementById('permission-message');
            container.innerHTML = ''; // Clear previous content
            container.appendChild(message);
            container.appendChild(instructions);
            container.appendChild(settingsLink);
        }


    // Open the capture modal and start camera
    openCaptureModalBtn.addEventListener('click', function() {
        $('#photoCaptureModal').modal('show');
        retakeBtn.classList.add('d-none');
        confirmBtn.classList.add('d-none');
        captureBtn.classList.remove('d-none');
        // Start camera only if stream is not already active
        if (!stream) {
            startCamera();
        }
        video.style.display = 'block';
        capturedPhoto.classList.add('d-none');
        canvas.style.display = 'none';
    });

    // Close the capture modal and stop camera
    $('#photoCaptureModal').on('hidden.bs.modal', function() {
        stopCamera();
    });

    // Stop camera function
    function stopCamera() {
        if (stream) {
            const tracks = stream.getTracks();
            tracks.forEach(function(track) {
                track.stop();
            });
            stream = null;
        }
    }

    captureBtn.addEventListener('click', function() {
        // Set up the canvas context
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
    
        // Get the current date and time
        const now = new Date();
        const dateTime = now.toLocaleString();
    
        // Get the user's location coordinates
        navigator.geolocation.getCurrentPosition(position => {
            const { latitude, longitude } = position.coords;
    
            // Draw a semi-blurred rectangle at the bottom of the canvas
            const rectHeight = 50;
            context.globalAlpha = 0.5;
            context.fillStyle = 'black';
            context.fillRect(0, canvas.height - rectHeight, canvas.width, rectHeight);
            context.globalAlpha = 1.0;
    
            // Overlay the date, time, and location coordinates on the canvas l
            context.fillStyle = 'white';
            context.font = '16px Arial';
            context.fillText(`Date: ${dateTime}`, 10, canvas.height - rectHeight + 20);
            context.fillText(`Location: ${latitude.toFixed(2)}, ${longitude.toFixed(2)}`, 10, canvas.height - rectHeight + 40);
    
            // Display the final image
            const photo = document.getElementById('photo');
            capturedPhoto.src = canvas.toDataURL('image/png');
    
            // Hide video and show captured image preview
            video.style.display = 'none';
            capturedPhoto.src = canvas.toDataURL('image/png');
            capturedPhoto.classList.remove('d-none');
    
            // Show the retake and confirm buttons
            captureBtn.classList.add('d-none');
            retakeBtn.classList.remove('d-none');
            confirmBtn.classList.remove('d-none');
    
            // Stop the camera function (assuming it's defined elsewhere in your code)
            stopCamera();
        }, err => {
            console.error('Error getting location', err);
        });
    });
    

    // Retake photo
    retakeBtn.addEventListener('click', function() {
        startCamera();
        // Show video again and hide captured photo
        video.style.display = 'block';
        capturedPhoto.classList.add('d-none');
        canvas.style.display = 'none';

        // Reset buttons
        captureBtn.classList.remove('d-none');
        retakeBtn.classList.add('d-none');
        confirmBtn.classList.add('d-none');
    });

    // Confirm photo
    confirmBtn.addEventListener('click', function() {
        // Update photoBase64 input with captured image data
        const dataUrl = canvas.toDataURL('image/png');
        photoBase64Input.value = dataUrl.replace(/^data:image\/(png|jpg);base64,/, "");

        // Display captured photo preview
        capturedPhoto.src = dataUrl;
        capturedPhoto.classList.remove('d-none');
        photoPreview.src = dataUrl;
        photoPreview.classList.remove('d-none');
        confirmBtn.classList.add('d-none');

        // Stop camera after confirming photo
        stopCamera();

        // Close the modal after confirming photo
        $('#photoCaptureModal').modal('hide');
    });

    // Form submission
    // document.getElementById('dataForm').addEventListener('submit', function(e) {
    //     e.preventDefault();
    //     const formData = new FormData(e.target);
    //     // Check if photo is captured and confirmed
    //     if (!photoBase64Input.value) {
    //         alert('Please capture and confirm the photo.');
    //         return;
    //     }

    //     // Simulated fetch request for demonstration
    //     submitForm(formData);
    // });
});
