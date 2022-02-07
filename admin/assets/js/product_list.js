// Loader
function showLoading(){
    document.getElementById("page-loader").style = "visibility: visible";
}
function hideLoading(){
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function(){
    var dataTable = $('#productBrandlist').DataTable({            
        "ajax": {
            url: "resources/display_product_brand",
            type: "POST"
        }         
    });
    $(document).on('click', '.updateProductBrand', function() {
        var product_brand_id = $(this).attr("id");
        $.ajax({
            url: "resources/update_product_brand",
            method: "POST",
            data: {
                product_brand_id: product_brand_id
            },
            dataType: "json",
            success: function(data) {
                $('#old_product_brand_image').val(data.product_brand_image);
                $('#product_brand_name').val(data.product_brand_name);
                $('#product_brand_id').val(product_brand_id);
                $('#action').val("Edit");
                $('#product_category_title').html("Update Product Brand");
            }
        })
    });
    $(document).on('click', '.deleteProductBrand', function(e) {
        var product_brand_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this Product brand!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    url: 'resources/delete_product_brand',
                    type: 'POST',
                    data: 'product_brand_id=' + product_brand_id,
                    dataType: 'json'
                })
                .done(function(response) {
                    if(response.success == 'success'){
                        toastr.options.onHidden = function() { window.location.href = 'product_brand'; }
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
    $("#updateProductBrandForm").validate({
        rules: {
            product_brand_name: {
                required: true,
            }
        },
        messages: {
            product_brand_name: {
                required: "Please provide a brand name"
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateProductBrandForm'));
            var product_brand_image = $('#product_brand_image').get(0).files[0];
            formdata.append('product_brand_image', product_brand_image);
            $.ajax({
                url: 'resources/add_product_brand_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function (output) {
                    output = jQuery.parseJSON(output);
                    if(output.success == 'success'){
                        toastr.options.onHidden = function() { window.location.href = 'product_brand'; }
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