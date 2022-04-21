// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $('#sponsoredBylist').DataTable({
        "ajax": {
            url: "resources/display_sponsored_by",
            type: "POST"
        }
    });
    $(document).on('click', '.updateSponsoredBy', function() {
        var sponsored_by_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_sponsored_by",
            method: "POST",
            data: {
                sponsored_by_id: sponsored_by_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#old_sponsored_by_image').val(data.sponsored_by_image);
                $('#sponsored_by_name').val(data.sponsored_by_name);
                $('#sponsored_by_id').val(sponsored_by_id);
                $('#action').val("Edit");
                $('#sponsored_by_form_title').html("Update Sponsored By");
            }
        })
    });
    $(document).on('click', '.deleteSponsoredBy', function(e) {
        var sponsored_by_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this sponsored by!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_sponsored_by',
                        type: 'POST',
                        data: 'sponsored_by_id=' + sponsored_by_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'sponsored_by';
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
    $("#updateSponsoredByForm").validate({
        rules: {
            sponsored_by_name: {
                required: true,
            }
        },
        messages: {
            sponsored_by_name: {
                required: "Please provide a sponsored by name"
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateSponsoredByForm'));
            var sponsored_by_image = $('#sponsored_by_image').get(0).files[0];
            formdata.append('sponsored_by_image', sponsored_by_image);
            showLoading();
            $.ajax({
                url: 'resources/add_sponsored_by_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'sponsored_by';
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