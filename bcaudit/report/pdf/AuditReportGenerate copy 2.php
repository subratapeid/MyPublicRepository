<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generating PDF...</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container {
            max-width: 850px;
            margin: 10px 0 10px 100px;
            padding: 50px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            font-size: 18px;
        }
        .content{
            font-size: 19px;

        }
        .innerSection{
            padding: 5px;
            padding-left: 25px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            border-bottom: 1px solid #8d8d8d;
            padding-bottom: 5px;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 24px;
        }
        .section p {
            margin-bottom: 10px;
        }
        .section ul {
            padding-left: 20px;
        }
        .button-container {
            text-align: center;
            margin-top: 40px;
        }
        .button-container button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }
        @media (max-width: 768px) {
            .container {
                margin: 0px;
                padding: 10px 10px 40px 10px;
                max-width: 100%;
            }
        }

/* Common Style for both pdf and preview */

/* signature area style start*/
.signature-row {
    display: flex;
    /* justify-content: space-around; */
    margin-bottom: 20px; /* Space between rows */
}

.signature-entry {
    /* text-align: center; */
    margin: 5px; /* Space around each signature entry */
}

.signature-entry img {
    max-width: 100px; /* Adjust the size of the signature images */
    height: auto; /* Maintain aspect ratio */
}

/* signature area style end*/
.headingIcon {
        width: 22px;
        height: 22px;
        vertical-align: middle;
        margin-right: 7px;
        margin-top: -4px;
    }
.pointIcon {
        width: 12px;
        height: 12px;
        vertical-align: middle;
        margin-right: 7px;
        margin-top: -2px;
    }
    
    /*Section Structure wise*/
    .questionIcon {
        width: 12px;
        height: 12px;
        vertical-align: middle;
        margin-right: 7px;
        margin-top: -2px;
    }
    
    .question{
        margin-top: 20px;
    }
    .subQuestion{
        margin-left: 10px;
    }
    .subQuestionLabel{
        padding-left: 5px;
        margin-top: 10px;
        font-weight: 500;
    }
    .subQuestionRadioButtons{
        padding-left: 22px;
    }
    .subQuestionIcon{
        padding-right: 5px;
    }
    
    .longAnswer{
        margin-left: 20px;
    }
    .shortAnswer{
        margin-left: 20px;
    }
    .subShortAnswer{
        margin-left: 30px;
    }
    .radioButtons{
        margin-left: 20px;
    }
    .radioButtonNo{
        margin-left: 85px;
    }
            
    /*Remarks Design*/
    .remarks{
        margin-left: 10px;
    }
    .remarksLabel{
        padding-left: 5px;
        margin-top: 10px;
        font-weight: 500;
    }
    .remarksAns{
        padding-left: 22px;
    }
    .remarksIcon{
        padding-right: 5px;
    }
     /*Remarks Design End*/
    /*Radio Button Like Check Box Style*/
           /* Hide the default radio button */
        .custom-radio {
            display: none;
        }

        /* Style the label to look like a checkbox */
        .custom-label {
            position: relative;
            padding-left: 35px;
            cursor: pointer;
            display: inline-block;
            line-height: 20px;
        }
        /* Create the checkbox box */
        .custom-label::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 20px;
            height: 20px;
            border: 2px solid #737373;
            background: #fff;
            border-radius: 4px; /* Rounded corners for checkbox */
            box-sizing: border-box;
            transition: background-color 0.3s, border-color 0.3s;
        }

        /* Add the tick mark */
        .custom-label::after {
            content: '';
            position: absolute;
            top: 4px;
            left: 8px;
            width: 5px;
            height: 10px;
            border: solid #000000;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            opacity: 0;
            transition: opacity 0.3s;
        }

        
        .custom-radio:disabled + .custom-label {
        color: #6c757d;
        cursor: default;
        }

        .custom-radio:checked + .custom-label {
        color: #000; /* Black color for checked option */
        /* font-weight: bold; Make checked option bold */
        }

        /* Show the tick mark when checked */
        .custom-radio:checked + .custom-label::before {
            background: #ffffff;
            border-color: #000000;
        }

        .custom-radio:checked + .custom-label::after {
            opacity: 1;
        }
        
        /* Check Box Style End*/

    </style>
 
