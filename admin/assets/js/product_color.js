// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $('#productColorlist').DataTable({
        "ajax": {
            url: "resources/display_product_color",
            type: "POST"
        }
    });
    $(document).on('click', '.updateProductColor', function() {
        var product_color_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_product_color",
            method: "POST",
            data: {
                product_color_id: product_color_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#product_color_code').val(data.color_code);
                $('#product_color_name').val(data.color_name);
                $('#product_color_id').val(product_color_id);
                $('#action').val("Edit");
                $('#product_color_title').html("Update Product Color");
            }
        })
    });
    $(document).on('click', '.deleteProductColor', function(e) {
        var product_color_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this Product color!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_product_color',
                        type: 'POST',
                        data: 'product_color_id=' + product_color_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'product_color';
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
    $("#updateProductColorForm").validate({
        rules: {
            product_color_code: {
                required: true,
            },
            product_color_name: {
                required: true,
            }
        },
        messages: {
            product_color_code: {
                required: "Please provide a color code"
            },
            product_color_name: {
                required: "Please provide a color name"
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateProductColorForm'));
            showLoading();
            $.ajax({
                url: 'resources/add_product_color_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'product_color';
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