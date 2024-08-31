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
        $('#bcLogin').submit(function (e) {
            e.preventDefault();
            // Disable the submit button and show the spinner
            startLoading();
            // AJAX request
            $.ajax({
                type: 'POST',
                url: 'codes/bc_login_code.php',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (response) {
                // Handle the JSON response from the server
                    if (response.status === 'success') {
                        stopLoading();
                        // alert(response.message);
                        window.location.href = response.redirect;
                    } else {
                        // console.log(response.id);
                        alert(response.message);
                        stopLoading();
                       
                    }
                },
                error: function (error) {
                // console.log('Error:', error);
                stopLoading();

                }
            });
        });
    });
