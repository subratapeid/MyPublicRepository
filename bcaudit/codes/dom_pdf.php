<?php
// Ensure you have the correct path to autoload.inc.php
require 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Initialize Dompdf with options
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);
$designated_location = 'No';
$data = [
    [
        "signature_data_url" => "signature1.png",
        "emp_id" => "INT101",
        "full_name" => "User 1",
        "date" => "2024-07-23 02:23:00",
        "formatted_signature_date" => "23-Jul-2024, 02:23 AM"
    ],
    [
        "signature_data_url" => "signature2.png",
        "emp_id" => "INT102",
        "full_name" => "User 2",
        "date" => "2024-07-23 02:23:00",
        "formatted_signature_date" => "23-Jul-2024, 02:23 AM"
    ],
    // Add more data as needed for testing
];

$html = '<html>
<head>
<style>
    .signature-section {
        flex: 1;
        max-width: 32%;
        box-sizing: border-box;
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd; /* Optional: for better visual testing */
    }

    .signature-section img {
        width: 100px;
        height: 30px;
    }

    .signature-section p {
        margin: 5px 0;
    }
</style>
</head>
<body>
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

<div id="signature-container" style="display: flex; flex-wrap: wrap;">
';

foreach ($data as $index => $entry) {
    if ($index % 3 == 0) {
        $html .= '<div class="signature-row" style="display: flex; width: 100%; justify-content: space-between; margin-bottom: 20px;">';
    }

    $html .= '
        <div class="signature-section">
            <img src="' . $entry['signature_data_url'] . '" alt="Signature">
            <p>Employee ID: ' . $entry['emp_id'] . '</p>
            <p>Full Name: ' . $entry['full_name'] . '</p>
            <p>Date: ' . $entry['formatted_signature_date'] . '</p>
        </div>
    ';

    if ($index % 3 == 2 || $index == count($data) - 1) {
        $html .= '</div>';
    }
}

$html .= '</div></body></html>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Output the generated PDF to Browser
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="document.pdf"');
echo $dompdf->output();
?>
