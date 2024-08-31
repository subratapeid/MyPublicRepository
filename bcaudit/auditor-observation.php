<?php 
    $pageTitle="Auditor Observation and information";
    include "include/navbar.php";
    include "codes/verify_audit_session.php"; 
?>
    <style>
        .card {
            border: 1px solid var(--card-border);
            border-radius: 5px;
        }
        .card-header{
            background-color: var(--grey-black);
        }
        .card-title {
            color: var(--black-color);
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-body{
            background-color: var(--card-body);
        }
        .card-footer{
            background-color: var(--card-footer);
        }
        .customer-item {
            display: flex;
            align-items: center;
            padding: 10px;
            padding-right: 5px;
            border: 1px solid #424242;
            border-radius: 5px;
            margin-bottom: 10px;
            color: #424242;
        }
        .customer-item span {
            flex-grow: 1;
        }
        .customer-item button {
            margin-left: 10px;
        }
        ul {
            list-style-type: none;
            padding: 5px; 
            margin: 0; 
        }
        .auditorList{
        max-height:300px;
        overflow-y:auto;
    }
    </style>

<div class="container-fluid mt-2 px-0">
    <div class="card shadow-sm mx-auto" style="max-width: 800px;">
        <div class="card-header">
            <h4 class="card-title text-center"><i class="fa-solid fa-users"></i> Auditor's Observation</h4>
        </div>
        <div class="card-body">
        <div class="form-group">
                <label for="conclusion">1. Audit Conclusion</label>
                <textarea class="form-control" id="conclusion" name="conclusion" rows="6" placeholder="Enter conclusion" required></textarea>
            </div>
            <div class="form-group">
                <label for="conclusion">2. Recommendations</label>
                <textarea class="form-control" id="recommendations" name="recommendations" rows="6" placeholder="Enter recommendations" required></textarea>
            </div>
            <div class="form-group mt-4">
                <label for="customer-list">3. Auditor Signature</label>
                <div id="customer-list">
                <!-- Dynamic Auditors list will be appended here -->
                </div>

                <div class="container-fluid px-0">
                    <!-- Selected Auditors List will populate here -->
                    <ul id="selectedAuditors" class="list-group"></ul>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-info mt-2 mb-2" data-toggle="modal" data-target="#auditorModal" id="addAuditorBtn"><i class="fa-solid fa-plus"></i> Add Auditor</button>
                </div>
            </div>

        </div>
        <!--form submit buttons-->
        <div class="card-footer d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" id="backButton">Previous</button>
            <button id="submitButton" type="submit" class="btn btn-success" >Submit</button>
            <button type="button" class="btn btn-info pt-2 pb-2 pl-3 pr-3" id="nextButton" disabled>Next</button>

        </div>
    </div>
    </div>
<!-- main container div end -->
</div>

<!-- Popup Modal -->
<div id="auditorModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Select Auditors</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="searchAuditor" class="form-control" placeholder="Enter auditor name">
                    <div class="auditorList">
                    <ul id="auditorList" class="list-group mt-3"></ul>
                    <p id="noAuditorFound" class="text-danger mt-3" style="display: none;">No auditors found</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="okBtn" class="btn btn-primary">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!--  Modal for auditor Signature -->
    <div class="modal fade" id="signatureModal" tabindex="1" role="dialog" aria-labelledby="signatureModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="signatureModalLabel">Signature for <span id="auditorName"></span></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="mdi mdi-close-box-outline text-danger"></span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <div class="signature-container">
                    <canvas id="signaturePad" class="signature-pad" width="auto" height="500px"></canvas>
                </div>
                <div class="modal-footer pt-0 pb-0 d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" id="closeBtn" data-dismiss="modal">Close</button>
                    <button type="button" class="iconButtons btn btn-success" id="confirmButton" title="Confirm"><i class="mdi mdi-check-circle-outline btnIcon"></i></button>
                    <button type="button" class="iconButtons btn btn-danger" id="clearBtn" title="Clear"><i class="mdi mdi-rotate-right btnIcon"></i></button>
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
.mdi-minus-circle-outline{
    font-size: 16px;
}
</style>
<?php include "include/footer.php"; ?>
<script src ="js/common_date_time.js"></script>
<script src ="js/fetchProgress.js"></script>

<script>
document.addEventListener('DOMContentLoaded', async () => {
    const addAuditorBtn = document.getElementById('addAuditorBtn');
    const auditorModal = $('#auditorModal');
    const signatureModal = $('#signatureModal');
    const searchAuditor = document.getElementById('searchAuditor');
    const auditorList = document.getElementById('auditorList');
    const noAuditorFound = document.getElementById('noAuditorFound');
    const okBtn = document.getElementById('okBtn');
    const selectedAuditors = document.getElementById('selectedAuditors');
    const canvas = document.getElementById('signatureCanvas');
    const clearBtn = document.getElementById('clearBtn');
    const confirmBtn = document.getElementById('confirmButton');
    const saveBtn = document.getElementById('saveButton');
    const auditorNameDisplay = document.getElementById('auditorName');
    const submitBtn = document.getElementById('submitButton');
    let loggedInUserEmpId = '<?php echo($_SESSION['emp_id']); ?>';

    // Replace this with actual logged-in user data
    // const loggedInUser = { name: 'John Doe Default', empId: 'A001' };
    let selectedAuditorEmpIds = [loggedInUserEmpId];
    let currentSignatureIndex = null;
    const signatures = {};
    let auditorsToDelete = [];

    async function fetchAuditorData() {
        try {
            const response = await fetch('codes/fetchData/get_auditors_list.php');
            return await response.json();
        } catch (error) {
            console.error('Error fetching auditor data:', error);
            return [];
        }
    }
    

    let bcaId = "<?php echo($bcaId); ?>";
        let bcaName = "<?php echo($bcaName); ?>";
        let auditNumber = "<?php echo($auditNumber); ?>";
        let formProgress = 9;
        const nextBtn = document.getElementById('nextButton');


        const getProgress = async () => {
    try {
        let progress = await fetchProgress(bcaId, auditNumber);
        // console.log('Progress:', progress);
        // Use the progress value here it is ended below

    // Form Part Start
        if (progress >= formProgress) {
            console.log('fetching inserted data');
            $('#nextButton').prop('disabled', false);
        //fetch already saved form data start
        await fetchSavedData();  
        renderSelectedAuditors();
        //fetch already saved form data end

        } else {
            console.log('fetching pre feeded data');
            $('#nextButton').prop('disabled', true);
            $('#saveButton').css('display', 'inline-block');
        }
        // progress fetch ending part
} catch (error) {
        console.error('Error:', error);
    }
}  // progress fetch ending part
getProgress();


    let originalData = {};
    async function fetchSavedData() {
        try {

            const response = await fetch('codes/fetchData/fetch_auditors_observations_saved_data.php');
            const data = await response.json();
            console.log(data);
            originalData = { ...data };
            console.log(originalData);
            // updateSubmitButtonState();

            if (data.inputFieldsData.length > 0) {
                document.getElementById('conclusion').value = data.inputFieldsData[0].conclusion;
                document.getElementById('recommendations').value = data.inputFieldsData[0].recommendations;
            }

            if (data.selectedAuditorsAndSignature.length > 0) {
                selectedAuditorEmpIds = data.selectedAuditorsAndSignature.map(auditor => auditor.empId);
                data.selectedAuditorsAndSignature.forEach(signature => {
                    signatures[signature.empId] = {
                        dataUrl: signature.signature_data_url,
                        date: signature.date
                    };
                });
            } else {
                // Add the logged-in user if no auditors are returned
                selectedAuditorEmpIds = [loggedInUser.empId];
            }
        } catch (error) {
            console.error('Error fetching saved data:', error);
        }
    }

    // Initial render data
    // await fetchSavedData();  
    renderSelectedAuditors();

function validateFormData(currentData) {

    if (!currentData.conclusion.trim()) {
        alert('Conclusion cannot be empty.');
        return 'missingInputData';
    }
    if (!currentData.recommendations.trim()) {
        alert('Recommendations cannot be empty.');
        return 'missingInputData';
    }
    if (!currentData.signatures.length) {
        alert('Please do sign before submit the form.');
        return 'missingInputData';
    }
    return 'allGood';
}

// compare the original data with the current data
function hasChanges() {
    // Construct the current data object
    const currentData = {
        selectedAuditors: selectedAuditorEmpIds,
        signatures: Object.entries(signatures).map(([empId, { dataUrl, date }]) => ({
            empId, dataUrl, date
        })),
        conclusion: document.getElementById('conclusion').value,
        recommendations: document.getElementById('recommendations').value
    };

    // Log currentData for inspection
    // console.log('currentData:', currentData);
// // Validate required fields
// const validationStatus = validateFormData(currentData);
//     if (validationStatus === 'missingInputData') {
//         return false;
//     }
    // Transform the original data to match the structure of currentData
    const transformedOriginalData = {
        selectedAuditors: originalData.selectedAuditorsAndSignature.map(item => item.empId),
        signatures: originalData.selectedAuditorsAndSignature.map(item => ({
            empId: item.empId,
            dataUrl: item.signature_data_url,
            date: item.date
        })),
        conclusion: originalData.inputFieldsData[0].conclusion,
        recommendations: originalData.inputFieldsData[0].recommendations
    };

    // Log transformedOriginalData for inspection
    console.log('transformedOriginalData:', transformedOriginalData);

    // Compare the stringified versions of the data objects
    const hasChanged = JSON.stringify(currentData) !== JSON.stringify(transformedOriginalData);
    console.log('Has data changed?', hasChanged);

    return hasChanged;
}


// Call this function after rendering selected auditors
function updateSubmitButtonState() {
    if (hasChanges()) {
        submitBtn.style.display = 'block';
        console.log("changes detected");
        // Hide next button if present
    } else {
        submitBtn.style.display = 'none';
        console.log("No changes");

        // Show next button if present
    }
}

// open auditor list popup
    addAuditorBtn.addEventListener('click', () => {
        auditorModal.modal('show');
    });

    searchAuditor.addEventListener('input', async () => {
        const query = searchAuditor.value.toLowerCase();
        auditorList.innerHTML = '';

        try {
            const auditors = await fetchAuditorData();
            const filteredAuditors = auditors.filter(auditor =>
                auditor.name.toLowerCase().includes(query) ||
                auditor.empId.toLowerCase().includes(query)
            );

            if (filteredAuditors.length > 0) {
                noAuditorFound.style.display = 'none';
                const allAuditors = filteredAuditors.length > 0 ? filteredAuditors : [{ name: searchAuditor.value, email: '', empId: '', mobile: '' }];

                allAuditors.forEach(auditor => {
                    const listItem = document.createElement('li');
                    listItem.innerHTML = `
                        <div class="form-check ml-3" style="max-height: 200px; overflow-y: auto;">
                            <input class="form-check-input" type="checkbox" value="${auditor.empId}" id="auditor${auditor.empId}">
                            <label class="form-check-label" for="auditor${auditor.empId}">
                                ${auditor.name} - ${auditor.empId}
                            </label>
                        </div>
                    `;
                    auditorList.appendChild(listItem);

                    const checkbox = listItem.querySelector('input[type="checkbox"]');
                    checkbox.checked = selectedAuditorEmpIds.includes(auditor.empId);

                    checkbox.addEventListener('change', () => {
                        if (checkbox.checked) {
                            selectedAuditorEmpIds.push(auditor.empId);
                            auditorsToDelete = auditorsToDelete.filter(id => id !== auditor.empId); // Remove from delete list
                        } else {
                            selectedAuditorEmpIds = selectedAuditorEmpIds.filter(id => id !== auditor.empId);
                            auditorsToDelete.push(auditor.empId);
                        }
                    });
                });
            } else {
                noAuditorFound.style.display = 'block';
            }
        } catch (error) {
            console.error('Error fetching auditor data:', error);
        }
    });

    okBtn.addEventListener('click', () => {
        renderSelectedAuditors();
        auditorModal.modal('hide');
        // updateSubmitButtonState();
    });

    async function renderSelectedAuditors() {
        selectedAuditors.innerHTML = '';
        const auditors = await fetchAuditorData();

        selectedAuditorEmpIds.forEach((empId, index) => {
            const auditor = auditors.find(auditor => auditor.empId === empId) || { name: '', empId: empId };
            const listItem = document.createElement('li');
            listItem.className = 'list-group-item mt-2';
            listItem.innerHTML = `
                <div class="row">
                    <div class="col-12">
                        ${toRoman(index + 1)}. ${auditor.name} - (${auditor.empId})
                    </div>
                    <div class="col-12 mt-2 signature"></div>
                    <div class="col-12 mt-1 signature-date"></div>
                    <div class="col-12 mt-2 text-right">
                        <button type="button" class="btn btn-primary btn-sm signBtn" title="signature">sign</button>
                        <button type="button" class="btn btn-danger btn-sm removeBtn  ml-2" title="Delete Data"><i class="fa-regular fa-trash-can"></i></button>
                    </div>
                </div>
            `;
            selectedAuditors.appendChild(listItem);

            listItem.querySelector('.removeBtn').addEventListener('click', () => {
                selectedAuditorEmpIds = selectedAuditorEmpIds.filter(id => id !== auditor.empId);
    if (!selectedAuditorEmpIds.includes(auditor.empId)) {
        auditorsToDelete.push(auditor.empId);
    }
    renderSelectedAuditors();
    updateAuditorList();
});

            listItem.querySelector('.signBtn').addEventListener('click', () => {
                currentSignatureIndex = index;
                auditorNameDisplay.textContent = auditor.name;
                loadSignature(auditor.empId);
                signatureModal.modal('show');
            });

            if (signatures[auditor.empId]) {
                const signatureDiv = listItem.querySelector('.signature');
                const signatureDateDiv = listItem.querySelector('.signature-date');
                signatureDiv.innerHTML = `<img src="${signatures[auditor.empId].dataUrl}" alt="Signature" style="width: 200px; height: 100px;">`;
                signatureDateDiv.textContent = `Signed on: ${signatures[auditor.empId].date}`;
            }
        });
    }

    function toRoman(num) {
        const romanNumeralMap = [
            [1000, 'M'], [900, 'CM'], [500, 'D'], [400, 'CD'],
            [100, 'C'], [90, 'XC'], [50, 'L'], [40, 'XL'],
            [10, 'X'], [9, 'IX'], [5, 'V'], [4, 'IV'], [1, 'I']
        ];
        let result = '';
        for (const [value, numeral] of romanNumeralMap) {
            while (num >= value) {
                result += numeral;
                num -= value;
            }
        }
        return result.toLowerCase();
    }

    const signatureCanvas = document.getElementById('signaturePad');
    const signaturePad = new SignaturePad(signatureCanvas);

    clearBtn.addEventListener('click', () => {
        signaturePad.clear();
    });

    confirmBtn.addEventListener('click', () => {
        if (!signaturePad.isEmpty()) {
            // updateSubmitButtonState();
            const signatureDataURL = signaturePad.toDataURL('image/png');

            const rotationCanvas = document.createElement('canvas');
            const ctx = rotationCanvas.getContext('2d');
            const img = new Image();
            img.src = signatureDataURL;

            img.onload = () => {
                rotationCanvas.width = img.height;
                rotationCanvas.height = img.width;

                ctx.save();
                ctx.translate(rotationCanvas.width / 2, rotationCanvas.height / 2);
                ctx.rotate(Math.PI / 2);
                ctx.drawImage(img, -img.width / 2, -img.height / 2);
                ctx.restore();

                const rotatedDataURL = rotationCanvas.toDataURL('image/png');
                const rotatedDataBase64 = rotatedDataURL.replace(/^data:image\/(png|jpg);base64,/, "");

                const signatureDataUrl = rotatedDataURL;

                // const currentDate = new Date().toLocaleString();
            //get common date time format fom common js script start
                const getCurrentDate = async () => {
                let currentDate;
                try {
                    currentDate = await getCommonDateTime();
                    // console.log('Formatted time:', currentDate);
                    signatures[selectedAuditorEmpIds[currentSignatureIndex]] = { dataUrl: signatureDataUrl, date: currentDate };
                renderSelectedAuditors();
                signatureModal.modal('hide');
            } catch (error) {
                console.error('Error:', error);
            }
            return currentDate;
            };
            getCurrentDate();
            //get common date time format fom common js script End
            };
        } else {
            alert("Please make a signature first.");
        }
    });

// Load saved signatures from db
    function loadSignature(empId) {
    signaturePad.clear();
    if (signatures[empId]) {
        const img = new Image();
        img.src = signatures[empId].dataUrl;
        img.onload = () => {
            const tempCanvas = document.createElement('canvas');
            const tempCtx = tempCanvas.getContext('2d');

            // Set temporary canvas dimensions
            tempCanvas.width = img.height;
            tempCanvas.height = img.width;

            // Draw the image with a 90-degree counterclockwise rotation
            tempCtx.translate(tempCanvas.width / 2, tempCanvas.height / 2);
            tempCtx.rotate(-Math.PI / 2);
            tempCtx.drawImage(img, -img.width / 2, -img.height / 2);
            tempCtx.rotate(Math.PI / 2);  // Rotate back for further use

            // Draw the rotated image onto the signature pad canvas
            const rotatedDataUrl = tempCanvas.toDataURL('image/png');
            const ctx = signaturePad._ctx;
            ctx.clearRect(0, 0, signatureCanvas.width, signatureCanvas.height);
            const rotatedImg = new Image();
            rotatedImg.src = rotatedDataUrl;
            rotatedImg.onload = () => {
                ctx.drawImage(rotatedImg, 0, 0, signatureCanvas.width, signatureCanvas.height);
            };
        };
    }
}


    function updateAuditorList() {
        const checkboxes = auditorList.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectedAuditorEmpIds.includes(checkbox.value);
        });
    }


//     //  submit the form data
//     submitBtn.addEventListener('click', async () => {
//         const currentData = {
//         selectedAuditors: selectedAuditorEmpIds,
//         signatures: Object.entries(signatures).map(([empId, { dataUrl, date }]) => ({
//             empId, dataUrl, date
//         })),
//         conclusion: document.getElementById('conclusion').value,
//         recommendations: document.getElementById('recommendations').value
//     };

//         // Validate required fields
//         const validationStatus = validateFormData(currentData);
//             if (validationStatus === 'missingInputData') {
//         return;
//         }

//         // Check if there's at least one auditor selected
//         if (selectedAuditorEmpIds.length === 0) {
//             alert('Please select at least one auditor before submission.');
//             return;
//         }

//             // Check if at least one auditor has a signature
//     const auditorsWithoutSignature = selectedAuditorEmpIds.filter(empId => !signatures[empId]);

// if (auditorsWithoutSignature.length > 0) {
//     // Fetch auditor data to get their names
//     const auditors = await fetchAuditorData();
//     const auditorNamesAndIds = auditorsWithoutSignature.map(empId => {
//         const auditor = auditors.find(auditor => auditor.empId === empId);
//         return auditor ? `${auditor.name} (${auditor.empId})` : `Unknown Auditor (${empId})`;
//     });

//     alert(`The following auditors do not have a signature:\n${auditorNamesAndIds.join('\n')}`);
//     return;
// }


//     //     if (!hasChanges()) {
//     //     alert('No changes detected. Proceeding to the next.');
//     //         window.location.href ="/bcaudit/download-audit-report.php";
//     //     // Handle next step logic here
//     //     return;
//     // }



//         try {
//         showOverlay("--Submiting Data--");
//             const requestBody = {
//                 ...currentData,
//                 auditorsToDelete: auditorsToDelete
//                 };
//             const response = await fetch('codes/insert_auditors_observations_data.php', {
//                 method: 'POST',
//                 headers: {
//                     'Content-Type': 'application/json'
//                 },
//                 // body: JSON.stringify({
//                 //     selectedAuditors: selectedAuditorEmpIds,
//                 //     auditorsToDelete: auditorsToDelete,
//                 //     signatures: Object.entries(signatures).map(([empId, { dataUrl, date }]) => ({
//                 //         empId, dataUrl, date
//                 //     })),
//                 //     conclusion: document.getElementById('conclusion').value,
//                 //     recommendations: document.getElementById('recommendations').value
//                 // })
//                 body: JSON.stringify(requestBody)
//             });

//             if (response.status = 'ok') {
//                 alert('Auditing Data Submited successfully.');
//                  window.location.href ="/bcaudit/download-audit-report.php";
//                 auditorsToDelete = [];
//                 hideOverlay();

//             } else {
//                 alert('Error updating data.');
//             }

            
//         } catch (error) {
//             console.error('Error saving data:', error);
//             alert('Error saving data.');
//         }
//     });

        

// Submit the form data
submitBtn.addEventListener('click', async () => {
    const currentData = {
        selectedAuditors: selectedAuditorEmpIds,
        auditorsToDelete: auditorsToDelete,
        signatures: Object.entries(signatures).map(([empId, { dataUrl, date }]) => ({
            empId, dataUrl, date
        })),
        conclusion: document.getElementById('conclusion').value,
        recommendations: document.getElementById('recommendations').value
    };

    // Validate required fields
    const validationStatus = validateFormData(currentData);
    if (validationStatus === 'missingInputData') {
        return;
    }

    // Check if there's at least one auditor selected
    if (selectedAuditorEmpIds.length === 0) {
        alert('Please select at least one auditor before submission.');
        return;
    }

    // Check if at least one auditor has a signature
    const auditorsWithoutSignature = selectedAuditorEmpIds.filter(empId => !signatures[empId]);

    if (auditorsWithoutSignature.length > 0) {
        // Fetch auditor data to get their names
        const auditors = await fetchAuditorData();
        const auditorNamesAndIds = auditorsWithoutSignature.map(empId => {
            const auditor = auditors.find(auditor => auditor.empId === empId);
            return auditor ? `${auditor.name} (${auditor.empId})` : `Unknown Auditor (${empId})`;
        });

        alert(`The following auditors do not have a signature:\n${auditorNamesAndIds.join('\n')}`);
        return;
    }

    try {
        showOverlay("--Please Wait--");

        // Fetch progress
        let progress = await fetchProgress(bcaId, auditNumber);

        if (progress >= formProgress) {
            console.log('Updating data');
            updateData(currentData);
        } else {
            console.log('Inserting data');
            insertData(currentData);
        }

    } catch (error) {
        console.error('Error:', error);
        alert('Error processing data.');
    }
});


// go to next page function
function goToNextPage(){
            window.location.href = '/bcaudit/download-audit-report.php';
        };
    nextBtn.addEventListener('click', goToNextPage);

// Function to insert data
async function insertData(formData) {
    try {
        showOverlay("--Inserting Data--");

        const response = await fetch('codes/insert_auditors_observations_data.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        });
        const result = await response.json();
        if (result.status == 'success') {
            alert('Auditing Data Submitted successfully.');
            goToNextPage();

            auditorsToDelete = [];
        } else {
            alert(result.error);
        }

        // $.ajax({
        //         url: 'codes/insert_auditors_observations_data.php',
        //         type: 'POST',
        //         data: JSON.stringify(formData),
        //         contentType: false,
        //         processData: false,
        //         dataType: 'json',
        //         success: function(response) {
        //             $('#saveButton').prop('disabled', false);
        //                 if (response.status=='success') {
        //                     alert(response.message);
        //                     goToNextPage();
        //                     auditorsToDelete = [];

        //                 } else {
        //                     alert(response.error);
        //                     console.log('Error: ' + response.error);
        //                 }
        //         },
        //         error: function(xhr, status, error) {
        //             alert('Error: ' + error);
        //             console.log('Error: ' + error);
        //         }
        //     });
    } catch (error) {
        console.error('Error inserting data:', error);
        alert('Error inserting data.');
    } finally {
        hideOverlay();
    }
}

// Function to update data
async function updateData(formData) {
    try {
        showOverlay("--Updating Data--");

        if (!hasChanges()) {
        alert('No changes detected.');
        // Handle next step logic here
        return;
    }

        const response = await fetch('codes/update_auditors_observations_data.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        });

        if (response.ok) {
            alert('Auditing Data Updated successfully.');
            goToNextPage();
            auditorsToDelete = [];
        } else {
            alert('Error updating data.');
        }
    } catch (error) {
        console.error('Error updating data:', error);
        alert('Error updating data.');
    } finally {
        hideOverlay();
    }
}

});


</script>