</head>
<body>
    <!-- <h3>Generating PDF, please wait...</h3> -->
<!-- <div class=" " id="content"> -->
        <div class="content">
            <!-- pdf content start -->
            <div class="content" id="content">

<!-- .................................. -->
 <!-- same for both pdf and preview -->

<!-- section A -->
<div class="section">
    <h2><img src="/bcaudit/assets/icons/headingIcon.png" alt="Icon" class="headingIcon"> Objectives</h2>
    <div class="innerSection">
        <p class="pb-2">The objective of this surprise audit was to assess the compliance, effectiveness, and overall operations at the BCA Point. The audit focused on multiple aspects including infrastructure, adherence to procedures, and customer interactions.</p>
    </div>
    <div class="row">
        <p class="col-6"><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>Audit Number :</strong> <span id="auditNumber" data-id="all_audit_number"></span></p>
        <p class="col-6"><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>Auditing Date :</strong> <span id="auditDate" data-id="audit_date"></span></p>
    </div>
</div>

<!-- section B -->
<div class="section">
    <h2><img src="/bcaudit/assets/icons/headingIcon.png" alt="Icon" class="headingIcon"> General Information</h2>
    <div class="row">
        <div class="innerSection col-6">
        <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>BCA Full Name:</strong> <span id="bcaFullName" data-id="bca_name"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>BCA ID:</strong> <span id="bcaId" data-id="bca_id"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>BC Point Name:</strong> <span id="bcPointName" data-id="bc_point_name"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>BCA Contact Number:</strong> <span id="bcaContact" data-id="bca_contact_no"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>BCA Email Id:</strong> <span id="bcaEmail" data-id="bca_email_id"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>Transaction Module:</strong> <span id="transactionModule" data-id="transaction_module"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>BCA Bank Name:</strong> <span id="bcaBank" data-id="bca_bank"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>BCA Bank Branch:</strong> <span id="bcaBankBranch" data-id="bca_bank_branch"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>State :</strong> <span id="state" data-id="state"></span></p>
        </div>
        <div class="innerSection col-6">
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>Village :</strong> <span id="village" data-id="village"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>Location :</strong> <span id="location" data-id="location"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>District :</strong> <span id="district" data-id="district"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>Pin Code :</strong> <span id="pinCode" data-id="pin"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>Landmark :</strong> <span id="landmark" data-id="landmark"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>ABE Name :</strong> <span id="abeName" data-id="abe_name"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>ABM Name :</strong> <span id="abmName" data-id="abm_name"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>RM Name :</strong> <span id="rmName" data-id="rm_name"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>ZM Name :</strong> <span id="zmName" data-id="zm_name"></span></p>
        </div>
        <div class="innerSection">
        <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="Icon" class="pointIcon"><strong>BC Point full Address :</strong> <span id="bcPointAddress" data-id="bc_point_address"></span></p>
        </div>

    </div>


</div>

<!-- section C -->
<div class="section">
    <h2><img src="/bcaudit/assets/icons/headingIcon.png" alt="Icon" class="headingIcon"> Methodology of audit</h2>
    <div class="innerSection">
        <p class="ml-2"><strong>The audit was conducted through:</strong></p>
        <ul class="pl-3 ml-4">
            <li>BCA Point & On-site Observations</li>
            <li>BCA Appearance</li>
            <li>Infrastructure</li>
            <li>Documentation and Registers</li>
            <li>Staff Verification</li>
            <li>Customer Service Quality</li>
        </ul>
        <p>The purpose of this audit was to conduct a thorough and unannounced review of the BCA Point to ensure compliance with Integra & bank guidelines and evaluate the effectiveness of the current operational setup.</p>
    </div>
