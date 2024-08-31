function startLoading() {
    // Disable the button and show a loading spinner
    $('#submitBtn').prop('disabled', true);
    $('#spinner').removeClass('d-none');
}

function stopLoading() {
    // Enable the button and hide the loading spinner
    $('#submitBtn').prop('disabled', false);
    $('#spinner').addClass('d-none');
}

$(document).ready(function () {
    // form submission logic
    $('#loginForm').submit(function (e) {
        e.preventDefault();
        // Disable the submit button and show the spinner
        startLoading();

        // Store the form reference
        var $form = $(this);
            // AJAX request
            $.ajax({
                type: 'POST',
                url: 'codes/user_login_code.php',
                data: $form.serialize(), // Use the stored form reference
                dataType: 'json',
                success: function (response) {
                    // Handle the JSON response from the server
                    if (response.status === 'success') {
                        stopLoading();
                        window.location.href = response.redirect;
                    } else {
                        alert(response.message);
                        stopLoading();
                    }
                },
                error: function (error) {
                    stopLoading();
                    console.log('Error:', error);
                }
            });
        
    });
});
