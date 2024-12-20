$(document).ready(function () {
    $('form').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        // Gather form data
        var formData = $(this).serialize();

        // Send data using AJAX
        $.ajax({
            type: 'POST',
            url: 'pro.php', // Target PHP file
            data: formData,
            success: function (response) {
                // Display response in an alert or on the page
                $('body').html('<h1>Submitted Details</h1>' + response);
            },
            error: function () {
                alert('An error occurred while submitting the form.');
            }
        });
    });
});
