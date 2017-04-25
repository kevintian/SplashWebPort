/**
 * Created by kevin on 4/25/2017.
 */
$(document).ready(function () {
    //Initialize dropdown toggles
    $('.dropdown-menu a').on('click', dropdownToggle);

    // submission
    $('#submit').click(function () {
        //Store form values
        var waterType = new String($('#types').text().trim());
        var waterCondition = new String($('#conditions').text().trim());
        var latitude = $('#latitude').val();
        var longitude = $('#longitude').val();

        if (waterType == new String("Select Type").valueOf()
            || waterCondition == new String("Select Condition").valueOf()
            || latitude === ""
            || longitude === "") {
            alert('Please fill out all fields!');
        } else {
            //submit values
            $.ajax({
                type: 'POST',
                url: '../resources/library/submitSourceReport.php',
                data: {
                    waterType: waterType,
                    waterCondition: waterCondition,
                    latitude: latitude,
                    longitude: longitude
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

function isNormalInteger(str) {
    var n = Math.floor(Number(str));
    return String(n) === str && n >= 0;
}