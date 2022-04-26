// Loader
let high_voltage_episode_description;

ClassicEditor
    .create(document.querySelector('#high_voltage_episode_description'))
    .then(high_voltage_episode_description_editor => {
        // Store it in more "global" context.
        high_voltage_episode_description = high_voltage_episode_description_editor;
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
    var dataTable = $('#highVoltageEpisodelist').DataTable({
        "ajax": {
            url: "resources/display_high_voltage_episode",
            type: "POST"
        }
    });
    $(document).on('change', 'input[name="high_voltage_episode_video_type"]', function() {
        var high_voltage_episode_video_type = $(this).val();
        if (high_voltage_episode_video_type == 1) {
            $('#high_voltage_episode_video').attr('type', 'file');
        } else {
            $('#high_voltage_episode_video').attr('type', 'text');
        }
    });
    $(document).on('click', '.viewHighVoltageEpisodeDescriptionModel', function() {
        var description = $(this).attr("id");
        $.ajax({
            url: "resources/get_discription",
            method: "POST",
            data: {
                description: description
            },
            success: function(data) {
                $('#viewHighVoltageEpisodeDescription').html(data);
            }
        });
    });
    $(document).on('click', '.updateHighVoltageEpisode', function() {
        var high_voltage_episode_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_high_voltage_episode",
            method: "POST",
            data: {
                high_voltage_episode_id: high_voltage_episode_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#old_high_voltage_episode_image').val(data.high_voltage_episode_image);
                if (data.high_voltage_episode_video_type == 1) {
                    $('#high_voltage_episode_video').attr('type', 'file');
                    $('#old_high_voltage_episode_video').val(data.high_voltage_episode_video);
                } else {
                    $('#high_voltage_episode_video').attr('type', 'text');
                    $('#high_voltage_episode_video').val(data.high_voltage_episode_video);
                }
                $('#high_voltage_episode_title').val(data.high_voltage_episode_title);
                $('#high_voltage_episode_description').val(data.high_voltage_episode_description);
                high_voltage_episode_description.setData(data.high_voltage_episode_description);
                $('#selectCategory').select2("val", data.selectCategory);
                $('#selectTitle').select2("val", data.selectTitle);
                $('#high_voltage_episode_id').val(high_voltage_episode_id);
                if (data.high_voltage_episode_video_type == 1) {
                    $('#high_voltage_episode_video_type2').attr('checked', true);
                } else {
                    $('#high_voltage_episode_video_type1').attr('checked', true);
                }
                $('#action').val("Edit");
                $('#high_voltage_episode_form_title').html("Update High Voltage Episode");
            }
        })
    });
    $(document).on('click', '.deleteHighVoltageEpisode', function(e) {
        var high_voltage_episode_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this high voltage episode!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_high_voltage_episode',
                        type: 'POST',
                        data: 'high_voltage_episode_id=' + high_voltage_episode_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'high_voltage_episode';
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
    $("#updateHighVoltageEpisodeForm").validate({
        rules: {
            high_voltage_episode_title: {
                required: true,
            },
            high_voltage_episode_description: {
                required: true,
                minlength: 10
            },
            selectCategory: {
                required: true,
            },
            selectTitle: {
                required: true,
            }
        },
        messages: {
            high_voltage_episode_title: {
                required: "Please provide a episode title"
            },
            high_voltage_episode_description: {
                required: "Please enter episode description",
                minlength: "Please enter minimum 10 characters"
            },
            selectCategory: {
                required: "Please select category"
            },
            selectTitle: {
                required: "Please select titles"
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateHighVoltageEpisodeForm'));
            var high_voltage_episode_video_type = $("input[name='high_voltage_episode_video_type']:checked").val();
            var high_voltage_episode_image = $('#high_voltage_episode_image').get(0).files[0];
            formdata.append('high_voltage_episode_image', high_voltage_episode_image);
            if (high_voltage_episode_video_type == 1) {
                var high_voltage_episode_video = $('#high_voltage_episode_video').get(0).files[0];
                formdata.append('high_voltage_episode_video', high_voltage_episode_video);
            }
            showLoading();
            $.ajax({
                url: 'resources/add_high_voltage_episode_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'high_voltage_episode';
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