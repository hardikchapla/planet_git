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
        $('#viewPHTV_24_7_Description').html(description);
    });
    $(document).on('click', '.updateBlog', function() {
        var blog_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_blog",
            method: "POST",
            data: {
                blog_id: blog_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#old_blog_image').val(data.blog_image);
                $('#old_blog_video').val(data.blog_video);
                $('#blog_title').val(data.blog_title);
                $('#blog_sub_title').val(data.blog_sub_title);
                $('#blog_description').val(data.blog_description);
                blog_description.setData(data.blog_description);
                $('#selectCategory').select2("val", data.category_id);
                $('#selectAuter').select2("val", data.auther_id);
                $('#blog_id').val(blog_id);
                if (data.blog_type == 1) {
                    $('#blog_type2').attr('checked', true);
                } else {
                    $('#blog_type1').attr('checked', true);
                }
                $('#action').val("Edit");
                $('#blog_form_title').html("Update Blog");
            }
        })
    });
    $(document).on('click', '.deleteBlog', function(e) {
        var blog_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this blog!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_blog',
                        type: 'POST',
                        data: 'blog_id=' + blog_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'blogs';
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