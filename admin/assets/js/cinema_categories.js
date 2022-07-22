// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $("#cinemaCategoriesList").DataTable({
        ajax: {
            url: "resources/display_cinema_categories",
            type: "POST",
        },
    });
    $(document).on("click", ".updateCinemaCategories", function() {
        var cinema_category_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_cinema_categories",
            method: "POST",
            data: {
                cinema_category_id: cinema_category_id,
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $("#cinema_category").val(data.cinema_category);
                $("#cinema_category_id").val(cinema_category_id);
                $("#action").val("Edit");
                $("#cinema_category_form_title").html("Update Cinema Category");
            },
        });
    });
    $(document).on("click", ".deleteCinemaCategories", function(e) {
        var cinema_category_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this Cinema Category!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: "resources/delete_cinema_category",
                        type: "POST",
                        data: "cinema_category_id=" + cinema_category_id,
                        dataType: "json",
                    })
                    .done(function(response) {
                        if (response.success == "success") {
                            toastr.options.onHidden = function() {
                                window.location.href = "p_h_cinema_categories";
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
    $("#updateCinemaCategoriesForm").validate({
        rules: {
            cinema_category: {
                required: true,
            },
        },
        messages: {
            cinema_category: {
                required: "Please provide a cinema category",
            },
        },
        submitHandler: function(form) {
            var formdata = new FormData(
                document.getElementById("updateCinemaCategoriesForm")
            );
            showLoading();
            $.ajax({
                url: "resources/add_cinema_category_submit",
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == "success") {
                        toastr.options.onHidden = function() {
                            window.location.href = "p_h_cinema_categories";
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