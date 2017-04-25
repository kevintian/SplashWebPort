/**
 * Created by kevitian on 3/7/2017.
 */
$(document).ready(function() {

    $('#viewSourceReports').on('click', function(event) {
        window.location = "viewSourceReports.html";
    });

    $('#submitSourceReport').on('click', function(event) {
        window.location = "submitSourceReport.html";
    });

    $('#viewQualityReports').on('click', function(event) {
        window.location = "viewPendingData.html";
    });

    $('#submitQualityReport').on('click', function(event) {
        window.location = "viewPendingUsers.html";
    });

    $('#viewWaterTrends').on('click', function(event) {
        window.location = "generatePOIReport.html";
    });

    $('#logout').on('click', function() {
        $.ajax({
            type: 'POST',
            url: '../resources/library/logout.php',
            success: function () {
                $(location).attr('href', 'index.html');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("Unable to logout!");
            }
        });
    });

    $('#editProfile').on('click', function() {
        $(location).attr('href', 'editProfile.php');
    });
});