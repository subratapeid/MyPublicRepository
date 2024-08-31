<!-- single ticket view page for Executives -->
<?php
include 'include/navbar.php';

// Check if the user ID is set in the session
if (!isset($_SESSION['user_id'])) {
  echo '<script>window.location.href = "bc-login.php";</script>';
  exit();  // Stop further execution
}
$userId=$_SESSION['user_id'];
$role=$_SESSION['user_role'];

// Check if ticket ID is present in the URL
if (isset($_POST['ticket_id']) && !empty($_POST['ticket_id'])) {
  $ticketId = $_POST['ticket_id'];
  // Now, $ticketId contains the value of ticket_id from the POST request
  // You can use $ticketId for further processing or to store in a database
} else {
  // Redirect to another page if ticket_id is not provided
  echo '<script>window.location.href = "assigned-tickets.php";</script>';
  exit();  // Stop further execution
}

$ticketId = isset($_POST['ticket_id']) ? $_POST['ticket_id'] : null;

    if ($ticketId) {
        // Check if the ticket ID exists in the database
        $stmt = $pdo->prepare('SELECT *, DATE_FORMAT(created_date, "%Y-%m-%d %h:%i %p") AS formatted_created_date FROM tickets WHERE ticket_id = :ticketId');
        $stmt->execute(['ticketId' => $ticketId]);
        $ticket = $stmt->fetch();
      //ticket reply table connoct
        $stmt = $pdo->prepare('SELECT * FROM ticket_reply WHERE ticket_id = :ticketId');
        $stmt->execute(['ticketId' => $ticketId]);
        $ticket_reply = $stmt->fetch();

        //get user data
        if ($role=="Customer") {
            $stmt = $pdo->prepare('SELECT * FROM bc_details WHERE bc_id = :user_id');
            $stmt->execute(['user_id' => $userId]);
            $bc = $stmt->fetch();
            $userFirstName= $bc['bc_first_name'] ?? null;
            $userRole= "BC/Customer" ?? null;
            
            }
            else{
            $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :user_id');
            $stmt->execute(['user_id' => $userId]);
            $users = $stmt->fetch();
            $userFirstName= $users['first_name'] ?? null;
            $userRole= $users['role'] ?? null;
    
            }

        if (!$ticket) {
            // Ticket not found, display alert and redirect to homepage
            echo '<script>alert("Ticket not found."); window.location.href = "homepage.php";</script>';
            exit;  // Stop further execution
        }
        $lockedBy = $ticket['locked_by'] ?? null;
        $ticketStatus = $ticket['status'] ?? null;
        $ticketCreatedBy= $ticket['created_by_id'] ?? null;
        $replyBy= $ticket_reply['reply_by_id'] ?? null;
        

        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :user_id');
        $stmt->execute(['user_id' => $lockedBy]);
        $userD = $stmt->fetch();
        $lockedNyName= $userD['first_name'] ?? null;

        $ticketId= $ticket['ticket_id'] ?? null;
        $issueType= $ticket['issue_type'] ?? null;
        $createdBy= $ticket['created_by'] ?? null;
        $userAvatar= $users['img_url'] ?? null;

        $mobile= $ticket['mobile'] ?? null;
        $createdDate= $ticket['formatted_created_date'] ?? null;
        $status= $ticket['status'] ?? null;
        $details= $ticket['descriptions'] ?? null;
        $image = !empty($ticket['image']) ? $ticket['image'] : null;
      }
?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div id="loader-overlay2">
    <div id="loader2">
        Please Wait...
    </div>
</div>
<style>
#loader-overlay2 {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black */
    z-index: 9999; /* Ensure it appears on top of other elements */
}

