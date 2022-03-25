// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    // Admin Login
    $("#login-form").on('submit', function(e) {
        e.preventDefault();
        var admin_emailid = $("#admin_emailid").val();
        var admin_password = $("#admin_password").val();
        var form_data = "admin_emailid=" + admin_emailid + "&admin_password=" + admin_password;
        $.ajax({
            url: 'resources/login',
            type: 'Post',
            data: form_data,
            cache: false,
            success: function(output) {
                var obj = $.parseJSON(output);
                if (obj.success == "success") {
                    toastr.options.onHidden = function() { window.location.href = 'dashboard'; }
                    toastr.success("You have successfully logged in").delay(1000).fadeOut(1000);
                } else if (obj.success == "fail") {
                    toastr.warning('Incorrect email address or password, please try again').delay(1000).fadeOut(1000);
                    return false;
                }
            },
        });
    });

    // Admin Forgot Password
    $("#forgot-pass-form").on('submit', function(e) {
        e.preventDefault();
        var admin_forgot_email = $("#admin_forgot_email").val();
        var form_data = "admin_forgot_email=" + admin_forgot_email;
        showLoading();
        $.ajax({
            url: 'resources/forgot-password',
            type: 'Post',
            data: form_data,
            cache: false,
            success: function(output) {
                var obj = $.parseJSON(output);
                if (obj.success == "success") {
                    toastr.options.onHidden = function() { window.location.href = 'index'; }
                    toastr.success("Your reset password link sent to your email").delay(1000).fadeOut(1000);
                    hideLoading();
                } else if (obj.success == "fail") {
                    toastr.warning('Please enter valid email').delay(1000).fadeOut(1000);
                    hideLoading();
                    return false;
                }
            },
        });
    });

    // Reset Password
    $("#reset-form").on('submit', function(e) {
        e.preventDefault();
        var Email = $("#Email").val();
        var Password = $("#old-Password").val();
        var New_Password = $("#exampleInputPassword1").val();
        var confirm_password = $("#exampleInputPassword2").val();
        var form_data = "Email=" + Email + "&Password=" + Password + "&New_Password=" + New_Password + "&confirm_password=" + confirm_password;
        $.ajax({
            url: 'resources/adminresetpassword',
            type: 'Post',
            data: form_data,
            cache: false,
            success: function(output) {
                var obj = $.parseJSON(output);
                if (obj.success == "success") {
                    toastr.options.onHidden = function() { window.location.href = 'index'; }
                    toastr.success("Password has been successfully changed").delay(1000).fadeOut(1000);
                } else if (obj.success == "fail") {
                    toastr.warning('Your password and confirmation password do not match').delay(1000).fadeOut(1000);
                    return false;
                }
            },
        });
    });

    // Admin data update
    $("#updateadmindata").submit(function(event) {
        event.preventDefault();
        var formData = new FormData(this);;
        $.ajax({
            url: 'resources/updateAdminData',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(output) {
                toastr.options.onHidden = function() { window.location.href = 'admin_profile'; }
                toastr.success("Admin details updated Successfully").delay(1000).fadeOut(1000);
            },
            error: function() {
                toastr.warning('Admin details not Updated').delay(1000).fadeOut(1000);
            }
        });

        return false;
    });

    // Admin data update
    $("#changepassword").submit(function(event) {
        event.preventDefault();
        var formData = new FormData(this);;
        $.ajax({
            url: 'resources/adminchangepassword',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function(output) {
                if (output.success == 'success') {
                    toastr.options.onHidden = function() { window.location.href = 'admin_profile'; }
                    toastr.success(output.message).delay(1000).fadeOut(1000);
                } else {
                    toastr.warning(output.message).delay(1000).fadeOut(1000);
                }
            },
            error: function(output) {
                toastr.warning('Password not updated').delay(1000).fadeOut(1000);
            }
        });

        return false;
    });

});