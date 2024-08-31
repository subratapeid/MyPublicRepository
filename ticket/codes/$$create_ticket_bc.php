<?php
require_once('config.php');

// Generate group id
function generateUniqueSerialNumber($conn) {
    // Get the last GID from the database
    $getLastSerialQuery = "SELECT MAX(gid) AS last_serial FROM groups";
    $result = $conn->query($getLastSerialQuery);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastSerialNumber = $row["last_serial"];
        // Increment the last serial number for uniqueness
        $serialNumber = $lastSerialNumber + 1;
    } else {
        // If no existing records, start with a default value
        $serialNumber = 10000;
    }

    return $serialNumber;
}
    // form variables for insert into DB

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $groupName = $_POST['groupName'];
    $pincode = $_POST['areaPinCode'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $city = $_POST['village'];
    $localAddress =$_POST['localAddress'];
    $groupformdate = DateTime::createFromFormat('d/m/Y', $_POST['groupformDate'])->format('Y-m-d');
    $meetingdate = DateTime::createFromFormat('d/m/Y', $_POST['meetingDate'])->format('Y-m-d');
    $place = $_POST['meetingPlace'];
    $serialNumber = generateUniqueSerialNumber($conn);
    $createdbyid = $_SESSION['user_id'];

    $insertQuery = "INSERT INTO temp_groups ( t_gid, t_gname, t_pin, t_state, t_district, t_city, t_address, t_gfdate, t_mdate, t_mplace, t_createdby) VALUES 
    ('$serialNumber', '$groupName', '$pincode', '$state', '$district','$city', '$localAddress', '$groupformdate','$meetingdate', '$place', '$createdbyid')";
   
// save data into db querry end

    if ($conn->query($insertQuery) === TRUE) {
        $groupId = $conn->insert_id;
        
        $successMessage = "Group created successfully!";
        $groupIdMessage = "<b>Group ID: $serialNumber </b>";
        echo "<script>
            setTimeout(function() {
                Swal.fire({
                    title: 'Success',
                    html: '$successMessage <br> $groupIdMessage',
                    icon: 'success',
                    
                }).then((result) => {
                    if (result.isConfirmed || result.isDismissed) {
                        window.location.href = 'group-details.php?Id=$groupId';
                    }
                });
            }, 100);
        </script>";
    } else {
        $errorMessage = "Error: " . $insertQuery . "<br>" . $conn->error;
        echo "<script>
            setTimeout(function() {
                Swal.fire({
                    title: 'Error',
                    text: '$errorMessage',
                    icon: 'error',
                    
                });
            }, 100);
        </script>";
    }
    

    
}
// group id generate completed
$conn->close();
?>