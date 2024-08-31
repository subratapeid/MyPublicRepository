

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
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            font-size: 18px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
            margin-bottom: 10px;
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
    </style>
 
</head>
<body>
    <!-- <h3>Generating PDF, please wait...</h3> -->

    <div class=" " id="content">
        <div class="content">
            <div class="row">
            <div class="section col-6">
    <h2>A: General Information</h2>
        <p><strong>BCA ID:</strong> <span id="bca-id">[BCA_ID]</span></p>
        <p><strong>BCA Full Name:</strong> <span id="bca-full-name">[BCA_FULL_NAME]</span></p>
        <p><strong>BC Point Name:</strong> <span id="bc-point-name">[BC_POINT_NAME]</span></p>
        <p><strong>BCA Appearance:</strong> <span id="bca-appearance">[BCA_APPEARANCE]</span></p>
    </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div><div class="row">
                <div class="section col-6">
                    <h2>A: General Information</h2>
                    <p><strong>BCA ID:</strong> BC5436</p>
                    <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                    <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                    <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
                </div>
                <div class="section col-6">
                    <h2>B: Equipment and Infrastructure</h2>
                    <ul>
                        <li>Available Equipment: Laptop, Printer, Fingerprint Scanner, CCTV, Wifi, Passbook Printer</li>
                        <li>Remarks for Equipment: All equipment are new and working well</li>
                    </ul>
                </div>
            </div>
            <div class="section">
                <h2>C: Compliance and Verification</h2>
                <p><strong>BCA ID:</strong> BC5436</p>
                <p><strong>BCA Full Name:</strong> Subrata Porel</p>
                <p><strong>BC Point Name:</strong> ABCD Financial and Digital Pariseva Center</p>
                <p><strong>BCA Appearance:</strong> There are functionally infinite variations in human phenotypes...</p>
            </div>
            <div id="signature-area">
                <!-- Signatures will be populated here -->
            </div>
        </div>
    </div>
 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.2/purify.min.js"></script>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

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
                var textWidth = doc.getTextWidth(text);
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
            const auditNumber =audit_number;

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
    generatePDF(data.all_audit_number);
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
                    window.parent.postMessage('error', '*');
                    window.close(); // Close the popup after error
                    console.error("Failed to fetch data: " + response.message);
                    reject(response.message);
                }
            },
            error: function(xhr, status, error) {
                window.parent.postMessage('error', '*');
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
                populateAndGeneratePDF(formData);
                
                const signatureArea = document.getElementById('signature-area');
                let serialNumber = 1;

                // Loop through the signature data and create HTML elements
                signatures.forEach(entry => {
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
                    signatureImage.style.maxWidth = '100%'; // Adjust as needed
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

                    signatureArea.appendChild(signatureEntry);

                    // Increment serial number
                    serialNumber++;
                });
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


function populateData(data) {
    console.log('Data to populate:', data); // Log the data object
    document.getElementById('bca-id').textContent = data.bca_id || 'N/A';
    document.getElementById('bca-full-name').textContent = data.bca_full_name || 'N/A';
    document.getElementById('bc-point-name').textContent = data.bc_point_name || 'N/A';
    document.getElementById('bca-appearance').textContent = data.bca_appearance || 'N/A';
}


// Start PDF generation when the popup loads
// window.onload = generatePDF;
</script>
</body>
</html>
