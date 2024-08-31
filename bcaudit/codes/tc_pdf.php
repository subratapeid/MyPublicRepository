<?php
require_once('tcpdf/tcpdf.php'); // Adjust the path to the TCPDF library


$designated_location = 'No';
// Example data array
$data = [
    [
      "signature_data_url" => "/bcaudit/codes/uploads/BcSignaturePhoto_Michael Johnson_AUD345743_28-Jul-2024_00-30-29.png",
      "emp_id" => "INT101",
      "full_name" => "User 1",
      "date" => "2024-07-23 02:23:00",
      "formatted_signature_date" => "23-Jul-2024, 02:23 AM"
    ],
    [
      "signature_data_url" => "/bcaudit/codes/uploads/BcSignaturePhoto_Michael Johnson_AUD345743_28-Jul-2024_00-30-29.png",
      "emp_id" => "INT102",
      "full_name" => "User2",
      "date" => "2024-07-23 02:23:00",
      "formatted_signature_date" => "23-Jul-2024, 02:23 AM"
    ],
    [
        "signature_data_url" => "/bcaudit/codes/uploads/BcSignaturePhoto_Michael Johnson_AUD345743_28-Jul-2024_00-30-29.png",
        "emp_id" => "INT102",
        "full_name" => "User2",
        "date" => "2024-07-23 02:23:00",
        "formatted_signature_date" => "23-Jul-2024, 02:23 AM"
      ]
  ];

class MYPDF extends TCPDF {
    // Page header
    public function Header() {
        // Logo
        $image_file = 'logo.png'; // Adjust path to your logo
        $this->Image($image_file, 92, 7, 22, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
        // Set font
        $this->SetFont('helvetica', 'B', 22);
        
        // Title
        $this->Ln(15);
        $this->Cell(0, 0, "Integra's Surprise Audit Field Review Report", 0, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        // Draw line
        $this->SetLineWidth(0.5);
        $this->SetDrawColor(80, 80, 80);
        $this->Line(10, 35, 200, 35);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-20);
        
        // Draw line
        $this->SetLineWidth(1.5);
        $this->SetDrawColor(100, 100, 100);
        $this->Line(10, 270, 200, 270);
        
    // Logo
    $image_file = 'logo.png'; // Adjust path to your logo
    $this->Image($image_file, 10, $this->GetY(), 12, 7, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

    // Company confidential text next to logo
    $this->SetFont('helvetica', '', 12);
    $this->SetX(24); // Adjust this value based on the logo width to position the text next to the logo
    $this->Cell(0, 7, 'Integra Micro System (P) Ltd-Confidential', 0, 1, 'L');

    // Set Y position for the next line
    $this->SetY(-15);

    // Page number on the right side
    $this->SetX(-70); // Adjust this value based on the desired position
    $this->SetY(-22); // Adjust this value based on the desired position
    $this->Cell(0, 7, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 1, 'R');

    // Download date and time on the right side below the page number
    $this->SetFont('helvetica', '', 8);
    $downloadDate = date('d/m/Y');
    $downloadTime = date('H:i:s');
    $this->SetX(-70); // Ensure the download date and time aligns with the previous text
    $this->Cell(0, 7, "Download Date: $downloadDate, Time: $downloadTime", 0, 0, 'R');
}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Audit Report');
$pdf->SetSubject('Audit Report');
$pdf->SetKeywords('TCPDF, PDF, audit, report');

// set default header data
$pdf->SetHeaderData('', 0, '', '', array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(14, 38, 14);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(32);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 35);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
// $pdf->setLanguageArray($l);

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

// set font
$pdf->SetFont('helvetica', '', 12);

// add a cell

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signature Layout Test</title>
    <style>
        body {
            font-size: 12px;
            color: red;
        }
        .section-title {
            font-size: 14px;
            font-weight: bold;
            margin-top: 20px;
        }
        .checkbox-group {
            margin-top: 10px;
        }
        .checkbox-group input {
            margin-right: 10px;
        }
        .remarks {
            margin-top: 10px;
        }
        .signature {
            margin-top: 20px;
        }
        .signature img {
            width: 50px;
            height: auto;
        }
        .details {
            margin-top: 10px;
        }

    .yesNosection {
        display: flex;
        gap: 10px;
    }
    .yesBox, .noBox {
        display: flex;
        align-items: center;
    }
    .checkbox {
        display: inline-block;
        width: 15px;
        height: 15px;
        border: 1px solid #000;
        text-align: center;
        line-height: 15px;
        font-size: 12px;
    }
    .checked {
        background-color: #00c853;
        color: #fff;
    }

        
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
/*Signature styles*/ 

.signature-container {
    flex: 1;
    padding: 10px;
    background-color: red;
    flex-wrap: wrap;

}

.signature-row {
    flex: 1;
    flex-direction: column;
    margin-bottom: 20px;
    background-color: grey;
    padding: 10px;

}

.signature-section {
    flex: 1;
    max-width: 32%;
    margin-left: 10px;
    padding: 10px 15px;
    background-color: green;
    
}

.signature-section img {
    width: 100px;
    height: 30px;
}

.signature-section p {
    margin: 5px 0;
}
</style></head><body>';

$html .= '
<div class="yesNosection">
    <div class="yesBox" data-id="designated_location">
        <img src="' . ($designated_location == 'Yes' ? 'tick.png' : 'blank_box.png') . '" class="checkbox" />
        <span class="yesLabel">Yes</span>
    </div>
    <div class="noBox" data-id="designated_location">
        <img src="' . ($designated_location == 'No' ? 'tick.png' : 'blank_box.png') . '" class="checkbox" />
        <span class="noLabel">No</span>
    </div>
</div>

<div class="section-title">Are there any technical issues affecting transaction processing?</div>
<div class="checkbox-group">
    <input type="checkbox"> Yes
    <input type="checkbox"> No
</div>
<div class="remarks">
    <div class="section-title">Remarks:</div>
    ___________________________________________
</div>

<div class="signature-container">';

foreach ($data as $index => $entry) {
    if ($index % 3 == 0) {
        $html .= '<div class="signature-row" style="display: flex; width: 100%; justify-content: space-between; margin-bottom: 20px;">';
    }

    $html .= '
        <div class="signature-section" style="flex: 1; max-width: 32%; box-sizing: border-box; padding: 10px; text-align: center; border: 1px solid #ddd;">
            <img src="' . $entry['signature_data_url'] . '" alt="Signature" style="width: 100px; height: 30px;">
            <p style="margin: 5px 0;">Employee ID: ' . $entry['emp_id'] . '</p>
            <p style="margin: 5px 0;">Name: ' . $entry['full_name'] . '</p>
            <p style="margin: 5px 0;">Date: ' . $entry['formatted_signature_date'] . '</p>
        </div>
    ';

    if ($index % 3 == 2) {
        $html .= '</div>';
    }
}

$html .= '</div></body></html>';

$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

// Close and output PDF document
$pdf->Output('audit-report.pdf', 'I');
?>