</div>



    <!-- section 1 -->
    <div class="section">
        <h2 class="sectionHeading"><img src="/bcaudit/assets/icons/headingIcon.png" alt="Icon" class="headingIcon">Operational Details</h2>
        <!--inner section1-->
        <div class="innerSection">
            <div class="subSection">
                <p class="question"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>What are the Operating Hours of BCA Point?</strong></p>
                <p class="longAnswer" id="operatingHours" data-id="operating_hours"></p>
            </div>
            <div class="subSection">
                <p class="question"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>BCA operated from the designated BCA Point?</strong></p>
                <div class="radioButtons">
                    <div class="radioButtonYes form-check form-check-inline">
                        <input class="custom-radio form-check-input" type="radio" name="trainingGiven" data-id="designated_location" id="trainingGivenYes" value="Yes" required>
                        <label class="custom-label form-check-label" for="trainingGivenYes">Yes</label>
                    </div>
                    <div class="radioButtonNo form-check form-check-inline">
                        <input class="custom-radio form-check-input" type="radio" name="trainingGiven" data-id="designated_location" id="trainingGivenNo" value="No" required>
                        <label class="custom-label form-check-label" for="trainingGivenNo">No</label>
                    </div>
                </div>
                <div class="remarks">
                    <p class="remarksLabel"><span class="mdi mdi-hand-pointing-right remarksIcon"></span>Remarks:</p>
                    <p class="remarksAns" id="remarks1" data-id="designated_location_remarks"></p>
                </div>
            </div>
      
            <div class="subSection">
            <p class="question"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Is any Training given by the ABE on Opportunity chart, commission, SSS camps, and other training to BCA during the time of visit?</strong></p>
            <div class="radioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeTraining" data-id="training_given" id="abeTrainingYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="abeTrainingYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeTraining" data-id="training_given" id="abeTrainingNo" value="No" required>
                    <label class="custom-label form-check-label" for="abeTrainingNo">No</label>
                </div>
            </div>
            <div class="remarks">
                <p class="remarksLabel"><span class="mdi mdi-hand-pointing-right remarksIcon"></span>Remarks:</p>
                <p class="remarksAns" id="remarks1" data-id="training_remarks"></p>
            </div>
        </div>

        <div class="subSection">
            <p class="question"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Business Explore (IBKART, IRCTC, near shop, Acquiring new location):</strong></p>
            <div class="radioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="businessExplore" data-id="business_explore" id="businessExploreYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="businessExploreYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="businessExplore" data-id="business_explore" id="businessExploreNo" value="No" required>
                    <label class="custom-label form-check-label" for="businessExploreNo">No</label>
                </div>
            </div>
            <div class="remarks">
                <p class="remarksLabel"><span class="mdi mdi-hand-pointing-right remarksIcon"></span>Remarks:</p>
                <p class="remarksAns" id="remarks2" data-id="business_explore_remarks"></p>
            </div>
        </div>

        <div class="subSection">
        <p class="question"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Support & Target Set By ABE on BCA Activities:</strong></p>
            <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>Targets Were set and communicated.</p>
                <div class="subQuestionRadioButtons">
                    <div class="radioButtonYes form-check form-check-inline">
                        <input class="custom-radio form-check-input" type="radio" name="targetsSet" data-id="target_set" id="targetsSetYes" value="Yes" required>
                        <label class="custom-label form-check-label" for="targetsSetYes">Yes</label>
                    </div>
                    <div class="radioButtonNo form-check form-check-inline">
                        <input class="custom-radio form-check-input" type="radio" name="targetsSet" data-id="target_set" id="targetsSetNo" value="No" required>
                        <label class="custom-label form-check-label" for="targetsSetNo">No</label>
                    </div>
                </div>
            </div>

            <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>Targets are clear to the BCA.</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="targetsClear" data-id="target_clear" id="targetsClearYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="targetsClearYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="targetsClear" data-id="target_clear" id="targetsClearNo" value="No" required>
                    <label class="custom-label form-check-label" for="targetsClearNo">No</label>
                </div>
            </div>
        </div>

        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>Are the visits by the ABE documented and recorded?</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="abeVisitsYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsNo" value="No" required>
                    <label class="custom-label form-check-label" for="abeVisitsNo">No</label>
                </div>
            </div>
        </div>
        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>Are the visits by the ABE documented and recorded?</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="abeVisitsYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsNo" value="No" required>
                    <label class="custom-label form-check-label" for="abeVisitsNo">No</label>
                </div>
            </div>
        </div>
        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>Are the visits by the ABE documented and recorded?</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="abeVisitsYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsNo" value="No" required>
                    <label class="custom-label form-check-label" for="abeVisitsNo">No</label>
                </div>
            </div>
        </div>
        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>Are the visits by the ABE documented and recorded?</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="abeVisitsYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsNo" value="No" required>
                    <label class="custom-label form-check-label" for="abeVisitsNo">No</label>
                </div>
            </div>
        </div>
        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>Are the visits by the ABE documented and recorded?</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="abeVisitsYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsNo" value="No" required>
                    <label class="custom-label form-check-label" for="abeVisitsNo">No</label>
                </div>
            </div>
        </div>
        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>Are the visits by the ABE documented and recorded?</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="abeVisitsYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsNo" value="No" required>
                    <label class="custom-label form-check-label" for="abeVisitsNo">No</label>
                </div>
            </div>
        </div>
        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>Are the visits by the ABE documented and recorded?</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="abeVisitsYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsNo" value="No" required>
                    <label class="custom-label form-check-label" for="abeVisitsNo">No</label>
                </div>
            </div>
        </div>
        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>Are the visits by the ABE documented and recorded?</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="abeVisitsYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsNo" value="No" required>
                    <label class="custom-label form-check-label" for="abeVisitsNo">No</label>
                </div>
            </div>
        </div>
        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>Are the visits by the ABE documented and recorded?</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="abeVisitsYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisits" data-id="target_documented" id="abeVisitsNo" value="No" required>
                    <label class="custom-label form-check-label" for="abeVisitsNo">No</label>
                </div>
            </div>
        </div>

        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>ABE Support for all BCA operational activities.</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeSupport" data-id="abe_support" id="abeSupportYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="abeSupportYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeSupport" data-id="abe_support" id="abeSupportNo" value="No" required>
                    <label class="custom-label form-check-label" for="abeSupportNo">No</label>
                </div>
            </div>
        </div>

        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>Sufficient support from the bank or ABE for handling transactions.</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="supportHandling" data-id="bank_support" id="supportHandlingYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="supportHandlingYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="supportHandling" data-id="bank_support" id="supportHandlingNo" value="No" required>
                    <label class="custom-label form-check-label" for="supportHandlingNo">No</label>
                </div>
            </div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><span class="mdi mdi-hand-pointing-right remarksIcon"></span>Remarks:</p>
            <p class="remarksAns" id="remarks3" data-id="target_remarks"></p>
        </div>
    </div>

    <div class="subSection">
        <p class="question"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>On-boarding Payment-operation</strong></p>
        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>A fee was paid during on-boarding.</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="feePaid" data-id="onboarding_fee_paid" id="feePaidYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="feePaidYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="feePaid" data-id="onboarding_fee_paid" id="feePaidNo" value="No" required>
                    <label class="custom-label form-check-label" for="feePaidNo">No</label>
                </div>
            </div>
        </div>

        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>Fee was unclearly explained, undocumented, and no receipt was issued.</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="feeUnclear" data-id="fee_unclear" id="feeUnclearYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="feeUnclearYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="feeUnclear" data-id="fee_unclear" id="feeUnclearNo" value="No" required>
                    <label class="custom-label form-check-label" for="feeUnclearNo">No</label>
                </div>
            </div>
        </div>
        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>All the on-boarding fees are documented and justified by the company.</p>
            <div class="subQuestionRadioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="feesDocumented" data-id="fees_documented" id="feesDocumentedYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="feesDocumentedYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="feesDocumented" data-id="fees_documented" id="feesDocumentedNo" value="No" required>
                    <label class="custom-label form-check-label" for="feesDocumentedNo">No</label>
                </div>
            </div>
        </div>

        <div class="subQuestion">
            <p class="subQuestionLabel"><span class="mdi mdi-hand-pointing-right subQuestionIcon"></span>How are fees payments made?</p>
            <p class="subShortAnswer" id="paymentMode" data-id="fee_payment_mode"></p>
        </div>
            <div class="remarks">
                <p class="remarksLabel"><span class="mdi mdi-hand-pointing-right remarksIcon"></span>Remarks:</p>
                <p class="remarksAns" id="remarks4" data-id="onboarding_remarks"></p>
            </div>
        </div>

        <div class="subSection">
            <p class="question"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>RM visited twice in the last month?</strong></p>
            <div class="radioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="rmVisited" data-id="rm_visit" id="rmVisitedYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="rmVisitedYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="rmVisited" data-id="rm_visit" id="rmVisitedNo" value="No" required>
                    <label class="custom-label form-check-label" for="rmVisitedNo">No</label>
                </div>
            </div>
            <div class="remarks">
                <p class="remarksLabel"><span class="mdi mdi-hand-pointing-right remarksIcon"></span>Remarks:</p>
                <p class="remarksAns" id="remarks5" data-id="rm_visit_remarks"></p>
            </div>
        </div>

        <div class="subSection">
            <p class="question"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>ABM visited once in the last month?</strong></p>
            <div class="radioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abmVisited" data-id="abm_visit" id="abmVisitedYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="abmVisitedYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abmVisited" data-id="abm_visit" id="abmVisitedNo" value="No" required>
                    <label class="custom-label form-check-label" for="abmVisitedNo">No</label>
                </div>
            </div>
            <div class="remarks">
                <p class="remarksLabel"><span class="mdi mdi-hand-pointing-right remarksIcon"></span>Remarks:</p>
                <p class="remarksAns" id="remarks6" data-id="abm_visit_remarks"></p>
            </div>
        </div>

        <div class="subSection">
            <p class="question"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>ABE visited three times in the last month?</strong></p>
            <div class="radioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisited" data-id="abe_visit" id="abeVisitedYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="abeVisitedYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="abeVisited" data-id="abe_visit" id="abeVisitedNo" value="No" required>
                    <label class="custom-label form-check-label" for="abeVisitedNo">No</label>
                </div>
            </div>
            <div class="remarks">
                <p class="remarksLabel"><span class="mdi mdi-hand-pointing-right remarksIcon"></span>Remarks:</p>
                <p class="remarksAns" id="remarks7" data-id="abe_visit_remarks"></p>
            </div>
        </div>

        <div class="subSection">
            <p class="question"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Bank officials visited the BCA point?</strong></p>
            <div class="radioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="bankOfficialsVisited" data-id="bank_official_visit" id="bankOfficialsVisitedYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="bankOfficialsVisitedYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="bankOfficialsVisited" data-id="bank_official_visit" id="bankOfficialsVisitedNo" value="No" required>
                    <label class="custom-label form-check-label" for="bankOfficialsVisitedNo">No</label>
                </div>
            </div>
            <div class="remarks">
                <p class="remarksLabel"><span class="mdi mdi-hand-pointing-right remarksIcon"></span>Remarks:</p>
                <p class="remarksAns" id="remarks8" data-id="bank_official_visit_remarks"></p>
            </div>
        </div>

        <div class="subSection">
            <p class="question"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>BC makes frequent visits to the bank?</strong></p>
            <div class="radioButtons">
                <div class="radioButtonYes form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="bcFrequentVisits" data-id="bc_visit" id="bcFrequentVisitsYes" value="Yes" required>
                    <label class="custom-label form-check-label" for="bcFrequentVisitsYes">Yes</label>
                </div>
                <div class="radioButtonNo form-check form-check-inline">
                    <input class="custom-radio form-check-input" type="radio" name="bcFrequentVisits" data-id="bc_visit" id="bcFrequentVisitsNo" value="No" required>
                    <label class="custom-label form-check-label" for="bcFrequentVisitsNo">No</label>
                </div>
            </div>
            <div class="remarks">
                <p class="remarksLabel"><span class="mdi mdi-hand-pointing-right remarksIcon"></span>Remarks:</p>
                <p class="remarksAns" id="remarks9" data-id="bc_visit_remarks"></p>
            </div>
        </div>
    </div>
    <!-- Inner section end -->
