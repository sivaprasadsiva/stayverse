// menu-toggle

$(document).ready(function() {
    // Add click event handler for the toggle button
    $(".navtogglebtn").click(function() {
        // Toggle the 'active' class on nav-head-box
        $(".navheadbox").toggleClass("active");
    });
});