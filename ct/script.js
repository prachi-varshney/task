$(document).ready(function () {
    // Show modal when the "Edit" button is clicked
    $(document).on("click", "#edit-btn", function () {
        $("#modal").show();
    });

    // Close modal when the close button is clicked
    $(document).on("click", "#close-btn", function () {
        $("#modal").hide();
    });

    // Close modal when clicking outside the modal form
    $(document).on("click", function (e) {
        if ($(e.target).is("#modal")) {
            $("#modal").hide();
        }
    });
});