// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $('#blogCategorylist').DataTable({
        "ajax": {
            url: "resources/display_blog_category",
            type: "POST"
        }
    });
    $(document).on('click', '.updateBlogCategory', function() {
        var blog_category_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_blog_category",
            method: "POST",
            data: {
                blog_category_id: blog_category_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#blog_category_name').val(data.blog_category_name);
                $('#blog_category_id').val(blog_category_id);
                $('#action').val("Edit");
                $('#blog_category_form_title').html("Update Blog Category");
            }
        })
    });
    $(document).on('click', '.deleteBlogCategory', function(e) {
        var blog_category_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this blog category!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_blog_category',
                        type: 'POST',
                        data: 'blog_category_id=' + blog_category_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'blog_category';
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
    $("#updateBlogCategoryForm").validate({
        rules: {
            blog_category_name: {
                required: true,
            }
        },
        messages: {
            blog_category_name: {
                required: "Please provide a category name"
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateBlogCategoryForm'));
            showLoading();
            $.ajax({
                url: 'resources/add_blog_category_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'blog_category';
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