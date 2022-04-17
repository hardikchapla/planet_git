// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $('#pagesList').DataTable({
        "ajax": {
            url: "resources/display_page_list",
            type: "POST"
        }
    });
    $(document).on('click', '.updatePages', function() {
        var page_id = $(this).attr("id");
        showLoading()
        $.ajax({
            url: "resources/update_page_list",
            method: "POST",
            data: {
                page_id: page_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading()
                $('#page_name').val(data.page_name);
                $('#page_slug').val(data.page_slug);
                $('#page_id').val(page_id);
                $('#action').val("Edit");
                $('#page_form_title').html("Update Page");
            }
        })
    });
    $(document).on('click', '.deletePages', function(e) {
        var page_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this page!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading()
                $.ajax({
                        url: 'resources/delete_page',
                        type: 'POST',
                        data: 'page_id=' + page_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'pages';
                                hideLoading()
                            }
                            toastr.success(response.message).delay(1000).fadeOut(1000);
                        } else {
                            hideLoading()
                            toastr.warning(output.message).delay(1000).fadeOut(1000);
                        }

                    })
                    .fail(function() {
                        hideLoading()
                        swal('Oops...', 'Something went wrong with ajax !', 'error');
                    });
            }
        });
    });
    $("#updatePagesForm").validate({
        rules: {
            page_name: {
                required: true,
            },
            page_slug: {
                required: true,
            }
        },
        messages: {
            page_name: {
                required: "Please provide a page name"
            },
            page_slug: {
                required: "Please provide a page slug"
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updatePagesForm'));
            showLoading()
            $.ajax({
                url: 'resources/add_page_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'pages';
                            hideLoading()
                        }
                        toastr.success(output.message).delay(1000).fadeOut(1000);
                    } else {
                        hideLoading()
                        toastr.warning(output.message).delay(1000).fadeOut(1000);
                    }
                },
                error: function() {
                    hideLoading()
                    toastr.warning('Something went wrong with ajax !').delay(1000).fadeOut(1000);
                }
            });
        }
    });
});