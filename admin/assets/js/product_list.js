// Loader
let appEditor;

ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
        // Store it in more "global" context.
        appEditor = editor;
    })
    .catch(error => {
        console.error(error);
    });
let appEditor1;

ClassicEditor
    .create(document.querySelector('#editor1'))
    .then(editor1 => {
        // Store it in more "global" context.
        appEditor1 = editor1;
    })
    .catch(error => {
        console.error(error);
    });
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}
function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function () {
    var dataTable = $('#productlist').DataTable({
        "ajax": {
            url: "resources/display_product",
            type: "POST"
        }
    });
    $(document).on('click', '.updateProduct', function () {
        var product_id = $(this).attr("id");
        $.ajax({
            url: "resources/update_product",
            method: "POST",
            data: {
                product_id: product_id
            },
            dataType: "json",
            success: function (data) {
                $("#productPreOrder").removeAttr('checked');
                $('#productName').val(data.name);
                $('#productPrice').val(data.price);
                $('#productCoinPrice').val(data.coin_price);
                $('#productStocks').val(data.stock);
                $('#editor').val(data.description);
                $('#editor1').val(data.additional_info);
                $('#selectCategory').select2("val", data.product_category_id);
                $('#selectBrand').select2("val", data.product_brand_id);
                if (data.is_preorder == '1') {
                    $("#productPreOrder").prop('checked', true);
                }
                $("#selectColor").val(data.color).trigger('change');
                $("#selectSize").val(data.size).trigger('change');
                appEditor.setData(data.description);
                appEditor1.setData(data.additional_info);
                $('#editImages').html('');
                $.each(data.images, function (key, value) {
                    $('#editImages').append('<span id="removeImage' + value.id + '" class="pip"><img class="imageThumb" src="../images/product/' + value.image + '" title="undefined"><br><span class="remove removeimage" id="' + value.id + '">Remove image</span></span>');
                });
                $('#product_id').val(product_id);
                $('#action').val("Edit");
                $('#product_list_title').html("Update Product");
            }
        })
    });
    $(document).on('click', '.removeimage', function (e) {
        var product_image_id = $(this).attr("id");
        $.ajax({
            url: 'resources/delete_product_image',
            type: 'POST',
            data: 'product_image_id=' + product_image_id,
            dataType: 'json'
        })
            .done(function (response) {
                if (response.success == 'success') {
                    $('#removeImage' + product_image_id).remove();
                    toastr.success(response.message).delay(1000).fadeOut(1000);
                } else {
                    toastr.warning(output.message).delay(1000).fadeOut(1000);
                }
            })
            .fail(function () {
                swal('Oops...', 'Something went wrong with ajax !', 'error');
            });

    });
    $(document).on('click', '.deleteProduct', function (e) {
        var product_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this Product!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'resources/delete_product',
                    type: 'POST',
                    data: 'product_id=' + product_id,
                    dataType: 'json'
                })
                    .done(function (response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function () { window.location.href = 'product_list'; }
                            toastr.success(response.message).delay(1000).fadeOut(1000);
                        } else {
                            toastr.warning(output.message).delay(1000).fadeOut(1000);
                        }

                    })
                    .fail(function () {
                        swal('Oops...', 'Something went wrong with ajax !', 'error');
                    });
            }
        });
    });
    $("#addProductForm").validate({
        ignore: [],
        debug: false,
        rules: {
            selectCategory: {
                required: true,
            },
            selectBrand: {
                required: true,
            },
            productName: {
                required: true,
            },
            productPrice: {
                required: true
            },
            productCoinPrice: {
                required: true
            },
            productStocks: {
                required: true
            },
            editor: {
                required: true,
                minlength: 10
            },
            editor1: {
                required: true,
                minlength: 10
            },
            "selectColor[]": "required",
            "selectSize[]": "required"
        },
        messages: {
            selectCategory: {
                required: "Please select category"
            },
            selectBrand: {
                required: "Please select brand"
            },
            productName: {
                required: "Please provide a product name"
            },
            productPrice: {
                required: "Please provide a product price"
            },
            productCoinPrice: {
                required: "Please provide a product coin price"
            },
            productStocks: {
                required: "Please provide a product stock"
            },
            editor: {
                required: "Please enter product description",
                minlength: "Please enter minimum 10 characters"
            },
            editor1: {
                required: "Please enter product additional information",
                minlength: "Please enter minimum 10 characters"
            },
            "selectColor[]": "Please select color",
            "selectSize[]": "Please select size"
        },
        submitHandler: function (form) {
            var formdata = new FormData(document.getElementById('addProductForm'));
            // var product_images = $('#files').get(0).files[0];
            // formdata.append('product_image', product_images);
            $.ajax({
                url: 'resources/add_product_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function (output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function () { window.location.href = 'product_list'; }
                        toastr.success(output.message).delay(1000).fadeOut(1000);
                    } else {
                        toastr.warning(output.message).delay(1000).fadeOut(1000);
                    }
                },
                error: function () {
                    toastr.warning('Something went wrong with ajax !').delay(1000).fadeOut(1000);
                }
            });
        }
    });
});