// Loader
let podcast_description;

ClassicEditor
    .create(document.querySelector('#podcast_description'))
    .then(podcast_description_editor => {
        // Store it in more "global" context.
        podcast_description = podcast_description_editor;
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
    var dataTable = $('#podcastlist').DataTable({
        "ajax": {
            url: "resources/display_podcast",
            type: "POST"
        }
    });
    $(document).on('click', '.updatePodcast', function() {
        showLoading();
        var podcast_id = $(this).attr("id");
        $.ajax({
            url: "resources/update_podcast",
            method: "POST",
            data: {
                podcast_id: podcast_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#old_podcast_image').val(data.podcast_image);
                $('#podcast_title').val(data.podcast_title);
                $('#podcast_fb_link').val(data.podcast_fb_link);
                $('#podcast_twiter_link').val(data.podcast_twiter_link);
                $('#podcast_google_link').val(data.podcast_google_link);
                $('#podcast_insta_link').val(data.podcast_insta_link);
                $('#podcast_description').val(data.podcast_description);
                podcast_description.setData(data.podcast_description);
                $('#selectAuter').val(data.auther_id).trigger('change');
                $('#selectCreatedBy').val(data.created_by_id).trigger('change');
                $('#selectSponsoredBy').val(data.sponsored_by_id).trigger('change');
                $('#podcast_id').val(podcast_id);
                $('#action').val("Edit");
                $('#podcast_form_title').html("Update Podcast");
            }
        })
    });
    $(document).on('click', '.viewPodcastDescriptionModel', function() {
        var description = $(this).attr("id");
        $('#viewPodcastDescription').html(description);
    });
    $(document).on('click', '.deletePodcast', function(e) {
        var podcast_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this podcast!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                    url: 'resources/delete_podcast',
                    type: 'POST',
                    data: 'podcast_id=' + podcast_id,
                    dataType: 'json'
                })
                .done(function(response) {
                    if (response.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'podcast';
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
    $("#updatePodcastForm").validate({
        rules: {
            podcast_title: {
                required: true,
            },
            podcast_description: {
                required: true,
                minlength: 10
            },
            selectAuter: {
                required: true,
            }
        },
        messages: {
            podcast_title: {
                required: "Please provide a podcast title"
            },
            podcast_description: {
                required: "Please enter podcast description",
                minlength: "Please enter minimum 10 characters"
            },
            selectAuter: {
                required: "Please select auther"
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updatePodcastForm'));
            var podcast_image = $('#podcast_image').get(0).files[0];
            formdata.append('podcast_image', podcast_image);
            showLoading();
            $.ajax({
                url: 'resources/add_podcast_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'podcast';
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