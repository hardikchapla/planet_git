// Loader
let blog_description;

ClassicEditor
    .create(document.querySelector('#blog_description'))
    .then(blog_description_editor => {
        // Store it in more "global" context.
        blog_description = blog_description_editor;
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
    var dataTable = $('#bloglist').DataTable({
        "ajax": {
            url: "resources/display_blogs",
            type: "POST"
        }
    });
    $(document).on('click', '.viewBlogDescriptionModel', function() {
        var description = $(this).attr("id");
        $('#viewBlogDescription').html(description);
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
    $("#updateBlogForm").validate({
        rules: {
            blog_title: {
                required: true,
            },
            blog_description: {
                required: true,
                minlength: 10
            },
            selectCategory: {
                required: true,
            },
            selectAuter: {
                required: true,
            },
            blog_type: {
                required: true,
            }
        },
        messages: {
            blog_title: {
                required: "Please provide a blog title"
            },
            blog_description: {
                required: "Please enter blog description",
                minlength: "Please enter minimum 10 characters"
            },
            selectCategory: {
                required: "Please select category"
            },
            selectAuter: {
                required: "Please select auther"
            },
            blog_type: {
                required: "Please select type",
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateBlogForm'));
            var blog_image = $('#blog_image').get(0).files[0];
            formdata.append('blog_image', blog_image);
            showLoading();
            $.ajax({
                url: 'resources/add_blogs_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'blogs';
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