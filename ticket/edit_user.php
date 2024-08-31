<?php
include 'include/navbar.php';

// Check if the user ID is set in the session
if (!isset($_SESSION['user_id'])) {
  echo '<script>window.location.href = "user-login.php";</script>';
  exit();  // Stop further execution
}
$userID=$_SESSION['user_id'];
$role=$_SESSION['user_role'];

// Check if ticket ID is present in the URL
if (isset($_POST['userId']) && !empty($_POST['userId'])) {
  $userId = $_POST['userId'];
} else {
  // Redirect to another page if ticket_id is not provided
  echo '<script>window.location.href = "all-users.php";</script>';
  exit();  // Stop further execution
}

$userId = isset($_POST['userId']) ? $_POST['userId'] : null;

    if ($userId) {
        // Check if the ticket ID exists in the database
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :userId');
        $stmt->execute(['userId' => $userId]);
        $user = $stmt->fetch();

        if (!$userId) {
            // Ticket not found, display alert and redirect to homepage
            echo '<script>alert("User not found."); window.location.href = "all-users.php";</script>';
            exit;  // Stop further execution
        }
      }
?>
<style>
    h1 {
        font-family: sans-serif;
        text-align: center;
        font-size: 30px;
        color: #222;
    }

    .profile-pic-div {
        width: 150px;
        height: 150px;
        position: relative; /* Position relative for container */
        margin: 0 auto; /* Center the container */
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid grey;
    }

    #photo {
        height: 100%;
        width: auto;
    }

    #file {
        display: none;
    }

    #uploadBtn {
        position: absolute;
        bottom: 0;
        left: 20%;
        transform: translateX(-20%);
        text-align: center;
        background: rgba(0, 0, 0, 0.7);
        color: wheat;
        line-height: 30px;
        font-family: sans-serif;
        font-size: 15px;
        cursor: pointer;
        width: 100%;
        opacity: 0;
        transition: opacity 0.5s ease; /* Add transition effect */
    }

    .profile-pic-div:hover #uploadBtn {
        opacity: 1; /* Show upload button on hover */
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Material Design Icons (MDI) CDN -->
<link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">

<!-- jQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JS CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="container mt-2 mb-3">
  <div class="card">
<div class="card-header py-0 px-2">
      <h2 class="text-center">Edit User Profile</h2>
    </div>
<div class="card-body">
 <!-- Image and Image Input Field -->
 <div class="profile-pic-div">
  <img src="assets/img/avatars/nouser.png" id="photo">
  <input type="file" id="file"onchange="loadFile(event)" accept="image/*"/>
  <label for="file" id="uploadBtn">Change Photo</label>
</div>

