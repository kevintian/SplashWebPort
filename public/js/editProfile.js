/**
 * Created by kevitian on 3/6/2017.
 */
$(document).ready(function () {
    //Validation
    $('#editProfile').click(function () {

        var validContent = true;

        //Store form values
        var email = $('#email').val();

        if (email == '') {
            $('#emailForm').addClass("has-danger");
            $('#emailForm').find(".form-control-feedback").text("Email cannot be blank");
            validContent = false;
        } else {
            $('#emailForm').removeClass("has-danger");
            $('#emailForm').find(".form-control-feedback").text("");
        }

        if (validContent) {

            $.ajax({
                type: 'POST',
                url: '../resources/library/updateProfile.php',
                data: {
                    email: email
                },
                success: function (data) {
                    alert(data);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
    });

});