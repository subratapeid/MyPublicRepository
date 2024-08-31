<?php 
    $pageTitle="Audit Progress Page";
    include "include/navbar.php"; 
    $bcaId = !empty($_SESSION['bcaId']) ? $_SESSION['bcaId'] : '';
    $bcaName = !empty($_SESSION['bcaName']) ? $_SESSION['bcaName'] : '';
    $auditNumber = !empty($_SESSION['auditNumber']) ? $_SESSION['auditNumber'] : '';
    $state = !empty($_SESSION['state']) ? $_SESSION['state'] : '';
    $location = !empty($_SESSION['location']) ? $_SESSION['location'] : '';

    // Assuming $bcaId, $bcaName, and $auditNumber are already initialized or obtained from somewhere
    
    if ($bcaId && $bcaName || $auditNumber) {
        // All variables are present and not empty
        // echo $bcaId;
        // echo $bcaName;
        // echo $auditNumber;
    } else {
        // Redirect if any of the variables are missing or empty
        echo "<script>
                alert('Invalid Request. Redirecting to the audit list.');
                window.location.href = 'audit-list.php';
              </script>";
        exit; // Ensure to stop further execution after redirection
    }
    ?>
    <style>
        .progress-container {
            width: calc(100% + 100px);
            max-width: 800px;
            background-color: var(--white-color);
            border-radius: 8px;
            box-shadow: 0 0 10px rgb(0 0 0);
            padding: 40px;
            margin-left: calc(20% - 80px);
            position: relative;
            display: block;
            justify-content: center;

        }
        .progress-line {
            position: absolute;
            left: 58.5px;
            top: 200px;
            bottom: 170px;
            width: 4px;
            background-color: var(--grey-color);
            z-index: 0;
        }
        .progress-item {
            display: flex;
            align-items: center;
            padding: 20px 0;
            position: relative;
            z-index: 1;
        }
        .progress-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #4c4c4c;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: black;
            flex-shrink: 0;
            position: relative;
            z-index: 1;
            transition: background-color 0.5s, color 0.5s, border-color 0.5s;
        }
        .completed .progress-circle {
            background-color: #00a300;
            color: white;
            border-color: #004800;
        }
        .inprogress .progress-circle {
            background-color: #ffe635;
            color: #1e1e1e;
            border-color: #d57805;
        }
        .completed + .progress-line {
            background-color: green;
        }
        .progress-text {
            flex-grow: 1;
            margin-left: 20px;
            color: var(--darkblue-color);
        }
        .progress-button {
            display: none;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            text-decoration: none;
        }
        .start.progress-button {
            background-color: #ff0000;
            display: inline;

        }
        .progress-button.start:hover {
            background-color: #b16200;

        }
        .progress-button:hover {
            background-color: #005ec3;
            color: white;
            text-decoration: none;

        }

        .cardFooterButtons{
            display: flex;
            justify-content: center;
            align-items: center; 
            margin: 30px 0 30px;
        }

        .progress-footer {
            padding: 8px 15px;
            font-size: 15px;
            border: solid;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        .progress-footer.go-back-button{
            color: var(--white-color);
            background-color: var(--black-button-bg);
        }
        .progress-footer.download-button{
            color: #fff;
            background-color: #006409;
        }
        .progress-footer.download-button:hover{
            background-color: #049711;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        .progress-footer.download-button:disabled{
            background-color: #282828;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        .progress-footer.go-back-button:hover {
            color: #f9f9f9;
            background-color: #0500e1;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }



        @media (max-width: 780px) {
            .progress-container {
                width: auto;
                margin: 10px 5px;
                padding: 20px;
            }
            .progress-line {
            left: 37.8px;
            }
            .progress-button {
            font-size: 12px;
        }
        }
    </style>

<div class="progress-container mx-auto">
    <h5 id="auditProgressTitle">Progress For: <?php echo($bcaName); ?> (<?php echo($bcaId); ?>)</h5>
    <h5 id="auditProgressTitle">Audit Number: <?php if ($auditNumber){echo($auditNumber);} else{echo("Not Generated!");} ?></h5>
    <h5 id="auditProgressTitle">State: <?php echo($state); ?></h5>
    <h5 id="auditProgressTitle">Location: <?php echo($location); ?></h5>
    <div class="progress-line"></div>
    <div class="progress-item">
        <div class="progress-circle">1</div>
        <div class="progress-line"></div>
        <span class="progress-text">BCA & BC Point Details</span>
        <a href="/bcaudit/bca-bcpoint-details.php" class="progress-button" id="viewButton">VIEW</a>
    </div>

    <div class="progress-item">
        <div class="progress-circle">2</div>
        <div class="progress-line"></div>
        <span class="progress-text">Operational Details</span>
        <a href="/bcaudit/operational-details.php" class="progress-button ">VIEW</a>
    </div>
    <div class="progress-item">
        <div class="progress-circle">3</div>
        <div class="progress-line"></div>
        <span class="progress-text">Hardware & Infrastructure</span>
        <a href="/bcaudit/hardware-infrastructure.php" class="progress-button">VIEW</a>
    </div>
    <div class="progress-item">
        <div class="progress-circle">4</div>
        <div class="progress-line"></div>
        <span class="progress-text">Register Maintenance</span>
        <a href="/bcaudit/register-maintenance.php" class="progress-button">VIEW</a>
    </div>
    <div class="progress-item">
        <div class="progress-circle">5</div>
        <div class="progress-line"></div>
        <span class="progress-text">Compliance & Verification</span>
        <a href="/bcaudit/compliance-verification.php" class="progress-button">VIEW</a>
    </div>

    <div class="progress-item">
        <div class="progress-circle">6</div>
        <div class="progress-line"></div>
        <span class="progress-text">Transaction Verification</span>
        <a href="/bcaudit/transaction-verification.php" class="progress-button btn btn-warning">VIEW</a>
    </div>

    <div class="progress-item">
        <div class="progress-circle">7</div>
        <div class="progress-line"></div>
        <span class="progress-text">BCA Performance.</span>
        <a href="/bcaudit/bc-performance.php" class="progress-button ">VIEW</a>
    </div>


    <div class="progress-item">
        <div class="progress-circle">8</div>
        <span class="progress-text">Auditor Observation & Signature</span>
        <a href="/bcaudit/auditor-observation.php" class="progress-button">VIEW</a>
    </div>

    <div class="progress-item">
        <div class="progress-circle">9</div>
        <span class="progress-text">Audit Completed Successfully</span>
        <a href="/bcaudit/download-audit-report.php" class="progress-button">View Report</a>
    </div>
    <div class="d-flex cardFooterButtons">
    <button class="progress-footer go-back-button" id="backButton">Go Back</button>
    <button type="button" class="progress-footer download-button ml-5" onclick="downloadReport()" id="downloadReport" disabled>Download Report</button>
</div>
</div>


<?php include "include/footer.php"; ?>
<script>
$(document).ready(function() {

    function fetchProgress() {
        var bcaId = '<?php echo $bcaId; ?>';
        var auditNumber = '<?php echo $auditNumber; ?>';
        var progress = "";
        $.ajax({
            url: '/bcaudit/codes/fetchData/fetch_progress.php',
            type: 'GET',
            data: { bcaId: bcaId, 
                auditNumber: auditNumber
             },
            success: function(response) {
                if (response.success) {
                    bcaName=response.data.bcaName;
                    // console.log(bcaName);
                    progress = parseInt(response.data.progress, 10);
                    // console.log(progress);
                    if (progress >=  8) {
                    $('#downloadReport').prop('disabled', false); // Enable the download button
                    // console.log(progress);

                } else {
                    $('#downloadReport').prop('disabled', true); // Disable the download button
                }
                    if(!progress){
                        progress = 0;
                        updateProgress(0);
                        // console.log(progress);
                    } else {
                        console.log(response.data);
                        updateProgress(progress);
                    }
                    
                } else {
                    alert("BCA ID not found");
                    window.location.href = "audit-list.php";
                    // console.log(response.message);
                }
            },
            error: function(xhr, status, error) {
                alert('Error fetching data: ' + error);
            }
        });
    }
            function updateProgress(progress) {
                    var circles = $('.progress-item');
                    var buttons = $('.progress-button');

                    // Reset classes and hide buttons
                    circles.removeClass('completed inprogress');
                    buttons.hide();
                    // Update progress items and show buttons based on the progress value
                    circles.each(function(index) {
                        if (index < progress) {
                            $(this).addClass('completed');
                            $(buttons[index]).show();
                            $(buttons[index]).removeClass('start');
                        } else if (index === progress) {
                            $(this).addClass('inprogress');
                            $(buttons[index]).show();
                            $(buttons[index]).addClass('start');
                            if (index < 8){
                            $(buttons[index]).text("START");
                            }
                            var button = $(buttons[index]);
                            // setAction(button);
                        } else{
                            $(this).removeClass('completed');
                        }
                    });
                }

            function setAction(button) {  
                var currentHref = button.attr('href');
                        // Use a URL object for easier manipulation
                        var url = new URL(currentHref, window.location.origin);
                        // Change the 'action' parameter
                        url.searchParams.set('action', 'start');
                        // Update the href attribute with the new URL
                        button.attr('href', url.toString());
            }

    // Set interval to fetch and update progress every 10 seconds (10000 milliseconds)
    setInterval(fetchProgress, 10000);
    // Initial fetch and update progress
    fetchProgress();

});

// download report function
function downloadReport() {
    showOverlay("--Generating PDF--");
    console.log('Download Process Started');

    const iframe = document.createElement('iframe');
    iframe.style.cssText = 'position:absolute;width:0px;height:0px;left:-1000px;top:-1000px;';
    iframe.src = 'report/pdf/AuditReportGenerate.php';
    
    iframe.onload = function() {
        // After the iframe loads, you can interact with its content if needed
        console.log('Template loaded successfully');
    };
    
    document.body.appendChild(iframe);

    window.addEventListener('message', function(event) {
                if (event.data === 'downloadCompleted') {
                   hideOverlay();
                    console.log('Download Started Successfully');
            } else if(event.data ==='error'){
                    hideOverlay();
                    alert('Error to generate PDF! Please try agin later.');
                    console.log('Download Failed');
                }
            }, false);
}

</script>