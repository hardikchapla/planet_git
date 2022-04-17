// Loader
let banner_description;

ClassicEditor
    .create(document.querySelector('#banner_description'))
    .then(banner_description_editor => {
        banner_description = banner_description_editor;
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
    var dataTable = $('#bannerList').DataTable({
        "ajax": {
            url: "resources/display_banner_list",
            type: "POST"
        }
    });
    $("#updateBannerForm").validate({
        rules: {
            selectPage: {
                required: true,
            },
            banner_title: {
                required: true,
            },
            banner_description: {
                required: true,
                minlength: 10
            },
            banner_link: {
                required: true,
            },
            link_type: {
                required: true,
            },
            banner_type: {
                required: true,
            }
        },
        messages: {
            selectPage: {
                required: "Please select page"
            },
            banner_title: {
                required: "Please provide a banner title"
            },
            banner_description: {
                required: "Please enter banner description",
                minlength: "Please enter minimum 10 characters"
            },
            banner_link: {
                required: "Please provide a banner link"
            },
            link_type: {
                required: "Please provide a link type"
            },
            banner_type: {
                required: "Please provide a banner type"
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "selectPage") {
                error.insertAfter(".selection");
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateBannerForm'));
            var banner_image = $('#banner_image').get(0).files[0];
            formdata.append('banner_image', banner_image);
            showLoading();
            $.ajax({
                url: 'resources/add_banner_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'banner';
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
    $(document).on('click', '.updateBanner', function() {
        var banner_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_banner",
            method: "POST",
            data: {
                banner_id: banner_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#old_banner_image').val(data.old_banner_image);
                $('#banner_title').val(data.banner_title);
                $('#banner_link').val(data.banner_link);
                $('#link_type').val(data.link_type);
                banner_description.setData(data.banner_description);
                $('#selectPage').select2("val", data.selectPage);
                $('#banner_id').val(banner_id);
                if (data.banner_type == 1) {
                    $('#banner_type1').attr('checked', true);
                } else {
                    $('#banner_type2').attr('checked', true);
                }
                if (data.link_type == 1) {
                    $('#link_type1').attr('checked', true);
                } else if (data.link_type == 2) {
                    $('#link_type2').attr('checked', true);
                } else if (data.link_type == 3) {
                    $('#link_type3').attr('checked', true);
                } else {
                    $('#link_type4').attr('checked', true);
                }
                $('#action').val("Edit");
                $('#banner_form_title').html("Update Banner");
            }
        })
    });
    $(document).on('click', '.deleteBanner', function(e) {
        var banner_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this banner!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_banner',
                        type: 'POST',
                        data: 'banner_id=' + banner_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'banner';
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
});