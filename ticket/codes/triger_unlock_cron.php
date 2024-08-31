<script>
$(document).ready(function() {
    var idleTime = 0; // Initialize idle time counter

    // Function to reset idle time
    function resetIdleTime() {
        idleTime = 0;
    }

    // Function to send AJAX request and update user status
    function updateUserStatus() {
        $.ajax({
            url: 'codes/unlock_cron.php',
            type: 'GET',
            dataType: 'text',
            success: function(response) {
                if (response.includes('Status updated successfully')) {
                    console.log('User status updated successfully.');
                } else if (response.includes('No rows updated')) {
                    console.log('No rows updated. The condition may not have been met.');
                } else {
                    console.log('Unexpected response from server.');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
    console.log('AJAX request failed:', textStatus, errorThrown);
    console.log('Response Text:', jqXHR.responseText); // Log the response text for more details
}
        });
    }

    // Set up event listeners to detect user activity
    $(document).mousemove(resetIdleTime);
    $(document).keypress(resetIdleTime);

    // Increment idle time every second and check if it reaches 15 minutes
    setInterval(function() {
        idleTime++;
        if (idleTime >= 1200) { // 900 seconds = 15 minutes
            // Stop AJAX requests or perform other actions
            console.log('User has been idle for 5 minutes. Stopping AJAX requests.');
            return;
        }
        // If not idle for 15 minutes, continue sending AJAX requests
        updateUserStatus();
    }, 1000); // Check every second
});
</script>
