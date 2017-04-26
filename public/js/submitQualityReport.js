/**
 * Created by kevin on 4/26/2017.
 */
$(document).ready(function () {
    //Initialize dropdown toggles
    $('.dropdown-menu a').on('click', dropdownToggle);

    // submission
    $('#submit').click(function () {
        //Store form values
        var waterQuality = new String($('#waterQualities').text().trim());
        var latitude = $('#latitude').val();
        var longitude = $('#longitude').val();
        var virusPPM = $('#virusPPM').val();
        var contaminantPPM = $('#contaminantPPM').val();


        if (waterQuality == new String("Select Water Quality").valueOf()
            || latitude === ""
            || longitude === ""
            || virusPPM === ""
            || contaminantPPM === "") {
            alert('Please fill out all fields!');
        } else {
            //submit values
            $.ajax({
                type: 'POST',
                url: '../resources/library/submitQualityReport.php',
                data: {
                    waterQuality: waterQuality,
                    latitude: latitude,
                    longitude: longitude,
                    virusPPM: virusPPM,
                    contaminantPPM: contaminantPPM
                },
                success: function (data) {
                    //Either shows a success or an error
                    alert(data);
                    location.reload();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
    });
});