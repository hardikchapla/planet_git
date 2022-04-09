// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $('#nftCollectionlist').DataTable({
        "ajax": {
            url: "resources/display_nft_collection",
            type: "POST"
        }
    });
    $(document).on('click', '.updateNFTCollection', function() {
        var nft_collection_id = $(this).attr("id");
        $.ajax({
            url: "resources/update_nft_collection",
            method: "POST",
            data: {
                nft_collection_id: nft_collection_id
            },
            dataType: "json",
            success: function(data) {
                $('#old_nft_collection_image').val(data.nft_collection_logo);
                $('#nft_collection_id').val(nft_collection_id);
                $('#action').val("Edit");
                $('#nft_collection_title').html("Update NFT Collection");
            }
        })
    });
    $(document).on('click', '.deleteNFTCollection', function(e) {
        var nft_collection_id = $(this).attr("id");
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
            if (result.isConfirmed) {
                $.ajax({
                        url: 'resources/delete_nft_collection',
                        type: 'POST',
                        data: 'nft_collection_id=' + nft_collection_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() { window.location.href = 'nft_collection'; }
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
    $("#updateNFTCollectionForm").validate({
        submitHandler: function(form) {
            showLoading();
            $("#updateNFTCollection").modal("hide");
            var formdata = new FormData(document.getElementById('updateNFTCollectionForm'));
            var nft_collection_image = $('#nft_collection_image').get(0).files[0];
            formdata.append('nft_collection_image', nft_collection_image);
            $.ajax({
                url: 'resources/add_nft_collection_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        hideLoading();
                        toastr.options.onHidden = function() { window.location.href = 'nft_collection'; }
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