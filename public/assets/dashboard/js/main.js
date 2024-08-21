
document.addEventListener("DOMContentLoaded", function () {
    // Get all forms with the class 'delete-form'
    const deleteForms = document.querySelectorAll('.delete-form');

    // Loop through each form and add an event listener
    deleteForms.forEach(function (form) {
        form.addEventListener("submit", function (event) {
            // Show a confirmation dialog
            const userConfirmed = confirm("Are you sure you want to delete this?");

            // If the user cancels, prevent the form submission
            if (!userConfirmed) {
                event.preventDefault();
            }
        });
    });
});

