<!-- single ticket view page for ticket creator -->
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
if (!isset($_GET['ticket_id']) || empty($_GET['ticket_id'])) {
  // Redirect to another page (e.g., homepage.php)
  echo '<script>window.location.href = "my-tickets.php";</script>';
  exit();  // Stop further execution
}
$ticketId = isset($_GET['ticket_id']) ? $_GET['ticket_id'] : null;

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
        if ($role=="BC") {
        $stmt = $pdo->prepare('SELECT * FROM bc_details WHERE bc_id = :user_id');
        $stmt->execute(['user_id' => $userId]);
        $bc = $stmt->fetch();
        $userFirstName= $bc['bc_first_name'] ?? null;
        $userRole= "BC" ?? null;
        
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
            echo '<script>alert("Ticket not found."); window.location.href = "dashboard.php";</script>';
            exit;  // Stop further execution
        }
        // Check if the logged-in user is the ticket creator
        if ($ticket['created_by_id'] != $_SESSION['user_id']) {
            echo '<script>alert("You don\'t have permission to Access this ticket."); window.location.href = "my-tickets.php";</script>';
            exit();  // Stop further execution
        }
        
        $lockedBy = $ticket['locked_by'] ?? null;
        $ticketStatus = $ticket['status'] ?? null;
        $ticketCreatedBy= $ticket['created_by_id'] ?? null;
        $replyBy= $ticket_reply['reply_by_id'] ?? null;

        $ticketId= $ticket['ticket_id'] ?? null;
        $issueType= $ticket['issue_type'] ?? null;
        $createdBy= $ticket['created_by'] ?? null;
        $userAvatar= $users['img_url'] ?? null;
        $mobile= $ticket['mobile'] ?? null;
        $createdDate= $ticket['formatted_created_date'] ?? null;
        $status= $ticket['status'] ?? null;
        $details= $ticket['issue'] ?? null;
        $image = !empty($ticket['image']) ? $ticket['image'] : null;

      }
?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


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
<div class="container mt-3">
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
                    <button type="button" class="btn btn-secondary" id="back">
                        <i class="fas fa-arrow-left"></i> Back
                    </button>
                </div>
                <div class="col-6 d-flex justify-content-center">
                    <button type="button" class="btn btn-primary" id="sendButton">
                        <i class="fas fa-paper-plane"></i> Send
                    </button>
                </div>
            </div>
                    
                    </div>
                </div>
            </form>
        </div>

<script>
    document.getElementById("back").addEventListener("click", function() {
        window.history.back();
    });
</script>


<!-- script to save reply in db triger using ajax and save using php -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
$(document).ready(function() {
    var userId = '<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>';
    var createdByAvatar = "<?php echo isset($userAvatar) ? addslashes($userAvatar) : 'assets/img/avatars/user.jpg'; ?>";
    var urlParams = new URLSearchParams(window.location.search);
    var ticketId = urlParams.get('ticket_id');
    var ticketCreatedBy = "<?php echo $ticketCreatedBy; ?>";
    var lockedById = "<?php echo $lockedBy; ?>";
    var replyBy = "<?php echo $replyBy; ?>";
    var userFirstName ="<?php echo $userFirstName; ?>";
    var userRole ="<?php echo $userRole; ?>";
    var loggedInUserId = '<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>'; 
    var ticketStatus = "<?php echo $ticketStatus; ?>"; // Function to fetch and display replies
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
                        } else {
                            var reply_by=reply.reply_by;
                        }
                        // Use the previously given template
                        replyHtml = '<div class="row mb-3">';
                        replyHtml += '<div class="col-11 col-md-8">';
                        replyHtml += '<div class="card">';
                        replyHtml += '<div class="card-header-narrow bg-secondary text-white pl-1 pr-1">';
                        replyHtml += '<img src="' + reply.reply_by_avatar + '" class="rounded-circle float-left" alt="User Avatar" style="height:18.59px;">';
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
                        // Use the new template
                        var formattedDate = new Date(reply.date).toLocaleString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true });
                        if (reply.reply_by_id==loggedInUserId){
                            var reply_by="You";
                        } else {
                            var reply_by=reply.reply_by;
                        }
                        replyHtml = '<div class="row mb-3">';
                        replyHtml += '<div class="col-11 col-md-8 ml-auto">';
                        replyHtml += '<div class="card">';
                        replyHtml += '<div class="card-header-narrow bg-success pl-1 pr-1">';
                        replyHtml += '<img src="' + reply.reply_by_avatar + '" class="rounded-circle float-right" alt="Executive Avatar" style="height:18.59px;">';
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
// Function to handle sending a message
function sendMessage() {
    var message = $("#message").val().trim();

    if (message === "") {
        alert("Please enter a message.");
        return false;
    }

    if (userId && ticketId) {
        var formData = new FormData($("#messageForm")[0]);
        formData.append('userId', userId);
        formData.append('createdByAvatar', createdByAvatar);
        formData.append('ticketId', ticketId);
        formData.append('userFirstName', userFirstName);
        formData.append('userRole', userRole);
        formData.append('date', dateTime);

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
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    } else {
        console.log('User ID or Ticket ID not available');
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
// Poll for new messages every 2 seconds
setInterval(function() {
    fetchAndDisplayReplies(ticketId, replyBy);
    checkTicketStatus();
}, 9000);

// Usage
if (ticketId) {
    fetchAndDisplayReplies(ticketId, replyBy);
}
        
});
</script>
<?php include 'include/footer.php'; ?>
