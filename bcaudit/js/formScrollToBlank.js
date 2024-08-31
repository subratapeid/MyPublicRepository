document.addEventListener('DOMContentLoaded', () => {
    function smoothScroll(targetPosition, duration) {
        const startPosition = window.pageYOffset;
        const distance = targetPosition - startPosition;
        let startTime = null;

        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const run = easeOutQuad(timeElapsed, startPosition, distance, duration);
            window.scrollTo(0, run);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        }

        function easeOutQuad(t, b, c, d) {
            t /= d;
            return -c * t * (t - 2) + b;
        }

        requestAnimationFrame(animation);
    }

    function handleValidationAndScroll(form, stickyHeaderSelector) {
        const stickyHeader = document.querySelector(stickyHeaderSelector);

        if (!form.reportValidity()) {
            const invalidFields = Array.from(form.querySelectorAll(':invalid'));
            if (invalidFields.length) {
                const firstInvalidField = invalidFields[0];
                const fieldPosition = firstInvalidField.getBoundingClientRect().top + window.pageYOffset - (stickyHeader ? stickyHeader.offsetHeight : 0) - 80; // 20px for extra margin

                // Smoothly scroll to the invalid field
                smoothScroll(fieldPosition, 500); //duration

                // focus to the invalid field
                firstInvalidField.focus();

                return false; // Prevent form submission
            }
        }

        return true; // Form is valid or validation passed
    }

    const form = document.querySelector('form');
    const submitBtn = document.querySelector('#saveButton'); 

    submitBtn.addEventListener('click', function (event) {
        // Call handleValidationAndScroll when button is clicked
        if (!handleValidationAndScroll(form, '.navbar')) {
            console.log('empty input field');
        } else {
            console.log('all input entered');
        }
    });
});
