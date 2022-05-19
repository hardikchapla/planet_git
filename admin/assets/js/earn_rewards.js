// Loader
function showLoading() {
    document.getElementById("page-loader").style = "visibility: visible";
}

function hideLoading() {
    document.getElementById("page-loader").style = "visibility: hidden";
}

$(document).ready(function() {
    var dataTable = $('#earnRewardsList').DataTable({
        "ajax": {
            url: "resources/display_earn_rewards_list",
            type: "POST"
        }
    });
    $(document).on('click', '.updateEarnRewards', function() {
        var earn_rewards_id = $(this).attr("id");
        showLoading()
        $.ajax({
            url: "resources/update_earn_rewards_list",
            method: "POST",
            data: {
                earn_rewards_id: earn_rewards_id
            },
            dataType: "json",
            success: function(data) {
                hideLoading()
                $('#earn_rewards_slug').val(data.earn_rewards_slug);
                $('#earn_rewards_description').val(data.earn_rewards_description);
                $('#earn_rewards_id').val(earn_rewards_id);
                $('#action').val("Edit");
            }
        })
    });
    $("#updateEarnRewardsForm").validate({
        rules: {
            earn_rewards_slug: {
                required: true,
            },
            earn_rewards_description: {
                required: true,
            }
        },
        messages: {
            earn_rewards_slug: {
                required: "Please provide a slug"
            },
            earn_rewards_description: {
                required: "Please provide a description"
            }
        },
        submitHandler: function(form) {
            var formdata = new FormData(document.getElementById('updateEarnRewardsForm'));
            showLoading()
            $.ajax({
                url: 'resources/add_earn_rewards_submit',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(output) {
                    output = jQuery.parseJSON(output);
                    if (output.success == 'success') {
                        toastr.options.onHidden = function() {
                            window.location.href = 'earn_rewards';
                            hideLoading()
                        }
                        toastr.success(output.message).delay(1000).fadeOut(1000);
                    } else {
                        hideLoading()
                        toastr.warning(output.message).delay(1000).fadeOut(1000);
                    }
                },
                error: function() {
                    hideLoading()
                    toastr.warning('Something went wrong with ajax !').delay(1000).fadeOut(1000);
                }
            });
        }
    });
});