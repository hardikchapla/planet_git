// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $('#createdBylist').DataTable({
        "ajax": {
            url: "resources/display_created_by",
            type: "POST"
        }
    });
    $(document).on('click', '.updateCreatedBy', function() {
        var created_by_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_created_by",
            method: "POST",
            data: {
                created_by_id: created_by_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#old_created_by_image').val(data.created_by_image);
                $('#created_by_name').val(data.created_by_name);
                $('#created_by_id').val(created_by_id);
                $('#action').val("Edit");
                $('#created_by_form_title').html("Update Created By");
            }
        })
    });
    $(document).on('click', '.deleteCreatedBy', function(e) {
        var created_by_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this created by!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_created_by',
                        type: 'POST',
                        data: 'created_by_id=' + created_by_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'created_by';
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
    $("#updateCreatedByForm").validate({
        rules: {
            created_by_name: {
                required: true,
            }
        },
        messages: {
            created_by_name: {
                required: "Please provide a created by name"
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateCreatedByForm'));
            var created_by_image = $('#created_by_image').get(0).files[0];
            formdata.append('created_by_image', created_by_image);
            showLoading();
            $.ajax({
                url: 'resources/add_created_by_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'created_by';
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