#loader2 {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 24px;
}
</style>
<!-- 
<div class="container mt-5">
  <h2 class="text-center mb-4">Ticket Conversation</h2>

  Reply Container
  <div id="replyContainer"></div>
  <div class="row mb-3">
    <div class="card col-12 mt-5 pt-2 pb-2">
        <div class="card">
            <div class="card-header bg-success"><h3>Give A Reply</h3></div>
            <form id="messageForm" action="email/reply_email.php?ticket_id=1234" method="GET" enctype="multipart/form-data">
                <div class="card-body">
                <input type="hidden" id="ticket_id" name="ticket_id" value="1">
        <input type="text" id="username" name="username" value="1234" placeholder="Username">
        <div class="input-group">
            <textarea id="message" name="message" class="form-control" placeholder="Type your messages..." style="resize: none; height: auto;" rows="2" required></textarea>
                        <div class="input-group-append">
                            <label class="input-group-text outline-secondary" for="image" style="cursor: pointer; padding-left: 15px; padding-right: 15px;">
                                <i class="fas fa-camera fa-lg mr-2"></i>
                            </label>
                            <input type="file" name="image" accept="image/*" id="image" style="display: none;">
                        </div>
                    </div>
                    <span id="img_name"></span>
                    <div class="row pt-2 pb-2 justify-content-center">
                        <div class="col-6 d-flex justify-content-center">
                            <button type="button" class="btn btn-danger" id="closeTicketButton">Close Ticket</button>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <button type="button" class="btn btn-success" id="sendButton">Send</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->

<div class="container mt-1">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Ticket Details For Ticket ID: <?php echo $ticketId; ?></h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <!-- Left column content -->
                    <p class="card-text"><strong>Issue Type:</strong> <?php echo $issueType; ?></p>
                    <p class="card-text"><strong>Created By:</strong> <?php echo $createdBy; ?></p>
                    <p class="card-text"><strong>Contact No:</strong> <?php echo $mobile; ?></p>
                    <p class="card-text"><strong>Created On:</strong> <?php echo $createdDate; ?></p>
                </div>
                <div class="col-md-6">
                    <!-- Right column content -->

                    <p class="card-text">
    <strong>Status:</strong> 
    <?php 
        if ($status === 'Open') {
            echo '<span style="color: red; font-weight: bold;">Open</span>';
        } elseif ($status === 'Closed') {
            echo '<span style="color: gray; font-weight: bold;">Closed</span>';
        } elseif ($status === 'Answered') {
            echo '<span style="color: darkcyan; font-weight: bold;">Answered</span>';
        } else {
            echo '<span style="font-weight: bold;">' . $status . '</span>'; // Display other statuses as bold
        }
    ?>
</p>

                    <p class="card-text"><strong>Details:</strong> <?php echo $details; ?></p>
                    <!-- <p class="card-text"><strong>Image:</strong> <?php echo $image; ?></p> -->
                    <p class="card-text">
                    <strong>Image:</strong>
                    <?php if (!empty($image) && is_string($image)): ?>
                        <a href="tickets/<?php echo $image; ?>" target="_blank">
                        <button> View Image</button>
                        </a>
                        <?php else: ?>
                        Screenshot/Image Not Provided
                    <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container col-12 mt-3">
<div class="card">
        <div class="card-header">
  <h4 class="text-center mb-1">Ticket Conversation</h4>
  </div>
        <div class="card-body">
  <!-- Reply Container -->
  <div id="replyContainer"></div>
  </div>
</div>



  <div class="row mb-3">
    <div class="card col-12 mt-5 pt-2 pb-2">
        <div class="card">
        <div class="card-header-narrow pt-1 text-center align-items-center bg-info"><h5>Give A Reply</h5></div>
            <form id="messageForm" enctype="multipart/form-data">
                <div class="card-body">
        <div class="input-group">
            <textarea id="message" name="message" class="form-control" placeholder="Type your messages..." style="resize: none; height: auto;" rows="3" required></textarea>
                        <div class="input-group-append">
                            <label class="input-group-text outline-secondary" for="image" style="cursor: pointer; padding-left: 15px; padding-right: 15px;">
                                <i class="fas fa-camera fa-lg mr-2"></i>
                            </label>
                            <input type="file" name="image" accept="image/*" id="image" style="display: none;">
                        </div>
                    </div>
                    <span id="img_name"></span>

                    <!-- new buttons -->
            <div class="row pt-2 pb-2 mt-3 justify-content-center">
                <div class="col-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" id="back">
                        <i class="fas fa-arrow-left"></i> Back
                    </button>
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-danger" id="closeTicketButton">Close Ticket
                    </button>
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-success" id="sendButton">
                        <i class="fas fa-paper-plane"></i> Send
                    </button>
                </div>
            </div>


                </div>
            </form>
        </div>
        </div>
        </div>

<!-- script to save reply in db triger using ajax and save using php -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById("back").addEventListener("click", function() {
        window.history.back();
    });