</div>
<!-- section end -->

 <!-- Auditor observation section -->
 <div class="section">
    <h2 class="sectionHeading"><img src="/bcaudit/assets/icons/headingIcon.png" alt="Icon" class="headingIcon">Auditor Observation</h2>
    <!--inner section-->
    <div class="innerSection">
        <div class="subSection" id="signature-area">
            <!-- Signatures will be populated here -->
        </div>
    </div>
    <!-- Inner section end -->
</div>
<!-- section end -->


<!-- .................... -->
 <!-- content End -->
        </div>
    </div>
 <!--main container End -->


<!-- dom purify cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.2/purify.min.js"></script>
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', async () => {

    // Disable check boxces
    const radioButtons = document.querySelectorAll('.custom-radio');
    radioButtons.forEach(radio => {
        radio.disabled = true; // Disable the radio buttons
    });

// jspdf part started
window.jsPDF = window.jspdf.jsPDF;
// Function to convert image URL to base64
async function getBase64ImageFromUrl(imageUrl) {
    const response = await fetch(imageUrl);
    const blob = await response.blob();
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onloadend = () => resolve(reader.result);
        reader.onerror = reject;
        reader.readAsDataURL(blob);
    });
}

// Function to generate PDF
async function generatePDF(audit_number) {
    const content = document.getElementById('content').outerHTML;
    const imageUrl = '../../assets/images/logo.png'; // Correct path for the uploaded logo

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF({
        orientation: 'portrait',
        unit: 'mm',
        format: 'a4',
        putOnlyUsedFonts: true,
        floatPrecision: 16
    });

    const imgData = await getBase64ImageFromUrl(imageUrl);

    // Wait for the content to be rendered before generating the PDF
    doc.html(content, {
        callback: function (doc) {
            const pageCount = doc.internal.getNumberOfPages();
            for (let i = 1; i <= pageCount; i++) {
                doc.setPage(i);

                // Add header with image and text side by side
                const imgWidth = 22; // Width of the image
                const imgHeight = 13; // Height of the image
                const imgX = 92; // X coordinate for the image
                const imgY = 7; // Y coordinate for the image
                doc.addImage(imgData, 'PNG', imgX, imgY, imgWidth, imgHeight);

                var pageWidth = doc.internal.pageSize.getWidth();
                var text = "Integra's Surprise Audit Field Review Report";
                var textX = 24;
                var textY = 30; 

                doc.setFont('helvetica', 'bold');
                doc.setFontSize(22);
                doc.setTextColor(35, 35, 35); // Set color in RGB
                doc.text(text, textX, textY);

                doc.setFont('helvetica', 'italic');
                doc.setLineWidth(0.5); // Set line width
                doc.setDrawColor(80, 80, 80); // Set header line color in RGB
                doc.line(10, 35, 200, 35); // Draw a line in the Header(x1,Y1, X2,Y2)

                // Add footer
                doc.setFontSize(12);
                doc.setLineWidth(1.5); // Set line width
                doc.setDrawColor(100, 100, 100); // Set line color in RGB
                doc.setTextColor(60, 60, 60); // Reset color in RGB
                doc.line(10, 270, 200, 270); // Draw a line in the footer(x1,Y1, X2,Y2)

                doc.addImage(imgData, 'PNG', 13.8, 274, 12, 7); //(imgX, imgY, imgWidth, imgHeight)
                doc.text('Integra Micro System (P) Ltd-Confidential', 28, 279);
                doc.text(`Page: ${i} of ${pageCount}`, 173, 279);
                const downloadDate = new Date().toLocaleDateString();
                const downloadTime = new Date().toLocaleTimeString();
                doc.setFontSize(8);
                doc.text(`Download Date: ${downloadDate}, Time: ${downloadTime}`, 138, 285);
            }
            const downloadTime = new Date().toLocaleTimeString();
            const auditNumber = audit_number;

            doc.save(`audit-report-${auditNumber}.pdf`);

            // Notify the parent window that the work is completed
            window.parent.postMessage('downloadCompleted', '*');
            window.close(); // Close the popup after download starts
        },
        margin: [42, 14, 32, 14], //(top, right, bottom, left)
        autoPaging: 'text',
        width: 180,
        windowWidth: 900
    });
}

