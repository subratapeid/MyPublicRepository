<?php
include "include/navbar.php";
?>

  <div class="container mt-4">
    <div class="card">
    <div class="card-header" style="display: flex; align-items: center;">
    <h1 style="margin-right: 10px;">Upload BC Data</h1>
    <!-- <a href="download_shared_data.php">
        <button class="btn btn-success ml-5">Download All Shared</button>
    </a> -->
</div>


      <div class="card-body">

        <form id="uploadForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="csv_file">Upload BC Data CSV File: <a href="sample_data/Bulk_Upload_BCA_Details-Sample.csv" download="Bulk_Upload_BCA_Details-Sample.csv">Sample Data</a></label>
                <input type="file" class="form-control-file" id="csv_file" name="csv_file" accept=".csv" required>
            </div>
            <button type="button" id= "uploadButton" class="btn btn-primary" onclick="uploadData()">Upload Data</button>
            <!-- <button type="button" class="btn btn-primary" onclick="insertData()">Insert Data</button> -->
        </form>
        <div id="result"></div>
        <div id="progressBarContainer" style="display: none;">
            <div id="liveCount"></div>
            <div class="progress">
                <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div id="progressText"></div>
        </div>
    </div>
    
</div>
</div>

<?php include 'include/footer.php'; ?>



    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function showLoadingSpinner() {
        // Disable the button and show a loading spinner inside it
        $('#uploadButton').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...');
        }

        function hideLoadingSpinner() {
        // Enable the button and remove the loading spinner
        $('#uploadButton').prop('disabled', false).html('Upload Data');
        }
    var rowCount;
    function uploadData() {
        showLoadingSpinner(); // Show loading spinner
        var formData = new FormData($('#uploadForm')[0]);
    $.ajax({
        type: 'POST',
        url: 'codes/csv_row_count.php',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json', // Specify the expected data type
        success: function(response) {
            // Check if 'totalRows' property exists in the response
            if ('totalRows' in response) {
                // Assign the row count to the global variable
                rowCount = response.totalRows-1;
        function updateLiveCount() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = this.responseText.split('\n');
                var liveCount = parseInt(response[0]); // Parse as integer
                document.getElementById("liveCount").innerHTML = "Data Uploaded: " + liveCount;

                // Update progress bar using live count and total data count
                updateProgressBar(liveCount);
            }
        };
        xmlhttp.open("GET", "codes/bc_upload_get_live_count.php", true);
        xmlhttp.send();
    }
    setInterval(updateLiveCount, 1000);

        function updateProgressBar(liveCount) {
        var progressBarContainer = document.getElementById("progressBarContainer");
        progressBarContainer.style.display = "block";

        var progressBar = document.getElementById("progressBar");
        var progressText = document.getElementById("progressText");
        // console.log(rowCount);
        // Check if rowCount is a valid number
  
            var percentComplete = (liveCount / rowCount) * 100;
            progressBar.style.width = percentComplete + "%";
            progressBar.setAttribute("aria-valuenow", percentComplete);
            progressText.innerHTML = percentComplete.toFixed(2) + "% Complete";
            // console.log(rowCount);     
            
    }
                
                // Display the row count immediately
                $('#result').html("Total rows in the CSV file: " + rowCount);
                insertData();
            } else {
                // Handle unexpected response
                console.log('Unexpected response:', response);
                $('#result').html('Error in response format.');
            }
        },
        error: function(error) {
            console.log(error);
            $('#result').html('Error counting rows.');
        }
    });
    
}   

function insertData() {
    var formData = new FormData($('#uploadForm')[0]);

            $.ajax({
    type: 'POST',
    url: 'codes/bc_csv_upload.php',
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
        $('#result').html(response);
        hideLoadingSpinner(); // Hide loading spinner
        setTimeout(function() {
       console.log ('Data Uploaded Successfully');
            // location.reload();
            }, 1000);
                },
                error: function(error) {
                    console.log(error);
                    $('#result').html('Error inserting data.');

                    hideLoadingSpinner(); // Hide loading spinner in case of an error
                }
            });
        }
        console.log(rowCount);
        
    </script>