<script>
    var loadFile = function(event) {
        var image = document.getElementById("photo");
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<form class="row g-3 needs-validation" action="" method="post" novalidate>
  <div class="col-xl-4 col-md-6">
    <label for="validationCustom01" class="form-label">First name</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" value="" id="firstName" placeholder="firstname" required>
  </div>
</div>
  <div class="col-xl-4 col-md-6">
    <label for="validationCustom02" class="form-label">Last name</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
            
    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="surname" required>
    </div>
  </div>

  <div class="col-xl-4 col-md-6">
    <label for="validationCustomUsername" class="form-label" >Email Id</label>
    
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="email" class="form-control" id="email" aria-describedby="inputGroupPrepend" name="email" placeholder="example@company.com" required>
      <div class="invalid-feedback">
        Please enter Employee email id.
      </div>
    </div>
  </div>
 <!-- Email Vaild only for organization -->
  <!-- <script>
    document.getElementById('email').addEventListener('input', function() {
      var emailInput = this.value.toLowerCase();
      var allowedDomains = ['integramicro.co.in', 'integra.com'];

      // Check if the entered email has one of the allowed domains
      if (allowedDomains.some(domain => emailInput.endsWith('@' + domain))) {
        this.setCustomValidity('');
        this.classList.remove('is-invalid');
      } else {
        this.setCustomValidity('Invalid email address. Please use an email from integramicro.co.in or integra.com.');
        this.classList.add('is-invalid');
      }
    });
  </script> -->

  <div class="col-xl-4 col-md-6">
    <label for="mobile" class="form-label">Phone Number</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-phone" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" pattern="\d*" id="pinInput" name="userMobile" placeholder="Enter 10 Digit Mobile No" title="Please enter 10-digit Mobile No" maxlength="10" minlength="10" required>
    <div class="invalid-feedback">
      Please provide a valid Mobile No.
    </div>
  </div>
  </div>
  
  <div class="col-xl-4 col-md-6">
    <label for="validationCustom04" class="form-label">User Role</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-account" id="inputGroupPrepend"></span>
    <select class="form-select" name="role" id="user_role" required>
      <option selected disabled value="">Choose...</option>
      <option>Admin</option>
    </select>

    </div>
  </div>
  <div class="col-xl-4 col-md-6 department-fields generic style='hidden'">
    <label for="department" class="form-label">department</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-briefcase-variant-outline" id="inputGroupPrepend"></span>
              <select class="form-select" name="department" id="department" required>
      <option selected disabled value="">Choose department</option>
      <option>Technical support</option>
      <option>Hardware</option>
      <option>Database</option>
      <option>Field</option>
    </select>

  </div>
  </div>

  <div class="col-xl-4 col-md-6 department-fields ho-ro-it">
    <label for="validationCustom05" class="form-label">Office Pin</label>
    <div class="input-group has-validation">
              <span class="input-group-text mdi mdi-map-marker" id="inputGroupPrepend"></span>
    <input type="text" class="form-control" Name="pin" id="pincode" pattern="\d*" placeholder="Enter 6 Digit PIN" title="Please enter a 6-digit PIN" maxlength="6" minlength="6" oninput="getLocation()" required>
    <div class="invalid-feedback">
      Please provide a valid zip.
    </div>
  </div>
  </div>

  <div class="col-xl-4 col-md-6 department-fields ho-ro-it">
    <label for="location" class="form-label">Office Location</label> 
    <div class="input-group has-validation">
        <span class="input-group-text mdi mdi-city" id="inputGroupPrepend"></span>     
        <input type="text" class="form-control" name="office" id="location" readonly>
    </div>
</div>

  <div class="col-12 d-flex justify-content-center pt-4 pb-4">
    <button class="btn btn-danger me-2" type="cancel">Cancel</button>
    <button class="btn btn-success ms-2" type="submit">Update User</button>
  </div>
</form>
</div>
</div>
</div>
<script>
    // Function to make a POST request to fetch user data
    function fetchUserData() {
        var apiUrl = 'codes/get_user_details.php'; // Relative path to your PHP API endpoint
        var userId = <?php echo json_encode($userId); ?>;
        var data = { userId: userId };

        $.ajax({
            url: apiUrl, // Adjust the URL according to your file structure
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(response) {
                populateUserData(response); // Call populateUserData function with the response data
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('Error fetching user details. Please try again later.');
            }
        });
    }

    // Function to populate user data into input fields
    function populateUserData(user) {
        document.getElementById('firstName').value = user.first_name;
        document.getElementById('lastName').value = user.last_name;
        document.getElementById('email').value = user.email;
        document.getElementById('pinInput').value = user.mobile;
        document.getElementById('user_role').value = user.role;
        document.getElementById('department').value = user.department;
        document.getElementById('pincode').value = user.pin;
        document.getElementById('location').value = user.office;
        let img_url = user.img_url ? user.img_url : 'assets/img/avatars/nouser.png';
        document.getElementById('photo').src = img_url; // Update the src attribute of the img element
    }

    // Call the fetchUserData function when the page loads
    window.onload = function() {
        fetchUserData();
    };

</script>


<?php include 'include/footer.php'; ?>