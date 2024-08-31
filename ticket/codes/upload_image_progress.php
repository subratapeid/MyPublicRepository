<!-- Upload Status Popup Modal -->
<div class="modal" id="uploadStatusModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Uploading Image</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <p id="uploadStatus">0%</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="cancelUpload">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script>
// JavaScript to handle file input change event and update progress
document.getElementById('inputGroupFile01').addEventListener('change', function(e) {
  const file = e.target.files[0];
  if (file) {
    const modal = new bootstrap.Modal(document.getElementById('uploadStatusModal'));
    modal.show();

    // Simulate upload progress (replace with actual upload code)
    let progress = 0;
    const interval = setInterval(function() {
      progress += 10;
      if (progress > 100) {
        clearInterval(interval);
        const uploadedFileName = `Attached Image: ${file.name}`; // Concatenate the prefix and file name
        document.getElementById('uploadStatus').innerText = uploadedFileName;
        document.getElementById('cancelUpload').innerText = 'OK';
        
        // Update event listener for OK button
        document.getElementById('cancelUpload').addEventListener('click', function() {
          modal.hide();
        });

        // Display file name in the existing span with ID 'img_name'
        const imgNameSpan = document.getElementById('img_name');
        imgNameSpan.innerText = uploadedFileName;
      } else {
        document.querySelector('.progress-bar').style.width = `${progress}%`;
        document.getElementById('uploadStatus').innerText = `${progress}%`;
      }
    }, 500);

    // Cancel upload
    document.getElementById('cancelUpload').addEventListener('click', function() {
      clearInterval(interval);
      modal.hide();
    });
  }
});

</script>


<!-- Customer Messages Card -->
<div class="row mb-3 justify-content-start">
    <div class="col-11 col-md-9">
      <div class="card">
        <div class="card-header">
          <img src="5.jpg" class="rounded-circle" alt="Customer Avatar" style="width:30px;">
          <span class="ml-2">Customer Name</span>
          <span class="ml-2">User Role</span>
          <span class="float-right">Date Time</span>
        </div>
        <div class="card-body">
          <p>Message Content</p>
          <!-- Files/Media (if any) -->
          <div class="mt-2">
            <a href="file_link" target="_blank" class="btn btn-sm btn-primary">View image</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Executive Messages Card -->
  <div class="row mb-3">
    <div class="col-11 col-md-9 ml-auto">
      <div class="card">
        <div class="card-header">
          <img src="5.jpg" class="rounded-circle float-right" alt="Executive Avatar" style="width:30px;">
          <span class="float-right mr-2">Executive Name</span>
          <span class="float-right mr-2">User Role</span>
          <span class="float-left">Date Time</span>
        </div>
        <div class="card-body text-right">
          <p>Message Content</p>
          <!-- Files/Media (if any) -->
          <div class="mt-2">
            <a href="file_link" target="_blank" class="btn btn-sm btn-primary">View image</a>
          </div>
        </div>
      </div>
    </div>
  </div>