// Function to populate data and then generate PDF
function populateAndGeneratePDF(data) {
    populateData(data);
    // generatePDF(data.all_audit_number);
}

// Function to fetch form data
function fetchFormData() {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '../../codes/fetchData/fetch_all_data_to_generate_pdf_report.php',
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    resolve(response.data);
                } else {
                    // window.parent.postMessage('error', '*');
                    window.close(); // Close the popup after error
                    console.error("Failed to fetch data: " + response.message);
                    reject(response.message);
                }
            },
            error: function(xhr, status, error) {
                // window.parent.postMessage('error', '*');
                window.close(); // Close the popup after error
                console.error('Error occurred while fetching data:', status, error);
                console.error(xhr.responseText);
                reject(error);
            }
        });
    });
}

// Function to fetch signatures
function fetchSignatures() {
    return fetch('../../codes/fetchData/fetch_signatures_to_generate_pdf_report.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error);
                throw new Error(data.error);
            }
            return data;
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            throw error;
        });
}

// Function to handle the combination of both data fetches
function handleDataFetch() {
    fetchFormData()
        .then(formData => {
            // After fetching form data, fetch signatures
            return fetchSignatures().then(signatures => {
                // Process both form data and signatures
                console.log('Signatures:', signatures);
                
                const signatureArea = document.getElementById('signature-area');
                signatureArea.innerHTML = ''; // Clear previous content if any

                let serialNumber = 1;
                let rowDiv = document.createElement('div');
                rowDiv.className = 'signature-row'; // Class to style rows
                signatureArea.appendChild(rowDiv);

                // Loop through the signature data and create HTML elements
                signatures.forEach((entry, index) => {
                    if (index % 3 === 0 && index !== 0) {
                        // Start a new row every 3 signatures
                        rowDiv = document.createElement('div');
                        rowDiv.className = 'signature-row';
                        signatureArea.appendChild(rowDiv);
                    }

                    const signatureEntry = document.createElement('div');
                    signatureEntry.className = 'signature-entry';

                    // Add serial number
                    const serialNumberElement = document.createElement('p');
                    serialNumberElement.textContent = `Auditor: ${serialNumber}`;
                    signatureEntry.appendChild(serialNumberElement);

                    // Create an img element for the base64-encoded signature data
                    const signatureImage = document.createElement('img');
                    signatureImage.src = entry.signature_data_url;
                    signatureImage.alt = 'Signature';
                    signatureImage.style.maxWidth = '150px'; // Adjust width as needed
                    signatureImage.style.height = 'auto'; // Maintain aspect ratio
                    signatureEntry.appendChild(signatureImage);

                    const empId = document.createElement('p');
                    empId.textContent = `Employee ID: ${entry.emp_id}`;
                    signatureEntry.appendChild(empId);

                    const fullName = document.createElement('p');
                    fullName.textContent = `Full Name: ${entry.full_name}`;
                    signatureEntry.appendChild(fullName);

                    // Display the formatted signature date
                    const dateText = document.createElement('p');
                    dateText.textContent = `Signed on: ${entry.formatted_signature_date}`;
                    signatureEntry.appendChild(dateText);

                    rowDiv.appendChild(signatureEntry);

                    // Increment serial number
                    serialNumber++;
                });
                populateAndGeneratePDF(formData);

            });
        })
        .catch(error => {
            // Handle any errors from either fetch operation
            console.error('Error:', error);
            window.parent.postMessage('error', '*');
            window.close(); // Close the popup after error
        });
}


// Call the function to handle both data fetches
handleDataFetch();

// Function to populate data
function populateData(data) {
    Object.keys(data).forEach(key => {
        const elements = document.querySelectorAll(`[data-id="${key}"]`); // Select all matching elements
        if (elements) {
            elements.forEach(element => {
                if (element.tagName.toLowerCase() === 'input' && element.type === 'radio') {
                    // For radio buttons
                    if (element.value === data[key]) {
                        element.checked = true;
                    }
                } else {
                    // For other elements
                    element.textContent = data[key];
                }
            });
        }
    });
    generatePDF(data.all_audit_number);

}

});
</script>
</body>
</html>
