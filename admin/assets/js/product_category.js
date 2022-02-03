// Loader
function showLoading(){
    document.getElementById("page-loader").style = "visibility: visible";
}
function hideLoading(){
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function(){
    var dataTable = $('#productCategorylist').DataTable({            
        "ajax": {
            url: "resources/display_product_category",
            type: "POST"
        }         
    });
    $(document).on('click', '.updateProductCategory', function() {
        var product_category_id = $(this).attr("id");
        $.ajax({
            url: "resources/update_product_category",
            method: "POST",
            data: {
                product_category_id: product_category_id
            },
            dataType: "json",
            success: function(data) {
                $('#old_product_category_image').val(data.category_image);
                $('#product_category_name').val(data.category_name);
                $('#product_category_id').val(product_category_id);
                $('#action').val("Edit");
                $('#product_category_title').html("Update Product Category");
            }
        })
    });
    $(document).on('click', '.deleteProductCategory', function(e) {
        var product_category_id = $(this).attr("id");
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
            if(result.isConfirmed){
                $.ajax({
                    url: 'resources/delete_product_category',
                    type: 'POST',
                    data: 'product_category_id=' + product_category_id,
                    dataType: 'json'
                })
                .done(function(response) {
                    if(response.success == 'success'){
                        toastr.options.onHidden = function() { window.location.href = 'product_category'; }
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
    $("#updateProductCategoryForm").validate({
        rules: {
            product_category_name: {
                required: true,
            }
        },
        messages: {
            product_category_name: {
                required: "Please provide a category name"
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateProductCategoryForm'));
            var product_category_image = $('#product_category_image').get(0).files[0];
            formdata.append('product_category_image', product_category_image);
            $.ajax({
                url: 'resources/add_product_category_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function (output) {
                    output = jQuery.parseJSON(output);
                    if(output.success == 'success'){
                        toastr.options.onHidden = function() { window.location.href = 'product_category'; }
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