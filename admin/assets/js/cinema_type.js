// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $("#cinemaTypeList").DataTable({
        ajax: {
            url: "resources/display_cinema_type",
            type: "POST",
        },
    });
    $(document).on("click", ".updateCinemaType", function() {
        var cinema_type_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_cinema_type",
            method: "POST",
            data: {
                cinema_type_id: cinema_type_id,
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $("#cinema_type").val(data.cinema_type);
                $("#cinema_type_id").val(cinema_type_id);
                $("#action").val("Edit");
                $("#cinema_type_form_title").html("Update Cinema Type");
            },
        });
    });
    $(document).on("click", ".deleteCinemaType", function(e) {
        var cinema_type_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this Cinema Type!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: "resources/delete_cinema_type",
                        type: "POST",
                        data: "cinema_type_id=" + cinema_type_id,
                        dataType: "json",
                    })
                    .done(function(response) {
                        if (response.success == "success") {
                            toastr.options.onHidden = function() {
                                window.location.href = "p_h_cinema_type";
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
    $("#updateCinemaTypeForm").validate({
        rules: {
            cinema_type: {
                required: true,
            },
        },
        messages: {
            cinema_type: {
                required: "Please provide a cinema type",
            },
        },
        submitHandler: function(form) {
            var formdata = new FormData(
                document.getElementById("updateCinemaTypeForm")
            );
            showLoading();
            $.ajax({
                url: "resources/add_cinema_type_submit",
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == "success") {
                        toastr.options.onHidden = function() {
                            window.location.href = "p_h_cinema_type";
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