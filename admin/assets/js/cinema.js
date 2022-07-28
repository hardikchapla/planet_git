// Loader
let cinema_description;

ClassicEditor
    .create(document.querySelector('#cinema_description'))
    .then(cinema_description_editor => {
        // Store it in more "global" context.
        cinema_description = cinema_description_editor;
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
    var dataTable = $('#p_h_cinema').DataTable({
        "ajax": {
            url: "resources/display_cinema",
            type: "POST"
        }
    });
    $(document).on('click', '.viewCinemaDescriptionModel', function() {
        var description = $(this).attr("id");
        $('#viewCinemaDescription').html(description);
    });
    $(document).on('click', '.updateCinema', function() {
        var cinema_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_cinema",
            method: "POST",
            data: {
                cinema_id: cinema_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#old_cinema_poster_file').val(data.cinema_poster_file);
                $('#cinema_description').val(data.cinema_description);
                $('#cinema_year').val(data.cinema_year);
                $('#cinema_age').val(data.cinema_age);
                $('#cinema_trailer_link').val(data.cinema_trailer_link);
                $('#cinema_total_season').val(data.cinema_total_season);
                cinema_description.setData(data.cinema_description);
                $('#selectCategory').select2("val", data.selectCategory);
                $("#selectTypes").val(data.selectTypes).trigger('change');
                $('#cinema_id').val(cinema_id);
                $('#action').val("Edit");
                $('#cinema_form_title').html("Update Cinema");
            }
        })
    });
    $(document).on('click', '.deleteCinema', function(e) {
        var cinema_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this cinema!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_cinema',
                        type: 'POST',
                        data: 'cinema_id=' + cinema_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'p_h_cinema';
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
    $("#updateCinemaForm").validate({
        rules: {
            selectCategory: {
                required: true,
            },
            cinema_description: {
                required: true,
                minlength: 10
            },
            selectTypes: {
                required: true,
            },
            cinema_year: {
                required: true,
            },
            cinema_age: {
                required: true,
            },
            cinema_total_season: {
                required: true,
            },
            cinema_trailer_link: {
                required: true,
            }
        },
        messages: {
            selectCategory: {
                required: "Please provide a cinema category"
            },
            cinema_description: {
                required: "Please enter cinema description",
                minlength: "Please enter minimum 10 characters"
            },
            selectTypes: {
                required: "Please select types"
            },
            cinema_year: {
                required: "Please enter year"
            },
            cinema_age: {
                required: "Please enter age",
            },
            cinema_total_season: {
                required: "Please enter total season",
            },
            cinema_trailer_link: {
                required: "Please enter trailer link",
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateCinemaForm'));
            var cinema_poster_file = $('#cinema_poster_file').get(0).files[0];
            formdata.append('cinema_poster_file', cinema_poster_file);
            showLoading();
            $.ajax({
                url: 'resources/add_cinema_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'p_h_cinema';
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