</script>

<script>$(document).ready(function() {
    var userId = '<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>';
    var createdByAvatar = "<?php echo isset($userAvatar) ? addslashes($userAvatar) : 'assets/img/avatars/nouser.png'; ?>";
    var urlParams = new URLSearchParams(window.location.search);
    var ticketId = "<?php echo $ticketId; ?>";
    var ticketCreatedBy = "<?php echo $ticketCreatedBy; ?>";
    var lockedById = "<?php echo $lockedBy; ?>";
    var replyBy = "<?php echo $replyBy; ?>";
    var userFirstName ="<?php echo $userFirstName; ?>";
    var userRole ="<?php echo $userRole; ?>";
    var loggedInUserId = '<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>'; 
    var ticketStatus = "<?php echo $ticketStatus; ?>";
    var dateTime;
    // fUNCTION To get the exact time
function exactDateTime() {
  fetch('http://worldtimeapi.org/api/timezone/Asia/Kolkata')
    .then(response => response.json())
    .then(data => {
    const utcTime = new Date(data.utc_datetime);
    const kolkataTime = new Date(utcTime.setHours(utcTime.getHours() + 5, utcTime.getMinutes() + 30));
      // Format the date and time
      dateTime = kolkataTime.toISOString().slice(0, 19).replace("T", " ");
      // Call additional callback function
    })
    .catch(error => console.error('Error fetching exact time:', error));
}
setInterval(exactDateTime, 1000);


    // Function to fetch and display replies
    function fetchAndDisplayReplies(ticketId, replyBy) {
        $.ajax({
            url: 'fetchReplies.php',
            type: 'GET',
            data: { ticketId: ticketId },
            dataType: 'json',
            success: function(response) {
                $('#replyContainer').empty();
                if (response && response.length > 0) {
                    response.forEach(function(reply) {
                        // ... (existing code for generating replyHtml)

                        var replyHtml;
                    if (ticketCreatedBy === reply.reply_by_id) {
                        var formattedDate = new Date(reply.date).toLocaleString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true });
                        if (reply.reply_by_id==loggedInUserId){
                            var reply_by="You";
                            // var avatar="assets/img/avatars/user.jpg";
                        } else {
                            var reply_by=reply.reply_by;
                            // var avatar="asset/img/avatars/user.jpg";
                        }
                        // Use the previously given template
                        replyHtml = '<div class="row mb-3">';
                        replyHtml += '<div class="col-11 col-md-8">';
                        replyHtml += '<div class="card">';
                        replyHtml += '<div class="card-header-narrow bg-secondary text-white pl-1 pr-1">';
                        replyHtml += '<img src="' + reply.reply_by_avatar + '"  class="rounded-circle float-left" alt="User Avatar" style="height:18.59px;">';
                        replyHtml += '<span class=" float-left ml-2 style" style="font-size: 13px;">' + reply_by + '</span>';
                        replyHtml += '<span class=" float-left ml-2" style="font-size: 13px;">' + reply.user_role + '</span>';
                        // replyHtml += '<span class="float-right" style="font-size: 13px;">' + reply.date + '</span>';
                        replyHtml += '<span class="float-right" style="font-size: 13px;">' + formattedDate + '</span>';
                        replyHtml += '</div>';
                        replyHtml += '<div class="card-body">';
                        replyHtml += '<p>' + reply.message + '</p>';
                        if (reply.img_path) {
                            replyHtml += '<div class="mt-2">';
                            replyHtml += '<a href="' + reply.img_path + '" target="_blank" class="btn btn-sm btn-primary">View image</a>';
                            replyHtml += '</div>';
                        }
                        replyHtml += '</div>';
                        replyHtml += '</div>';
                        replyHtml += '</div>';
                        replyHtml += '</div>';

                    } else {
                        var formattedDate = new Date(reply.date).toLocaleString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true });
                        if (reply.reply_by_id==loggedInUserId){
                            var reply_by="You";
                        } else {
                            var reply_by=reply.reply_by;
                        }
                        // Use the new template
                        replyHtml = '<div class="row mb-3">';
                        replyHtml += '<div class="col-11 col-md-8 ml-auto">';
                        replyHtml += '<div class="card">';
                        replyHtml += '<div class="card-header-narrow bg-success pl-1 pr-1">';
                        replyHtml += '<img src="' + reply.reply_by_avatar + '"  class="rounded-circle float-right" alt="Executive Avatar" style="height:18.59px;">';
                        replyHtml += '<span class="float-right mr-2" style="font-size: 13px;">' + reply_by + '</span>';
                        replyHtml += '<span class="float-right mr-2" style="font-size: 13px;">' + reply.user_role + '</span>';
                        // replyHtml += '<span class="float-left" style="font-size: 13px;">' + reply.date + '</span>';
                        replyHtml += '<span class="float-left" style="font-size: 13px;">' + formattedDate + '</span>';
                        replyHtml += '</div>';
                        replyHtml += '<div class="card-body text-right">';
                        replyHtml += '<p>' + reply.message + '</p>';
                        if (reply.img_path) {
                            replyHtml += '<div class="mt-2">';
                            replyHtml += '<a href="' + reply.img_path + '" target="_blank" class="btn btn-sm btn-primary">View image</a>';
                            replyHtml += '</div>';
                        }
                        replyHtml += '</div>';
                        replyHtml += '</div>';
                        replyHtml += '</div>';
                        replyHtml += '</div>';
                    }
                    $('#replyContainer').append(replyHtml);
                    });
                } else {
                    $('#replyContainer').html('<p>No replies found.</p>');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                $('#replyContainer').html('<p>Error loading replies.</p>');
            }
        });
    }

