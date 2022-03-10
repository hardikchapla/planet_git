function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $('#orderslist').DataTable({
        "ajax": {
            url: "resources/display_orders",
            type: "POST"
        }
    });
    $(document).on('change', '.order_status', function(e) {
        var order_id = $(this).attr("id");
        var status = $(this).val();
        $.ajax({
                url: 'resources/change_order_status',
                type: 'POST',
                data: { order_id: order_id, status: status },
                dataType: 'json'
            })
            .done(function(response) {
                if (response.success == 'success') {
                    $('#orderslist').DataTable().ajax.reload();
                    toastr.success(response.message).delay(1000).fadeOut(1000);
                } else {
                    toastr.warning(output.message).delay(1000).fadeOut(1000);
                }
            })
            .fail(function() {
                swal('Oops...', 'Something went wrong with ajax !', 'error');
            });

    });
    // $(document).on('click', '.view_order_details', function() {
    //     var order_id = $(this).attr("id");
    //     $.ajax({
    //         url: "resources/get_order_details",
    //         method: "POST",
    //         data: {
    //             order_id: order_id
    //         },
    //         dataType: "json",
    //         success: function(data) {

    //         }
    //     })
    // });
});