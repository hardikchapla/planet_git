// Loader
let nft_info_description;

ClassicEditor
    .create(document.querySelector('#nft_info_description'))
    .then(nft_info_description_editor => {
        nft_info_description = nft_info_description_editor;
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

$(document).ready(function() {
    var dataTable = $('#nft_info_list').DataTable({
        "ajax": {
            url: "resources/display_nft_list",
            type: "POST"
        }
    });
    $(document).on('click', '.updateNFTInfo', function() {
        var nft_info_id = $(this).attr("id");
        showLoading()
        $.ajax({
            url: "resources/update_nft_info",
            method: "POST",
            data: {
                nft_info_id: nft_info_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#old_nft_info_image').val(data.nft_info_image);
                $('#old_nft_info_image_type').val(data.nft_info_image_type);
                $('#selectCollections').select2("val", data.selectCollections);
                $('#selectCategory').select2("val", data.selectCategory);
                $('#selectPriceType').val(data.selectPriceType);
                $('#nft_info_description').val(data.nft_info_description);
                nft_info_description.setData(data.nft_info_description);
                $('#nft_info_name').val(data.nft_info_name);
                $('#nft_info_price').val(data.nft_info_price);
                $('#nft_info_sale_id').val(data.nft_info_sale_id);
                $('#nft_info_assets_name').val(data.nft_info_assets_name);
                $('#nft_info_assets_id').val(data.nft_info_assets_id);
                $('#nft_info_meant_no').val(data.nft_info_meant_no);
                $('#nft_info_duration').val(data.nft_info_duration);
                $('#nft_info_attribute_name').val(data.nft_info_attribute_name);
                $('#nft_info_attribute_image').val(data.nft_info_attribute_image);
                $('#nft_info_attribute_bg_image').val(data.nft_info_attribute_bg_image);
                $('#nft_info_attribute_object').val(data.nft_info_attribute_object);
                $('#nft_info_attribute_object_collection').val(data.nft_info_attribute_object_collection);
                $('#nft_info_attribute_object_no').val(data.nft_info_attribute_object_no);
                $('#nft_info_attribute_border_color').val(data.nft_info_attribute_border_color);
                $('#nft_info_attribute_border_type').val(data.nft_info_attribute_border_type);
                $('#nft_info_id').val(nft_info_id);
                $('#action').val("Edit");
                $('#nft_info_form_title').html("Update NFT Info");
            }
        })
    });
    $(document).on('click', '.deleteNFTInfo', function(e) {
        var nft_info_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this nft info!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading()
                $.ajax({
                        url: 'resources/delete_nft_info',
                        type: 'POST',
                        data: 'nft_info_id=' + nft_info_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'nft_info';
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
    $("#updateNFTInfoForm").validate({
        rules: {
            nft_info_name: {
                required: true,
            },
            nft_info_price: {
                required: true,
            },
            nft_info_description: {
                required: true,
                minlength: 10
            },
            selectCategory: {
                required: true,
            },
            selectCollections: {
                required: true,
            },
            nft_info_sale_id: {
                required: true,
            },
            nft_info_assets_name: {
                required: true,
            },
            nft_info_assets_id: {
                required: true,
            },
            nft_info_meant_no: {
                required: true,
            },
            nft_info_duration: {
                required: true,
            },
            nft_info_attribute_name: {
                required: true,
            },
            nft_info_attribute_image: {
                required: true,
            },
            nft_info_attribute_bg_image: {
                required: true,
            },
            nft_info_attribute_object: {
                required: true,
            },
            nft_info_attribute_object_collection: {
                required: true,
            },
            nft_info_attribute_object_no: {
                required: true,
            },
            nft_info_attribute_border_color: {
                required: true,
            },
            nft_info_attribute_border_type: {
                required: true,
            }
        },
        messages: {
            nft_info_name: {
                required: "Please provide a NFT info name"
            },
            nft_info_price: {
                required: "Please provide a NFT info price"
            },
            nft_info_description: {
                required: "Please enter podcast description",
                minlength: "Please enter minimum 10 characters"
            },
            selectCategory: {
                required: "Please select nft cotegory"
            },
            selectCollections: {
                required: "Please select nft collections"
            },
            nft_info_sale_id: {
                required: "Please provide a NFT info sale id"
            },
            nft_info_assets_name: {
                required: "Please provide a NFT info assets name"
            },
            nft_info_assets_id: {
                required: "Please provide a NFT info assets id"
            },
            nft_info_meant_no: {
                required: "Please provide a NFT info meant no"
            },
            nft_info_duration: {
                required: "Please provide a NFT info duration"
            },
            nft_info_attribute_name: {
                required: "Please provide a NFT info attribute name"
            },
            nft_info_attribute_image: {
                required: "Please provide a NFT info attribute image"
            },
            nft_info_attribute_bg_image: {
                required: "Please provide a NFT info attribute bg image"
            },
            nft_info_attribute_object: {
                required: "Please provide a NFT info attribute object"
            },
            nft_info_attribute_object_collection: {
                required: "Please provide a NFT info attribute object collection"
            },
            nft_info_attribute_object_no: {
                required: "Please provide a NFT info attribute object no"
            },
            nft_info_attribute_border_color: {
                required: "Please provide a NFT info attribute border color"
            },
            nft_info_attribute_border_type: {
                required: "Please provide a NFT info attribute border type"
            }
        },
        submitHandler: function(form) {
            showLoading();
            var formdata = new FormData(document.getElementById('updateNFTInfoForm'));
            var nft_info_image = $('#nft_info_image').get(0).files[0];
            formdata.append('nft_info_image', nft_info_image);
            $.ajax({
                url: 'resources/add_nft_info_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'nft_info';
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