// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $('#highVoltageLogoslist').DataTable({
        "ajax": {
            url: "resources/display_high_voltage_logos",
            type: "POST"
        }
    });
    $(document).on('click', '.updateHighVoltageLogos', function() {
        var high_voltage_logos_id = $(this).attr("id");
        showLoading();
        $.ajax({
            url: "resources/update_high_voltage_logos",
            method: "POST",
            data: {
                high_voltage_logos_id: high_voltage_logos_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading();
                $('#old_high_voltage_logos_image').val(data.high_voltage_logos_image);
                $('#high_voltage_logos_name').val(data.high_voltage_logos_name);
                $('#high_voltage_logos_id').val(high_voltage_logos_id);
                $('#action').val("Edit");
                $('#high_voltage_logos_form_title').html("Update High Voltage Logos");
            }
        })
    });
    $(document).on('click', '.deleteHighVoltageLogos', function(e) {
        var high_voltage_logos_id = $(this).attr("id");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this high voltage logo!',
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                        url: 'resources/delete_high_voltage_logos',
                        type: 'POST',
                        data: 'high_voltage_logos_id=' + high_voltage_logos_id,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.success == 'success') {
                            toastr.options.onHidden = function() {
                                window.location.href = 'high_voltage_logos';
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
    $("#updateHighVoltageLogosForm").validate({
        rules: {
            high_voltage_logos_name: {
                required: true,
            }
        },
        messages: {
            high_voltage_logos_name: {
                required: "Please provide a High Voltage logo name"
            }
        },
        submitHandler: function(form) {
            showLoading();
            var formdata = new FormData(document.getElementById('updateHighVoltageLogosForm'));
            var high_voltage_logos_image = $('#high_voltage_logos_image').get(0).files[0];
            formdata.append('high_voltage_logos_image', high_voltage_logos_image);
            $.ajax({
                url: 'resources/add_high_voltage_logos_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'high_voltage_logos';
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