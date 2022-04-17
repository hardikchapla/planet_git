// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $('#blogAutherlist').DataTable({
        "ajax": {
            url: "resources/display_blog_auther",
            type: "POST"
        }
    });
    $(document).on('click', '.updateBlogAuther', function() {
        var blog_auther_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_blog_auther",
            method: "POST",
            data: {
                blog_auther_id: blog_auther_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
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
                showLoading();
                $.ajax({
                        url: 'resources/delete_blog_auther',
                        type: 'POST',
                        data: 'blog_auther_id=' + blog_auther_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'blog_auther';
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
            showLoading();
            $.ajax({
                url: 'resources/add_blog_auther_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'blog_auther';
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