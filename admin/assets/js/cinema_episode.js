// Loader
let cinema_episode_descriptions;

ClassicEditor
    .create(document.querySelector('#cinema_episode_descriptions'))
    .then(cinema_episode_descriptions_editor => {
        // Store it in more "global" context.
        cinema_episode_descriptions = cinema_episode_descriptions_editor;
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
    var dataTable = $('#p_h_cinema_episode').DataTable({
        "ajax": {
            url: "resources/display_cinema_episode",
            type: "POST"
        }
    });
    $(document).on('click', '.viewCinemaEpisodeDescriptionModel', function() {
        var description = $(this).attr("id");
        $('#viewCinemaEpisodeDescription').html(description);
    });
    $(document).on('click', '.updateCinemaEpisode', function() {
        var cinema_episode_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_cinema_episode",
            method: "POST",
            data: {
                cinema_episode_id: cinema_episode_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#old_cinema_episode_poster_file').val(data.cinema_episode_poster_file);
                $('#cinema_episode_descriptions').val(data.cinema_episode_descriptions);
                cinema_episode_descriptions.setData(data.cinema_episode_descriptions);
                $('#cinema_episode_title').val(data.cinema_episode_title);
                $('#cinema_episode_season').val(data.cinema_episode_season);
                $('#cinema_episode_video_link').val(data.cinema_episode_video_link);
                $('#cinema_episode_time').val(data.cinema_episode_time);
                $('#selectCinema').select2("val", data.selectCinema);
                $('#cinema_episode_id').val(cinema_episode_id);
                $('#action').val("Edit");
                $('#cinema_episode_form_title').html("Update Cinema Episode");
            }
        })
    });
    $(document).on('click', '.deleteCinemaEpisode', function(e) {
        var cinema_episode_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this cinema episode!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_cinema_episode',
                        type: 'POST',
                        data: 'cinema_episode_id=' + cinema_episode_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'p_h_cinema_episode';
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
    $("#updateCinemaEpisodeForm").validate({
        rules: {
            cinema_episode_title: {
                required: true,
            },
            cinema_episode_descriptions: {
                required: true,
                minlength: 10
            },
            selectCinema: {
                required: true,
            },
            cinema_episode_season: {
                required: true,
            },
            cinema_episode_time: {
                required: true,
            },
            cinema_episode_video_link: {
                required: true,
            }
        },
        messages: {
            cinema_episode_title: {
                required: "Please provide a cinema episode title"
            },
            cinema_episode_descriptions: {
                required: "Please enter cinema description",
                minlength: "Please enter minimum 10 characters"
            },
            selectCinema: {
                required: "Please select cinema"
            },
            cinema_episode_season: {
                required: "Please enter episode season"
            },
            cinema_episode_time: {
                required: "Please enter episode time",
            },
            cinema_episode_video_link: {
                required: "Please enter episode video link",
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateCinemaEpisodeForm'));
            var cinema_episode_poster_file = $('#cinema_episode_poster_file').get(0).files[0];
            formdata.append('cinema_episode_poster_file', cinema_episode_poster_file);
            showLoading();
            $.ajax({
                url: 'resources/add_cinema_episode_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'p_h_cinema_episode';
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