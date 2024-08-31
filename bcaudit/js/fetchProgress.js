//   fetch progress
async function fetchProgress(bcaId, auditNumber) {
    try {
        // Create a new Promise to handle the asynchronous operation
        const progress = await new Promise((resolve, reject) => {
            $.ajax({
                url: '/bcaudit/codes/fetchData/fetch_progress.php',
                type: 'GET',
                data: { 
                    bcaId: bcaId, 
                    auditNumber: auditNumber 
                },
                success: function(response) {
                    if (response.success) {
                        var progress = parseInt(response.data.progress, 10);
                        // console.log(progress);
                        if (progress > 8) {
                            $('#nextButton').css('display', 'inline-block');
                            $('#bcaForm').find('input, textarea, select').prop('disabled', true);
                        } else {
                            $('#saveButton').css('display', 'inline-block');
                        }

                        // Resolve the Promise with the progress value
                        resolve(progress);
                    } else {
                        alert("BCA ID not found");
                        window.location.href = "audit-list.php";
                        reject("BCA ID not found"); // Reject if ID not found
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error fetching data: ' + error);
                    reject(error); // Reject the Promise on error
                }
            });
        });

        // Return the progress value
        return progress;
    } catch (error) {
        console.error('Error fetching progress:', error);
        throw error; // Re-throw error to be handled by caller
    }
}