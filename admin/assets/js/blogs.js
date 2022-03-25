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
    $(document).on('click', '.updateBlogAuther', function() {
        var blog_auther_id = $(this).attr("id");
        $.ajax({
            url: "resources/update_blog_auther",
            method: "POST",
            data: {
                blog_auther_id: blog_auther_id
            },
            dataType: "json",
            success: function(data) {
                $('#old_blog_auther_image').val(data.blog_auther_image);
                $('#blog_auther_name').val(data.blog_auther_name);
                $('#blog_auther_id').val(blog_auther_id);
                $('#action').val("Edit");
                $('#blog_auther_form_title').html("Update Blog Auther");
            }
        })
    });
    $(document).on('click', '.deleteBlogAuther', function(e) {
        var blog_auther_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this blog auther!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                        url: 'resources/delete_blog_auther',
                        type: 'POST',
                        data: 'blog_auther_id=' + blog_auther_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() { window.location.href = 'blog_auther'; }
                            toastr.success(response.message).delay(1000).fadeOut(1000);
                        } else {
                            toastr.warning(output.message).delay(1000).fadeOut(1000);
                        }

                    })
                    .fail(function() {
                        swal('Oops...', 'Something went wrong with ajax !', 'error');
                    });
            }
        });
    });
    $("#updateBlogAutherForm").validate({
        rules: {
            blog_auther_name: {
                required: true,
            }
        },
        messages: {
            blog_auther_name: {
                required: "Please provide a auther name"
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateBlogAutherForm'));
            var blog_auther_image = $('#blog_auther_image').get(0).files[0];
            formdata.append('blog_auther_image', blog_auther_image);
            $.ajax({
                url: 'resources/add_blog_auther_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() { window.location.href = 'blog_auther'; }
                        toastr.success(output.message).delay(1000).fadeOut(1000);
                    } else {
                        toastr.warning(output.message).delay(1000).fadeOut(1000);
                    }
                },
                error: function() {
                    toastr.warning('Something went wrong with ajax !').delay(1000).fadeOut(1000);
                }
            });
        }
    });
});