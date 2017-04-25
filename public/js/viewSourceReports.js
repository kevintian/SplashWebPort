/**
 * Created by kevin on 4/25/2017.
 */
$(function () {
    $.ajax({
        type: 'GET',
        url: '../resources/library/viewSourceReports.php',
        success: function (data) {
            console.log(data);
            try {
                var jsonData = JSON.parse(data);
                var source = $('#event-template').html();
                var template = Handlebars.compile(source);
                var html = template(jsonData);
                $('#result').html(html);
            } catch (e) {
                alert("No reports!")
            }

        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
});