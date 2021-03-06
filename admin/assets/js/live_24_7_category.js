// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $('#live247Categorylist').DataTable({
        "ajax": {
            url: "resources/display_live_24_7_category",
            type: "POST"
        }
    });
    $(document).on('click', '.updateLive247Category', function() {
        var live_24_7_category_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_live_24_7_category",
            method: "POST",
            data: {
                live_24_7_category_id: live_24_7_category_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#live_24_7_category_name').val(data.live_24_7_category_name);
                $('#live_24_7_category_id').val(live_24_7_category_id);
                $('#action').val("Edit");
                $('#live_24_7_category_form_title').html("Update Live 24/7 Category");
            }
        })
    });
    $(document).on('click', '.deleteLive247Category', function(e) {
        var live_24_7_category_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this live 24/7 category!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_live_24_7_category',
                        type: 'POST',
                        data: 'live_24_7_category_id=' + live_24_7_category_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'live_24_7_category';
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
    $("#updateLive247CategoryForm").validate({
        rules: {
            live_24_7_category_name: {
                required: true,
            }
        },
        messages: {
            live_24_7_category_name: {
                required: "Please provide a category name"
            }
        },
        submitHandler: function(form) {
            showLoading();
            var formdata = new FormData(document.getElementById('updateLive247CategoryForm'));
            $.ajax({
                url: 'resources/add_live_24_7_category_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'live_24_7_category';
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