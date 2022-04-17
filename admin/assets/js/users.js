// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $('#userlist').DataTable({
        "ajax": {
            url: "resources/display_users",
            type: "POST"
        }
    });
    $(document).on('change', '.changeUserStatus', function() {
        var user_id = $(this).attr("id");
        var status = $(this).val();
        showLoading();
        $.ajax({
            url: "resources/update_user_status",
            method: "POST",
            data: {
                user_id: user_id,
                status: status
            },
            dataType: "json",
            success: function(data) {
                if (data.success == 'success') {
                    hideLoading();
                    toastr.success(data.message).delay(1000).fadeOut(1000);
                } else {
                    hideLoading();
                    toastr.warning(data.message).delay(1000).fadeOut(1000);
                    return false;
                }
            }
        })
    });
    $(document).on('click', '.updateUser', function() {
        var user_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_user",
            method: "POST",
            data: {
                user_id: user_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#old_image').val(data.image);
                $('#email').val(data.email);
                $('#full_name').val(data.full_name);
                $('#mobile').val(data.mobile);
                $('#user_id').val(user_id);
            }
        })
    });
    $(document).on('click', '.deleteUser', function(e) {
        var user_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this User!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_user',
                        type: 'POST',
                        data: 'user_id=' + user_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'users';
                                hideLoading();
                            }
                            toastr.success(response.message).delay(1000).fadeOut(1000);
                        } else {
                            hideLoading();
                            toastr.warning(output.message).delay(1000).fadeOut(1000);
                        }

                    })
                    .fail(function() {
                        hideLoading();
                        swal('Oops...', 'Something went wrong with ajax !', 'error');
                    });
            }
        });
    });
    $("#updateUserForm").validate({
        rules: {
            full_name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true
            }
        },
        messages: {
            full_name: {
                required: "Please provide a full name"
            },
            email: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please provide a password"
            },
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateUserForm'));
            var profile_pic = $('#profile_pic').get(0).files[0];
            formdata.append('profile_pic', profile_pic);
            showLoading();
            $.ajax({
                url: 'resources/update_user_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'users';
                            hideLoading();
                        }
                        toastr.success(output.message).delay(1000).fadeOut(1000);
                    } else {
                        hideLoading();
                        toastr.warning(output.message).delay(1000).fadeOut(1000);
                    }
                },
                error: function() {
                    hideLoading();
                    toastr.warning('Something went wrong with ajax !').delay(1000).fadeOut(1000);
                }
            });
        }
    });
});