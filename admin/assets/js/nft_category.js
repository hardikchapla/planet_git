// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $("#nftCategorylist").DataTable({
        ajax: {
            url: "resources/display_nft_category",
            type: "POST",
        },
    });
    $(document).on("click", ".updateNftCategory", function() {
        var nft_category_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_nft_category",
            method: "POST",
            data: {
                nft_category_id: nft_category_id,
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $("#nft_category_name").val(data.nft_category_name);
                $("#nft_category_id").val(nft_category_id);
                $("#action").val("Edit");
                $("#nft_category_form_title").html("Update DA Category");
            },
        });
    });
    $(document).on("click", ".deleteNFTCategory", function(e) {
        var nft_category_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this DA category!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: "resources/delete_nft_category",
                        type: "POST",
                        data: "nft_category_id=" + nft_category_id,
                        dataType: "json",
                    })
                    .done(function(response) {
                        if (response.success == "success") {
                            toastr.options.onHidden = function() {
                                window.location.href = "nft_category";
                                hideLoading();
                            };
                            toastr.success(response.message).delay(1000).fadeOut(1000);
                        } else {
                            hideLoading();
                            toastr.warning(output.message).delay(1000).fadeOut(1000);
                        }
                    })
                    .fail(function() {
                        hideLoading();
                        swal("Oops...", "Something went wrong with ajax !", "error");
                    });
            }
        });
    });
    $("#updateNFTCategoryForm").validate({
        rules: {
            nft_category_name: {
                required: true,
            },
        },
        messages: {
            nft_category_name: {
                required: "Please provide a category name",
            },
        },
        submitHandler: function(form) {
            showLoading();
            var formdata = new FormData(
                document.getElementById("updateNFTCategoryForm")
            );
            $.ajax({
                url: "resources/add_nft_category_submit",
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == "success") {
                        toastr.options.onHidden = function() {
                            window.location.href = "nft_category";
                            hideLoading();
                        };
                        toastr.success(output.message).delay(1000).fadeOut(1000);
                    } else {
                        hideLoading();
                        toastr.warning(output.message).delay(1000).fadeOut(1000);
                    }
                },
                error: function() {
                    hideLoading();
                    toastr
                        .warning("Something went wrong with ajax !")
                        .delay(1000)
                        .fadeOut(1000);
                },
            });
        },
    });
});