// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $("#podcastepisodelist").DataTable({
        ajax: {
            url: "resources/display_podcast_episode",
            type: "POST",
        },
    });
    $(document).on("click", ".updatePodcastEpisode", function() {
        var podcast_episode_id = $(this).attr("id");
        $.ajax({
            url: "resources/update_podcast_episode",
            method: "POST",
            data: {
                podcast_episode_id: podcast_episode_id,
            },
            dataType: "json",
            success: function(data) {
                $("#old_podcast_episode_mp3_file").val(data.podcast_episode_file);
                $("#podcast_episode_title").val(data.podcast_episode_title);
                $("#selectPodcast").select2("val", data.podcast_id);
                $("#podcast_episode_id").val(podcast_episode_id);
                $("#action").val("Edit");
                $("#podcast_episode_form_title").html("Update Podcast Episode");
            },
        });
    });
    $(document).on("click", ".deletePodcastEpisode", function(e) {
        var podcast_episode_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this poscast episode!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                        url: "resources/delete_podcast_episode",
                        type: "POST",
                        data: "podcast_episode_id=" + podcast_episode_id,
                        dataType: "json",
                    })
                    .done(function(response) {
                        if (response.success == "success") {
                            toastr.options.onHidden = function() {
                                window.location.href = "podcast_episode";
                            };
                            toastr.success(response.message).delay(1000).fadeOut(1000);
                        } else {
                            toastr.warning(output.message).delay(1000).fadeOut(1000);
                        }
                    })
                    .fail(function() {
                        swal("Oops...", "Something went wrong with ajax !", "error");
                    });
            }
        });
    });
    $("#updatePodcastEpisoadForm").validate({
        rules: {
            podcast_episode_title: {
                required: true,
            },
            selectPodcast: {
                required: true,
            },
        },
        messages: {
            podcast_episode_title: {
                required: "Please provide a title",
            },
            selectPodcast: {
                required: "Please select a podcast",
            },
        },
        submitHandler: function(form) {
            showLoading();
            $("#updatePodcastEpisode").modal("hide");
            var formdata = new FormData(
                document.getElementById("updatePodcastEpisoadForm")
            );
            var podcast_episode_mp3_file = $("#podcast_episode_mp3_file").get(0)
                .files[0];
            formdata.append("podcast_episode_mp3_file", podcast_episode_mp3_file);
            $.ajax({
                url: "resources/add_podcast_episode_submit",
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == "success") {
                        toastr.options.onHidden = function() {
                            window.location.href = "podcast_episode";
                            hideLoading();
                        };
                        toastr.success(output.message).delay(1000).fadeOut(1000);
                    } else {
                        toastr.warning(output.message).delay(1000).fadeOut(1000);
                        hideLoading();
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