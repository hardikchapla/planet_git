// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $("#nft_logoslist").DataTable({
        ajax: {
            url: "resources/display_nft_logos",
            type: "POST",
        },
    });
    $(document).on("click", ".updateNFTLogos", function() {
        var nft_logos_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_nft_logos",
            method: "POST",
            data: {
                nft_logos_id: nft_logos_id,
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $("#old_nft_logos_image").val(data.nft_logos_image);
                $("#nft_logos_name").val(data.nft_logos_name);
                $("#nft_logos_id").val(nft_logos_id);
                $("#action").val("Edit");
                $("#nft_logos_form_title").html("Update DA Logos");
            },
        });
    });
    $(document).on("click", ".deleteNFTLogos", function(e) {
        var nft_logos_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this DA listing!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: "resources/delete_nft_logos",
                        type: "POST",
                        data: "nft_logos_id=" + nft_logos_id,
                        dataType: "json",
                    })
                    .done(function(response) {
                        if (response.success == "success") {
                            toastr.options.onHidden = function() {
                                window.location.href = "nft_logos";
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
    $("#updateNFTLogosForm").validate({
        rules: {
            nft_logos_name: {
                required: true,
            },
        },
        messages: {
            nft_logos_name: {
                required: "Please provide a DA logo name",
            },
        },
        submitHandler: function(form) {
            showLoading();
            var formdata = new FormData(
                document.getElementById("updateNFTLogosForm")
            );
            var nft_logos_image = $("#nft_logos_image").get(0).files[0];
            formdata.append("nft_logos_image", nft_logos_image);
            $.ajax({
                url: "resources/add_nft_logos_submit",
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == "success") {
                        toastr.options.onHidden = function() {
                            window.location.href = "nft_logos";
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