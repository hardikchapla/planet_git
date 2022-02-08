// Loader
function showLoading(){
    document.getElementById("page-loader").style = "visibility: visible";
}
function hideLoading(){
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function(){
    var dataTable = $('#productSizelist').DataTable({            
        "ajax": {
            url: "resources/display_product_size",
            type: "POST"
        }         
    });
    $(document).on('click', '.updateProductSize', function() {
        var product_size_id = $(this).attr("id");
        $.ajax({
            url: "resources/update_product_size",
            method: "POST",
            data: {
                product_size_id: product_size_id
            },
            dataType: "json",
            success: function(data) {
                $('#product_size_name').val(data.size_name);
                $('#product_size_id').val(product_size_id);
                $('#action').val("Edit");
                $('#product_color_title').html("Update Product Size");
            }
        })
    });
    $(document).on('click', '.deleteProductSize', function(e) {
        var product_size_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this Product size!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    url: 'resources/delete_product_size',
                    type: 'POST',
                    data: 'product_size_id=' + product_size_id,
                    dataType: 'json'
                })
                .done(function(response) {
                    if(response.success == 'success'){
                        toastr.options.onHidden = function() { window.location.href = 'product_size'; }
                        toastr.success(response.message).delay(1000).fadeOut(1000);
                    } else {
                        toastr.warning(output.message).delay(1000).fadeOut(1000);
                    }
                    
                })
                .fail(function() {
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
        });
    });
    $("#updateProductSizeForm").validate({
        rules: {
            product_size_name: {
                required: true,
            }
        },
        messages: {
            product_size_name: {
                required: "Please provide a product size"
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateProductSizeForm'));
            $.ajax({
                url: 'resources/add_product_size_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function (output) {
                    output = jQuery.parseJSON(output);
                    if(output.success == 'success'){
                        toastr.options.onHidden = function() { window.location.href = 'product_size'; }
                        toastr.success(output.message).delay(1000).fadeOut(1000);
                    } else {
                        toastr.warning(output.message).delay(1000).fadeOut(1000);
                    }
                },
                error: function(){
                    toastr.warning('Something went wrong with ajax !').delay(1000).fadeOut(1000);
                }
            });
        }
    });
});