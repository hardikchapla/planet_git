// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $('#hostedBylist').DataTable({
        "ajax": {
            url: "resources/display_hosted_by",
            type: "POST"
        }
    });
    $(document).on('click', '.updateHostedBy', function() {
        var hosted_by_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_hosted_by",
            method: "POST",
            data: {
                hosted_by_id: hosted_by_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#old_hosted_by_image').val(data.hosted_by_image);
                $('#hosted_by_name').val(data.hosted_by_name);
                $('#hosted_by_id').val(hosted_by_id);
                $('#action').val("Edit");
                $('#hosted_by_form_title').html("Update Sponsored By");
            }
        })
    });
    $(document).on('click', '.deleteHostedBy', function(e) {
        var hosted_by_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this hosted by!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_hosted_by',
                        type: 'POST',
                        data: 'hosted_by_id=' + hosted_by_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'hosts';
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
    $("#updateHostedByForm").validate({
        rules: {
            hosted_by_name: {
                required: true,
            }
        },
        messages: {
            hosted_by_name: {
                required: "Please provide a sponsored by name"
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateHostedByForm'));
            var hosted_by_image = $('#hosted_by_image').get(0).files[0];
            formdata.append('hosted_by_image', hosted_by_image);
            showLoading();
            $.ajax({
                url: 'resources/add_hosted_by_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'hosts';
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