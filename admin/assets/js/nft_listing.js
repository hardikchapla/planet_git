// Loader
let nft_listing_description;

ClassicEditor.create(document.querySelector("#nft_listing_description"))
    .then((nft_listing_description_editor) => {
        nft_listing_description = nft_listing_description_editor;
    })
    .catch((error) => {
        console.error(error);
    });

function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $("#nft_listinglist").DataTable({
        ajax: {
            url: "resources/display_nft_listing",
            type: "POST",
        },
    });
    $(document).on("click", ".updateNFTListing", function() {
        var nft_listing_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_nft_listing",
            method: "POST",
            data: {
                nft_listing_id: nft_listing_id,
            },
            dataType: "json",
            success: function(data) {
                $("#old_nft_listing_thumbnail").val(data.nft_listing_thumbnail);
                $("#nft_listing_title").val(data.nft_listing_title);
                $("#nft_listing_description").val(data.nft_listing_description);
                nft_listing_description.setData(data.nft_listing_description);
                $("#nft_listing_id").val(nft_listing_id);
                $("#action").val("Edit");
                $("#nft_listing_form_title").html("Update Asset Banner");
            },
        });
    });
    $(document).on("click", ".deleteNFTListing", function(e) {
        var nft_listing_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this Asset banner!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: "resources/delete_nft_listing",
                        type: "POST",
                        data: "nft_listing_id=" + nft_listing_id,
                        dataType: "json",
                    })
                    .done(function(response) {
                        if (response.success == "success") {
                            toastr.options.onHidden = function() {
                                window.location.href = "nft_listing";
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
    $("#updateNFTListingForm").validate({
        rules: {
            nft_listing_title: {
                required: true,
            },
        },
        messages: {
            nft_listing_title: {
                required: "Please provide a Asset listing title",
            },
        },
        submitHandler: function(form) {
            showLoading();
            var formdata = new FormData(
                document.getElementById("updateNFTListingForm")
            );
            var nft_listing_thumbnail = $("#nft_listing_thumbnail").get(0).files[0];
            formdata.append("nft_listing_thumbnail", nft_listing_thumbnail);
            $.ajax({
                url: "resources/add_nft_listing_submit",
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == "success") {
                        toastr.options.onHidden = function() {
                            window.location.href = "nft_listing";
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