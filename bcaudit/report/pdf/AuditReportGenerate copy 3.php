<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generating PDF...</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>


    <style>
        .content{
            font-size: 21px;
        }
        .innerSection{
            display: block;
            position: relative;
            padding: 5px;
            padding-left: 25px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .section {
            display: block;
            position: relative;
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

    .sectionHeading{
        display: flex;
        align-items: center;
    }

/* Common Style for both pdf and preview */

/* signature area style start*/
.signature-row {
    display: flex;
    /* justify-content: space-around; */
    margin-bottom: 20px; /* Space between rows */
}

.signature-entry {
    display: block;
    position: relative;
    margin: 10px;
    padding: 10px 15px;
    /* border: gray solid 2px; */
    line-height: 1.5;
}

.signature-entry img {
    display: block;
    margin-top: 10px;
    max-width: 110px;
    height: auto;
}
.signature-entry p {
    margin: 4px;
}

.bcaSignatureStampArea {
        display: flex;
        position: relative;
        gap: 30px; /* Optional: Adds space between the images */
    }

    .bcaSignatureStamp {
        max-width: 180px;
        height: 100px;
    }
    .signatureInfo{
        display: block;
        position: relative;
        align-items: center;
    }
    .auditObservationDescriptions{
        display: block;
        position: relative;
        min-height:100px;
    }

/* signature area style end*/
.headingIcon {
        width: 22px;
        height: 22px;
        vertical-align: middle;
        margin-right: 7px;
        margin-top: 2px;
    }
.pointIcon {
        width: 14px;
        height: 14px;
        vertical-align: middle;
        margin-right: 7px;
        margin-top: -2px;
    }
    .dotIcon {
        width: 6px;
        height: 6px;
        vertical-align: middle;
        margin-right: 7px;
    }
    
    /*Section Structure wise*/

    .question{
        display: block;
        margin: 1px;
    }
    .questionLabel{
        display: flex;
        padding-left: 5px;
    }
    .questionIcon {
        width: 14px;
        height: 14px;
        vertical-align: middle;
        margin-right: 7px;
        margin-top: 4px;
    }
    .subQuestion{
        display: block;
        position: relative;
        margin-top: 10px;
        margin-left: 10px;
    }
    .subQuestionLabel{
        display: flex;
        padding-left: 5px;
        font-weight: 500;
    }

    .subQuestionIcon{
        padding-right: 5px;
        width: 14px;
        height: 14px;
        margin-top: 4px;
        margin-right: 7px;

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
    .radioButtonNo{
        margin-left: 85px;
    }
            
    /*Remarks Design*/
    .remarks{
        display: flex;
        position: relative;
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
        width: 14px;
        height: 14px;
        vertical-align: middle;
        margin-right: 7px;
        margin-top: -2px;
    }
     /*Remarks Design End*/

/* <!-- new styles --> */

.devider {
  display: flex;
}

.halfWidth {
  flex: 1;
  box-sizing: border-box;
  padding: 10px;
}
.subSection{
    display: block;
    position: relative;
}
.bulletPoints{
    display: flex;
    align-items: center;
    padding-left: 20px;
}
    .checkbox {
            display: flex;
            align-items: center;
            width: 20px;
            height: 20px;
            margin-right: 10px;
            border: 2px solid #3e3e3e;
            border-radius: 3px;
            position: relative;
        }
        .checkbox.checked::before {
            display: flex;
            content: '';
            position: absolute;
            top: -1px;
            left: 6px;
            width: 6px;
            height: 14px;
            border: solid #000000;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
    .yesNosection {
            display: flex;
            position: relative;
            align-items: center; /* Vertically align items */
            gap: 100px; /* Space between the boxes */
            padding-left: 30px;
            margin: 1px;
        }

        .yesBox, .noBox {
            display: flex;
            align-items: center;
        }

        .yesLabel, .noLabel {
            padding: 10px;
            margin: auto;
            font-size: 23px;
        }
 </style>
 
</head>
<body>
<!-- pdf content start -->
<div class="content" id="content">
    <!-- .................................. -->
    <!-- same for both pdf and preview -->

    <!-- section 1  Objectives-->
    <div class="section">
        <h2 class="sectionHeading"><img src="/bcaudit/assets/icons/headingIcon.png" alt="" class="headingIcon">Objectives</h2>
        <div class="innerSection">
            <p>The objective of this surprise audit was to assess the compliance, effectiveness, and overall operations at the BCA Point. The audit focused on multiple aspects including infrastructure, adherence to procedures, and customer interactions.</p>
        </div>
        <div class="innerSection devider">
            <p class="halfWidth"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>Audit Number :</strong> <span id="auditNumber" data-id="all_audit_number"></span></p>
            <p class="halfWidth"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>Auditing Date :</strong> <span id="auditDate" data-id="audit_date"></span></p>
        </div>
    </div>


<!-- section 2 General Information-->
<div class="section">
    <h2 class="sectionHeading"><img src="/bcaudit/assets/icons/headingIcon.png" alt="" class="headingIcon">General Information</h2>
    <div class="innerSection devider">
        <div class="halfWidth">
        <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>BCA Full Name:</strong> <span id="bcaFullName" data-id="bca_name"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>BCA ID:</strong> <span id="bcaId" data-id="bca_id"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>BC Point Name:</strong> <span id="bcPointName" data-id="bc_point_name"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>BCA Contact Number:</strong> <span id="bcaContact" data-id="bca_contact_no"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>BCA Email Id:</strong> <span id="bcaEmail" data-id="bca_email_id"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>Transaction Module:</strong> <span id="transactionModule" data-id="transaction_module"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>BCA Bank Name:</strong> <span id="bcaBank" data-id="bca_bank"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>BCA Bank Branch:</strong> <span id="bcaBankBranch" data-id="bca_bank_branch"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>State :</strong> <span id="state" data-id="state"></span></p>
        </div>
        <div class="halfWidth">
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>Village :</strong> <span id="village" data-id="village"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>Location :</strong> <span id="location" data-id="location"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>District :</strong> <span id="district" data-id="district"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>Pin Code :</strong> <span id="pinCode" data-id="pin"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>Landmark :</strong> <span id="landmark" data-id="landmark"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>ABE Name :</strong> <span id="abeName" data-id="abe_name"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>ABM Name :</strong> <span id="abmName" data-id="abm_name"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>RM Name :</strong> <span id="rmName" data-id="rm_name"></span></p>
            <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>ZM Name :</strong> <span id="zmName" data-id="zm_name"></span></p>
        </div>
    </div>
    <div class="innerSection">
        <p><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="pointIcon"><strong>BC Point full Address :</strong> <span id="bcPointAddress" data-id="bc_point_address"></span></p>
    </div>
</div>


<!-- section 3 Methodology of audit-->
<div class="section">
    <h2 class="sectionHeading"><img src="/bcaudit/assets/icons/headingIcon.png" alt="" class="headingIcon">Methodology of audit</h2>
    <div class="innerSection">
        <div class="subSection">
            <p class="questionLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="questionIcon"><strong>The audit was conducted through:</strong></p>
            <p class="bulletPoints"><img src="/bcaudit/assets/icons/dotIcon.png" alt="" class="dotIcon">BCA Point & On-site Observations</p>
            <p class="bulletPoints"><img src="/bcaudit/assets/icons/dotIcon.png" alt="" class="dotIcon">BCA Appearance</p>
            <p class="bulletPoints"><img src="/bcaudit/assets/icons/dotIcon.png" alt="" class="dotIcon">Infrastructure</p>
            <p class="bulletPoints"><img src="/bcaudit/assets/icons/dotIcon.png" alt="" class="dotIcon">Documentation and Registers</p>
            <p class="bulletPoints"><img src="/bcaudit/assets/icons/dotIcon.png" alt="" class="dotIcon">Staff Verification</p>
            <p class="bulletPoints"><img src="/bcaudit/assets/icons/dotIcon.png" alt="" class="dotIcon">Customer Service Quality</p>

        </div>
        <div class="subSection">
            <p class="questionLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="questionIcon"><strong>Purpose Of the Audit:</strong></p>
            <p class="longAnswer">The purpose of this audit was to conduct a thorough and unannounced review of the BCA Point to ensure compliance with Integra & bank guidelines and evaluate the effectiveness of the current operational setup.</p>
        </div>
    </div>
</div>

<!-- Section 4  Operational Details-->
<div class="section">
    <h2 class="sectionHeading"><img src="/bcaudit/assets/icons/headingIcon.png" alt="" class="headingIcon">Operational Details</h2>
    <div class="innerSection">
        <div class="subSection">
            <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>What are the Operating Hours of BCA Point?</strong></p>
            <p class="longAnswer" id="operatingHours" data-id="operating_hours"></p>
        </div>
        <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>BCA operated from the designated BCA Point?</strong></p>
            <div class="yesNosection">
                <div class="yesBox" data-id="designated_location"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
                <div class="noBox" data-id="designated_location"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
            </div>
            <div class="remarks">
                <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks1" data-id="designated_location_remarks"></span></p>
            </div>
        </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Is any Training given by the ABE on Opportunity chart, commission, SSS camps, and other training to BCA during the time of visit?</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="training_given"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="training_given"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks2" data-id="training_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Business Explore (IBKART, IRCTC, near shop, Acquiring new location):</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="business_explore"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="business_explore"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks3" data-id="business_explore_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Support & Target Set By ABE on BCA Activities:</strong></p>
        <div class="subQuestion">
            <p class="subQuestionLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="subQuestionIcon"></span>Targets Were set and communicated.</p>
            <div class="yesNosection">
                <div class="yesBox" data-id="target_set"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
                <div class="noBox" data-id="target_set"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
            </div>
        </div>
        <div class="subQuestion">
            <p class="subQuestionLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="subQuestionIcon"></span>Targets are clear to the BCA.</p>
            <div class="yesNosection">
                <div class="yesBox" data-id="target_clear"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
                <div class="noBox" data-id="target_clear"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
            </div>
        </div>
        <div class="subQuestion">
            <p class="subQuestionLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="subQuestionIcon"></span>Are the visits by the ABE documented and recorded?</p>
            <div class="yesNosection">
                <div class="yesBox" data-id="target_documented"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
                <div class="noBox" data-id="target_documented"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
            </div>
        </div>
        <div class="subQuestion">
            <p class="subQuestionLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="subQuestionIcon"></span>ABE Support for all BCA operational activities.</p>
            <div class="yesNosection">
                <div class="yesBox" data-id="abe_support"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
                <div class="noBox" data-id="abe_support"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
            </div>
        </div>
        <div class="subQuestion">
            <p class="subQuestionLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="subQuestionIcon"></span>Sufficient support from the bank or ABE for handling transactions.</p>
            <div class="yesNosection">
                <div class="yesBox" data-id="bank_support"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
                <div class="noBox" data-id="bank_support"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
            </div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks4" data-id="target_remarks"></span></p>
        </div>
    </div>


<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>On-boarding Payment-operation</strong></p>
    <div class="subQuestion">
        <p class="subQuestionLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="subQuestionIcon"></span>A fee was paid during on-boarding.</p>
        <div class="yesNosection">
            <div class="yesBox" data-id="onboarding_fee_paid"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="onboarding_fee_paid"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
    </div>
    <div class="subQuestion">
        <p class="subQuestionLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="subQuestionIcon"></span>Fee was unclearly explained, undocumented, and no receipt was issued.</p>
        <div class="yesNosection">
            <div class="yesBox" data-id="fee_unclear"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="fee_unclear"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
    </div>
    <div class="subQuestion">
        <p class="subQuestionLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="subQuestionIcon"></span>All the on-boarding fees are documented and justified by the company.</p>
        <div class="yesNosection">
            <div class="yesBox" data-id="fee_unclear"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="fee_unclear"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
    </div>
    <div class="subQuestion">
        <p class="subQuestionLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="subQuestionIcon"></span>How are fees payments made?</p>
        <p class="longAnswer" id="operatingHours" data-id="operating_hours"></p>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks5" data-id="onboarding_fee_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>RM visited twice in the last month?</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="rm_visited"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="rm_visited"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks6" data-id="rm_visited_remarks"></span></p>
    </div>
</div>
<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>ABE visited three times in the last month?</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
    </div>
</div>
<div class="subSection">
    <div class="question">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Bank officials visited the BCA point?</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
    </div>
</div>
<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>BC makes frequent visits to the bank?</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
    </div>
</div>
    <!-- Inner section end -->
    </div>
</div>
<!-- section4 end -->

<!-- section 5 Hardware & Infrastructure-->
<div class="section">
    <h2 class="sectionHeading"><img src="/bcaudit/assets/icons/headingIcon.png" alt="" class="headingIcon">Hardware & Infrastructure</h2>
    <div class="innerSection">

        <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Laptop or Desktop Computer is Present.</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Printer device is Present.</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Scanner is Present.</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Biometric Device (Fingerprint Scanner) is Present.</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>POS (Point of Sale) Terminal is Present.</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Internet Router/Modem is Present.</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>UPS (Uninterruptible Power Supply) is Present.</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>CCTV Camera is Present.</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Mobile Phone or Tablet is Present.</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Cash Counting Machine is Present.</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Card Reader is Present.</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>External Hard Drive or USB Drive is Present (for backups):</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Photocopier is Present.</strong></p>
        <div class="yesNosection">
            <div class="yesBox" data-id="abe_visit"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
            <div class="noBox" data-id="abe_visit"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
        </div>
        <div class="remarks">
            <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns"  data-id="abe_visit_remarks"></span></p>
        </div>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Other Devices:</strong></p>
        <p class="longAnswer" id="operatingHours" data-id="operating_hours"></p>
    </div>

    <div class="subSection">
        <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Hardware'sRemarks:</strong></p>
        <p class="longAnswer" id="operatingHours" data-id="operating_hours"></p>
    </div>
    <!-- Inner section end -->
    </div>
</div>
<!-- section 5 end -->

<!-- section 6 Register Maintenance -->
<div class="section">
    <h2 class="sectionHeading"><img src="/bcaudit/assets/icons/headingIcon.png" alt="" class="headingIcon">Register Maintenance</h2>
    <div class="innerSection">

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Transaction Register: Records details of all financial transactions conducted.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="transaction_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="transaction_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_transaction_register" data-id="transaction_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Account Opening Register: Logs information about new accounts opened.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="account_opening_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="account_opening_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_account_opening_register" data-id="account_opening_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Complaint Register: Captures customer complaints and their resolution status.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="complaint_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="complaint_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_complaint_register" data-id="complaint_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Visitor Register: Records information about visitors to the BCA point.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="visitor_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="visitor_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_visitor_register" data-id="visitor_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Cash Register: Keeps track of cash inflows and outflows.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="cash_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="cash_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_cash_register" data-id="cash_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Audit Register: Documents audit visits and findings.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="audit_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="audit_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_audit_register" data-id="audit_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Service Register: Notes various services provided to customers.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="service_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="service_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_service_register" data-id="service_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Inventory Register: Lists the inventory of supplies and equipment.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="inventory_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="inventory_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_inventory_register" data-id="inventory_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Loan Register: Records details of loans disbursed and repayments made.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="loan_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="loan_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_loan_register" data-id="loan_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Customer Feedback Register: Captures customer feedback and suggestions.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="customer_feedback_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="customer_feedback_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_customer_feedback_register" data-id="customer_feedback_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Compliance Register: Tracks compliance-related activities and checks.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="compliance_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="compliance_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_compliance_register" data-id="compliance_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Staff Attendance Register: Records attendance and leave details of staff members.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="staff_attendance_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="staff_attendance_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_staff_attendance_register" data-id="staff_attendance_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Training Register: Tracks training sessions attended by the BCA and staff.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="training_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="training_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_training_register" data-id="training_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>SHG (Self Help Group) Register: Maintains details of SHG customers and their transactions.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="shg_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="shg_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_shg_register" data-id="shg_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Settlement Register: Documents settlement of daily transactions and balances.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="settlement_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="settlement_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_settlement_register" data-id="settlement_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Target Achievement Register: Logs targets set and achieved by the BCA.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="target_achievement_register"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="target_achievement_register"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_target_achievement_register" data-id="target_achievement_register_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>The entries are precise and correct.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="precise_entries"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="precise_entries"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_precise_entries" data-id="precise_entries_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Transaction registers contain varying and unreliable entries.</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="unreliable_entries"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="unreliable_entries"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_unreliable_entries" data-id="unreliable_entries_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Is it matching Txns count in the registers entry / Settlement account entry?</strong></p>
    <div class="yesNosection">
        <div class="yesBox" data-id="matching_txns_count"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
        <div class="noBox" data-id="matching_txns_count"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
    </div>
    <div class="remarks">
        <p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_matching_txns_count" data-id="matching_txns_count_remarks"></span></p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>Additional Remarks Regarding Registers:</strong></p>
        <p class="longAnswer" id="operatingHours" data-id="operating_hours"></p>
    </div>

    <!-- Inner section end -->
    </div>
</div>
<!-- section 6 end -->

<!-- section 7 Compliance & Verification -->
<div class="section">
    <h2 class="sectionHeading"><img src="/bcaudit/assets/icons/headingIcon.png" alt="" class="headingIcon">Compliance & Verification</h2>
    <div class="innerSection">

        <div class="subSection">
            <p class="questionLabel">
                <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
                <strong>Is the BC Point located in a prominent place?</strong>
            </p>
            <div class="yesNosection">
                <div class="yesBox" data-id="bc_point_prominent"><span class="checkbox" data-value="Yes"></span><span class="yesLabel">Yes</span></div>
                <div class="noBox" data-id="bc_point_prominent"><span class="checkbox" data-value="No"></span><span class="noLabel">No</span></div>
            </div>
            <div class="remarks"><p class="remarksLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_bc_point_prominent" data-id="bc_point_prominent_remarks"></span></p></div>
        </div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>The BC Point was clean and well-maintained.</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="bc_point_clean">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="bc_point_clean">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_bc_point_clean" data-id="bc_point_clean_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>All necessary posters were displayed?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="posters_displayed">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="posters_displayed">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_posters_displayed" data-id="posters_displayed_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Outdated posters were displayed?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="outdated_posters_displayed">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="outdated_posters_displayed">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">Remarks:<span class="remarksAns" id="remarks_outdated_posters_displayed" data-id="outdated_posters_displayed_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Dos and Don’ts for Customer Alert before Transactions Displayed?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="dos_donts_displayed">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="dos_donts_displayed">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
           Remarks:
            <span class="remarksAns" id="remarks_dos_donts_displayed" data-id="dos_donts_displayed_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>IIBF, DSA, police verification certificate is present?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="verification_certificate_present">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="verification_certificate_present">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
           Remarks:
            <span class="remarksAns" id="remarks_verification_certificate_present" data-id="verification_certificate_present_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Unauthorized individuals were observed engaging in Integra's BCA transaction activities.</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="unauthorized_individuals_observed">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="unauthorized_individuals_observed">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
           Remarks:
            <span class="remarksAns" id="remarks_unauthorized_individuals_observed" data-id="unauthorized_individuals_observed_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>BCA is using a valid ID card issued by the company?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="valid_id_card">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="valid_id_card">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
           Remarks:
            <span class="remarksAns" id="remarks_valid_id_card" data-id="valid_id_card_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Any evidence of clone fingerprint usage?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="clone_fingerprint_usage">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="clone_fingerprint_usage">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
           Remarks:
            <span class="remarksAns" id="remarks_clone_fingerprint_usage" data-id="clone_fingerprint_usage_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon"><strong>On-boarding Payment-operation</strong></p>
    <div class="subQuestion">
    <p class="subQuestionLabel">
        <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="subQuestionIcon">
        Any manual handwritten receipts issued by the BCA?
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="handwritten_receipts">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="handwritten_receipts">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
</div>

<div class="subQuestion">
    <p class="subQuestionLabel">
        <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="subQuestionIcon">
        Only system-generated transaction receipts are issued by the BCA.
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="system_generated_receipts">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="system_generated_receipts">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
</div>

    <div class="subQuestion">
        <p class="subQuestionLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="subQuestionIcon">
            The BCA collects and retains customer passbooks.
        </p>
        <div class="yesNosection">
            <div class="yesBox" data-id="collects_passbooks">
                <span class="checkbox" data-value="Yes"></span>
                <span class="yesLabel">Yes</span>
            </div>
            <div class="noBox" data-id="collects_passbooks">
                <span class="checkbox" data-value="No"></span>
                <span class="noLabel">No</span>
            </div>
        </div>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Customer transaction slips are handed over to the customer.</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="transaction_slips_handed_over">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="transaction_slips_handed_over">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
           Remarks:
            <span class="remarksAns" id="remarks_transaction_slips_handed_over" data-id="transaction_slips_handed_over_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Non-relevant applications were used.</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="non_relevant_applications_used">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="non_relevant_applications_used">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
           Remarks:
            <span class="remarksAns" id="remarks_non_relevant_applications_used" data-id="non_relevant_applications_used_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Accounts were found blocked without reason.</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="accounts_blocked_without_reason">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="accounts_blocked_without_reason">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
           Remarks:
            <span class="remarksAns" id="remarks_accounts_blocked_without_reason" data-id="accounts_blocked_without_reason_remarks"></span>
        </p>
    </div>
</div>

    <!-- Inner section end -->
    </div>
</div>
<!-- section 7 end -->

<!-- section 8 Transaction Verification -->
<div class="section">
    <h2 class="sectionHeading"><img src="/bcaudit/assets/icons/headingIcon.png" alt="" class="headingIcon">Transaction Verification</h2>
    <div class="innerSection">

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Transactions were processed promptly</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="transactions_processed_promptly">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="transactions_processed_promptly">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_transactions_processed_promptly" data-id="transactions_processed_promptly_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Are deposits and withdrawals processed promptly?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="deposits_withdrawals_promptly">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="deposits_withdrawals_promptly">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_deposits_withdrawals_promptly" data-id="deposits_withdrawals_promptly_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Is there any delay between the customer's request and the actual transaction?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="delay_between_request_transaction">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="delay_between_request_transaction">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_delay_between_request_transaction" data-id="delay_between_request_transaction_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Are all transactions accurately recorded in the system?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="transactions_accurately_recorded">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="transactions_accurately_recorded">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_transactions_accurately_recorded" data-id="transactions_accurately_recorded_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Do the timestamps on transaction slips match the actual transaction times?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="timestamps_match_transaction_times">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="timestamps_match_transaction_times">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_timestamps_match_transaction_times" data-id="timestamps_match_transaction_times_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Is proper customer verification conducted before processing transactions?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="proper_customer_verification">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="proper_customer_verification">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_proper_customer_verification" data-id="proper_customer_verification_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Are customer OTPs, biometric data, or PINs used by the BC for verifying transactions?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="verification_methods">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="verification_methods">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_verification_methods" data-id="verification_methods_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Are system-generated receipts issued for each transaction?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="system_generated_receipts">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="system_generated_receipts">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_system_generated_receipts" data-id="system_generated_receipts_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Are system-generated receipts issued for each transaction?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="system_generated_receipts">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="system_generated_receipts">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_system_generated_receipts" data-id="system_generated_receipts_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Are customers provided with a customer copy of the transaction slip?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="customer_copy_of_transaction_slip">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="customer_copy_of_transaction_slip">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_customer_copy_of_transaction_slip" data-id="customer_copy_of_transaction_slip_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Are deposit and withdrawal transactions within the prescribed limits?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="transactions_within_limits">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="transactions_within_limits">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_transactions_within_limits" data-id="transactions_within_limits_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Are any transactions exceeding the limits properly authorized and documented?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="transactions_exceeding_limits_authorized">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="transactions_exceeding_limits_authorized">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_transactions_exceeding_limits_authorized" data-id="transactions_exceeding_limits_authorized_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Is cash handled securely and accurately?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="cash_handled_securely">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="cash_handled_securely">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_cash_handled_securely" data-id="cash_handled_securely_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Are there any discrepancies in the cash register?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="discrepancies_in_cash_register">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="discrepancies_in_cash_register">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_discrepancies_in_cash_register" data-id="discrepancies_in_cash_register_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Are there any complaints regarding delays or errors in transactions?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="complaints_delays_errors">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="complaints_delays_errors">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_complaints_delays_errors" data-id="complaints_delays_errors_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Are the deposit and withdrawal procedures in compliance with the bank's policies?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="procedures_compliance_bank_policies">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="procedures_compliance_bank_policies">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_procedures_compliance_bank_policies" data-id="procedures_compliance_bank_policies_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Are regulatory requirements adhered to during transactions?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="regulatory_requirements_adhered_to">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="regulatory_requirements_adhered_to">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_regulatory_requirements_adhered_to" data-id="regulatory_requirements_adhered_to_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Is there a clear audit trail for each deposit and withdrawal?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="clear_audit_trail">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="clear_audit_trail">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_clear_audit_trail" data-id="clear_audit_trail_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Is there a clear communication of transaction details to customers?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="clear_communication_transaction_details">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="clear_communication_transaction_details">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_clear_communication_transaction_details" data-id="clear_communication_transaction_details_remarks"></span>
        </p>
    </div>
</div>

<div class="subSection">
    <p class="questionLabel">
        <img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">
        <strong>Are there any technical issues affecting transaction processing?</strong>
    </p>
    <div class="yesNosection">
        <div class="yesBox" data-id="technical_issues_transaction_processing">
            <span class="checkbox" data-value="Yes"></span>
            <span class="yesLabel">Yes</span>
        </div>
        <div class="noBox" data-id="technical_issues_transaction_processing">
            <span class="checkbox" data-value="No"></span>
            <span class="noLabel">No</span>
        </div>
    </div>
    <div class="remarks">
        <p class="remarksLabel">
            <img src="/bcaudit/assets/icons/handIcon.png" alt="" class="remarksIcon">
            Remarks:
            <span class="remarksAns" id="remarks_technical_issues_transaction_processing" data-id="technical_issues_transaction_processing_remarks"></span>
        </p>
    </div>
</div>

    <!-- Inner section end -->
    </div>
</div>
<!-- section 8 end -->

<!-- Section 9 BCA Signature and Stamp -->
<div class="section">
    <h2 class="sectionHeading"><img src="/bcaudit/assets/icons/headingIcon.png" alt="" class="headingIcon">BCA Signature & Stamp</h2>
    <div class="innerSection">

    <div class="subSection">

        <div class="bcaSignatureStampArea">
            <img src="" data-id="bca_signature_url" class="bcaSignatureStamp" id="bcaSignature">
            <img src="" data-id="bc_stamp_url" class="bcaSignatureStamp" id="bcaStamp">
        </div>
        <div class="signatureInfo">
            <p class="bulletPoints"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">Date: <span>27-Jun-2024</span></p>
            <p class="bulletPoints"><img src="/bcaudit/assets/icons/pointIcon.png" alt="" class="questionIcon">Place: <span>Bangalore</span></p>
        </div>
    </div>

    </div>
    <!-- Inner section end -->
</div>
<!-- section 9 end -->

 <!-- Section 10 Auditor observation and Signatures -->
 <div class="section">
    <h2 class="sectionHeading"><img src="/bcaudit/assets/icons/headingIcon.png" alt="" class="headingIcon">Auditor Observation & Signatures</h2>
    <div class="innerSection">
    <div class="subSection">
    <p class="questionLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="questionIcon"><strong>Purpose Of the Audit:</strong></p>
            <p class="auditObservationDescriptions">The purpose of this audit was to conduct a thorough and unannounced review of the BCA Point to ensure compliance with Integra & bank guidelines and evaluate the effectiveness of the current operational setup.</p>
        </div>
        <p class="questionLabel"><img src="/bcaudit/assets/icons/handIcon.png" alt="" class="questionIcon"><strong>Purpose Of the Audit:</strong></p>
            <p class="auditObservationDescriptions">The purpose of this audit was to conduct a thorough and unannounced review of the BCA Point to ensure compliance with Integra & bank guidelines and evaluate the effectiveness of the current operational setup.</p>
        </div>
    </div>
        <div class="subSection" id="signature-area">
            <!-- Signatures will be populated here -->
        </div>

    </div>
    <!-- Inner section end -->
</div>
<!-- section 10 end -->

 

<!-- .................... -->
    </div>
 <!--main container End -->

 <!-- <button type="submit" class="btn btn-success btn-sm ml-lg-5" id="downloadPdfButton">Download PDF</button> -->
<!-- dom purify cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.2/purify.min.js"></script>
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    
document.addEventListener('DOMContentLoaded', async () => {

// document.getElementById('downloadPdfButton').addEventListener('click',generatePDF);

    // Disable check boxces
    // const radioButtons = document.querySelectorAll('.custom-radio');
    // radioButtons.forEach(radio => {
    //     radio.disabled = true; // Disable the radio buttons
    // });

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

                doc.setFont('Helvetica', 'bold');
                doc.setFontSize(22);
                doc.setTextColor(35, 35, 35); // Set color in RGB
                doc.text(text, textX, textY);

                doc.setFont('Helvetica', 'italic');
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
            // Use FileSaver.js to save the PDF
            const pdfBlob = doc.output('blob');
            saveAs(pdfBlob, `audit-report-${auditNumber}.pdf`);
            // doc.save(`audit-report-${auditNumber}.pdf`);

            // Notify the parent window that the work is completed
            window.parent.postMessage('downloadCompleted', '*');
            window.close(); // Close the popup after download starts
        },
        margin: [38, 14, 32, 14], //(top, right, bottom, left)
        autoPaging: 'text',
        width: 180,
        windowWidth: 1000
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
                    serialNumberElement.innerHTML = `Auditor: ${serialNumber}`;

                    signatureEntry.appendChild(serialNumberElement);

                    // Create an img element for the base64-encoded signature data
                    const signatureImage = document.createElement('img');
                    signatureImage.src = entry.signature_data_url;
                    signatureImage.alt = 'no signature';
                    signatureImage.style.maxWidth = '150px';
                    signatureImage.style.height = '100px';
                    signatureEntry.appendChild(signatureImage);

                    const empId = document.createElement('p');
                    empId.textContent = `Emp ID: ${entry.emp_id}`;
                    signatureEntry.appendChild(empId);

                    const fullName = document.createElement('p');
                    fullName.textContent = `Name: ${entry.full_name}`;
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

// function populateData2(data) {
//     console.log('Data to populate:', data); 
// // Section A
// document.getElementById('auditNumber').textContent = data.all_audit_number || 'N/A';
// document.getElementById('auditDate').textContent = data.audit_date || 'N/A';

// // Section B
// document.getElementById('bcaFullName').textContent = data.bca_name || 'N/A';
// document.getElementById('bcaId').textContent = data.bca_id || 'N/A';
// document.getElementById('bcPointName').textContent = data.bc_point_name || 'N/A';
// document.getElementById('bcaContact').textContent = data.bca_contact_no || 'N/A';
// document.getElementById('bcaEmail').textContent = data.bca_email_id || 'N/A';
// document.getElementById('transactionModule').textContent = data.transaction_module || 'N/A';
// document.getElementById('bcaBank').textContent = data.bca_bank || 'N/A';
// document.getElementById('bcaBankBranch').textContent = data.bca_bank_branch || 'N/A';
// document.getElementById('location').textContent = data.location || 'N/A';
// document.getElementById('district').textContent = data.district || 'N/A';
// document.getElementById('state').textContent = data.state || 'N/A';
// document.getElementById('pinCode').textContent = data.pin || 'N/A';
// document.getElementById('landmark').textContent = data.landmark || 'N/A';
// document.getElementById('abeName').textContent = data.abe_name || 'N/A';
// document.getElementById('abmName').textContent = data.abm_ame || 'N/A';
// document.getElementById('rmName').textContent = data.rm_Name || 'N/A';
// document.getElementById('zmName').textContent = data.zm_Name || 'N/A';
// document.getElementById('bcPointAddress').textContent = data.bc_point_address || 'N/A';
// $('input[name="bcFrequentVisits"][value="' + data.complaint_register + '"]').prop('checked', true);
//     generatePDF(data.all_audit_number);

// }

    function populateData(data) {
        Object.keys(data).forEach(key => {
            const value = data[key];
            
            // Update checkboxes
            const checkboxes = document.querySelectorAll(`[data-id="${key}"] .checkbox`);
            checkboxes.forEach(checkbox => {
                if (checkbox.getAttribute('data-value') === value) {
                    checkbox.classList.add('checked');
                } else {
                    checkbox.classList.remove('checked');
                }
            });

            // Update text content
            const textElements = document.querySelectorAll(`p[data-id="${key}"]`);
            const spanElements = document.querySelectorAll(`span[data-id="${key}"]`);
            textElements.forEach(textElement => {
                textElement.textContent = value;
            });
            spanElements.forEach(textElement => {
                textElement.textContent = value;
            });
            const imgElements = document.querySelectorAll(`img[data-id="${key}"]`);
            imgElements.forEach(imgElement => {
                if (value){
                imgElement.src = '/bcaudit/codes/' + value;
                } else{
                    imgElement.style.display = 'none';
                }
            });

        });
    generatePDF(data.all_audit_number);
        
    }


// Start PDF generation when the popup loads
// window.onload = generatePDF;
});
</script>


</body>
</html>