// Click event listener for the "closeTicketButton" button
document.getElementById('closeTicketButton').addEventListener('click', function() {
    event.preventDefault();
            // Show confirmation alert
    var confirmed = confirm('Are you sure you want to close the ticket?');
if (confirmed) {
    // Call the sendMessage function
    sendMessage(function() {
        // Callback function executed after sendMessage completes successfully
            // Show loader
            showLoader2();

            // Send AJAX request to check and close ticket
            $.ajax({
                url: 'codes/close_ticket.php',
                type: 'POST',
                dataType: 'json',
                data: { ticket_id: ticketId, user_id: userId },
                success: function(response) {
                    if (response.status === 'success') {
                        // Call another AJAX request to send the email
                        $.ajax({
                            url: 'email/close_email.php',
                            type: 'POST',
                            dataType: 'json',
                            data: { ticket_id: ticketId },
                            success: function(emailResponse) {
                                if (emailResponse.status === 'success') {
                                    alert('Ticket closed successfully and email sent.');
                                    // Refresh the page after both actions are completed
                                    location.reload();
                                } else {
                                    // console.log(emailResponse.message);
                                    alert('Ticket closed successfully! Email not sent.')
                                }
                                // Hide loader
                                hideLoader2();
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.error('Email AJAX request failed:', textStatus, errorThrown);
                                // Hide loader
                                hideLoader2();
                            }
                        });
                    } else {
                        alert(response.message);
                        // Hide loader
                        hideLoader2();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Close ticket AJAX request failed:', textStatus, errorThrown);
                    // Hide loader
                    hideLoader2();
                }
            });
        
    });

} else {
            // User clicked cancel, do nothing or show another message
            console.log('Ticket closing cancelled.');
        }
});

// Function to handle sending a message
function sendMessage(callback) {
    var message = $("#message").val().trim();
    var lockedById = "<?php echo $lockedBy; ?>";
    var lockedNyName = "<?php echo $lockedNyName; ?>";

    if (userId && ticketId) {
        // Check if the ticket is already locked by another user
        if (ticketCreatedBy !== loggedInUserId && (lockedById !== loggedInUserId && lockedById !== 'NO')) {
            alert("This ticket is already locked by: " + lockedNyName);
            return false; // Prevent sending the message
        }

        if (message === "") {
            alert("Please enter a message.");
            return false;
        }

        var formData = new FormData($("#messageForm")[0]);
        formData.append('userId', userId);
        formData.append('createdByAvatar', createdByAvatar);
        formData.append('ticketId', ticketId);
        formData.append('userFirstName', userFirstName);
        formData.append('userRole', userRole);
        formData.append('date', dateTime);
        formData.append('status', "Answered");

        $.ajax({
            url: 'insert_reply.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                $("#messageForm")[0].reset();
                $("#img_name").text("");
                fetchAndDisplayReplies(ticketId, replyBy);
                emailReplies(ticketId, replyBy);
                changeStatus(ticketId, loggedInUserId, ticketCreatedBy);
                // Execute the callback function if provided
                if (callback && typeof callback === 'function') {
                    callback();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    } else {
        console.log('User ID or Ticket ID not available');
    }
}


// Function to show loader
function showLoader2() {
    // Display your loader here
    document.getElementById('loader-overlay2').style.display = 'block';
}

// Function to hide loader
function hideLoader2() {
    // Hide your loader here
    document.getElementById('loader-overlay2').style.display = 'none';
}

// send reply by email
function emailReplies(ticketId, replyBy) {
    console.log(ticketId);
    $.get("email/reply_email.php?ticket_id=" + ticketId, function(secondResponse) {
        // Handle the response from the second script if needed
        
    });
}

function changeStatus(ticketId, loggedInUserId, ticketCreatedBy) {
    if (loggedInUserId && ticketCreatedBy && loggedInUserId !== 'NA' && ticketCreatedBy !== 'NA' && loggedInUserId != ticketCreatedBy) {
        $.get("codes/answered.php", { ticketId: ticketId, replyBy: loggedInUserId, ticketCreatedBy: ticketCreatedBy}, function(statusrResponse) {
            console.log(statusrResponse.message);
        });
    }  else{
        console.log("status change request not send");
        // console.log("loggedInUserId= " + loggedInUserId + ", ticketCreatedBy= " + ticketCreatedBy);

    }
}

// Check ticket status and disable message box if necessary
function checkTicketStatus() {
    $.ajax({
        url: 'checkTicketStatus.php',
        type: 'GET',
        data: { ticketId: ticketId },
        dataType: 'json',
        success: function(response) {
            if (response && response.status === 'Closed') {
                $("#message").prop("disabled", true);
                $("#image").prop("disabled", true);
                $("#closeTicketButton").prop("disabled", true);
                $("#sendButton").prop("disabled", true);
                $("#sendButton").off('click').click(function() {
                    alert("Can't send message. Ticket is Closed.");
                    return false;
                });
            } else {
                $("#message").prop("disabled", false);
                $("#sendButton").off('click').click(sendMessage);

            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

// Immediately check ticket status upon page load or refresh
checkTicketStatus();

// Poll for new messages and check ticket status every 9 seconds
setInterval(function() {
    fetchAndDisplayReplies(ticketId, replyBy);
    checkTicketStatus();
}, 9000);

// Initial fetch of replies if ticketId is available
if (ticketId) {
    fetchAndDisplayReplies(ticketId, replyBy);
}

// console.log("Received User ID:", userId);
// console.log("Received Ticket ID:", ticketId);
// console.log("Created ID:", ticketCreatedBy);
// console.log("locked by ID:", lockedById);


});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Send heartbeat and keep the ticket lock -->

<script>

let lastActiveTime = Date.now();

// Function to send heartbeat
function sendHeartbeat(ticketId) {
  const currentTime = Date.now();
  const idleTime = (currentTime - lastActiveTime) / 1000; // Convert to seconds

  // Check if idle time is less than 30 seconds
  if (idleTime < 200) {

$.ajax({
      url: 'codes/ticket_lock.php',
      type: 'POST',
      data: { ticket_id: ticketId, user_id: userId },  // Include both ticketId and userId
      dataType: 'json', // Expecting JSON response
      success: function(response) {
          if (response.status === 'success') {
              console.log('Last seen updated');
          } else {
              console.log('Error updating last seen:', response.message);
          }
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log('AJAX request failed:', textStatus, errorThrown);
      }
    });
  }

}


// Update last active time when user interacts with the page
$(document).on('mousemove keydown', function() {
  lastActiveTime = Date.now();
});

let ticketId = <?php echo json_encode($ticketId); ?>;
let userId = <?php echo json_encode($_SESSION['user_id'] ?? null); ?>;
// console.log('Captured ticket ID:', ticketId);
// console.log('Captured user ID:', userId);
// Send heartbeat immediately upon page load
sendHeartbeat(ticketId, userId);

// Send heartbeat every 5 seconds
setInterval(function() {
  sendHeartbeat(ticketId);
}, 5000); // 5 seconds

</script>

<?php include 'include/footer.php'; ?>
