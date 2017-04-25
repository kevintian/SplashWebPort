/**
 * Created by kevin on 4/24/2017.
 */
/**
 * Created by kevitian on 3/6/2017.
 */
$(document).ready(function () {
    //Initialize dropdown toggles
    $('.dropdown-menu a').on('click', dropdownToggle);

    //Validation
    $('#register').click(function () {

        var validContent = true;

        //Store form values
        var name = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirmPass = $('#confirm').val();
        var userType = new String($('#userType').text().trim());

        if (name == '') {
            $('#usernameForm').addClass("has-danger");
            $('#usernameForm').find(".form-control-feedback").text("Name cannot be blank");
            validContent = false;
        } else {
            $('#usernameForm').removeClass("has-danger");
            $('#usernameForm').find(".form-control-feedback").text("");
        }

        if (email == '') {
            $('#emailForm').addClass("has-danger");
            $('#emailForm').find(".form-control-feedback").text("Email cannot be blank");
            validContent = false;
        } else {
            $('#emailForm').removeClass("has-danger");
            $('#emailForm').find(".form-control-feedback").text("");
        }

        if (password == '') {
            $('#passwordForm').addClass("has-danger");
            $('#passwordForm').find(".form-control-feedback").text("Password cannot be blank");
            validContent = false;
        } else if (password != confirmPass) {
            $('#passwordForm').addClass("has-danger");
            $('#passwordForm').find(".form-control-feedback").text("Passwords must match");
            $('#confirmForm').addClass("has-danger");
            $('#confirmForm').find(".form-control-feedback").text("Passwords must match");
            validContent = false;
        } else {
            $('#passwordForm').removeClass("has-danger");
            $('#passwordForm').find(".form-control-feedback").text("");
            $('#confirmForm').removeClass("has-danger");
            $('#confirmForm').find(".form-control-feedback").text("");
        }

        if (userType == new String("Select User Type").valueOf()) {
            $('#usertypeForm').addClass("has-danger");
            $('#usertypeForm').find(".form-control-feedback").text("Please select a user type");
            validContent = false;
        } else {
            $('#usertypeForm').removeClass("has-danger");
            $('#usertypeForm').find(".form-control-feedback").text("");
        }

        if (validContent) {

            $.ajax({
                type: 'POST',
                url: '../resources/library/register.php',
                data: {
                    username: name,
                    email: email,
                    password: password,
                    type: userType
                },
                success: function (data) {
                    var result = JSON.parse(data);
                    alert(result['message']);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
    });

});