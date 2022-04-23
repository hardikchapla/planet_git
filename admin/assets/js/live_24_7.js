// Loader
let phtv_24_7_description;

ClassicEditor
    .create(document.querySelector('#phtv_24_7_description'))
    .then(phtv_24_7_description_editor => {
        // Store it in more "global" context.
        phtv_24_7_description = phtv_24_7_description_editor;
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
    var dataTable = $('#phtv_24_7_list').DataTable({
        "ajax": {
            url: "resources/display_phtv_24_7",
            type: "POST"
        }
    });
    $(document).on('click', '.viewPHTV_24_7_DescriptionModel', function() {
        var description = $(this).attr("id");
        $.ajax({
            url: "resources/get_discription",
            method: "POST",
            data: {
                description: description
            },
            success: function(data) {
                $('#viewPHTV_24_7_Description').html(data);
            }
        });
    });
    $(document).on('click', '.updatePHTV_24_7', function() {
        var phtv_24_7_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_phtv_24_7",
            method: "POST",
            data: {
                phtv_24_7_id: phtv_24_7_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#old_phtv_24_7_thumbnail').val(data.phtv_24_7_thumbnail);
                $('#phtv_24_7_title').val(data.phtv_24_7_title);
                $('#phtv_24_7_youtube_link').val(data.phtv_24_7_youtube_link);
                $('#phtv_24_7_length').val(data.phtv_24_7_length);
                $('#phtv_24_7_description').val(data.phtv_24_7_description);
                phtv_24_7_description.setData(data.phtv_24_7_description);
                $('#phtv_24_7_id').val(phtv_24_7_id);
                if (data.is_recomended == 1) {
                    $('#is_recomended1').attr('checked', true);
                } else {
                    $('#is_recomended2').attr('checked', true);
                }
                $('#action').val("Edit");
                $('#phtv_24_7_form_title').html("Update PHTV 24/7");
            }
        })
    });
    $(document).on('click', '.deletePHTV_24_7', function(e) {
        var phtv_24_7_id = $(this).attr("id");
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
                        url: 'resources/delete_phtv_24_7',
                        type: 'POST',
                        data: 'phtv_24_7_id=' + phtv_24_7_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'live_24_7';
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
    $("#updatePHTV_24_7Form").validate({
        rules: {
            phtv_24_7_title: {
                required: true,
            },
            phtv_24_7_description: {
                required: function() {
                    CKEDITOR.instances.phtv_24_7_description.updateElement();
                },
                minlength: 10
            },
            phtv_24_7_youtube_link: {
                required: true,
            },
            phtv_24_7_length: {
                required: true,
            },
            is_recomended: {
                required: true,
            }
        },
        messages: {
            phtv_24_7_title: {
                required: "Please provide a PHTV 24/7 title"
            },
            phtv_24_7_description: {
                required: "Please enter PHTV 24/7 description",
                minlength: "Please enter minimum 10 characters"
            },
            phtv_24_7_youtube_link: {
                required: "Please provide a PHTV 24/7 youtube link"
            },
            phtv_24_7_length: {
                required: "Please provide a PHTV 24/7 length"
            },
            is_recomended: {
                required: "Please select type",
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "phtv_24_7_description") {
                error.insertAfter(".phtv_24_7_description");
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updatePHTV_24_7Form'));
            var phtv_24_7_thumbnail = $('#phtv_24_7_thumbnail').get(0).files[0];
            formdata.append('phtv_24_7_thumbnail', phtv_24_7_thumbnail);
            showLoading();
            $.ajax({
                url: 'resources/add_phtv_24_7_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'live_24_7';
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