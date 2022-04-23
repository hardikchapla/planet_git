// Loader
let live_tv_description;

ClassicEditor
    .create(document.querySelector('#live_tv_description'))
    .then(live_tv_description_editor => {
        // Store it in more "global" context.
        live_tv_description = live_tv_description_editor;
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
    var dataTable = $('#live_tv_list').DataTable({
        "ajax": {
            url: "resources/display_live_tv",
            type: "POST"
        }
    });
    $(document).on('click', '.viewlive_tv_DescriptionModel', function() {
        var description = $(this).attr("id");
        $.ajax({
            url: "resources/get_discription",
            method: "POST",
            data: {
                description: description
            },
            success: function(data) {
                $('#view_live_tv_Description').html(data);
            }
        });
    });
    $(document).on('click', '.updateLiveTv', function() {
        var live_tv_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_live_tv",
            method: "POST",
            data: {
                live_tv_id: live_tv_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#old_live_tv_thumbnail').val(data.live_tv_thumbnail);
                $('#live_tv_title').val(data.live_tv_title);
                $('#live_tv_youtube_link').val(data.live_tv_youtube_link);
                $('#live_tv_length').val(data.live_tv_length);
                $('#live_tv_description').val(data.live_tv_description);
                live_tv_description.setData(data.live_tv_description);
                $('#live_tv_id').val(live_tv_id);
                if (data.is_recomended == 1) {
                    $('#is_recomended1').attr('checked', true);
                } else {
                    $('#is_recomended2').attr('checked', true);
                }
                $('#action').val("Edit");
                $('#live_tv_form_title').html("Update Live TV");
            }
        })
    });
    $(document).on('click', '.deleteLiveTv', function(e) {
        var live_tv_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this PHTV 24/7 Link!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_live_tv',
                        type: 'POST',
                        data: 'live_tv_id=' + live_tv_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'live_tv';
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
    $("#updateLiveTvForm").validate({
        rules: {
            live_tv_title: {
                required: true,
            },
            live_tv_description: {
                required: function() {
                    CKEDITOR.instances.live_tv_description.updateElement();
                },
                minlength: 10
            },
            live_tv_youtube_link: {
                required: true,
            },
            live_tv_length: {
                required: true,
            },
            is_recomended: {
                required: true,
            }
        },
        messages: {
            live_tv_title: {
                required: "Please provide a Live tv title"
            },
            live_tv_description: {
                required: "Please enter Luve Tv description",
                minlength: "Please enter minimum 10 characters"
            },
            live_tv_youtube_link: {
                required: "Please provide a Live TV youtube link"
            },
            live_tv_length: {
                required: "Please provide a Live TV length"
            },
            is_recomended: {
                required: "Please select type",
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "live_tv_description") {
                error.insertAfter(".live_tv_description");
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateLiveTvForm'));
            var live_tv_thumbnail = $('#live_tv_thumbnail').get(0).files[0];
            formdata.append('live_tv_thumbnail', live_tv_thumbnail);
            showLoading();
            $.ajax({
                url: 'resources/add_live_tv_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'live_tv';
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