/**
 * Created by kevin on 4/14/2017.
 */
$(function () {
    $("#login").on('click', function (e) {
        // e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../resources/library/login.php',
            data: {
                username: $("#username").val(),
                password: $("#password").val()
            },
            success: function (data) {
                try {
                    var userInfo = JSON.parse(data);
                    $(location).attr('href', 'homepage.php');
                } catch (e) {
                    alert(data);
                }
            }
        });
    });
});