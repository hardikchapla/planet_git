// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $('#priceTypeList').DataTable({
        "ajax": {
            url: "resources/display_price_type",
            type: "POST"
        }
    });
    $(document).on('click', '.updatePriceType', function() {
        var price_type_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_price_type",
            method: "POST",
            data: {
                price_type_id: price_type_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#price_type').val(data.price_type);
                $('#price_type_id').val(price_type_id);
                $('#action').val("Edit");
                $('#price_type_form_title').html("Update Price Type");
            }
        })
    });
    $(document).on('click', '.deletePriceType', function(e) {
        var price_type_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this Product category!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_price_type',
                        type: 'POST',
                        data: 'price_type_id=' + price_type_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'price_type';
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
    $("#updatePriceTypeForm").validate({
        rules: {
            price_type: {
                required: true,
            }
        },
        messages: {
            price_type: {
                required: "Please provide a price type"
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updatePriceTypeForm'));
            showLoading();
            $.ajax({
                url: 'resources/add_price_type_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'price_type';
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