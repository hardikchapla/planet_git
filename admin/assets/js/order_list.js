function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var orderslist = $("#orderslist").DataTable({
        dom: "Bfrtip",
        buttons: [
            { extend: "copyHtml5", exportOptions: { columns: [0, ":visible"] } },
            { extend: "pdfHtml5", exportOptions: { columns: ":visible" } },
            {
                text: "JSON",
                action: function(a, o, t, r) {
                    var e = o.buttons.exportData();
                    $.fn.dataTable.fileSave(new Blob([JSON.stringify(e)]), "Export.json");
                },
            },
            { extend: "print", exportOptions: { columns: ":visible" } },
        ],
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
                    toastr.success(response.message).delay(1000).fadeOut(1000);
                } else {
                    toastr.warning(output.message).delay(1000).fadeOut(1000);
                }
            })
            .fail(function() {
                swal('Oops...', 'Something went wrong with ajax !', 'error');
            });
    });
});