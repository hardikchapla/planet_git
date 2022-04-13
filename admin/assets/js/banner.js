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
            $.ajax({
                url: 'resources/add_banner_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() { window.location.href = 'pages'; }
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